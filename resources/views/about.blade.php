<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - American Mini Excavator</title>

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

        /* STORY */
        .about-section {
            padding: 100px 0;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .about-content h2 {
            font-size: 42px;
            margin-bottom: 25px;
            color: var(--dark);
        }

        .about-content p {
            color: #666;
            line-height: 1.9;
            margin-bottom: 20px;
        }

        .about-image {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.06);
        }

        .about-image img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        /* STATS */
        .stats-section {
            padding: 80px 0;
            background: white;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .stat-box {
            text-align: center;
            padding: 40px;
            border-radius: 20px;
            background: #f8f8f5;
        }

        .stat-box h3 {
            font-size: 42px;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .stat-box p {
            color: #666;
        }

        /* WHY US */
        .why-section {
            padding: 100px 0;
        }

        .why-title {
            text-align: center;
            font-size: 42px;
            margin-bottom: 50px;
            color: var(--dark);
        }

        .why-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .why-card {
            background: white;
            padding: 35px;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        .why-card h3 {
            margin-bottom: 15px;
            color: var(--dark);
        }

        .why-card p {
            color: #666;
            line-height: 1.8;
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
            .about-grid,
            .why-grid,
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 40px;
            }
        }
    </style>
</head>
<body>

 @include('partials.header')

<section class="hero">
    <div class="container">
        <h1>About American Mini Excavator</h1>
        <p>
            We specialize in premium heavy machinery solutions including mini excavators,
            skid steers, forklifts, road rollers, wheel loaders, and attachments for businesses across the United States.
        </p>
    </div>
</section>

<section class="about-section">
    <div class="container">
        <div class="about-grid">

            <div class="about-content">
                <h2>Built for Contractors, Landscapers & Businesses</h2>
                <p>
                    American Mini Excavator is dedicated to providing reliable heavy equipment
                    solutions with competitive pricing, fast logistics, and trusted customer support.
                </p>
                <p>
                    Our mission is to help businesses grow with quality machinery backed by professional service,
                    parts support, and nationwide delivery.
                </p>
            </div>

            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd" alt="Heavy Machinery">
            </div>

        </div>
    </div>
</section>

<section class="stats-section">
    <div class="container">
        <div class="stats-grid">

            <div class="stat-box">
                <h3>500+</h3>
                <p>Machines Delivered</p>
            </div>

            <div class="stat-box">
                <h3>48 States</h3>
                <p>Nationwide Shipping</p>
            </div>

            <div class="stat-box">
                <h3>24/7</h3>
                <p>Customer Support</p>
            </div>

            <div class="stat-box">
                <h3>100%</h3>
                <p>Business Focused</p>
            </div>

        </div>
    </div>
</section>

<section class="why-section">
    <div class="container">

        <h2 class="why-title">Why Choose Us</h2>

        <div class="why-grid">

            <div class="why-card">
                <h3>Premium Machinery</h3>
                <p>Reliable heavy equipment designed for performance, durability, and efficiency.</p>
            </div>

            <div class="why-card">
                <h3>Fast Nationwide Delivery</h3>
                <p>Shipping solutions across the United States with logistics support.</p>
            </div>

            <div class="why-card">
                <h3>Dedicated Support</h3>
                <p>Sales, logistics, and technical assistance from experienced professionals.</p>
            </div>

        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <h2>Ready to Find the Right Machine?</h2>
        <p>
            Browse our machinery inventory or speak with our team for recommendations,
            pricing, and nationwide shipping support.
        </p>
        <a href="/shop" class="btn-primary">Shop Now</a>
    </div>
</section>

@include('partials.footer')

</body>
</html>