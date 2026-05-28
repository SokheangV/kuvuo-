@extends('layouts.admin')

@section('title', 'KUVUO CMS - Products Catalog')
@section('cms_title', 'Products Catalog')
@section('cms_subtitle', 'View, search, and manage products on your website Catalog. Overwritten via CSV Import.')

@section('cms_content')
<style>
    .cms-btn-primary {
        display: inline-flex; align-items: center; justify-content: center;
        padding: 12px 20px; background: var(--cms-green-900); color: #fff; text-decoration: none;
        border: 1px solid var(--cms-green-900); font-weight: 700; transition: background-color .15s ease;
        font-size: 14px; cursor: pointer; gap: 8px;
    }
    .cms-btn-primary:hover { background: var(--cms-green-700); border-color: var(--cms-green-700); }
    
    .cms-btn-secondary {
        display: inline-flex; align-items: center; justify-content: center;
        padding: 12px 20px; background: #fff; color: var(--cms-green-900); text-decoration: none;
        border: 1px solid var(--cms-border); font-weight: 700; transition: border-color .15s ease, background-color .15s ease;
        font-size: 14px; cursor: pointer; gap: 8px;
    }
    .cms-btn-secondary:hover { border-color: var(--cms-green-900); background: var(--cms-green-25); }

    .cms-btn-accent {
        display: inline-flex; align-items: center; justify-content: center;
        padding: 12px 20px; background: var(--cms-accent); color: #fff; text-decoration: none;
        border: 1px solid var(--cms-accent); font-weight: 700; transition: opacity .15s ease;
        font-size: 14px; cursor: pointer; gap: 8px;
    }
    .cms-btn-accent:hover { opacity: 0.9; }

    /* Summary Stats Grid */
    .cms-stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 28px;
    }
    .cms-stat-card {
        background: var(--cms-white);
        border: 1px solid var(--cms-border);
        padding: 24px;
        box-shadow: var(--cms-shadow);
        position: relative;
        overflow: hidden;
    }
    .cms-stat-card::before {
        content: "";
        position: absolute;
        top: 0; left: 0; width: 4px; height: 100%;
        background: var(--cms-green-900);
    }
    .cms-stat-card.accent::before {
        background: var(--cms-accent);
    }
    .cms-stat-label {
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        color: var(--cms-muted);
        letter-spacing: 0.08em;
    }
    .cms-stat-val {
        font-family: 'Science Gothic', Arial, sans-serif;
        font-size: 32px;
        font-weight: 800;
        color: var(--cms-green-900);
        margin: 8px 0 4px;
    }
    .cms-stat-desc {
        font-size: 13px;
        color: var(--cms-muted);
    }

    .cms-card {
        background: var(--cms-white);
        border: 1px solid var(--cms-border);
        padding: 24px;
        margin-bottom: 24px;
        box-shadow: var(--cms-shadow);
    }

    /* Filters bar */
    .cms-filters {
        display: flex;
        gap: 12px;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .cms-filters-form {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }
    .cms-input {
        padding: 10px 14px;
        border: 1px solid var(--cms-border);
        font: inherit;
        outline: none;
        min-width: 240px;
        background: #fff;
    }
    .cms-input:focus {
        border-color: var(--cms-green-900);
        box-shadow: 0 0 0 3px rgba(18, 55, 42, 0.08);
    }
    .cms-select {
        padding: 10px 14px;
        border: 1px solid var(--cms-border);
        font: inherit;
        outline: none;
        background: #fff;
    }
    .cms-select:focus {
        border-color: var(--cms-green-900);
        box-shadow: 0 0 0 3px rgba(18, 55, 42, 0.08);
    }

    /* Table styles */
    .cms-table-wrap {
        border: 1px solid var(--cms-border);
        overflow-x: auto;
        background: var(--cms-white);
    }
    .cms-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }
    .cms-table th, .cms-table td {
        padding: 16px 20px;
        border-bottom: 1px solid var(--cms-border);
        vertical-align: middle;
    }
    .cms-table th {
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--cms-green-900);
        background: var(--cms-green-50);
    }
    .cms-table td {
        font-size: 14px;
    }
    .cms-table tr:hover td {
        background: var(--cms-green-25);
    }

    .cms-thumb {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border: 1px solid var(--cms-border);
        background: #f3f4f6;
    }
    .cms-thumb-fallback {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--cms-green-50);
        border: 1px solid var(--cms-border);
        color: var(--cms-green-700);
        font-size: 20px;
    }

    .cms-badge {
        display: inline-flex;
        align-items: center;
        padding: 4px 8px;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        border: 1px solid var(--cms-border);
    }
    .cms-badge.instock {
        color: var(--cms-green-700);
        background: var(--cms-green-50);
        border-color: var(--cms-border-strong);
    }
    .cms-badge.outofstock {
        color: #b91c1c;
        background: #fef2f2;
        border-color: #fca5a5;
    }

    .cms-alert-success {
        padding: 14px 18px;
        background: var(--cms-green-50);
        color: var(--cms-green-900);
        border: 1px solid var(--cms-border-strong);
        margin-bottom: 20px;
        font-weight: 600;
    }
    .cms-pagination {
        margin-top: 24px;
    }
