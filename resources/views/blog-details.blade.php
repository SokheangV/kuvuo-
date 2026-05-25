<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post['title'] }}</title>

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
            --text: #1f1f1f;
        }

        body {
            background: #f8f8f5;
            color: var(--text);
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: auto;
        }

        .hero {
            padding: 80px 0;
        }

        .category {
            display: inline-block;
            background: rgba(93,105,76,0.1);
            color: var(--primary);
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: 48px;
            color: var(--dark);
            margin-bottom: 25px;
            line-height: 1.3;
        }

        .hero img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 24px;
        }

        .content {
            padding: 70px 0;
            line-height: 1.9;
            color: #555;
        }

        .content h2 {
            font-size: 30px;
            margin: 40px 0 20px;
            color: var(--dark);
        }

        .content p {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

 @include('partials.header')

<section class="hero">
    <div class="container">

        <span class="category">{{ $post['category'] }}</span>

        <h1>{{ $post['title'] }}</h1>

        <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}">

    </div>
</section>

<section class="content">
    <div class="container">
        {!! $post['content'] !!}
    </div>
</section>

@include('partials.footer')
</body>
</html>