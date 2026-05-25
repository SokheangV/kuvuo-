<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Excavator Product Landing Page - KUVUO</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --olive: #5d694c;
            --olive-deep: #2f3627;
            --sand: #f6f1e8;
            --stone: #ebe5d7;
            --paper: #fffdf8;
            --ink: #191919;
            --muted: #676257;
            --line: rgba(47, 54, 39, 0.12);
            --glow: rgba(204, 141, 58, 0.18);
            --accent: #cc8d3a;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background:
                radial-gradient(circle at top left, rgba(204, 141, 58, 0.16), transparent 28%),
                linear-gradient(180deg, #fbf7f0 0%, #f5f1e8 42%, #fcfaf6 100%);
            color: var(--ink);
            font-family: 'Manrope', sans-serif;
        }

        .container {
            width: min(92%, 1320px);
            margin: 0 auto;
        }

        .hero {
            padding: 70px 0 42px;
            position: relative;
            overflow: hidden;
        }

        .hero::before,
        .hero::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            z-index: 0;
        }

        .hero::before {
            width: 320px;
            height: 320px;
            background: var(--glow);
            top: 20px;
            right: -80px;
            filter: blur(18px);
        }

        .hero::after {
            width: 180px;
            height: 180px;
            background: rgba(93, 105, 76, 0.14);
            left: -50px;
            bottom: 10px;
            filter: blur(10px);
        }

        .hero-grid {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 36px;
            align-items: stretch;
        }

        .hero-copy {
            background: rgba(255, 253, 248, 0.88);
            border: 1px solid rgba(255, 255, 255, 0.65);
            border-radius: 32px;
            padding: 44px;
            backdrop-filter: blur(10px);
            box-shadow: 0 24px 70px rgba(37, 39, 32, 0.08);
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px;
            border-radius: 999px;
            background: rgba(93, 105, 76, 0.1);
            color: var(--olive);
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 22px;
        }

        .hero h1,
        .section-title,
        .topic-card h3,
        .topic-detail h3,
        .cta-panel h2 {
            font-family: 'Space Grotesk', sans-serif;
        }

        .hero h1 {
            font-size: clamp(2.8rem, 5vw, 5.2rem);
            line-height: 0.98;
            color: var(--olive-deep);
            max-width: 10ch;
            margin-bottom: 24px;
        }

        .hero p {
            font-size: 18px;
            line-height: 1.85;
            color: var(--muted);
            max-width: 62ch;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin: 30px 0 28px;
        }

        .btn,
        .btn-outline {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border-radius: 999px;
            padding: 15px 24px;
            font-weight: 800;
            transition: 0.25s ease;
        }

        .btn {
            background: var(--olive-deep);
            color: #fff;
            box-shadow: 0 16px 28px rgba(47, 54, 39, 0.18);
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-outline {
            border: 1.5px solid var(--olive-deep);
            color: var(--olive-deep);
            background: transparent;
        }

        .btn-outline:hover {
            background: var(--olive-deep);
            color: #fff;
        }

        .hero-metrics {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .metric {
            padding: 18px;
            border-radius: 22px;
            background: #fff;
            border: 1px solid var(--line);
        }

        .metric strong {
            display: block;
            font-size: 24px;
            color: var(--olive-deep);
            margin-bottom: 6px;
        }

        .metric span {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
        }

        .hero-panel {
            background: linear-gradient(180deg, rgba(47, 54, 39, 0.96), rgba(53, 64, 42, 0.96));
            color: #fff;
            border-radius: 32px;
            padding: 34px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 24px 60px rgba(37, 39, 32, 0.18);
        }

        .hero-panel::before {
            content: "";
            position: absolute;
            inset: auto -80px -80px auto;
            width: 220px;
            height: 220px;
            background: rgba(204, 141, 58, 0.18);
            border-radius: 50%;
            filter: blur(8px);
        }

        .machine-badge {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.08);
            color: #e8e2d5;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .hero-panel h2 {
            font-size: 30px;
            line-height: 1.15;
            margin-bottom: 14px;
        }

        .hero-panel p {
            color: rgba(255, 255, 255, 0.78);
            line-height: 1.8;
            margin-bottom: 24px;
        }

        .highlight-list,
        .checklist,
        .topic-points {
            list-style: none;
        }

        .highlight-list li,
        .checklist li,
        .topic-points li {
            position: relative;
            padding-left: 22px;
            line-height: 1.8;
        }

        .highlight-list li + li,
        .checklist li + li,
        .topic-points li + li {
            margin-top: 10px;
        }

        .highlight-list li::before,
        .checklist li::before,
        .topic-points li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 11px;
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: var(--accent);
        }

        .topic-nav {
            padding: 10px 0 32px;
        }

        .topic-nav-wrap {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .topic-nav a {
            text-decoration: none;
            color: var(--olive-deep);
            padding: 12px 18px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.72);
            border: 1px solid var(--line);
            font-weight: 700;
        }

        .section {
            padding: 54px 0;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 20px;
            margin-bottom: 28px;
        }

        .section-title {
            font-size: clamp(2rem, 3vw, 3rem);
            color: var(--olive-deep);
            line-height: 1.05;
            max-width: 12ch;
        }

        .section-intro {
            max-width: 58ch;
            color: var(--muted);
            line-height: 1.8;
        }

        .topics-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .topic-card {
            background: rgba(255, 253, 248, 0.88);
            border: 1px solid var(--line);
            border-radius: 28px;
            padding: 28px;
            box-shadow: 0 18px 45px rgba(31, 31, 31, 0.05);
        }

        .topic-card span,
        .topic-detail span {
            display: inline-block;
            color: var(--accent);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .topic-card h3,
        .topic-detail h3 {
            font-size: 28px;
            line-height: 1.15;
            color: var(--olive-deep);
            margin-bottom: 14px;
        }

        .topic-card p,
        .topic-detail p {
            color: var(--muted);
            line-height: 1.8;
            margin-bottom: 18px;
        }

        .topic-link {
            text-decoration: none;
            color: var(--olive-deep);
            font-weight: 800;
        }

        .overview-grid,
        .details-grid {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 24px;
        }

        .overview-card,
        .checklist-card,
        .topic-detail,
        .cta-panel {
            background: rgba(255, 253, 248, 0.9);
            border: 1px solid var(--line);
            border-radius: 30px;
            padding: 30px;
        }

        .overview-card {
            background:
                linear-gradient(135deg, rgba(93, 105, 76, 0.95), rgba(47, 54, 39, 0.96)),
                #2f3627;
            color: #fff;
            min-height: 100%;
        }

        .overview-card p {
            color: rgba(255, 255, 255, 0.82);
            line-height: 1.85;
            margin-bottom: 18px;
        }

        .overview-card .section-title {
            color: #fff;
            margin-bottom: 20px;
        }

        .checklist-card h3 {
            font-size: 26px;
            color: var(--olive-deep);
            margin-bottom: 18px;
        }

        .details-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .cta-panel {
            background: linear-gradient(135deg, #efe5d3, #fbf8f0);
            text-align: center;
        }

        .cta-panel h2 {
            font-size: 42px;
            color: var(--olive-deep);
            margin-bottom: 16px;
        }

        .cta-panel p {
            max-width: 58ch;
            margin: 0 auto 24px;
            color: var(--muted);
            line-height: 1.85;
        }

        .footer-note {
            margin-top: 18px;
            color: var(--muted);
            font-size: 14px;
        }

        @media (max-width: 1100px) {
            .hero-grid,
            .overview-grid,
            .details-grid,
            .topics-grid {
                grid-template-columns: 1fr;
            }

            .section-heading {
                align-items: start;
                flex-direction: column;
            }
        }

        @media (max-width: 768px) {
            .hero {
                padding-top: 40px;
            }

            .hero-copy,
            .hero-panel,
            .topic-card,
            .overview-card,
            .checklist-card,
            .topic-detail,
            .cta-panel {
                padding: 24px;
                border-radius: 24px;
            }

            .hero-metrics {
                grid-template-columns: 1fr;
            }

            .cta-panel h2 {
                font-size: 32px;
            }
        }
    </style>
</head>
<body>

@include('partials.header')

<section class="hero">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-copy">
                <div class="eyebrow">Mini Excavator Product Landing Page</div>
                <h1>Mini excavator resources that help buyers choose with confidence.</h1>
                <p>
                    This page is built for your mini excavator website and organized around the six topic areas you requested.
                    It gives you a flexible landing page for buying education, attachment guidance, maintenance content, safety
                    training, operator improvement, and jobsite project planning.
                </p>

                <div class="hero-actions">
                    <a href="#topics" class="btn">Explore Topics</a>
                    <a href="{{ route('shop.category', 'mini-excavator') }}" class="btn-outline">Browse Mini Excavators</a>
                </div>

                <div class="hero-metrics">
                    <div class="metric">
                        <strong>6</strong>
                        <span>core resource topics arranged for future content expansion</span>
                    </div>
                    <div class="metric">
                        <strong>1</strong>
                        <span>dedicated landing page for mini excavator buyers and operators</span>
                    </div>
                    <div class="metric">
                        <strong>Ready</strong>
                        <span>easy to edit in Blade when you want to change text later</span>
                    </div>
                </div>
            </div>

            <aside class="hero-panel">
                <div class="machine-badge">Product Context: TYPHON KUVUO 4.0</div>
                <h2>Built to turn a product page into a stronger learning and conversion page</h2>
                <p>
                    I used your mini excavator focus and the PDF file context as the direction for this page. The layout is made
                    for future article links, buying sections, training resources, and category-level calls to action.
                </p>

                <ul class="highlight-list">
                    @foreach($highlights as $highlight)
                        <li>{{ $highlight }}</li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</section>

<section class="topic-nav">
    <div class="container">
        <div class="topic-nav-wrap">
            @foreach($topics as $topic)
                <a href="#{{ $topic['slug'] }}">{{ $topic['eyebrow'] }}</a>
            @endforeach
        </div>
    </div>
</section>

<section class="section" id="topics">
    <div class="container">
        <div class="section-heading">
            <h2 class="section-title">Topic hubs for your mini excavator audience</h2>
            <p class="section-intro">
                Each card below can stay as a landing section, or later become a link to a dedicated article, video, FAQ, or
                category guide. That gives you a simple path to grow this page over time without changing the whole design.
            </p>
        </div>

        <div class="topics-grid">
            @foreach($topics as $topic)
                <article class="topic-card">
                    <span>{{ $topic['eyebrow'] }}</span>
                    <h3>{{ $topic['title'] }}</h3>
                    <p>{{ $topic['description'] }}</p>
                    <a href="#{{ $topic['slug'] }}" class="topic-link">Jump to section →</a>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="overview-grid">
            <div class="overview-card">
                <h2 class="section-title">What this page should help visitors do</h2>
                <p>
                    Mini excavator buyers often need more than pricing. They want to understand size selection, tool matching,
                    service expectations, operator onboarding, and which projects a compact machine can realistically handle.
                </p>
                <p>
                    This landing page is designed to answer those early questions while guiding visitors toward your mini excavator
                    catalog, quote forms, and future educational content.
                </p>
            </div>

            <div class="checklist-card">
                <h3>Quick buyer checklist</h3>
                <ul class="checklist">
                    @foreach($checklist as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="details-grid">
            @foreach($topics as $topic)
                <article class="topic-detail" id="{{ $topic['slug'] }}">
                    <span>{{ $topic['eyebrow'] }}</span>
                    <h3>{{ $topic['title'] }}</h3>
                    <p>{{ $topic['description'] }}</p>
                    <ul class="topic-points">
                        @foreach($topic['points'] as $point)
                            <li>{{ $point }}</li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cta-panel">
            <h2>Ready to turn this into your live mini excavator landing page?</h2>
            <p>
                You can keep this page as a standalone resource hub, link it from your navigation, or reuse the sections inside
                your existing home page and blog strategy. The content is now in Blade so you can edit the copy directly from your explorer.
            </p>
            <div class="hero-actions" style="justify-content: center;">
                <a href="{{ route('shop.category', 'mini-excavator') }}" class="btn">Shop Mini Excavators</a>
                <a href="{{ route('contact') }}" class="btn-outline">Talk to Sales</a>
            </div>
            <p class="footer-note">Page file: <strong>resources/views/mini-excavator-landing.blade.php</strong></p>
        </div>
    </div>
</section>

@include('partials.footer')

</body>
</html>
