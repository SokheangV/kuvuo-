<!-- ======================================
FILE: resources/views/attachments.blade.php
====================================== -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attachments</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {margin:0;padding:0;box-sizing:border-box;font-family:'Inter',sans-serif;}
        body {background:#f8f8f5;color:#1f1f1f;}
        .container {width:90%;max-width:1400px;margin:auto;}

        .hero {
            padding:100px 0;
            text-align:center;
            background:linear-gradient(to right,#f5f6f2,#eef1e7);
        }

        .hero h1 {
            font-size:54px;
            color:#2f3627;
            margin-bottom:20px;
        }

        .hero p {
            color:#666;
            max-width:700px;
            margin:auto;
            line-height:1.8;
        }

        .grid {
            padding:80px 0;
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:30px;
        }

        .card {
            background:white;
            padding:40px;
            border-radius:24px;
            box-shadow:0 10px 30px rgba(0,0,0,0.05);
        }

        .card h2 {
            color:#5d694c;
            margin-bottom:20px;
        }

        .card a {
            display:block;
            margin:12px 0;
            text-decoration:none;
            color:#333;
            font-weight:500;
        }
    </style>
</head>
<body>

 @include('partials.header')
<section class="hero">
    <div class="container">
        <h1>Machine Attachments</h1>
        <p>Browse attachment categories for mini excavators and skid steer machines.</p>
    </div>
</section>

<div class="container">
    <div class="grid">

        <div class="card">
            <h2>Mini Excavator Attachments</h2>
            <a href="{{ route('attachments.category', 'mini-excavator') }}">All Mini Excavator Attachments</a>
            <a href="{{ route('attachments.category', '2-ton-and-below') }}">2 Ton and Below Attachments</a>
            <a href="{{ route('attachments.category', 'x2') }}">X2</a>
            <a href="{{ route('attachments.category', 'xxv') }}">XXV</a>
        </div>

        <div class="card">
            <h2>Skid Steer Attachments</h2>
            <a href="{{ route('attachments.category', 'skid-steer') }}">All Skid Steer Attachments</a>
            <a href="{{ route('attachments.category', 'compact-series-501-507') }}">Compact Series 501-507</a>
            <a href="{{ route('attachments.category', 'standard-series-x1300-509') }}">Standard Series (X1300-509)</a>
        </div>

    </div>
</div>

@include('partials.footer')
</body>
</html>
