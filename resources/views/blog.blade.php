<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - American Mini Excavator</title>

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

        /* NAVBAR */
        .navbar {
            background: white;
            padding: 20px 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
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
            padding: 12px 22px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
        }

        /* HERO */
        .hero {
            padding: 100px 0;
            text-align: center;
            background: linear-gradient(to right, #f5f6f2, #eef1e7);
        }

        .hero h1 {
            font-size: 58px;
            color: var(--dark);
            margin-bottom: 20px;
        }

        .hero p {
            max-width: 700px;
            margin: auto;
            color: #666;
            line-height: 1.8;
            font-size: 18px;
        }

        /* FEATURED */
        .featured-section {
            padding: 80px 0;
        }

        .featured-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: white;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.06);
        }

        .featured-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .featured-content {
            padding: 50px;
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

        .featured-content h2 {
            font-size: 38px;
            color: var(--dark);
            margin-bottom: 20px;
            line-height: 1.4;
        }

        .featured-content p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        /* BLOG GRID */
        .blog-section {
            padding: 80px 0;
        }

        .section-title {
            font-size: 42px;
            color: var(--dark);
            margin-bottom: 40px;
            text-align: center;
        }

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .blog-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .blog-card img {
            width: 100%;
            height: 240px;
            object-fit: cover;
        }

        .blog-content {
            padding: 25px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .blog-content h3 {
            font-size: 22px;
            color: var(--dark);
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .blog-content p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 25px;
            flex-grow: 1;
        }

        /* CTA */
        .cta-section {
            padding: 100px 0;
            text-align: center;
            background: var(--primary);
            color: white;
        }

        .cta-section h2 {
            font-size: 42px;
            margin-bottom: 20px;
        }

        .cta-section p {
            max-width: 700px;
            margin: auto auto 30px;
            line-height: 1.8;
        }

        .cta-section .btn-primary {
            background: white;
            color: var(--primary);
        }

        @media(max-width: 992px) {
            .featured-card,
            .blog-grid {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 40px;
            }

            .featured-content h2 {
                font-size: 30px;
            }
        }
    </style>
</head>
<body>

 @include('partials.header')

<section class="hero">
    <div class="container">
        <h1>Heavy Machinery Insights & Buying Guides</h1>
        <p>
            Expert tips, buying guides, maintenance advice, and industry insights
            to help you choose the right heavy equipment for your business.
        </p>
    </div>
</section>

<section class="featured-section">
    <div class="container">

        <div class="featured-card">
            <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd" alt="Featured Blog">

            <div class="featured-content">
                <span class="category">Featured Guide</span>
                <h2>Mini Excavator Buying Guide: 7 Things to Know Before Buying</h2>
                <p>
                    Learn what to look for when choosing a mini excavator, from engine power
                    and hydraulic performance to attachments and long-term maintenance.
                </p>

                <a href="{{ route('blog.details', 'mini-excavator-buying-guide') }}" class="btn-primary">
                    Read More
                </a>
            </div>
        </div>

    </div>
</section>

<section class="blog-section">
    <div class="container">

        <h2 class="section-title">Latest Articles</h2>

        <div class="blog-grid">

            <div class="blog-card">
                <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd" alt="">
                <div class="blog-content">
                    <span class="category">Buying Guide</span>
                    <h3>How to Choose the Right Mini Excavator for Your Business</h3>
                    <p>Key factors to compare before investing in compact excavation equipment.</p>
                    <a href="{{ route('blog.details', 'mini-excavator-buying-guide') }}" class="btn-primary">Read More</a>
                </div>
            </div>

            <div class="blog-card">
                <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952" alt="">
                <div class="blog-content">
                    <span class="category">Maintenance</span>
                    <h3>Heavy Machinery Maintenance Checklist for Longer Equipment Life</h3>
                    <p>Simple maintenance practices that reduce downtime and repair costs.</p>
                    <a href="{{ route('blog.details', 'forklift-safety-tips') }}" class="btn-primary">Read More</a>
                </div>
            </div>

            <div class="blog-card">
                <img src="https://images.unsplash.com/photo-1489515217757-5fd1be406fef" alt="">
                <div class="blog-content">
                    <span class="category">Industry Tips</span>
                    <h3>Wheel Loader vs Skid Steer: Which One Should You Buy?</h3>
                    <p>A practical comparison based on performance, versatility, and jobsite use.</p>
                    <a href="{{ route('blog.details', 'wheel-loader-vs-skid-steer') }}" class="btn-primary">Read More</a>
                </div>
            </div>

            <div class="blog-card">
                <img src="https://images.unsplash.com/photo-1460353581641-37baddab0fa2" alt="">
                <div class="blog-content">
                    <span class="category">Safety</span>
                    <h3>Forklift Safety Tips Every Operator Should Know</h3>
                    <p>Important workplace safety tips for forklift operation and maintenance.</p>
                    <a href="{{ route('blog.details', 'forklift-safety-tips') }}" class="btn-primary">Read More</a>
                </div>
            </div>

            <div class="blog-card">
                <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40" alt="">
                <div class="blog-content">
                    <span class="category">Attachments</span>
                    <h3>Best Skid Steer Attachments for Landscaping Jobs</h3>
                    <p>Popular attachments that improve productivity and versatility.</p>
                    <a href="{{ route('blog.details', 'wheel-loader-vs-skid-steer') }}" class="btn-primary">Read More</a>
                </div>
            </div>

            <div class="blog-card">
                <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72" alt="">
                <div class="blog-content">
                    <span class="category">Logistics</span>
                    <h3>Heavy Machinery Shipping Guide Across the USA</h3>
                    <p>What buyers should know about equipment transport and delivery timelines.</p>
                    <a href="{{ route('blog.details', 'mini-excavator-buying-guide') }}" class="btn-primary">Read More</a>
                </div>
            </div>

        </div>

    </div>
</section>

<section class="cta-section">
    <div class="container">
        <h2>Need Help Choosing the Right Machine?</h2>
        <p>
            Speak with our sales team for expert recommendations, pricing,
            and nationwide shipping support.
        </p>
        <a href="/contact" class="btn-primary">Contact Sales</a>
    </div>
</section>
@include('partials.footer')
</body>
</html>