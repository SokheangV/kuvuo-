<?php

namespace App\Support;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Throwable;

class EcwidProductLinkResolver
{
    private const SOURCE_URLS = [
        'https://store80100025.company.site',
        'https://store80100025.company.site/Heavy-Equipment-for-Sale-in-the-USA-c140671014',
        'https://store80100025.company.site/TYPHON-Heavy-Equipment-Attachments-for-Sale-in-the-USA-c140674508',
        'https://store80100025.company.site/TYPHON-Spares-&-Parts-for-Heavy-Equipment-in-the-USA-c156686759',
    ];

    public static function sync(): array
    {
        $links = self::fetchProductLinks();
        $updated = 0;
        $unmatched = collect();

        Product::query()->get()->each(function (Product $product) use ($links, &$updated, $unmatched) {
            $match = self::bestMatch($product, $links);

            if (! $match) {
                $unmatched->push($product->name);
                return;
            }

            $product->forceFill([
                'ecwid_slug' => $match['slug'],
                'ecwid_id' => $match['id'],
            ])->save();

            $updated++;
        });

        return [
            'links_found' => $links->count(),
            'updated' => $updated,
            'unmatched' => $unmatched,
        ];
    }

    public static function fetchProductLinks(): Collection
    {
        return collect(self::SOURCE_URLS)
            ->flatMap(function (string $url) {
                try {
                    $html = Http::timeout(60)->get($url)->body();
                } catch (Throwable) {
                    return collect();
                }

                preg_match_all(
                    '/https:\/\/store80100025\.company\.site\/([^"\'>\s]+)-p(\d+)/',
                    $html,
                    $matches,
                    PREG_SET_ORDER
                );

                return collect($matches)->map(function (array $match) {
                    $slug = html_entity_decode($match[1], ENT_QUOTES | ENT_HTML5);

                    return [
                        'slug' => $slug,
                        'id' => $match[2],
                        'normalized' => self::normalize($slug),
                    ];
                });
            })
            ->unique(fn (array $link) => $link['slug'].'-'.$link['id'])
            ->values();
    }

    private static function bestMatch(Product $product, Collection $links): ?array
    {
        $productName = self::normalize($product->name);
        $productSlug = self::normalize($product->slug);

        $exact = $links->first(fn (array $link) => $link['normalized'] === $productName || $link['normalized'] === $productSlug);

        if ($exact) {
            return $exact;
        }

        $best = $links
            ->map(function (array $link) use ($productName) {
                similar_text($productName, $link['normalized'], $score);

                return $link + ['score' => $score];
            })
            ->sortByDesc('score')
            ->first();

        return ($best && $best['score'] >= 88) ? $best : null;
    }

    private static function normalize(string $value): string
    {
        return Str::of($value)
            ->lower()
            ->replace('&', 'and')
            ->replaceMatches('/[^a-z0-9]+/', ' ')
            ->replaceMatches('/\b(usa|new|brand)\b/', ' ')
            ->squish()
            ->toString();
    }
}
