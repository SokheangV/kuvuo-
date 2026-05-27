@extends('layouts.app')

@section('content')
<style>
    :root {
        --about-green-900: #12372A;
        --about-green-700: #1F5D45;
        --about-green-50: #EEF5F0;
        --about-green-25: #F6FAF7;
        --about-ink: #111827;
        --about-muted: #6B7280;
        --about-border: #D7DED9;
        --about-accent: #D97706;
        --about-white: #FFFFFF;
    }

    .about-page,
    .about-page * {
        box-sizing: border-box;
    }

    .about-page {
        background: var(--about-white);
        color: var(--about-ink);
        font-family: 'Nunito', Arial, Helvetica, sans-serif;
    }

    .about-shell {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 28px;
    }

    .about-section {
        padding: 96px 0;
    }

    .about-section + .about-section {
        border-top: 1px solid var(--about-border);
    }

    .about-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 6px 12px;
        border: 1px solid var(--about-green-900);
        color: var(--about-green-900);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        background: var(--about-white);
    }

    .about-eyebrow::before {
        content: "";
        width: 8px;
        height: 8px;
        display: block;
        background: var(--about-accent);
    }

    .about-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 14px 24px;
        border: 1.5px solid transparent;
        text-decoration: none;
        font-family: 'Google Sans', Arial, Helvetica, sans-serif;
        font-size: 15px;
        font-weight: 600;
        transition: background-color .18s ease, color .18s ease, border-color .18s ease, transform .12s ease, box-shadow .18s ease;
    }

    .about-button:hover {
        transform: translateY(-1px);
    }

    .about-button-primary {
        background: var(--about-green-900);
        border-color: var(--about-green-900);
        color: var(--about-white);
    }

    .about-button-primary:hover {
        background: var(--about-green-700);
        border-color: var(--about-green-700);
        box-shadow: 0 10px 24px rgba(18, 55, 42, 0.18);
    }

    .about-button-outline {
        background: var(--about-white);
        border-color: var(--about-green-900);
        color: var(--about-green-900);
    }

    .about-button-outline:hover {
        background: var(--about-green-50);
    }

    .about-hero {
        padding: 84px 0 88px;
        background:
            radial-gradient(60% 75% at 100% 0%, var(--about-green-50) 0%, transparent 60%),
            linear-gradient(180deg, var(--about-white) 0%, var(--about-green-25) 100%);
        border-bottom: 1px solid var(--about-border);
    }

    .about-hero-grid,
    .about-story-grid {
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(320px, 0.92fr);
        gap: 36px;
        align-items: center;
    }

    .about-hero-copy h1,
    .about-section-head h2,
    .about-story-copy h2,
    .about-cta h2,
    .about-card h3 {
        font-family: 'Science Gothic', Arial, Helvetica, sans-serif;
    }

    .about-hero-copy h1 {
        margin: 22px 0 20px;
        max-width: 760px;
        font-size: clamp(38px, 4.3vw, 56px);
        line-height: 1.06;
        letter-spacing: -0.02em;
    }

    .about-hero-copy p,
    .about-story-copy p,
    .about-section-head p,
    .about-card p,
    .about-cta p {
        color: var(--about-muted);
        font-size: 16px;
        line-height: 1.75;
    }

    .about-hero-actions {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        margin-top: 34px;
    }

    .about-hero-points {
        display: grid;
        gap: 14px;
        padding: 28px;
        background: var(--about-white);
        border: 1px solid var(--about-border);
        box-shadow: 0 30px 60px -30px rgba(18, 55, 42, 0.2);
    }

    .about-hero-point {
        display: grid;
        grid-template-columns: 44px 1fr;
        gap: 14px;
        align-items: start;
        padding-top: 14px;
        border-top: 1px solid var(--about-border);
    }

    .about-hero-point:first-child {
        padding-top: 0;
        border-top: 0;
    }

    .about-hero-point span {
        width: 44px;
        height: 44px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: var(--about-green-50);
        color: var(--about-green-900);
        font-size: 17px;
    }

    .about-hero-point strong {
        display: block;
        margin-bottom: 4px;
        font-size: 13px;
        font-weight: 800;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--about-green-900);
    }

    .about-section-head {
        max-width: 740px;
        margin-bottom: 42px;
    }

    .about-section-head h2,
    .about-story-copy h2,
    .about-cta h2 {
        margin: 18px 0 14px;
        font-size: clamp(30px, 3.2vw, 44px);
        line-height: 1.08;
        letter-spacing: -0.02em;
    }

    .about-story-copy {
        max-width: 620px;
    }

    .about-story-copy p + p {
        margin-top: 16px;
    }

    .about-story-media {
        overflow: hidden;
        border: 1px solid var(--about-border);
        box-shadow: 0 28px 56px -34px rgba(18, 55, 42, 0.25);
    }

    .about-story-media img {
        display: block;
        width: 100%;
        height: 520px;
        object-fit: cover;
    }

    .about-stats-grid,
    .about-why-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 22px;
    }

    .about-stat,
    .about-card {
        background: var(--about-white);
        border: 1px solid var(--about-border);
        padding: 28px 24px;
        transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
    }

    .about-stat:hover,
    .about-card:hover {
        transform: translateY(-3px);
        border-color: rgba(18, 55, 42, 0.24);
        box-shadow: 0 20px 40px -32px rgba(18, 55, 42, 0.35);
    }

    .about-stat strong {
        display: block;
        margin-bottom: 8px;
        color: var(--about-green-900);
        font-family: 'Science Gothic', Arial, Helvetica, sans-serif;
        font-size: 36px;
        line-height: 1;
    }

    .about-stat span {
        color: var(--about-muted);
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .about-card h3 {
        margin-bottom: 12px;
        font-size: 22px;
        line-height: 1.18;
    }

    .about-cta {
        padding: 48px;
        background: linear-gradient(135deg, var(--about-green-900) 0%, var(--about-green-700) 100%);
        color: var(--about-white);
    }

    .about-cta h2,
    .about-cta p {
        color: var(--about-white);
    }

    .about-cta p {
        max-width: 720px;
        margin-bottom: 28px;
        opacity: 0.84;
    }

    @media (max-width: 1200px) {
        .about-hero-grid,
        .about-story-grid,
        .about-why-grid {
            grid-template-columns: 1fr;
        }

        .about-stats-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 768px) {
        .about-shell {
            padding: 0 18px;
        }

        .about-hero,
        .about-section {
            padding-top: 72px;
            padding-bottom: 72px;
        }

        .about-stats-grid,
        .about-why-grid {
            grid-template-columns: 1fr;
        }

        .about-cta {
            padding: 30px 24px;
        }

        .about-story-media img {
            height: 360px;
        }
    }
</style>

<div class="about-page">
    <section class="about-hero">
        <div class="about-shell">
            <div class="about-hero-grid">
                <div class="about-hero-copy">
                    <span class="about-eyebrow">About KUVUO</span>
                    <h1>Heavy equipment support built around practical machines, fast follow-up, and clear communication.</h1>
                    <p>
                        KUVUO focuses on mini excavators, skid steers, forklifts, wheel loaders, road rollers, and attachments.
                        We aim to make equipment browsing, quote support, and logistics coordination feel direct and dependable.
                    </p>

                    <div class="about-hero-actions">
                        <a href="{{ route('shop') }}" class="about-button about-button-primary">Browse Equipment</a>
                        <a href="{{ route('contact') }}" class="about-button about-button-outline">Talk to Our Team</a>
                    </div>
                </div>

                <div class="about-hero-points">
                    <article class="about-hero-point">
                        <span><i class="fa-solid fa-truck-fast"></i></span>
                        <div>
                            <strong>Nationwide Coordination</strong>
                            <p>Support for quotes, freight planning, and customer communication across the USA.</p>
                        </div>
                    </article>

                    <article class="about-hero-point">
                        <span><i class="fa-solid fa-screwdriver-wrench"></i></span>
                        <div>
                            <strong>Equipment Focus</strong>
                            <p>Compact construction equipment and attachments presented in a clear, category-driven catalog.</p>
                        </div>
                    </article>

                    <article class="about-hero-point">
                        <span><i class="fa-solid fa-headset"></i></span>
                        <div>
                            <strong>Real Follow-Up</strong>
                            <p>Support that helps customers move from browsing to quoting to delivery without confusion.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="about-shell">
            <div class="about-story-grid">
                <div class="about-story-copy">
                    <span class="about-eyebrow">Our Story</span>
                    <h2>Built for contractors, landscapers, property crews, and equipment buyers who want straightforward answers.</h2>
                    <p>
                        KUVUO is positioned around practical heavy equipment categories and a cleaner buying journey.
                        Instead of overwhelming visitors with disconnected pages, the goal is to make catalog browsing,
                        quote requests, and support information feel connected.
                    </p>
                    <p>
                        That means clearer product categories, easier contact channels, and support content that helps customers
                        understand shipping, policies, and next steps before and after a purchase conversation.
                    </p>
                </div>

                <div class="about-story-media">
                    <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd" alt="Heavy equipment on a worksite">
                </div>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="about-shell">
            <div class="about-section-head">
                <span class="about-eyebrow">Snapshot</span>
                <h2>A business-focused catalog experience with the essentials customers usually need first.</h2>
                <p>The structure is built around category browsing, quote readiness, and support clarity.</p>
            </div>

            <div class="about-stats-grid">
                <article class="about-stat">
                    <strong>140</strong>
                    <span>Catalog products</span>
                </article>
                <article class="about-stat">
                    <strong>7</strong>
                    <span>Top-level categories</span>
                </article>
                <article class="about-stat">
                    <strong>USA</strong>
                    <span>Logistics coverage</span>
                </article>
                <article class="about-stat">
                    <strong>1</strong>
                    <span>Unified support flow</span>
                </article>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="about-shell">
            <div class="about-section-head">
                <span class="about-eyebrow">Why KUVUO</span>
                <h2>What the site and service are trying to do well.</h2>
                <p>These are the practical strengths we should reinforce across the rest of the storefront too.</p>
            </div>

            <div class="about-why-grid">
                <article class="about-card">
                    <h3>Clear equipment categories</h3>
                    <p>Products are grouped around real machine types so visitors can find the right catalog path faster.</p>
                </article>
                <article class="about-card">
                    <h3>Quote-first commerce flow</h3>
                    <p>The site supports both direct product browsing and quote-led sales conversations for heavier equipment.</p>
                </article>
                <article class="about-card">
                    <h3>Support pages that matter</h3>
                    <p>Warranty, shipping, returns, privacy, and terms content help customers feel more confident before contact.</p>
                </article>
                <article class="about-card">
                    <h3>Shared design consistency</h3>
                    <p>Header, footer, spacing, and section rhythm now move toward one cleaner visual system.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="about-shell">
            <div class="about-cta">
                <span class="about-eyebrow">Next Step</span>
                <h2>Need help choosing a machine or planning a quote request?</h2>
                <p>Browse the catalog first or contact the team directly and share the machine category, product name, or delivery destination.</p>
                <a href="{{ route('contact') }}" class="about-button about-button-outline" style="background:#fff;color:#12372A;border-color:#fff;">Contact KUVUO</a>
            </div>
        </div>
    </section>
</div>
@endsection
