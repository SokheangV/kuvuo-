<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * CSV-backed product catalog.
 *
 * Reads all *.csv files from <project-root>/product/ and exposes a
 * query-like API so controllers don't know (or care) that there is no DB.
 *
 * Every public method returns plain stdClass objects (or collections of them)
 * whose properties mirror the shape the old Eloquent Product model had, so
 * existing Blade templates need only minimal edits.
 *
 * CSV source: WooCommerce product-export format
 * Key columns used:
 *   Name, SKU, GTIN, Short description, Description,
 *   In stock?, Sale price, Regular price, Categories,
 *   Images, External URL, Attribute 1-3 name / value(s), Published
 */
class CsvProductRepository
{
    /** Per-request in-memory cache — parse CSV only once. */
    private static ?array $cache = null;

    // ─────────────────────────────────────────────────────────────────────────
    //  Public query API
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Return all published products as a Collection of stdClass.
     */
    public static function all(): Collection
    {
        return collect(self::load());
    }

    /**
     * Return a LengthAwarePaginator filtered by category slug, search term,
     * and sorted by price (or default/natural order).
     *
     * @param int         $perPage
     * @param string|null $categorySlug  top-level category slug, e.g. "mini-excavators"
     * @param string|null $search        free-text search
     * @param string|null $sort          "low" | "high" | null
     * @param int         $page
     */
    public static function paginate(
        int $perPage = 12,
        ?string $categorySlug = null,
        ?string $search = null,
        ?string $sort = null,
        int $page = 1,
    ): LengthAwarePaginator {
        $items = self::all();

        if ($categorySlug) {
            $items = $items->filter(
                fn ($p) => $p->primaryCategorySlug === $categorySlug
            );
        }

        if ($search) {
            $term = mb_strtolower(trim($search));
            $items = $items->filter(function ($p) use ($term) {
                return str_contains(mb_strtolower($p->name), $term)
                    || str_contains(mb_strtolower($p->primaryCategory), $term)
                    || str_contains(mb_strtolower(strip_tags($p->shortDescription)), $term);
            });
        }

        $items = match ($sort) {
            'low'  => $items->sortBy('price'),
            'high' => $items->sortByDesc('price'),
            default => $items,
        };

        $items = $items->values();
        $total = $items->count();

        $sliced = $items->slice(($page - 1) * $perPage, $perPage)->values();

        return new LengthAwarePaginator(
            $sliced,
            $total,
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }

    /**
     * Return all products that belong to a given top-level category,
     * without pagination (used by the attachment category pages).
     */
    public static function byCategory(string $categorySlug): Collection
    {
        return self::all()->filter(
            fn ($p) => $p->primaryCategorySlug === $categorySlug
        )->values();
    }

    /**
     * Filter products by a substring match against their raw category strings.
     * Used for the granular attachment sub-category pages.
     *
     * @param string[] $include  at least one of these strings must appear in rawCategoriesText
     * @param string[] $exclude  none of these strings may appear
     */
    public static function byRawCategoryContains(
        array $include,
        array $exclude = [],
    ): Collection {
        return self::all()->filter(function ($p) use ($include, $exclude) {
            $text = mb_strtolower($p->rawCategoriesText);

            foreach ($include as $needle) {
                if (str_contains($text, mb_strtolower($needle))) {
                    // Check exclusions
                    foreach ($exclude as $ex) {
                        if (str_contains($text, mb_strtolower($ex))) {
                            return false;
                        }
                    }
                    return true;
                }
            }
            return false;
        })->values();
    }

    /**
     * Find a single product by its slug, or return null.
     */
    public static function findBySlug(string $slug): ?object
    {
        return self::all()->firstWhere('slug', $slug);
    }

    /**
     * Return up to $limit products in the same top-level category,
     * excluding the product with $excludeSlug.
     */
    public static function related(
        string $categorySlug,
        string $excludeSlug,
        int $limit = 3,
    ): Collection {
        return self::all()
            ->filter(
                fn ($p) => $p->primaryCategorySlug === $categorySlug
                    && $p->slug !== $excludeSlug
            )
            ->take($limit)
            ->values();
    }

    /**
     * Return unique top-level categories (excluding generic meta-categories)
     * as a Collection of stdClass { id, name, slug }.
     *
     * Compatible with the $categories variable the Blade templates expect.
     */
    public static function categories(): Collection
    {
        // These are WooCommerce meta-categories that every product gets tagged
        // with in addition to their real category — suppress from the sidebar.
        $suppress = ['equipment'];

        return self::all()
            ->pluck('primaryCategory')
            ->unique()
            ->filter()
            ->reject(fn ($name) => in_array(Str::slug($name), $suppress, true))
            ->sort()
            ->map(fn ($name) => (object) [
                'id'   => Str::slug($name),
                'name' => $name,
                'slug' => Str::slug($name),
            ])
            ->values();
    }

    // ─────────────────────────────────────────────────────────────────────────
    //  Internal CSV parsing
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Load and parse all CSV files in <project-root>/product/.
     * Results are cached for the lifetime of the PHP request.
     */
    private static function load(): array
    {
        if (self::$cache !== null) {
            return self::$cache;
        }

        $dir   = base_path('product');
        $files = glob($dir . DIRECTORY_SEPARATOR . '*.csv') ?: [];

        $products  = [];
        $slugCount = [];   // track duplicates for slug deduplication

        foreach ($files as $file) {
            $handle = fopen($file, 'r');
            if (! $handle) {
                continue;
            }

            // Strip UTF-8 BOM if present (common in Excel-exported CSVs).
            $bom = fread($handle, 3);
            if ($bom !== "\xEF\xBB\xBF") {
                rewind($handle);
            }

            // PHP 8.5+: pass explicit escape='' to suppress the deprecation notice.
            // Empty string means "no escape character" which is correct for
            // standard RFC-4180 CSV (quoting is handled by the enclosure char).
            $headers = fgetcsv($handle, 0, ',', '"', '');
            if (! $headers) {
                fclose($handle);
                continue;
            }

            $headers = array_map('trim', $headers);

            while (($row = fgetcsv($handle, 0, ',', '"', '')) !== false) {
                // Pad short rows so array_combine doesn't fail on ragged lines.
                if (count($row) < count($headers)) {
                    $row = array_pad($row, count($headers), '');
                }

                $data = array_combine($headers, array_slice($row, 0, count($headers)));

                // Skip unpublished products.
                if (($data['Published'] ?? '1') === '0') {
                    continue;
                }

                $products[] = self::parseRow($data, $slugCount);
            }

            fclose($handle);
        }

        self::$cache = $products;

        return $products;
    }

    /**
     * Convert one CSV data row into a product stdClass.
     *
     * @param array  $data       Associative row from the CSV (header ⇒ value).
     * @param array &$slugCount  Reference counter for slug deduplication.
     */
    private static function parseRow(array $data, array &$slugCount): object
    {
        // ── Name ─────────────────────────────────────────────────────────────
        $name = trim($data['Name'] ?? 'Untitled');

        // ── Slug (deduplicated) ───────────────────────────────────────────────
        $base = Str::slug($name) ?: 'product';

        if (! isset($slugCount[$base])) {
            $slugCount[$base] = 0;
            $slug = $base;
        } else {
            $slugCount[$base]++;
            $slug = $base . '-' . ($slugCount[$base] + 1);
        }

        // ── Price ─────────────────────────────────────────────────────────────
        $salePrice    = (float) ($data['Sale price'] ?? 0);
        $regularPrice = (float) ($data['Regular price'] ?? 0);
        $price        = $salePrice > 0 ? $salePrice : $regularPrice;

        // ── Categories ────────────────────────────────────────────────────────
        $rawCategories     = array_map('trim', explode(',', $data['Categories'] ?? ''));
        $rawCategoriesText = implode(' ', $rawCategories);

        [$primaryCategory, $primaryCategorySlug] = self::extractPrimaryCategory($rawCategories);

        // ── Images ────────────────────────────────────────────────────────────
        $imagesRaw = trim($data['Images'] ?? '');
        $gallery   = $imagesRaw
            ? array_values(array_filter(array_map('trim', preg_split('/[,|;]/', $imagesRaw))))
            : [];
        $mainImage = $gallery[0] ?? '';

        // ── External / Ecwid URL ──────────────────────────────────────────────
        $externalUrl = trim($data['External URL'] ?? '');

        // ── Specs (WooCommerce product attributes) ────────────────────────────
        $specs = [];
        for ($i = 1; $i <= 3; $i++) {
            $attrName  = trim($data["Attribute {$i} name"]      ?? '');
            $attrValue = trim($data["Attribute {$i} value(s)"]  ?? '');
            if ($attrName && $attrValue) {
                $specs[] = ['name' => $attrName, 'value' => $attrValue];
            }
        }

        // Also pull weight & dimensions as additional spec rows when present.
        $dimensionSpecs = [
            'Weight (lbs)'  => $data['Weight (lbs)']  ?? '',
            'Length (in)'   => $data['Length (in)']   ?? '',
            'Width (in)'    => $data['Width (in)']    ?? '',
            'Height (in)'   => $data['Height (in)']   ?? '',
        ];
        foreach ($dimensionSpecs as $specName => $specValue) {
            if ($specValue !== '') {
                $specs[] = ['name' => $specName, 'value' => $specValue];
            }
        }

        // ── Sanitise HTML descriptions ────────────────────────────────────────
        // CSV descriptions are WooCommerce HTML. We allow a safe subset of tags
        // so formatting is preserved, but script/style/iframe tags are stripped.
        $allowedTags   = '<p><br><ul><ol><li><strong><em><b><i><h2><h3><h4><h5><span><div><table><thead><tbody><tr><td><th>';
        $shortDesc     = strip_tags($data['Short description'] ?? '', $allowedTags);
        $description   = strip_tags($data['Description']       ?? '', $allowedTags);

        // ── Misc fields ───────────────────────────────────────────────────────
        $sku     = trim($data['SKU']                        ?? '');
        $gtin    = trim($data['GTIN, UPC, EAN, or ISBN']    ?? '');
        $inStock = ($data['In stock?'] ?? '1') !== '0';

        // ── Category object (mimics the Eloquent $product->category relation) ─
        $categoryObj = (object) [
            'id'   => $primaryCategorySlug,
            'name' => $primaryCategory,
            'slug' => $primaryCategorySlug,
        ];

        return (object) [
            // Core identifiers
            'slug'                => $slug,
            'name'                => $name,
            'sku'                 => $sku ?: null,
            'gtin'                => $gtin ?: null,

            // Pricing
            'price'               => $price,
            'salePrice'           => $salePrice > 0 ? $salePrice : null,
            'regularPrice'        => $regularPrice > 0 ? $regularPrice : null,

            // Descriptions (sanitised HTML — safe to render with {!! !!})
            'shortDescription'    => $shortDesc,
            'short_description'   => $shortDesc,   // alias for view compatibility
            'description'         => $description,

            // Media
            'image'               => $mainImage,
            'gallery'             => $gallery,

            // Commerce
            'externalUrl'         => $externalUrl,
            'inStock'             => $inStock,
            'stock'               => $inStock ? 'In Stock' : 'Out of Stock',

            // Specifications (array of ['name'=>.., 'value'=>..])
            'specs'               => $specs,

            // Category data
            'primaryCategory'     => $primaryCategory,
            'primaryCategorySlug' => $primaryCategorySlug,
            'category'            => $categoryObj,        // $product->category->name works
            'rawCategories'       => $rawCategories,
            'rawCategoriesText'   => $rawCategoriesText,
        ];
    }

    /**
     * Given the list of raw category strings for a product, choose the best
     * "top-level" display category.
     *
     * Strategy:
     *  1. Prefer any top-level name that is NOT in the $suppress list.
     *  2. Fall back to the very first entry if all are suppressed.
     *
     * @param  string[] $rawCategories  e.g. ["Attachments", "Attachments > Mini Excavator Attachments", "Equipment"]
     * @return array{0: string, 1: string}  [displayName, slug]
     */
    private static function extractPrimaryCategory(array $rawCategories): array
    {
        // Generic WooCommerce parent categories that are not useful as filters.
        $suppress = ['equipment'];

        foreach ($rawCategories as $cat) {
            $topLevel = trim(explode('>', $cat)[0]);
            if ($topLevel && ! in_array(Str::slug($topLevel), $suppress, true)) {
                return [$topLevel, Str::slug($topLevel)];
            }
        }

        // All categories were suppressed — just use the first one.
        $fallback = trim(explode('>', ($rawCategories[0] ?? 'Uncategorized'))[0]);
        return [$fallback ?: 'Uncategorized', Str::slug($fallback) ?: 'uncategorized'];
    }
}
