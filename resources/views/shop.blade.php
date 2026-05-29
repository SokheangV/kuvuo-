<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }} - KUVUO</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Science+Gothic:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #12372A;
            --primary-mid: #1F5D45;
            --accent: #D97706;
            --accent-alt: #B7791F;
            --bg: #FFFFFF;
            --bg-soft: #F6FAF7;
            --text: #111827;
            --muted: #6B7280;
            --border: #D7DED9;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: "Inter", sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            width: 90%;
            max-width: 1320px;
            margin: auto;
        }

        /* Hero / Catalog Header */
        .shop-header {
            padding: 80px 0 45px;
            background: var(--bg-soft);
            border-bottom: 1px solid var(--border);
        }

        .shop-header-inner {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .shop-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--primary);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .shop-eyebrow::before {
            content: "";
            width: 6px;
            height: 6px;
            background: var(--accent);
            display: block;
        }

        .shop-header h1 {
            font-family: "Science Gothic", Arial, sans-serif;
            font-size: clamp(32px, 4vw, 48px);
            font-weight: 700;
            line-height: 1.1;
            color: var(--primary);
            margin: 0;
        }

        .shop-header p {
            font-size: 16px;
            color: var(--muted);
            max-width: 700px;
            margin: 0;
            line-height: 1.6;
        }

        .shop-tools {
            margin-top: 30px;
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .search-box input,
        .sort-box select {
            padding: 14px 18px;
            border: 1px solid var(--border);
            border-radius: 0; /* Sharp square corners */
            font-size: 15px;
            background: var(--bg);
            color: var(--text);
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .search-box input:focus,
        .sort-box select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(18, 55, 42, 0.1);
        }

        .search-box input {
            width: 380px;
            max-width: 100%;
        }

        .sort-box select {
            cursor: pointer;
        }

        /* Layout */
        .shop-layout {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 40px;
            padding: 60px 0 100px;
            align-items: start;
        }

        /* Sidebar Filters */
        .sidebar {
            background: var(--bg);
            border: 1px solid var(--border);
            padding: 30px;
            border-radius: 0; /* Sharp corners */
            position: sticky;
            top: 110px;
            min-width: 0; /* allow grid item to shrink on narrow viewports */
        }

        .filter-group h3 {
            font-family: "Science Gothic", Arial, sans-serif;
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--primary);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border);
        }

        .filter-group a {
            display: flex;
            align-items: center;
            padding: 10px 0;
            color: var(--text);
            font-size: 14px;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s, padding-left 0.2s;
            border-left: 2px solid transparent;
            padding-left: 0;
        }

        .filter-group a:hover {
            color: var(--primary-mid);
            padding-left: 6px;
        }

        .filter-group a.active {
            color: var(--primary);
            font-weight: 700;
            border-left-color: var(--primary);
            padding-left: 10px;
        }

        .clear-filters-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--accent-alt);
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            text-decoration: none;
            margin-top: 16px;
            transition: color 0.2s;
        }

        .clear-filters-btn:hover {
            color: var(--accent);
        }

        /* Results Right Panel */
        .shop-results {
            width: 100%;
            min-width: 0; /* allow grid item to shrink instead of forcing track wider than viewport */
        }

        .results-header {
            margin-bottom: 24px;
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            border-bottom: 1px solid var(--border);
            padding-bottom: 12px;
        }

        .results-header h3 {
            font-family: "Science Gothic", Arial, sans-serif;
            font-size: 22px;
            color: var(--primary);
            margin: 0;
        }

        .results-header p {
            color: var(--muted);
            font-size: 14px;
        }

        /* Product Grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .product-card {
            display: flex;
            flex-direction: column;
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 0;
            overflow: hidden;
            height: 100%;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .product-card:hover {
            border-color: var(--primary);
            box-shadow: 0 8px 24px rgba(18, 55, 42, 0.08);
        }

        .product-card__image {
            display: flex;
            align-items: center;
            justify-content: center;
            aspect-ratio: 1 / 1;
            width: 100%;
            padding: 24px;
            background: transparent;
            border-bottom: none;
            position: relative;
        }

        .product-card__image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            object-position: center;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-card__image img {
            transform: scale(1.03);
        }

        .product-card__body {
            padding: 20px 20px 18px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            flex-grow: 1;
        }

        .product-category {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--accent-alt);
        }

        .product-card__body h3 {
            font-family: "Science Gothic", Arial, sans-serif;
            font-size: 17px;
            font-weight: 600;
            line-height: 1.4;
            color: var(--text);
            margin: 0;
            min-height: 48px;
            max-height: 48px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .product-price-val {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary);
            margin: 0;
        }

        .product-card__actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 8px;
        }

        .btn-view,
        .btn-buy,
        .btn-quote {
            text-align: center;
            padding: 12px 10px;
            font-family: "Google Sans", Arial, sans-serif;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            border-radius: 0;
            transition: background 0.2s, border-color 0.2s, color 0.2s;
            display: inline-block;
            width: 100%;
        }

        .btn-view {
            background: var(--primary);
            color: white;
            border: 1px solid var(--primary);
        }

        .btn-view:hover {
            background: var(--primary-mid);
            border-color: var(--primary-mid);
        }

        .btn-buy {
            background: var(--accent);
            color: white;
            border: 1px solid var(--accent);
        }

        .btn-buy:hover {
            background: var(--accent-alt);
            border-color: var(--accent-alt);
        }

        .btn-quote {
            background: transparent;
            color: var(--primary);
            border: 1px solid var(--primary);
        }

        .btn-quote:hover {
            background: var(--bg-soft);
        }

        /* Empty state */
        .empty-products,
        .empty-state {
            background: var(--bg);
            border: 1px solid var(--border);
            padding: 60px 40px;
            text-align: center;
            border-radius: 0;
            width: 100%;
        }

        .empty-state h3,
        .empty-products h3 {
            font-family: "Science Gothic", Arial, sans-serif;
            font-size: 20px;
            color: var(--primary);
            margin-bottom: 12px;
        }

        .empty-state p,
        .empty-products p {
            color: var(--muted);
            font-size: 15px;
            margin-bottom: 20px;
        }

        .empty-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            background: var(--primary);
            color: white;
            font-family: "Google Sans", Arial, sans-serif;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s;
        }

        .empty-btn:hover {
            background: var(--primary-mid);
        }

        /* Pagination */
        .pagination-wrap {
            margin-top: 50px;
            display: flex;
            justify-content: center;
        }

        /* override tailwind pagination to be square and KUVUO themed */
        .pagination-wrap nav {
            display: flex;
            flex-wrap: wrap; /* never force horizontal page scroll on small screens */
            justify-content: center;
            gap: 6px;
            max-width: 100%;
        }

        .pagination-wrap nav span,
        .pagination-wrap nav a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            height: 40px;
            padding: 0 10px;
            border: 1px solid var(--border);
            background: var(--bg);
            color: var(--text);
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            border-radius: 0 !important;
        }

        .pagination-wrap nav a:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .pagination-wrap nav .active span,
        .pagination-wrap nav span[aria-current="page"] {
            background: var(--primary) !important;
            color: white !important;
            border-color: var(--primary) !important;
        }

        .pagination-wrap nav .page-disabled {
            opacity: 0.4;
            cursor: default;
        }

        .pagination-wrap svg {
            width: 16px;
            height: 16px;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .shop-layout {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 40px 0 60px;
            }

            .sidebar {
                position: static;
                width: 100%;
            }

            .search-box input {
                width: 100%;
            }

            .shop-tools {
                flex-direction: column;
                align-items: stretch;
            }
        }

        @media (max-width: 768px) {
            .product-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .shop-header {
                padding: 50px 0 30px;
            }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
@include('partials.header')

<!-- SHOP HEADER -->
<section class="shop-header">
    <div class="container">
        <div class="shop-header-inner">
            <span class="shop-eyebrow">Equipment Catalog</span>
            <h1>{{ $pageTitle }}</h1>
            <p>{{ $pageDescription }}</p>
        </div>

        <div class="shop-tools">
            <form method="GET" action="{{ $shopFormAction }}" style="display:flex; gap:20px; width:100%; justify-content:space-between; flex-wrap:wrap;">
                <div class="search-box">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search machines..."
                    >
                </div>

                <div class="sort-box">
                    <select name="sort" onchange="this.form.submit()">
                        <option value="">Sort by Latest</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- SHOP CONTENT -->
<section class="shop-layout container">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="filter-group">
            <h3>Categories</h3>

            <a href="{{ route('shop', request()->only(['search', 'sort'])) }}"
               class="{{ $selectedCategory ? '' : 'active' }}">
                All Products
            </a>

            @foreach($categories as $category)
            <a href="{{ route('shop.category', array_merge(['slug' => $category->slug], request()->only(['search', 'sort']))) }}"
               class="{{ ($selectedCategory && $selectedCategory->slug === $category->slug) ? 'active' : '' }}">
                {{ $category->name }}
            </a>
            @endforeach

            <a href="{{ $selectedCategory ? route('shop.category', $selectedCategory->slug) : route('shop') }}"
               class="clear-filters-btn">
                Clear Filters
            </a>
        </div>
    </aside>

    <!-- PRODUCTS -->
    @if($products->count())
    <div class="shop-results">
        <div class="results-header">
            <h3>{{ $resultsLabel }}</h3>
            <p>{{ $products->total() }} product{{ $products->total() === 1 ? '' : 's' }} found</p>
        </div>

        <div class="product-grid">
            @foreach($products as $product)
            <div class="product-card">
                <div class="product-card__image">
                    <img
                        src="{{ $product->image }}"
                        alt="{{ $product->name }}"
                        loading="lazy"
                        onerror="this.src='https://placehold.co/400x300?text=No+Image'"
                    >
                </div>

                <div class="product-card__body">
                    @if($product->category)
                    <span class="product-category">{{ $product->category->name }}</span>
                    @endif
                    <h3>{{ Str::limit($product->name, 50) }}</h3>
                    
                    <div class="product-card__actions">
                        <a href="{{ route('product.details', $product->slug) }}" class="btn-view">
                            View Details
                        </a>
                        @if($product->externalUrl)
                        <a href="{{ $product->externalUrl }}" class="btn-buy" target="_blank" rel="noopener noreferrer">
                            Buy Now
                        </a>
                        @else
                        <a href="{{ route('quote.form', $product->slug) }}" class="btn-quote">
                            Get Quote
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pagination-wrap">
            {{ $products->links('vendor.pagination.kuvuo') }}
        </div>
    </div>
    @else
    <div class="empty-products">
        <h3>No products found</h3>
        <p>No products match your search keyword or selected category.</p>
        <a href="{{ route('shop') }}" class="empty-btn">Clear All Filters</a>
    </div>
    @endif

</section>

@include('partials.footer')
</body>
</html>
