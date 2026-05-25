@php
use Illuminate\Support\Str;

$ecwidBaseUrl = route('scriptb', ['search' => $product->name]);
$ecwidUrl = $product->ecwid_id
    ? $ecwidBaseUrl.'#!/'.($product->ecwid_slug ?: $product->slug).'/p/'.$product->ecwid_id
    : route('scriptb', ['search' => $product->name]);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - KUVUO</title>

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

        /* PRODUCT TOP */
        .product-section {
            padding: 80px 0;
        }

        .product-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: start;
        }

        .product-image {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.06);
            padding: 20px;
        }

        .product-image img {
            width: 100%;
            height: 500px;
            object-fit: contain;
            display: block;
            background: white;
        }

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
            font-size: 42px;
            margin-bottom: 25px;
            color: var(--dark);
            line-height: 1.3;
        }

        .product-actions {
            display: flex;
            gap: 15px;
            margin-bottom: 35px;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            padding: 12px 22px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
        }

        .btn-outline {
            border: 1px solid var(--primary);
            color: var(--primary);
            padding: 12px 22px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
        }

        /* SPECS */
        .specs-box {
            background: white;
            padding: 30px;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        .specs-box h3 {
            margin-bottom: 25px;
            font-size: 26px;
            color: var(--dark);
        }

        .spec-row {
            display: flex;
            justify-content: space-between;
            padding: 16px 0;
            border-bottom: 1px solid #eee;
        }

        .spec-row span:first-child {
            color: #666;
        }

        .spec-row span:last-child {
            font-weight: 600;
            color: var(--dark);
        }

        /* DESCRIPTION */
        .description-box {
            margin-top: 60px;
            background: white;
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        .description-box h2 {
            margin-bottom: 20px;
            color: var(--dark);
        }

        .description-content {
            color: #666;
            line-height: 1.8;
        }

        .description-content p,
        .description-content ul,
        .description-content li,
        .description-content h3,
        .description-content strong {
            margin-bottom: 15px;
        }

        /* RELATED PRODUCTS */
        .related-section {
            padding: 80px 0;
        }

        .related-section h2 {
            font-size: 38px;
            margin-bottom: 40px;
            color: var(--dark);
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .related-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
        }

        .related-card img {
            width: 100%;
            height: 240px;
            object-fit: contain;
            padding: 20px;
            background: white;
        }

        .related-content {
            padding: 24px;
        }

        .related-content h3 {
            font-size: 18px;
            color: var(--dark);
            line-height: 1.5;
            margin-bottom: 15px;
        }

        @media(max-width: 992px) {
            .product-layout {
                grid-template-columns: 1fr;
            }

            .related-grid {
                grid-template-columns: 1fr;
            }

            .product-info h1 {
                font-size: 32px;
            }
        }
    </style>
</head>
<body>

@include('partials.header')

<section class="product-section">
    <div class="container">

        <div class="product-layout">

            <!-- PRODUCT IMAGE -->
            <div class="product-image">
                <img src="{{ $product->image }}" alt="{{ $product->name }}">
            </div>

            <!-- PRODUCT INFO -->
            <div class="product-info">

                <span class="product-badge">
                    {{ $product->category->name ?? 'Machinery' }}
                </span>

                <h1>{{ $product->name }}</h1>

<div class="product-actions">
    <a href="{{ $ecwidUrl }}" class="btn-primary">
    Explore More →
</a>
</div>

                <div class="specs-box">
                    <h3>Specifications</h3>

                    <div class="spec-row">
                        <span>SKU</span>
                        <span>{{ $product->sku }}</span>
                    </div>

                    <div class="spec-row">
                        <span>Stock</span>
                        <span>{{ $product->stock }}</span>
                    </div>

                    <div class="spec-row">
                        <span>Category</span>
                        <span>{{ $product->category->name ?? 'Machinery' }}</span>
                    </div>
                </div>

            </div>
        </div>

        <div class="description-box">
            <h2>Product Description</h2>

            <div class="description-content">
                {!! $product->description !!}
            </div>
        </div>

    </div>
</section>

<section class="related-section">
    <div class="container">

        <h2>Related Machines</h2>

        <div class="related-grid">

            @foreach($relatedProducts as $related)
            <div class="related-card">

                <img src="{{ $related->image }}" alt="{{ $related->name }}">

                <div class="related-content">

                    <h3>{{ Str::limit($related->name, 55) }}</h3>

                    <a href="{{ route('product.details', $related->id) }}" class="btn-primary">
                        View Details
                    </a>

                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>

@include('partials.footer')
</body>

</html>
