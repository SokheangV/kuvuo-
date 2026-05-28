<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} - KUVUO</title>

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
            text-align: center;
        }

        .shop-header-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
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

        /* Product Grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
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
            text-align: left;
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
        .empty-products {
            background: var(--bg);
            border: 1px solid var(--border);
            padding: 60px 40px;
            text-align: center;
            border-radius: 0;
            grid-column: span 3;
            width: 100%;
        }

        .empty-products h3 {
            font-family: "Science Gothic", Arial, sans-serif;
            font-size: 20px;
            color: var(--primary);
            margin-bottom: 12px;
        }

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

        /* Responsive */
        @media (max-width: 1100px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .product-grid {
                grid-template-columns: 1fr;
            }
            .empty-products {
                grid-column: span 1;
            }
        }

        @media (max-width: 600px) {
            .shop-header {
                padding: 50px 0 35px;
            }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
@include('partials.header')

<!-- CATEGORY HEADER -->
<section class="shop-header">
    <div class="container">
        <div class="shop-header-inner">
            <span class="shop-eyebrow">Category Catalog</span>
            <h1>{{ $category->name }}</h1>
            <p>Browse high-performance machinery and professional attachment solutions in the {{ $category->name }} collection.</p>
        </div>
    </div>
</section>

<!-- PRODUCTS GRID -->
<div class="container" style="padding: 60px 0 100px;">
    <div class="product-grid">
        @forelse($products as $product)
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
        @empty
            <div class="empty-products">
                <h3>No machinery found</h3>
                <p>There are no products listed under this category at this moment.</p>
                <a href="{{ route('shop') }}" class="empty-btn">Back to Catalog</a>
            </div>
        @endforelse
    </div>
</div>

@include('partials.footer')

</body>
</html>