</style>

@if (session('success'))
    <div class="cms-alert-success">
        <i class="fa-solid fa-circle-check" style="margin-right: 6px;"></i>
        {{ session('success') }}
    </div>
@endif

<!-- Summary Cards -->
<div class="cms-stats-grid">
    <div class="cms-stat-card">
        <div class="cms-stat-label">Total Products</div>
        <div class="cms-stat-val">{{ $stats['total'] }}</div>
        <div class="cms-stat-desc">Published items in catalog</div>
    </div>
    
    <div class="cms-stat-card">
        <div class="cms-stat-label">Categories</div>
        <div class="cms-stat-val">{{ $stats['categories_count'] }}</div>
        <div class="cms-stat-desc">Unique groupings detected</div>
    </div>

    <div class="cms-stat-card {{ $stats['out_of_stock'] > 0 ? 'accent' : '' }}">
        <div class="cms-stat-label">Out of Stock</div>
        <div class="cms-stat-val">{{ $stats['out_of_stock'] }}</div>
        <div class="cms-stat-desc">Products unavailable</div>
    </div>

    <div class="cms-stat-card">
        <div class="cms-stat-label">Last Imported</div>
        <div class="cms-stat-val" style="font-size: 20px; margin: 18px 0 10px; font-family: inherit; font-weight: 700;">
            {{ $stats['last_updated'] }}
        </div>
        <div class="cms-stat-desc">CSV file modified timestamp</div>
    </div>
</div>

