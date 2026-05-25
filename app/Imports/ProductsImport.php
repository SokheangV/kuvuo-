<?php

namespace App\Imports;

use App\Models\Product;
use App\Support\ProductCategoryResolver;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $name = $row['name'] ?? 'Untitled Product';
        $baseSlug = $row['slug'] ?? Str::slug($name);
        $slug = Str::slug($baseSlug);

        // Skip rows already imported from another source file.
        if (Product::where('slug', $slug)->orWhere('name', $name)->exists()) {
            return null;
        }

        $categoryName = $row['category_name'] ?? $row['category'] ?? null;
        $category = ProductCategoryResolver::resolve($name, $categoryName);

        $stock = $row['stock'] ?? null;

        if (!$stock && isset($row['stock_status'])) {
            $stock = strtolower($row['stock_status']) === 'in_stock' ? 1 : 0;
        }

        $stock = $stock ?? 1;

        // only first image
        $image = $row['image'] ?? null;
        if ($image && str_contains($image, ',')) {
            $images = explode(',', $image);
            $image = trim($images[0]);
        }

        return new Product([
            'name' => $name,
            'slug' => $slug,
            'description' => $row['description'] ?? '',
            'price' => $row['price'] ?? 0,
            'stock' => $stock,
            'sku' => $row['sku'] ?? 'SKU-' . uniqid(),
            'image' => $image,
            'category_id' => $category->id,
            'ecwid_slug' => $row['ecwid_slug'] ?? null,
            'ecwid_id' => $row['ecwid_id'] ?? null,
        ]);
    }
}
