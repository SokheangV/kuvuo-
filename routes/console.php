<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Imports\ProductsImport;
use App\Models\Product;
use App\Support\EcwidProductLinkResolver;
use App\Support\ProductCategoryResolver;
use Maatwebsite\Excel\Facades\Excel;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('products:import {path=storage/app/imports : CSV file or directory to import}', function (string $path) {
    ProductCategoryResolver::ensureDefaultCategories();

    $fullPath = base_path($path);
    $files = is_dir($fullPath) ? glob($fullPath.'/*.csv') : [$fullPath];

    foreach ($files as $file) {
        if (! is_file($file)) {
            $this->warn("Skipped missing file: {$file}");
            continue;
        }

        Excel::import(new ProductsImport, $file);
        $this->info('Imported '.basename($file));
    }

    Product::all()->each(function (Product $product) {
        $category = ProductCategoryResolver::resolve($product->name, $product->description);
        $product->forceFill(['category_id' => $category->id])->save();
    });

    $this->info('Products imported and categories refreshed.');
})->purpose('Import product CSV files and refresh product categories');

Artisan::command('products:sync-ecwid-links', function () {
    $result = EcwidProductLinkResolver::sync();

    $this->info("Ecwid product links found: {$result['links_found']}");
    $this->info("Products updated: {$result['updated']}");

    if ($result['unmatched']->isNotEmpty()) {
        $this->warn('Products still missing exact Ecwid links: '.$result['unmatched']->count());
    }
})->purpose('Resolve local products to public Ecwid product links');