<div class="cms-card">
    <div class="cms-filters">
        <!-- Search and filters -->
        <form method="GET" action="{{ route('admin.products.index') }}" class="cms-filters-form">
            <input type="text" name="search" class="cms-input" placeholder="Search name or SKU..." value="{{ $search }}">
            
            <select name="category" class="cms-select" onchange="this.form.submit()">
                <option value="">All Categories</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->slug }}" @selected($selectedCategory === $cat->slug)>{{ $cat->name }}</option>
                @endforeach
            </select>
            
            <button type="submit" class="cms-btn-secondary">
                <i class="fa-solid fa-magnifying-glass"></i> Filter
            </button>
            
            @if($search !== '' || $selectedCategory !== '')
                <a href="{{ route('admin.products.index') }}" class="cms-btn-secondary" style="border-style: dashed;">Clear</a>
            @endif
        </form>
        
        <!-- Action Buttons -->
        <div style="display: flex; gap: 10px;">
            <a href="{{ route('admin.products.export') }}" class="cms-btn-secondary">
                <i class="fa-solid fa-download"></i> Export CSV
            </a>
            <a href="{{ route('admin.products.import') }}" class="cms-btn-accent">
                <i class="fa-solid fa-file-import"></i> Import Catalog
            </a>
        </div>
    </div>

    @if ($products->isEmpty())
        <div style="padding: 60px 20px; text-align: center; color: var(--cms-muted); border: 1px dashed var(--cms-border); background: var(--cms-green-25);">
            <i class="fa-solid fa-barcode" style="font-size: 36px; color: var(--cms-border-strong); margin-bottom: 14px; display: block;"></i>
            <span style="font-size: 16px; font-weight: 700; display: block; margin-bottom: 4px;">No products found</span>
            <span style="font-size: 13px;">No items match your criteria. Try uploading a CSV or clearing filters.</span>
        </div>
    @else
        <div class="cms-table-wrap">
            <table class="cms-table">
                <thead>
                    <tr>
                        <th style="width: 70px;">Image</th>
                        <th>Product Details</th>
                        <th>Category</th>
                        <th>SKU</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $p)
                        <tr>
                            <td>
                                @if (isset($p->image) && $p->image)
                                    <img src="{{ $p->image }}" alt="{{ $p->name }}" class="cms-thumb" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="cms-thumb-fallback" style="display: none;">
                                        <i class="fa-regular fa-image"></i>
                                    </div>
                                @else
                                    <div class="cms-thumb-fallback">
                                        <i class="fa-regular fa-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div style="font-weight: 700; color: var(--cms-ink); margin-bottom: 2px;">{{ $p->name }}</div>
                                <div style="font-size: 11px; color: var(--cms-muted);">Slug: {{ $p->slug }}</div>
                            </td>
                            <td>
                                <span style="font-size: 12px; font-weight: 600; color: var(--cms-green-700);">
                                    {{ $p->primaryCategory ?? 'Uncategorized' }}
                                </span>
                            </td>
                            <td>
                                <code style="font-size: 12px; background: #f3f4f6; padding: 2px 6px; border: 1px solid #e5e7eb;">
                                    {{ $p->sku ?? 'N/A' }}
                                </code>
                            </td>
                            <td>
                                @if (isset($p->salePrice) && $p->salePrice)
                                    <span style="text-decoration: line-through; color: var(--cms-muted); font-size: 12px; margin-right: 4px;">
                                        ${{ number_format($p->regularPrice, 2) }}
                                    </span>
                                    <span style="font-weight: 700; color: var(--cms-accent);">
                                        ${{ number_format($p->salePrice, 2) }}
                                    </span>
                                @elseif (isset($p->price) && $p->price)
                                    <span style="font-weight: 700; color: var(--cms-green-900);">
                                        ${{ number_format($p->price, 2) }}
                                    </span>
                                @else
                                    <span style="color: var(--cms-muted);">Free / Call</span>
                                @endif
                            </td>
                            <td>
                                <span class="cms-badge {{ $p->inStock ? 'instock' : 'outofstock' }}">
                                    {{ $p->inStock ? 'In Stock' : 'Out of Stock' }}
                                </span>
                            </td>
                            <td>
                                <div style="display: flex; gap: 8px; justify-content: flex-end;">
                                    <a href="{{ route('product.details', $p->slug) }}" class="cms-btn-secondary" style="padding: 8px 14px; font-size: 13px;" target="_blank">
                                        <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 11px;"></i> View Site
                                    </a>
                                    @if(isset($p->externalUrl) && $p->externalUrl)
                                        <a href="{{ $p->externalUrl }}" class="cms-btn-secondary" style="padding: 8px 14px; font-size: 13px;" target="_blank">
                                            <i class="fa-solid fa-cart-shopping" style="font-size: 11px;"></i> Ecwid
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="cms-pagination">
            {{ $products->links() }}
        </div>
    @endif
</div>
@endsection
