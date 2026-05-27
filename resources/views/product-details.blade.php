@php use Illuminate\Support\Str; @endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - KUVUO</title>
    <meta name="description" content="{{ Str::limit(strip_tags($product->shortDescription), 160) }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }

        :root {
            --primary: #5d694c;
            --dark:    #2f3627;
            --light:   #f5f6f2;
            --text:    #1f1f1f;
        }

        body { background: #f8f8f5; color: var(--text); }

        .container { width: 90%; max-width: 1400px; margin: auto; }

        /* ── PRODUCT SECTION ─────────────────────────────────────────── */
        .product-section { padding: 80px 0; }

        .product-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: start;
        }

        /* ── GALLERY ──────────────────────────────────────────────────── */
        .gallery-wrap {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.06);
            padding: 20px;
        }

        .gallery-main {
            width: 100%;
            height: 480px;
            object-fit: contain;
            display: block;
            background: white;
            border-radius: 16px;
            cursor: zoom-in;
            transition: opacity 0.2s;
        }

        .gallery-thumbs {
            display: flex;
            gap: 10px;
            margin-top: 16px;
            flex-wrap: wrap;
        }

        .gallery-thumb {
            width: 72px;
            height: 72px;
            object-fit: cover;
            border-radius: 10px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border-color 0.2s, opacity 0.2s;
            opacity: 0.7;
        }

        .gallery-thumb:hover,
        .gallery-thumb.active {
            border-color: var(--primary);
            opacity: 1;
        }

        /* ── PRODUCT INFO ─────────────────────────────────────────────── */
        .product-badge {
            display: inline-block;
            background: rgba(93,105,76,0.1);
            color: var(--primary);
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .product-info h1 {
            font-size: 38px;
            margin-bottom: 20px;
            color: var(--dark);
            line-height: 1.3;
        }

        .product-price {
            font-size: 32px;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 24px;
        }

        .product-price .original-price {
            font-size: 20px;
            font-weight: 400;
            color: #999;
            text-decoration: line-through;
            margin-left: 12px;
        }

        .stock-badge {
            display: inline-block;
            padding: 5px 14px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 24px;
        }

        .stock-badge.in-stock    { background: #dcfce7; color: #16a34a; }
        .stock-badge.out-of-stock { background: #fee2e2; color: #dc2626; }

        .product-actions {
            display: flex;
            gap: 15px;
            margin-bottom: 35px;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            padding: 14px 28px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: background 0.2s;
        }

        .btn-primary:hover { background: #4c573d; }

        .btn-outline {
            border: 2px solid var(--primary);
            color: var(--primary);
            padding: 14px 28px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: background 0.2s;
        }

        .btn-outline:hover { background: #f5f7f2; }

        /* ── SHORT DESCRIPTION ────────────────────────────────────────── */
        .short-desc {
            color: #555;
            line-height: 1.8;
            font-size: 15px;
            margin-bottom: 28px;
        }

        .short-desc p { margin-bottom: 10px; }

        /* ── SPECS BOX ────────────────────────────────────────────────── */
        .specs-box {
            background: white;
            padding: 28px 30px;
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.05);
            margin-top: 8px;
        }

        .specs-box h3 {
            margin-bottom: 20px;
            font-size: 22px;
            color: var(--dark);
        }

        .spec-row {
            display: flex;
            justify-content: space-between;
            padding: 13px 0;
            border-bottom: 1px solid #f0f0f0;
            font-size: 15px;
        }

        .spec-row:last-child { border-bottom: none; }

        .spec-row .spec-label { color: #666; }

        .spec-row .spec-value { font-weight: 600; color: var(--dark); text-align: right; max-width: 55%; }

        /* ── FULL DESCRIPTION ─────────────────────────────────────────── */
        .description-box {
            margin-top: 60px;
            background: white;
            padding: 44px;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        .description-box h2 { margin-bottom: 24px; color: var(--dark); font-size: 28px; }

        .description-content {
            color: #555;
            line-height: 1.85;
            font-size: 15px;
        }

        .description-content p,
        .description-content ul,
        .description-content ol,
        .description-content li { margin-bottom: 14px; }

        .description-content h2,
        .description-content h3,
        .description-content h4 {
            color: var(--dark);
            margin: 24px 0 12px;
            font-size: 20px;
        }

        .description-content strong { color: var(--dark); }

        .description-content table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .description-content th,
        .description-content td {
            padding: 10px 14px;
            border: 1px solid #e5e7eb;
            font-size: 14px;
        }

        .description-content th { background: #f5f6f2; color: var(--dark); }

        /* ── RELATED ──────────────────────────────────────────────────── */
        .related-section { padding: 80px 0; }

        .related-section h2 { font-size: 36px; margin-bottom: 36px; color: var(--dark); }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .related-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0,0,0,0.06);
            display: flex;
            flex-direction: column;
            transition: transform 0.25s;
        }

        .related-card:hover { transform: translateY(-5px); }

        .related-card img {
            width: 100%;
            height: 220px;
            object-fit: contain;
            padding: 16px;
            background: white;
        }

        .related-content { padding: 22px; }

        .related-content h3 {
            font-size: 16px;
            color: var(--dark);
            line-height: 1.5;
            margin-bottom: 14px;
        }

        /* ── RESPONSIVE ───────────────────────────────────────────────── */
        @media(max-width: 992px) {
            .product-layout { grid-template-columns: 1fr; }
            .related-grid   { grid-template-columns: repeat(2, 1fr); }
            .product-info h1 { font-size: 28px; }
        }

        @media(max-width: 600px) {
            .related-grid { grid-template-columns: 1fr; }
            .gallery-main { height: 300px; }
        }
    </style>
</head>
<body>

@include('partials.header')

<section class="product-section">
    <div class="container">

        <div class="product-layout">

            {{-- ── GALLERY ─────────────────────────────────────────── --}}
            <div class="gallery-wrap">
                <img
                    id="gallery-main"
                    class="gallery-main"
                    src="{{ $product->image }}"
                    alt="{{ $product->name }}"
                    onerror="this.src='https://placehold.co/600x480?text=No+Image'"
                >

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

            {{-- ── PRODUCT INFO ─────────────────────────────────────── --}}
            <div class="product-info">

                <span class="product-badge">
                    {{ $product->category->name ?? 'Machinery' }}
                </span>

                <h1>{{ $product->name }}</h1>

                {{-- Price --}}
                @if($product->price > 0)
                <div class="product-price">
                    ${{ number_format($product->price, 2) }}
                    @if($product->salePrice && $product->regularPrice && $product->salePrice < $product->regularPrice)
                    <span class="original-price">${{ number_format($product->regularPrice, 2) }}</span>
                    @endif
                </div>
                @endif

                {{-- Stock status --}}
                <span class="stock-badge {{ $product->inStock ? 'in-stock' : 'out-of-stock' }}">
                    {{ $product->inStock ? '✓ In Stock' : 'Out of Stock' }}
                </span>

                {{-- Short description (sanitised WooCommerce HTML) --}}
                @if($product->shortDescription)
                <div class="short-desc">
                    {!! $product->shortDescription !!}
                </div>
                @endif

                {{-- CTA buttons --}}
                <div class="product-actions">
                    @if($product->externalUrl)
                    <a
                        href="{{ $product->externalUrl }}"
                        class="btn-primary"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        View in Store →
                    </a>
                    @endif

                    <a href="{{ route('quote.form', $product->slug) }}" class="btn-outline">
                        Request a Quote
                    </a>
                </div>

                {{-- Specs box --}}
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

        {{-- ── FULL DESCRIPTION ──────────────────────────────────────── --}}
        @if($product->description)
        <div class="description-box">
            <h2>Product Description</h2>
            <div class="description-content">
                {{--
                    SECURITY NOTE:
                    $product->description is WooCommerce HTML that has already been
                    run through PHP strip_tags() in CsvProductRepository, allowing
                    only a safe subset of formatting tags (p, ul, li, strong, table…).
                    Script, style, and iframe tags are stripped. It is safe to output
                    with {!! !!} here, but DO NOT pass raw CSV content directly to
                    Blade without going through CsvProductRepository first.
                --}}
                {!! $product->description !!}
            </div>
        </div>
        @endif

    </div>
</section>

{{-- ── RELATED PRODUCTS ──────────────────────────────────────────────── --}}
@if($relatedProducts->count())
<section class="related-section">
    <div class="container">

        <h2>Related Machines</h2>

        <div class="related-grid">
            @foreach($relatedProducts as $related)
            <div class="related-card">

                <img
                    src="{{ $related->image }}"
                    alt="{{ $related->name }}"
                    loading="lazy"
                    onerror="this.src='https://placehold.co/400x220?text=No+Image'"
                >

                <div class="related-content">
                    <h3>{{ Str::limit($related->name, 55) }}</h3>
                    <a href="{{ route('product.details', $related->slug) }}" class="btn-primary">
                        View Details
                    </a>
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
