<!-- ======================================
FILE: resources/views/attachment-category.blade.php
====================================== -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attachment Category</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {margin:0;padding:0;box-sizing:border-box;font-family:'Inter',sans-serif;}
        body {background:#f8f8f5;color:#1f1f1f;}
        .container {width:90%;max-width:1400px;margin:auto;}

        .hero {
            padding:80px 0;
            text-align:center;
            background:#eef1e7;
        }

        .hero h1 {
            font-size:48px;
            color:#2f3627;
        }

        .grid {
            padding:80px 0;
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:30px;
        }

        .card {
            background:white;
            border-radius:24px;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(0,0,0,0.05);
        }

        .card img {
            width:100%;
            height:250px;
            object-fit:cover;
        }

        .content {
            padding:25px;
        }

        .content h3 {
            min-height:60px;
            margin-bottom:15px;
            color:#2f3627;
        }

        .btn {
            display:inline-block;
            padding:10px 18px;
            background:#5d694c;
            color:white;
            text-decoration:none;
            border-radius:999px;
        }

        @media(max-width:992px){
            .grid{grid-template-columns:1fr;}
        }
    </style>
</head>
<body>


 @include('partials.header')

<section class="hero">
    <div class="container">
        <h1>{{ ucfirst($type) }} - {{ strtoupper($slug) }} Attachments</h1>
    </div>
</section>

<div class="container">
    <div class="grid">

        @forelse($products as $product)
            <div class="card">

                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">

                <div class="content">
                    <h3>{{ $product->name }}</h3>

                    <a href="{{ route('product.show', $product->slug) }}" class="btn">
                        View Product
                    </a>
                </div>

            </div>
        @empty
            <p>No attachments found in this category.</p>
        @endforelse

    </div>
</div>

@include('partials.footer')
</body>
</html> 
