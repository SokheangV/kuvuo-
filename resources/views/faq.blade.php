<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - American Mini Excavator</title>

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
            --primary: #12372A;
            --dark: #111827;
            --light: #f5f6f2;
            --text: #1f1f1f;
        }

        body {
            background: #f8f8f5;
            color: var(--text);
        }

        .container {
            width: 100%;
            max-width: 1320px;
            margin: 0 auto;
            padding: 0 28px;
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

        /* FAQ */
        .faq-section {
            padding: 100px 0;
        }

        .faq-grid {
            display: grid;
            gap: 25px;
        }

        .faq-card {
            background: white;
            padding: 35px;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        .faq-card h3 {
            font-size: 24px;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .faq-card p {
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
            .hero h1 {
                font-size: 40px;
            }

            .faq-card h3 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

 @include('partials.header')

<section class="hero">
    <div class="container">
        <h1>Frequently Asked Questions</h1>
        <p>
            Find answers to common questions about shipping, machinery setup, warranty,
            financing, support, and nationwide delivery.
        </p>
    </div>
</section>

<section class="faq-section">
    <div class="container">

        <div class="faq-grid">

            <div class="faq-card">
                <h3>Do you ship nationwide in the USA?</h3>
                <p>Yes, we provide logistics and delivery support across the United States for most machinery and equipment.</p>
            </div>

            <div class="faq-card">
                <h3>How long does delivery take?</h3>
                <p>Delivery timelines depend on product availability and destination, but most orders ship within a few business days.</p>
            </div>

            <div class="faq-card">
                <h3>Do your machines come assembled?</h3>
                <p>Most machines arrive partially assembled and include setup instructions. Our team can also provide guidance.</p>
            </div>

            <div class="faq-card">
                <h3>Do you offer financing options?</h3>
                <p>Please contact our sales team to discuss financing or commercial purchasing options.</p>
            </div>

            <div class="faq-card">
                <h3>Do your machines come with warranty?</h3>
                <p>Warranty coverage varies by product. Please check with our sales team for machine-specific warranty details.</p>
            </div>

            <div class="faq-card">
                <h3>Can I pick up my machine from your warehouse?</h3>
                <p>Yes, warehouse pickup may be available depending on the machine and order arrangements.</p>
            </div>

            <div class="faq-card">
                <h3>Do you sell attachments and spare parts?</h3>
                <p>Yes, we offer compatible attachments, replacement parts, and equipment support for many models.</p>
            </div>

            <div class="faq-card">
                <h3>How do I request a quote?</h3>
                <p>You can request a quote directly from any product page or contact our sales team for assistance.</p>
            </div>

            <div class="faq-card">
                <h3>Do you provide technical support?</h3>
                <p>Yes, our team provides product guidance, logistics help, and after-sales support for customers.</p>
            </div>

            <div class="faq-card">
                <h3>Can I order multiple machines for business use?</h3>
                <p>Yes, bulk orders and commercial inquiries are welcome. Contact our sales team for custom pricing.</p>
            </div>

        </div>

    </div>
</section>

<section class="cta-section">
    <div class="container">
        <h2>Still Have Questions?</h2>
        <p>
            Our team is here to help with product recommendations, pricing,
            shipping, and machinery support.
        </p>
        <a href="/contact" class="btn-primary">Contact Us</a>
    </div>
</section>
@include('partials.footer')
</body>
</html>