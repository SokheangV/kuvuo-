@php use Illuminate\Support\Str; @endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - KUVUO</title>
    <meta name="description" content="{{ Str::limit(strip_tags($product->shortDescription), 160) }}">

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

        /* Product Section */
        .product-section {
            padding: 60px 0 100px;
        }

        .product-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: start;
        }

        /* Gallery */
        .gallery-wrap {
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 0;
            padding: 24px;
            display: flex;
            flex-direction: column;
        }

        .gallery-main-container {
            height: 480px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg);
            border: 1px solid var(--border);
            padding: 20px;
        }

        .gallery-main {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            transition: opacity 0.2s;
        }

        .gallery-thumbs {
            display: flex;
            gap: 12px;
            margin-top: 16px;
            flex-wrap: wrap;
        }

        .gallery-thumb {
            width: 72px;
            height: 72px;
            object-fit: contain;
            background: var(--bg);
            border: 1px solid var(--border);
            cursor: pointer;
            padding: 6px;
            transition: border-color 0.2s, opacity 0.2s;
            opacity: 0.7;
        }

        .gallery-thumb:hover,
        .gallery-thumb.active {
            border-color: var(--primary);
            opacity: 1;
            box-shadow: 0 4px 10px rgba(18, 55, 42, 0.05);
        }

        /* Product Info */
        .product-info {
            display: flex;
            flex-direction: column;
        }

        .product-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--accent-alt);
            margin-bottom: 12px;
        }

        .product-info h1 {
            font-family: "Science Gothic", Arial, sans-serif;
            font-size: clamp(28px, 3.4vw, 40px);
            font-weight: 700;
            line-height: 1.2;
            color: var(--primary);
            margin-bottom: 16px;
        }

        .product-meta-row {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .product-price {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary);
        }

        .product-price .original-price {
            font-size: 18px;
            font-weight: 400;
            color: var(--muted);
            text-decoration: line-through;
            margin-left: 10px;
        }

        .stock-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 14px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-radius: 0;
            border: 1px solid transparent;
        }

        .stock-badge.in-stock {
            background: #E8F5E9;
            color: #2E7D32;
            border-color: #C8E6C9;
        }

        .stock-badge.out-of-stock {
            background: #FFEBEE;
            color: #C62828;
            border-color: #FFCDD2;
        }

        .short-desc {
            color: var(--text);
            line-height: 1.7;
            font-size: 15px;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border);
        }

        /* Actions */
        .product-actions {
            display: flex;
            gap: 16px;
            margin-bottom: 35px;
            flex-wrap: wrap;
        }

        .btn-primary,
        .btn-outline {
            flex: 1;
            min-width: 180px;
            text-align: center;
            padding: 16px 24px;
            font-family: "Google Sans", Arial, sans-serif;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            border-radius: 0; /* Sharp corners */
            transition: all 0.2s;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            border: 1px solid var(--primary);
        }

        .btn-primary:hover {
            background: var(--primary-mid);
            border-color: var(--primary-mid);
        }

        .btn-outline {
            background: transparent;
            color: var(--primary);
            border: 1.5px solid var(--primary);
        }

        .btn-outline:hover {
            background: var(--bg-soft);
        }

        /* Specifications Box */
        .specs-box {
            background: var(--bg);
            border: 1px solid var(--border);
            padding: 28px;
            border-radius: 0;
        }

        .specs-box h3 {
            font-family: "Science Gothic", Arial, sans-serif;
            font-size: 18px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 20px;
            padding-bottom: 8px;
            border-bottom: 1.5px solid var(--border);
        }

        .spec-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid var(--border);
            font-size: 14px;
        }

        .spec-row:last-child {
            border-bottom: none;
        }

        .spec-label {
            color: var(--muted);
            font-weight: 500;
        }

        .spec-value {
            font-weight: 600;
            color: var(--text);
            text-align: right;
            max-width: 60%;
        }

        /* Full Description */
        .description-box {
            margin-top: 60px;
            background: var(--bg);
            border: 1px solid var(--border);
            padding: 40px;
            border-radius: 0;
        }

        .description-box h2 {
            font-family: "Science Gothic", Arial, sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 24px;
            padding-bottom: 10px;
            border-bottom: 1.5px solid var(--border);
        }

        .description-content {
            color: var(--text);
            line-height: 1.8;
            font-size: 15px;
        }

        /* Related Products */
        .related-section {
            padding: 60px 0 100px;
            border-top: 1px solid var(--border);
        }

        .related-section h2 {
            font-family: "Science Gothic", Arial, sans-serif;
            font-size: 28px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 30px;
        }

        .related-grid {
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

        /* Responsive */
        @media (max-width: 992px) {
            .product-layout {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            .related-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .related-grid {
                grid-template-columns: 1fr;
            }
            .gallery-main-container {
                height: 320px;
            }
            .description-box {
                padding: 24px;
            }
        }
    </style>
</head>
<body>

@include('partials.header')

<section class="product-section">
    <div class="container">

        <div class="product-layout">

            {{-- GALLERY COLUMN --}}
            <div class="gallery-wrap">
                <div class="gallery-main-container">
                    <img
                        id="gallery-main"
                        class="gallery-main"
                        src="{{ $product->image }}"
                        alt="{{ $product->name }}"
                        onerror="this.src='https://placehold.co/600x480?text=No+Image'"
                    >
                </div>

                @if(count($product->gallery) > 1)
                <div class="gallery-thumbs">
                    @foreach($product->gallery as $i => $imgUrl)
                    <img
                        class="gallery-thumb {{ $i === 0 ? 'active' : '' }}"
                        src="{{ $imgUrl }}"
                        alt="{{ $product->name }} – image {{ $i + 1 }}"
                        loading="lazy"
                        onerror="this.style.display='none'"
                        onclick="switchImage(this, '{{ $imgUrl }}')"
                    >
                    @endforeach
                </div>
                @endif
            </div>

            {{-- PRODUCT INFO COLUMN --}}
            <div class="product-info">

                <span class="product-eyebrow">
                    {{ $product->category->name ?? 'Machinery' }}
                </span>

                <h1>{{ $product->name }}</h1>

                {{-- Price & Stock --}}
                <div class="product-meta-row">

                    <span class="stock-badge {{ $product->inStock ? 'in-stock' : 'out-of-stock' }}">
                        {{ $product->inStock ? '✓ In Stock' : 'Out of Stock' }}
                    </span>
                </div>

                {{-- Short description (XSS Escaped and formatted with nl2br) --}}
                @if($product->shortDescription)
                <div class="short-desc">
                    {!! nl2br(e($product->shortDescription)) !!}
                </div>
                @endif

                {{-- Action buttons --}}
                <div class="product-actions">
                    @if($product->externalUrl)
                    <a
                        href="{{ $product->externalUrl }}"
                        class="btn-primary"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        Buy Now
                    </a>
                    @endif

                    <a href="{{ route('quote.form', $product->slug) }}" class="btn-outline">
                        Request a Quote
                    </a>
                </div>

                {{-- Specs table --}}
                <div class="specs-box">
                    <h3>Specifications</h3>

                    @if($product->sku)
                    <div class="spec-row">
                        <span class="spec-label">SKU</span>
                        <span class="spec-value">{{ $product->sku }}</span>
                    </div>
                    @endif

                    @if($product->gtin)
                    <div class="spec-row">
                        <span class="spec-label">GTIN / UPC</span>
                        <span class="spec-value">{{ $product->gtin }}</span>
                    </div>
                    @endif

                    <div class="spec-row">
                        <span class="spec-label">Category</span>
                        <span class="spec-value">{{ $product->category->name ?? 'Machinery' }}</span>
                    </div>

                    @foreach($product->specs as $spec)
                    <div class="spec-row">
                        <span class="spec-label">{{ $spec['name'] }}</span>
                        <span class="spec-value">{{ $spec['value'] }}</span>
                    </div>
                    @endforeach

                    @if(empty($product->specs) && !$product->sku && !$product->gtin)
                    <div class="spec-row">
                        <span class="spec-label">Availability</span>
                        <span class="spec-value">{{ $product->stock }}</span>
                    </div>
                    @endif
                </div>

            </div>{{-- end .product-info --}}
        </div>{{-- end .product-layout --}}

        {{-- FULL DESCRIPTION --}}
        @if($product->description)
        <div class="description-box">
            <h2>Product Description</h2>
            <div class="description-content">
                {{-- STRICT SECURITY: Sanitized and escaped via e() with safe line breaks to prevent XSS --}}
                {!! nl2br(e($product->description)) !!}
            </div>
        </div>
        @endif

    </div>
</section>

{{-- RELATED PRODUCTS --}}
@if($relatedProducts->count())
<section class="related-section">
    <div class="container">

        <h2>Related Machines</h2>

        <div class="related-grid">
            @foreach($relatedProducts as $related)
            <div class="product-card">
                <div class="product-card__image">
                    <img
                        src="{{ $related->image }}"
                        alt="{{ $related->name }}"
                        loading="lazy"
                        onerror="this.src='https://placehold.co/400x300?text=No+Image'"
                    >
                </div>

                <div class="product-card__body">
                    @if($related->category)
                    <span class="product-category">{{ $related->category->name }}</span>
                    @else
                    <span class="product-category">Machinery</span>
                    @endif
                    <h3>{{ Str::limit($related->name, 50) }}</h3>
                    
                    <div class="product-card__actions">
                        <a href="{{ route('product.details', $related->slug) }}" class="btn-view">
                            View Details
                        </a>
                        @if($related->externalUrl)
                        <a href="{{ $related->externalUrl }}" class="btn-buy" target="_blank" rel="noopener noreferrer">
                            Buy Now
                        </a>
                        @else
                        <a href="{{ route('quote.form', $related->slug) }}" class="btn-quote">
                            Get Quote
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endif

@include('partials.footer')

<script>
function switchImage(thumb, url) {
    document.getElementById('gallery-main').src = url;
    document.querySelectorAll('.gallery-thumb').forEach(t => t.classList.remove('active'));
    thumb.classList.add('active');
}
</script>
</body>
</html>
