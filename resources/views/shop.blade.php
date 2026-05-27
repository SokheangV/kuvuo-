<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }} - KUVUO</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        :root {
            --primary: #5d694c;
            --dark: #2f3627;
            --light: #f5f6f2;
            --accent: #d6c7a1;
            --text: #1f1f1f;
        }

        body {
            background: #f8f8f5;
            color: var(--text);
        }

        .container {
            width: 90%;
            max-width: 1400px;
            margin: auto;
        }

        /* NAVBAR */
        .navbar {
            background: white;
            padding: 20px 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .nav-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 28px;
            font-weight: 800;
            color: var(--primary);
        }

        .nav-menu {
            display: flex;
            gap: 30px;
        }

        .nav-menu a {
            text-decoration: none;
            color: var(--text);
            font-weight: 500;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            padding: 12px 20px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
            border: none;
        }

        .btn-primary:hover {
            background: #4d593f;
        }

        /* SHOP HEADER */
        .shop-header {
            padding: 80px 0 40px;
        }

        .shop-header h1 {
            font-size: 52px;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .shop-header p {
            font-size: 18px;
            color: #666;
        }

        .shop-tools {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 35px;
        }

        .search-box input,
        .sort-box select {
            padding: 14px 18px;
            border: 1px solid #ddd;
            border-radius: 14px;
            font-size: 15px;
            background: white;
        }

        .search-box input {
            width: 400px;
        }

        /* SHOP LAYOUT */
        .shop-layout {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 40px;
            padding: 50px 0 80px;
        }

        /* SIDEBAR */
        .sidebar {
            background: white;
            padding: 30px;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            height: fit-content;
        }

        .filter-group {
            margin-bottom: 35px;
        }

        .filter-group h3 {
            margin-bottom: 18px;
            color: var(--dark);
            font-size: 18px;
        }

        .filter-group a {
            display: block;
            margin-bottom: 12px;
            color: #666;
            font-size: 14px;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        /* PRODUCT GRID */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

       .shop-layout {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 40px;
    margin-top: 50px;
    align-items: start;
}

.sidebar {
    background: #fff;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.05);
    position: sticky;
    top: 20px;
}

.filter-group h3 {
    font-size: 20px;
    margin-bottom: 20px;
    color: #1f2937;
}

.filter-group a {
    display: block;
    margin-bottom: 14px;
    font-size: 15px;
    color: #374151;
    cursor: pointer;
}

.filter-group a.active {
    color: #5d694c;
    font-weight: 700;
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.product-card {
    background: white;
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.06);
    transition: all 0.35s ease;
    display: flex;
    flex-direction: column;
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 18px 40px rgba(0,0,0,0.12);
}

.product-image {
    height: 260px;
    overflow: hidden;
    background: #f8f8f8;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.product-card:hover img {
    transform: scale(1.05);
}

.product-content {
    padding: 24px;
}

.product-category {
    display: inline-block;
    background: #eef2e8;
    color: #5d694c;
    font-size: 12px;
    padding: 6px 12px;
    border-radius: 30px;
    margin-bottom: 14px;
    font-weight: 600;
}

.product-content h3 {
    font-size: 24px;
    margin-bottom: 12px;
    color: #1f2937;
    line-height: 1.3;
}

.product-content p {
    font-size: 15px;
    color: #6b7280;
    line-height: 1.6;
    margin-bottom: 18px;
}

.product-actions {
    display: flex;
    gap: 12px;
}

.btn-view,
.btn-quote {
    flex: 1;
    text-align: center;
    padding: 12px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    transition: 0.3s;
}

.btn-view {
    background: #5d694c;
    color: white;
}

.btn-view:hover {
    background: #4c573d;
}

.btn-quote {
    border: 1px solid #5d694c;
    color: #5d694c;
}

.btn-quote:hover {
    background: #f5f7f2;
}

/* Responsive */
@media (max-width: 1100px) {
    .product-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .shop-layout {
        grid-template-columns: 1fr;
    }

    .product-grid {
        grid-template-columns: 1fr;
    }
}
        /* EMPTY MESSAGE */
        .empty-products {
            background: white;
            padding: 60px;
            border-radius: 24px;
            text-align: center;
            color: #777;
            font-size: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        /* RESPONSIVE */
        @media (max-width: 1200px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 992px) {
            .shop-layout {
                grid-template-columns: 1fr;
            }

            .sidebar {
                order: 2;
            }

            .product-grid {
                order: 1;
            }

            .shop-tools {
                flex-direction: column;
            }

            .search-box input {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .product-grid {
                grid-template-columns: 1fr;
            }

            .shop-header h1 {
                font-size: 38px;
            }

            .nav-menu {
                display: none;
            }
        }



        .shop-results {
    width: 100%;
}

.results-header {
    margin-bottom: 30px;
}

.results-header h3 {
    font-size: 28px;
    color: #1f2937;
    margin-bottom: 6px;
}

.results-header p {
    color: #6b7280;
    font-size: 15px;
}

.empty-state {
    text-align: center;
    padding: 80px 20px;
    width: 100%;
    background: white;
    border-radius: 20px;
}

.pagination-wrap {
    margin-top: 50px;
    display: flex;
    justify-content: center;
}

.pagination-wrap nav {
    display: flex;
    gap: 10px;
}

.pagination-wrap svg {
    width: 18px;
}



.product-card {
    display: flex;
    flex-direction: column;
    height: 100%;
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

.product-image-wrap {
    height: 250px;
    overflow: hidden;
    background: #f8f8f8;
}

.product-image-wrap img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.product-content {
    padding: 20px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.product-content h3 {
    font-size: 18px;
    line-height: 1.4;
    min-height: 52px;
    max-height: 52px;
    overflow: hidden;
}

.product-content p {
    font-size: 20px;
    font-weight: bold;
    margin: 15px 0;
}

.product-content a {
    margin-top: auto;
    display: inline-block;
    padding: 10px 16px;
    background: #5f694d;
    color: white;
    text-decoration: none;
    border-radius: 8px;
}


    </style>
</head>
<body>

<!-- NAVBAR -->
 @include('partials.header')

<!-- SHOP HEADER -->
<section class="shop-header">
    <div class="container">

        <h1>{{ $pageTitle }}</h1>
        <p>{{ $pageDescription }}</p>
<div class="shop-tools">

    <form method="GET" action="{{ $shopFormAction }}" style="display:flex; gap:20px; width:100%; justify-content:space-between;">

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
                <option value="low" {{ request('sort') == 'low' ? 'selected' : '' }}>
                    Price Low to High
                </option>
                <option value="high" {{ request('sort') == 'high' ? 'selected' : '' }}>
                    Price High to Low
                </option>
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

        <br>

        <a href="{{ $selectedCategory ? route('shop.category', $selectedCategory->slug) : route('shop') }}"
           style="color:#5d694c; font-size:14px; text-decoration:none;">
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

        @forelse($products as $product)

        <div class="product-card">
            <div class="product-image-wrap">
                <img
                    src="{{ $product->image }}"
                    alt="{{ $product->name }}"
                    loading="lazy"
                    onerror="this.src='https://placehold.co/400x300?text=No+Image'"
                >
            </div>

            <div class="product-content">
                @if($product->category)
                <span class="product-category">{{ $product->category->name }}</span>
                @endif
                <h3>{{ Str::limit($product->name, 50) }}</h3>
                @if($product->price > 0)
                <p style="font-size:18px;font-weight:700;color:#5d694c;margin:8px 0 0;">
                    ${{ number_format($product->price, 2) }}
                </p>
                @endif
                <a href="{{ route('product.details', $product->slug) }}">
                    View Details
                </a>
            </div>
        </div>

        @empty

        <div class="empty-state">
            <h3>No products found</h3>
            <p>Try another category or search keyword.</p>
        </div>

        @endforelse

    </div>

    <div class="pagination-wrap">
        {{ $products->links() }}
    </div>

</div>

    @else
    <div class="empty-products">
        No products match your search. Try a different keyword or category.
    </div>
    @endif

</section>

@include('partials.footer')
</body>
</html>
