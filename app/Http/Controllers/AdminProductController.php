<?php

namespace App\Http\Controllers;

use App\Services\CsvProductRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    /**
     * Display a paginated list of catalog products.
     */
    public function index(Request $request): View
    {
        $search = $request->string('search')->trim()->toString();
        $category = $request->string('category')->trim()->toString();
        
        $products = CsvProductRepository::all();
        
        if ($search !== '') {
            $term = mb_strtolower($search);
            $products = $products->filter(function ($p) use ($term) {
                return str_contains(mb_strtolower($p->name), $term)
                    || (isset($p->sku) && str_contains(mb_strtolower($p->sku), $term))
                    || (isset($p->primaryCategory) && str_contains(mb_strtolower($p->primaryCategory), $term));
            });
        }
        
        if ($category !== '') {
            $products = $products->filter(function ($p) use ($category) {
                return $p->primaryCategorySlug === $category;
            });
        }
        
        // Manual pagination
        $perPage = 15;
        $page = (int) $request->input('page', 1);
        $total = $products->count();
        $sliced = $products->slice(($page - 1) * $perPage, $perPage)->values();
        
        $paginatedProducts = new \Illuminate\Pagination\LengthAwarePaginator(
            $sliced,
            $total,
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );
        
        $categories = CsvProductRepository::categories();
        
        $stats = [
            'total' => $total,
            'out_of_stock' => $products->filter(fn($p) => !$p->inStock)->count(),
            'categories_count' => $categories->count(),
            'last_updated' => File::exists(base_path('product/products.csv')) 
                ? date('F d, Y H:i', File::lastModified(base_path('product/products.csv'))) 
                : 'Unknown',
        ];
        
        return view('admin.products.index', [
            'products' => $paginatedProducts,
            'categories' => $categories,
            'stats' => $stats,
            'search' => $search,
            'selectedCategory' => $category,
        ]);
    }

    /**
     * Render the import page.
     */
    public function importForm(): View
    {
        $backupExists = File::exists(base_path('product/products.csv.bak'));
        $lastUpdated = File::exists(base_path('product/products.csv'))
            ? date('F d, Y H:i', File::lastModified(base_path('product/products.csv')))
            : 'Unknown';
            
        return view('admin.products.import', compact('backupExists', 'lastUpdated'));
    }

    /**
     * Process product catalog CSV upload.
     */
    public function import(Request $request): RedirectResponse
    {
        $request->validate([
            'csv_file' => ['required', 'file', 'max:10240'], // Max 10MB
        ]);

        $file = $request->file('csv_file');
        
        // Basic MIME validation since browser MIME types for CSV vary
        $extension = strtolower($file->getClientOriginalExtension());
        if (!in_array($extension, ['csv', 'txt'], true)) {
            return back()->withErrors(['csv_file' => 'The uploaded file must be a CSV file.']);
        }

        $handle = fopen($file->getRealPath(), 'r');
        if (!$handle) {
            return back()->withErrors(['csv_file' => 'Unable to open the uploaded file.']);
        }
        
        // Strip BOM if present
        $bom = fread($handle, 3);
        if ($bom !== "\xEF\xBB\xBF") {
            rewind($handle);
        }
        
        $headers = fgetcsv($handle, 0, ',', '"', '');
        fclose($handle);
        
        if (!$headers) {
            return back()->withErrors(['csv_file' => 'The CSV file header is empty or invalid.']);
        }
        
        $headers = array_map('trim', $headers);
        
        // Validate required headers
        $requiredColumns = ['Name', 'Categories'];
        $missingColumns = [];
        foreach ($requiredColumns as $col) {
            if (!in_array($col, $headers, true)) {
                $missingColumns[] = $col;
            }
        }
        
        if (!empty($missingColumns)) {
            return back()->withErrors([
                'csv_file' => 'Invalid WooCommerce CSV structure. Missing required columns: ' . implode(', ', $missingColumns)
            ]);
        }
        
        $targetDir = base_path('product');
        $targetFile = $targetDir . '/products.csv';
        $backupFile = $targetDir . '/products.csv.bak';
        
        // Ensure folder exists
        if (!File::isDirectory($targetDir)) {
            File::makeDirectory($targetDir, 0755, true);
        }
        
        // Keep a backup of the current CSV catalog
        if (File::exists($targetFile)) {
            File::copy($targetFile, $backupFile);
        }
        
        // Move file to replace existing products.csv
        $file->move($targetDir, 'products.csv');
        
        // Count imported rows
        $importedCount = 0;
        if (($handle = fopen($targetFile, 'r')) !== false) {
            $bom = fread($handle, 3);
            if ($bom !== "\xEF\xBB\xBF") {
                rewind($handle);
            }
            fgetcsv($handle, 0, ',', '"', ''); // Skip headers
            while (fgetcsv($handle, 0, ',', '"', '') !== false) {
                $importedCount++;
            }
            fclose($handle);
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', "Product catalog successfully updated! Imported {$importedCount} products.");
    }

    /**
     * Restore catalog from products.csv.bak backup file.
     */
    public function restoreBackup(): RedirectResponse
    {
        $targetFile = base_path('product/products.csv');
        $backupFile = base_path('product/products.csv.bak');
        
        if (!File::exists($backupFile)) {
            return back()->withErrors(['restore' => 'No backup file found to restore.']);
        }
        
        // Swap them to allow reverting the revert
        if (File::exists($targetFile)) {
            $tempFile = base_path('product/products_failed_restore.csv');
            File::move($targetFile, $tempFile);
            File::copy($backupFile, $targetFile);
            File::move($tempFile, $backupFile);
        } else {
            File::copy($backupFile, $targetFile);
        }
        
        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Successfully restored the product catalog from the previous backup.');
    }

    /**
     * Download a backup of the current products.csv file.
     */
    public function exportBackup()
    {
        $file = base_path('product/products.csv');
        if (!File::exists($file)) {
            abort(404, 'Product catalog file not found.');
        }
        
        return response()->download($file, 'products_catalog_' . date('Y-m-d_H-i-s') . '.csv');
    }
}
