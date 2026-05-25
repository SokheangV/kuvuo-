<?php

namespace App\Support;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ProductCategoryResolver
{
    public const DEFAULT_CATEGORIES = [
        'Mini Excavator' => 'mini-excavator',
        'Skid Steer' => 'skid-steer',
        'Road Roller' => 'road-roller',
        'Wheel Loader' => 'wheel-loader',
        'Forklift' => 'forklift',
    ];

    public static function ensureDefaultCategories(): Collection
    {
        return collect(self::DEFAULT_CATEGORIES)
            ->map(function (string $slug, string $name) {
                return Category::firstOrCreate(
                    ['slug' => $slug],
                    ['name' => $name]
                );
            });
    }

    public static function menuCategories(): Collection
    {
        $categories = self::ensureDefaultCategories()->keyBy('slug');

        return collect(self::DEFAULT_CATEGORIES)
            ->map(fn (string $slug) => $categories->get($slug))
            ->filter()
            ->values();
    }

    public static function resolve(?string $name, ?string $rawCategory = null): Category
    {
        self::ensureDefaultCategories();

        $haystack = Str::lower(trim(($rawCategory ?? '') . ' ' . ($name ?? '')));

        $slug = match (true) {
            str_contains($haystack, 'wheel loader'),
            str_contains($haystack, 'thunder') => 'wheel-loader',

            str_contains($haystack, 'road roller'),
            str_contains($haystack, 'vibratory compactor'),
            str_contains($haystack, 'asphalt roller') => 'road-roller',

            str_contains($haystack, 'forklift'),
            str_contains($haystack, 'lift truck') => 'forklift',

            str_contains($haystack, 'skid steer'),
            str_contains($haystack, 'stomp') => 'skid-steer',

            default => 'mini-excavator',
        };

        return Category::where('slug', $slug)->firstOrFail();
    }
}
