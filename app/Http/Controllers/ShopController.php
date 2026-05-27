<?php

namespace App\Http\Controllers;

use App\Services\CsvProductRepository;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // ─────────────────────────────────────────────────────────────────────────
    //  Main shop pages
    // ─────────────────────────────────────────────────────────────────────────

    /** GET /shop */
    public function index(Request $request)
    {
        return $this->renderShopPage($request);
    }

    /** GET /shop/{slug} */
    public function category(Request $request, string $slug)
    {
        // Verify the category actually exists in the CSV data.
        $categories = CsvProductRepository::categories();
        $selectedCategory = $categories->firstWhere('slug', $slug);

        if (! $selectedCategory) {
            abort(404);
        }

        return $this->renderShopPage($request, $selectedCategory);
    }

    /** GET /shop/search  (alias — search term comes via ?search=) */
    public function search(Request $request)
    {
        return $this->renderShopPage($request);
    }

    // ─────────────────────────────────────────────────────────────────────────
    //  Attachment pages
    // ─────────────────────────────────────────────────────────────────────────

    /** GET /attachments  — landing page listing attachment sub-categories */
    public function attachments()
    {
        // The view is a static link-list; no products query needed here.
        return view('attachments');
    }

    /** GET /attachments/{slug}  — products for one attachment sub-category */
    public function attachmentCategory(string $slug)
    {
        $normalized = $this->normalizeAttachmentSlug($slug);

        $titles = [
            'mini-excavator'            => 'Mini Excavator Attachments',
            '2-ton-and-below'           => '2 Ton and Below Attachments',
            'x2'                        => 'X2 Attachments',
            'xxv'                       => 'XXV Attachments',
            'skid-steer'                => 'Skid Steer Attachments',
            'compact-series-501-507'    => 'Compact Series 501–507 Attachments',
            'standard-series-x1300-509' => 'Standard Series (X1300-509) Attachments',
        ];

        abort_unless(isset($titles[$normalized]), 404);

        $products = $this->attachmentQuery($normalized);
        $category = (object) ['name' => $titles[$normalized]];

        return view('shop-category', compact('category', 'products'));
    }

    // ─────────────────────────────────────────────────────────────────────────
    //  Internals
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Shared rendering method for /shop and /shop/{slug}.
     *
     * @param  \stdClass|null  $selectedCategory  Category object from CsvProductRepository::categories()
     */
    private function renderShopPage(Request $request, ?object $selectedCategory = null)
    {
        $categories = CsvProductRepository::categories();

        $products = CsvProductRepository::paginate(
            perPage:      12,
            categorySlug: $selectedCategory?->slug,
            search:       $request->filled('search') ? $request->string('search')->trim()->toString() : null,
            sort:         $request->input('sort'),
            page:         (int) $request->input('page', 1),
        );

        $pageTitle = $selectedCategory?->name ?? 'All Products';

        $pageDescription = $selectedCategory
            ? 'Browse all products in the ' . $selectedCategory->name . ' category.'
            : 'Browse premium equipment for construction, logistics and industrial performance.';

        $resultsLabel = $selectedCategory
            ? $selectedCategory->name . ' Products'
            : 'All Products';

        $shopFormAction = $selectedCategory
            ? route('shop.category', $selectedCategory->slug)
            : route('shop');

        return view('shop', compact(
            'categories',
            'products',
            'selectedCategory',
            'pageTitle',
            'pageDescription',
            'resultsLabel',
            'shopFormAction',
        ));
    }

    /**
     * Build a filtered collection of attachment products for a given sub-slug.
     *
     * Instead of name-keyword hacks, we now match against the CSV category
     * hierarchy strings (the "rawCategoriesText" property).
     */
    private function attachmentQuery(string $slug): \Illuminate\Support\Collection
    {
        // All attachment products share "Attachments" as a top-level category.
        $base = CsvProductRepository::byCategory('attachments');

        return match ($slug) {
            'mini-excavator' => CsvProductRepository::byRawCategoryContains(
                include: ['Attachments for Mini Excavators'],
            ),

            '2-ton-and-below' => CsvProductRepository::byRawCategoryContains(
                include: ['2 Tons and Below', '2 Ton and Below'],
            ),

            'x2' => CsvProductRepository::byRawCategoryContains(
                include: ['X2 Attachments'],
            ),

            'xxv' => CsvProductRepository::byRawCategoryContains(
                include: ['XXV Attachments'],
            ),

            'skid-steer' => CsvProductRepository::byRawCategoryContains(
                include: ['Skid Steer Attachments'],
            ),

            'compact-series-501-507' => CsvProductRepository::byRawCategoryContains(
                include: ['Compact Series'],
                exclude: ['X1300', '509'],
            ),

            'standard-series-x1300-509' => CsvProductRepository::byRawCategoryContains(
                include: ['X1300', 'Standard Series'],
            ),

            default => $base,
        };
    }

    private function normalizeAttachmentSlug(string $slug): string
    {
        return match ($slug) {
            '2ton', '2-ton', '2-ton-below'     => '2-ton-and-below',
            '507-509', 'compact', 'compact-series' => 'compact-series-501-507',
            'standard', 'x1300-509', 'standard-series' => 'standard-series-x1300-509',
            default => $slug,
        };
    }
}
