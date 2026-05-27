<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Attachments - KUVUO</title>

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

        /* Hero / Header */
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

        /* Grid */
        .attachment-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            padding: 60px 0 100px;
        }

        .attachment-card {
            background: var(--bg);
            border: 1px solid var(--border);
            padding: 40px;
            border-radius: 0;
            display: flex;
            flex-direction: column;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .attachment-card:hover {
            border-color: var(--primary);
            box-shadow: 0 8px 24px rgba(18, 55, 42, 0.06);
        }

        .attachment-card h2 {
            font-family: "Science Gothic", Arial, sans-serif;
            font-size: 22px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 24px;
            padding-bottom: 12px;
            border-bottom: 1.5px solid var(--border);
        }

        .attachment-card a {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 18px;
            margin-bottom: 8px;
            text-decoration: none;
            color: var(--text);
            font-weight: 500;
            background: var(--bg-soft);
            border: 1px solid transparent;
            transition: all 0.2s;
            font-family: "Google Sans", Arial, sans-serif;
            font-size: 14px;
        }

        .attachment-card a:hover {
            border-color: var(--primary);
            color: var(--primary);
            background: var(--bg);
            padding-left: 24px;
        }

        .attachment-card a::after {
            content: "→";
            font-size: 16px;
            color: var(--accent-alt);
            transition: transform 0.2s;
        }

        .attachment-card a:hover::after {
            transform: translateX(4px);
            color: var(--primary);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .attachment-grid {
                grid-template-columns: 1fr;
            }
            .attachment-card {
                padding: 30px 20px;
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

@include('partials.header')

<!-- HEADER -->
<section class="shop-header">
    <div class="container">
        <div class="shop-header-inner">
            <span class="shop-eyebrow">Equipment Accessories</span>
            <h1>Machine Attachments</h1>
            <p>Maximize utility. Browse professional attachments engineered for mini excavators, skid steers, and loaders.</p>
        </div>
    </div>
</section>

<!-- MAIN CONTENT -->
<div class="container">
    <div class="attachment-grid">

        <div class="attachment-card">
            <h2>Mini Excavator Attachments</h2>
            <a href="{{ route('attachments.category', 'mini-excavator') }}">All Mini Excavator Attachments</a>
            <a href="{{ route('attachments.category', '2-ton-and-below') }}">2 Ton and Below Attachments</a>
            <a href="{{ route('attachments.category', 'x2') }}">X2 Attachments</a>
            <a href="{{ route('attachments.category', 'xxv') }}">XXV Attachments</a>
        </div>

        <div class="attachment-card">
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
