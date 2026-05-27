@extends('layouts.app')

@section('content')
<style>
    :root {
        --blog-green-900: #12372A;
        --blog-green-700: #1F5D45;
        --blog-green-50: #EEF5F0;
        --blog-green-25: #F6FAF7;
        --blog-ink: #111827;
        --blog-muted: #6B7280;
        --blog-border: #D7DED9;
        --blog-accent: #D97706;
        --blog-white: #FFFFFF;
    }

    .blog-page,
    .blog-page * {
        box-sizing: border-box;
    }

    .blog-page {
        background: var(--blog-white);
        color: var(--blog-ink);
        font-family: 'Nunito', Arial, Helvetica, sans-serif;
    }

    .blog-shell {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 28px;
    }

    .blog-section {
        padding: 96px 0;
    }

    .blog-section + .blog-section {
        border-top: 1px solid var(--blog-border);
    }

    .blog-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 6px 12px;
        border: 1px solid var(--blog-green-900);
        color: var(--blog-green-900);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        background: var(--blog-white);
    }

    .blog-eyebrow::before {
        content: "";
        width: 8px;
        height: 8px;
        display: block;
        background: var(--blog-accent);
    }

    .blog-button {
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

    .blog-button:hover {
        transform: translateY(-1px);
    }

    .blog-button-primary {
        background: var(--blog-green-900);
        border-color: var(--blog-green-900);
        color: var(--blog-white);
    }

    .blog-button-primary:hover {
        background: var(--blog-green-700);
        border-color: var(--blog-green-700);
        box-shadow: 0 10px 24px rgba(18, 55, 42, 0.18);
    }

    .blog-button-outline {
        background: var(--blog-white);
        border-color: var(--blog-green-900);
        color: var(--blog-green-900);
    }

    .blog-button-outline:hover {
        background: var(--blog-green-50);
    }

    .blog-hero {
        padding: 84px 0 88px;
        background:
            radial-gradient(60% 75% at 100% 0%, var(--blog-green-50) 0%, transparent 60%),
            linear-gradient(180deg, var(--blog-white) 0%, var(--blog-green-25) 100%);
        border-bottom: 1px solid var(--blog-border);
    }

    .blog-hero-grid,
    .blog-featured-card {
        display: grid;
        grid-template-columns: minmax(0, 1.05fr) minmax(340px, 0.95fr);
        gap: 36px;
        align-items: center;
    }

    .blog-hero-copy h1,
    .blog-section-head h2,
    .blog-featured-copy h2,
    .blog-card h3,
    .blog-cta h2,
    .blog-empty-state h2 {
        font-family: 'Science Gothic', Arial, Helvetica, sans-serif;
    }

    .blog-hero-copy h1 {
        margin: 22px 0 20px;
        max-width: 760px;
        font-size: clamp(38px, 4.3vw, 56px);
        line-height: 1.06;
        letter-spacing: -0.02em;
    }

    .blog-hero-copy p,
    .blog-featured-copy p,
    .blog-section-head p,
    .blog-card p,
    .blog-cta p,
    .blog-empty-state p {
        color: var(--blog-muted);
        font-size: 16px;
        line-height: 1.75;
    }

    .blog-hero-actions {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        margin-top: 34px;
    }

    .blog-hero-aside {
        padding: 26px;
        background: var(--blog-white);
        border: 1px solid var(--blog-border);
        box-shadow: 0 30px 60px -30px rgba(18, 55, 42, 0.2);
    }

    .blog-hero-aside h2 {
        margin: 10px 0 14px;
        font-family: 'Science Gothic', Arial, Helvetica, sans-serif;
        font-size: 30px;
        line-height: 1.12;
    }

    .blog-hero-aside ul {
        margin: 22px 0 0;
        padding: 0;
        list-style: none;
        display: grid;
        gap: 12px;
    }

    .blog-hero-aside li {
        padding-top: 12px;
        border-top: 1px solid var(--blog-border);
        color: var(--blog-muted);
        line-height: 1.65;
    }

    .blog-section-head {
        max-width: 760px;
        margin-bottom: 42px;
    }

    .blog-section-head h2 {
        margin: 18px 0 14px;
        font-size: clamp(30px, 3.2vw, 44px);
        line-height: 1.08;
        letter-spacing: -0.02em;
    }

    .blog-pill {
        display: inline-flex;
        align-items: center;
        padding: 7px 12px;
        background: var(--blog-green-50);
        color: var(--blog-green-900);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .blog-featured-card {
        padding: 22px;
        background: var(--blog-white);
        border: 1px solid var(--blog-border);
        box-shadow: 0 28px 56px -34px rgba(18, 55, 42, 0.25);
    }

    .blog-featured-media img,
    .blog-card img {
        display: block;
        width: 100%;
        object-fit: cover;
    }

    .blog-featured-media img {
        height: 100%;
        min-height: 420px;
    }

    .blog-featured-copy {
        padding: 12px 6px 12px 12px;
    }

    .blog-featured-copy h2 {
        margin: 18px 0 16px;
        font-size: clamp(28px, 3vw, 40px);
        line-height: 1.12;
    }

    .blog-card-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 22px;
    }

    .blog-card {
        display: flex;
        flex-direction: column;
        background: var(--blog-white);
        border: 1px solid var(--blog-border);
        transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
    }

    .blog-card:hover {
        transform: translateY(-3px);
        border-color: rgba(18, 55, 42, 0.24);
        box-shadow: 0 20px 40px -32px rgba(18, 55, 42, 0.35);
    }

    .blog-card img {
        height: 230px;
    }

    .blog-card-copy {
        display: flex;
        flex: 1;
        flex-direction: column;
        padding: 22px;
    }

    .blog-card h3 {
        margin: 14px 0 12px;
        font-size: 24px;
        line-height: 1.18;
    }

    .blog-card p {
        margin: 0 0 22px;
        flex: 1;
    }

    .blog-empty-state {
        padding: 42px 32px;
        background: var(--blog-white);
        border: 1px solid var(--blog-border);
        text-align: center;
    }

    .blog-empty-state h2 {
        margin: 0 0 14px;
        font-size: 30px;
        line-height: 1.12;
    }

    .blog-cta {
        padding: 48px;
        background: linear-gradient(135deg, var(--blog-green-900) 0%, var(--blog-green-700) 100%);
        color: var(--blog-white);
    }

    .blog-cta h2,
    .blog-cta p {
        color: var(--blog-white);
    }

    .blog-cta p {
        max-width: 720px;
        margin-bottom: 28px;
        opacity: 0.84;
    }

    @media (max-width: 1200px) {
        .blog-hero-grid,
        .blog-featured-card,
        .blog-card-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .blog-shell {
            padding: 0 18px;
        }

        .blog-hero,
        .blog-section {
            padding-top: 72px;
            padding-bottom: 72px;
        }

        .blog-featured-card,
        .blog-cta,
        .blog-empty-state {
            padding: 22px;
        }

        .blog-featured-media img {
            min-height: 280px;
        }
    }
</style>

<div class="blog-page">
    <section class="blog-hero">
        <div class="blog-shell">
            <div class="blog-hero-grid">
                <div class="blog-hero-copy">
                    <span class="blog-eyebrow">KUVUO Journal</span>
                    <h1>Heavy equipment insights, buying guidance, and support topics you can now publish from the site admin.</h1>
                    <p>
                        The blog is now database-backed, so new articles can be created once and automatically appear on this page.
                        Use it for buying guides, support education, attachments content, and logistics updates.
                    </p>

                    <div class="blog-hero-actions">
                        @if ($featuredPost)
                            <a href="{{ route('blog.details', $featuredPost->slug) }}" class="blog-button blog-button-primary">Read Featured Guide</a>
                        @endif
                        <a href="{{ route('admin.blog-posts.index') }}" class="blog-button blog-button-outline">Manage Blog Posts</a>
                    </div>
                </div>

                <aside class="blog-hero-aside">
                    <span class="blog-pill">Publishing Flow</span>
                    <h2>Write once, publish once, and let the blog page update itself.</h2>
                    <ul>
                        <li>Create articles from the new admin area at <strong>/admin/blog-posts</strong></li>
                        <li>Set posts as draft or published and optionally choose one featured article</li>
                        <li>Use a title, category, image URL, excerpt, and full content body</li>
                    </ul>
                </aside>
            </div>
        </div>
    </section>

    @if ($featuredPost)
        <section class="blog-section" id="featured-story">
            <div class="blog-shell">
                <div class="blog-section-head">
                    <span class="blog-eyebrow">Featured Story</span>
                    <h2>Lead with one strong article instead of a disconnected feed.</h2>
                    <p>The featured block highlights your main article first, then the rest of the posts continue in the grid below.</p>
                </div>

                <article class="blog-featured-card">
                    <div class="blog-featured-media">
                        <img src="{{ $featuredPost->featured_image ?: 'https://placehold.co/960x720/EEF5F0/12372A?text=KUVUO+Blog' }}" alt="{{ $featuredPost->title }}">
                    </div>

                    <div class="blog-featured-copy">
                        <span class="blog-pill">{{ $featuredPost->category }}</span>
                        <h2>{{ $featuredPost->title }}</h2>
                        <p>{{ $featuredPost->excerptText(220) }}</p>
                        <a href="{{ route('blog.details', $featuredPost->slug) }}" class="blog-button blog-button-primary">Read Article</a>
                    </div>
                </article>
            </div>
        </section>
    @endif

    <section class="blog-section">
        <div class="blog-shell">
            <div class="blog-section-head">
                <span class="blog-eyebrow">Latest Articles</span>
                <h2>Published posts from your new blog system.</h2>
                <p>As you add more posts in the admin area, they will appear here automatically in reverse publish order.</p>
            </div>

            @if ($posts->isNotEmpty())
                <div class="blog-card-grid">
                    @foreach ($posts as $post)
                        <article class="blog-card">
                            <img src="{{ $post->featured_image ?: 'https://placehold.co/960x720/EEF5F0/12372A?text=KUVUO+Blog' }}" alt="{{ $post->title }}">
                            <div class="blog-card-copy">
                                <span class="blog-pill">{{ $post->category }}</span>
                                <h3>{{ $post->title }}</h3>
                                <p>{{ $post->excerptText(155) }}</p>
                                <a href="{{ route('blog.details', $post->slug) }}" class="blog-button blog-button-outline">Read More</a>
                            </div>
                        </article>
                    @endforeach
                </div>
            @elseif (! $featuredPost)
                <div class="blog-empty-state">
                    <h2>No blog posts yet.</h2>
                    <p>Create your first post in the new admin area and it will show up here automatically.</p>
                    <a href="{{ route('admin.blog-posts.create') }}" class="blog-button blog-button-primary">Create First Post</a>
                </div>
            @endif
        </div>
    </section>

    <section class="blog-section">
        <div class="blog-shell">
            <div class="blog-cta">
                <span class="blog-eyebrow">Need Help?</span>
                <h2>Want help choosing a machine instead of reading another article?</h2>
                <p>Use the blog for context, then reach out with the product type, category, or quote question you want help with.</p>
                <a href="{{ route('contact') }}" class="blog-button blog-button-outline" style="background:#fff;color:#12372A;border-color:#fff;">Contact KUVUO</a>
            </div>
        </div>
    </section>
</div>
@endsection
