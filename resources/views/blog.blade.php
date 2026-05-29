@extends('layouts.app')

@section('title', 'KUVUO Journal - Heavy Equipment Insights & Guides')

@section('content')
@php
    $selectedCategory = request('category');
    
    // Combine all posts to make filtering consistent
    $allPosts = collect();
    if ($featuredPost) {
        $allPosts->push($featuredPost);
    }
    if ($posts && $posts->isNotEmpty()) {
        $allPosts = $allPosts->merge($posts);
    }

    // Get unique categories with their slugs
    $categories = $allPosts->pluck('category')
        ->unique()
        ->filter()
        ->map(function($name) {
            return (object) [
                'name' => $name,
                'slug' => \Illuminate\Support\Str::slug($name)
            ];
        })
        ->values();

    // Determine what to display based on category filter
    if ($selectedCategory) {
        $filtered = $allPosts->filter(function($item) use ($selectedCategory) {
            return \Illuminate\Support\Str::slug($item->category) === $selectedCategory;
        })->values();
        
        $displayFeatured = null;
        $displayGrid = $filtered;
    } else {
        $displayFeatured = $featuredPost;
        $displayGrid = $posts;
    }
@endphp

<style>
    :root {
        --blog-green-900: #12372A;
        --blog-green-700: #1F5D45;
        --blog-green-100: #E2ECE6;
        --blog-green-50: #EEF5F0;
        --blog-green-25: #F6FAF7;
        --blog-gold: #D97706;
        --blog-ink: #111827;
        --blog-muted: #4B5563;
        --blog-border: #E5E7EB;
        --blog-white: #FFFFFF;
    }

    .blog-page {
        background: var(--blog-white);
        color: var(--blog-ink);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        -webkit-font-smoothing: antialiased;
    }

    .blog-shell {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 28px;
    }

    /* Hero Section */
    .blog-hero {
        padding: 80px 0 48px;
        background: linear-gradient(180deg, var(--blog-green-25) 0%, var(--blog-white) 100%);
        text-align: center;
        border-bottom: 1px solid var(--blog-border);
    }
    
    .blog-eyebrow {
        display: inline-block;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        color: var(--blog-gold);
        letter-spacing: 0.2em;
        margin-bottom: 16px;
    }

    .blog-hero h1 {
        font-family: 'Science Gothic', 'Inter', sans-serif;
        font-size: clamp(36px, 5vw, 56px);
        font-weight: 800;
        color: var(--blog-green-900);
        margin: 0 0 16px;
        line-height: 1.1;
        letter-spacing: -0.02em;
    }

    .blog-hero p {
        font-size: clamp(16px, 2vw, 18px);
        color: var(--blog-muted);
        max-width: 680px;
        margin: 0 auto 36px;
        line-height: 1.6;
    }

    /* Category Navigation */
    .blog-categories-wrap {
        display: flex;
        overflow-x: auto;
        padding: 4px 16px;
        margin-top: 10px;
        -webkit-overflow-scrolling: touch;
    }

    .blog-categories-wrap::-webkit-scrollbar {
        display: none;
    }

    .blog-categories {
        display: flex;
        gap: 8px;
        flex-wrap: nowrap;
        margin: 0 auto;
    }

    .blog-cat-link {
        display: inline-block;
        padding: 10px 20px;
        border-radius: 40px;
        font-size: 13px;
        font-weight: 700;
        color: var(--blog-green-900);
        background: #fff;
        border: 1px solid var(--blog-border);
        text-decoration: none;
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        white-space: nowrap;
    }

    .blog-cat-link:hover {
        border-color: var(--blog-green-900);
        background: var(--blog-green-25);
        transform: translateY(-1px);
    }

    .blog-cat-link.is-active {
        color: #fff;
        background: var(--blog-green-900);
        border-color: var(--blog-green-900);
        box-shadow: 0 4px 12px rgba(18, 55, 42, 0.15);
    }

    /* Featured Section */
    .blog-section {
        padding: 70px 0;
    }
    
    .blog-section-title {
        font-family: 'Science Gothic', 'Inter', sans-serif;
        font-size: 24px;
        font-weight: 800;
        color: var(--blog-green-900);
        margin: 0 0 32px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .blog-section-title::after {
        content: "";
        flex-grow: 1;
        height: 1px;
        background: var(--blog-border);
    }

    .blog-featured-split {
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        gap: 40px;
        align-items: center;
        background: #fff;
        border: 1px solid var(--blog-border);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        transition: box-shadow 0.3s ease, border-color 0.3s ease;
    }

    .blog-featured-split:hover {
        border-color: rgba(18, 55, 42, 0.15);
        box-shadow: 0 20px 40px rgba(18, 55, 42, 0.08);
    }

    .blog-featured-image-wrap {
        overflow: hidden;
        height: 440px;
        position: relative;
    }

    .blog-featured-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .blog-featured-split:hover .blog-featured-image {
        transform: scale(1.03);
    }

    .blog-featured-content {
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .blog-tag {
        display: inline-block;
        align-self: flex-start;
        padding: 4px 10px;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        color: var(--blog-green-900);
        background: var(--blog-green-50);
        border: 1px solid var(--blog-green-100);
        letter-spacing: 0.05em;
        margin-bottom: 20px;
    }

    .blog-featured-content h2 {
        font-family: 'Science Gothic', 'Inter', sans-serif;
        font-size: clamp(24px, 3.5vw, 36px);
        font-weight: 800;
        color: var(--blog-green-900);
        line-height: 1.2;
        margin: 0 0 16px;
    }

    .blog-featured-content p {
        font-size: 15px;
        color: var(--blog-muted);
        line-height: 1.7;
        margin: 0 0 28px;
    }

    .blog-meta-row {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 13px;
        color: var(--blog-muted);
        margin-bottom: 24px;
    }

    .blog-meta-dot {
        width: 4px;
        height: 4px;
        background: var(--blog-border);
        border-radius: 50%;
    }

    .blog-btn-editorial {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        font-weight: 700;
        color: var(--blog-green-900);
        text-decoration: none;
        transition: color 0.2s ease, transform 0.2s ease;
    }

    .blog-btn-editorial i {
        font-size: 12px;
        transition: transform 0.2s ease;
    }

    .blog-btn-editorial:hover {
        color: var(--blog-gold);
    }
    
    .blog-btn-editorial:hover i {
        transform: translateX(4px);
    }

    /* Grid Section */
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 30px;
    }

    .blog-card {
        display: flex;
        flex-direction: column;
        background: #fff;
        border: 1px solid var(--blog-border);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .blog-card:hover {
        transform: translateY(-4px);
        border-color: rgba(18, 55, 42, 0.15);
        box-shadow: 0 16px 36px rgba(18, 55, 42, 0.08);
    }

    .blog-card-image-wrap {
        height: 220px;
        overflow: hidden;
        position: relative;
    }

    .blog-card-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .blog-card:hover .blog-card-image {
        transform: scale(1.04);
    }

    .blog-card-body {
        padding: 24px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .blog-card h3 {
        font-family: 'Science Gothic', 'Inter', sans-serif;
        font-size: 20px;
        font-weight: 800;
        color: var(--blog-green-900);
        line-height: 1.3;
        margin: 0 0 12px;
    }

    .blog-card p {
        font-size: 14px;
        color: var(--blog-muted);
        line-height: 1.6;
        margin: 0 0 20px;
        flex-grow: 1;
    }

    /* Empty state */
    .blog-empty {
        padding: 80px 24px;
        text-align: center;
        background: var(--blog-green-25);
        border: 1px dashed var(--blog-border);
    }

    .blog-empty i {
        font-size: 40px;
        color: var(--blog-green-700);
        margin-bottom: 16px;
    }

    .blog-empty h3 {
        font-family: 'Science Gothic', 'Inter', sans-serif;
        font-size: 22px;
        margin: 0 0 8px;
        color: var(--blog-green-900);
    }

    .blog-empty p {
        color: var(--blog-muted);
        font-size: 14px;
        max-width: 400px;
        margin: 0 auto 24px;
    }

    /* CTA Section */
    .blog-cta-section {
        padding: 90px 0 110px;
    }

    .blog-cta-card {
        background: linear-gradient(135deg, var(--blog-green-900) 0%, #0d281e 100%);
        padding: 60px;
        text-align: center;
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .blog-cta-card::before {
        content: "";
        position: absolute;
        top: 0; right: 0; bottom: 0; left: 0;
        background: radial-gradient(circle at 80% 20%, rgba(217, 119, 6, 0.15) 0%, transparent 60%);
        pointer-events: none;
    }

    .blog-cta-card h2 {
        font-family: 'Science Gothic', 'Inter', sans-serif;
        font-size: clamp(26px, 3.5vw, 38px);
        font-weight: 800;
        margin: 0 0 14px;
        color: #fff;
    }

    .blog-cta-card p {
        font-size: 16px;
        color: #e2ece6;
        max-width: 600px;
        margin: 0 auto 30px;
        line-height: 1.6;
        opacity: 0.9;
    }

    .blog-cta-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 14px 28px;
        border: 2px solid #fff;
        color: #fff;
        font-weight: 700;
        font-size: 15px;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .blog-cta-btn:hover {
        background: #fff;
        color: var(--blog-green-900);
        box-shadow: 0 10px 25px rgba(0,0,0,0.25);
    }

    @media (max-width: 960px) {
        .blog-featured-split {
            grid-template-columns: 1fr;
        }
        .blog-featured-image-wrap {
            height: 300px;
        }
        .blog-featured-content {
            padding: 30px;
        }
        .blog-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 640px) {
        .blog-hero {
            padding: 60px 0 36px;
        }
        .blog-section {
            padding: 50px 0;
        }
        .blog-grid {
            grid-template-columns: 1fr;
        }
        .blog-cta-card {
            padding: 40px 20px;
        }
    }
</style>

<div class="blog-page">
    <!-- Hero header -->
    <section class="blog-hero">
        <div class="blog-shell">
            <span class="blog-eyebrow">Insights & Intelligence</span>
            <h1>KUVUO Journal</h1>
            <p>Expert guides, equipment comparisons, and operations maintenance tips from the KUVUO heavy machinery team.</p>
            
            <!-- Category Pills -->
            <div class="blog-categories-wrap">
                <div class="blog-categories">
                    <a href="{{ route('blog') }}" class="blog-cat-link @if(!$selectedCategory) is-active @endif">
                        All Stories
                    </a>
                    @foreach ($categories as $cat)
                        <a href="{{ route('blog', ['category' => $cat->slug]) }}" 
                           class="blog-cat-link @if($selectedCategory === $cat->slug) is-active @endif">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Post -->
    @if ($displayFeatured)
        <section class="blog-section" style="padding-bottom: 35px;">
            <div class="blog-shell">
                <div class="blog-section-title">Featured Story</div>
                
                <article class="blog-featured-split">
                    <div class="blog-featured-image-wrap">
                        <img src="{{ $displayFeatured->featured_image ?: 'https://placehold.co/960x720/EEF5F0/12372A?text=KUVUO+Journal' }}" 
                             alt="{{ $displayFeatured->title }}" 
                             class="blog-featured-image">
                    </div>
                    <div class="blog-featured-content">
                        <span class="blog-tag">{{ $displayFeatured->category }}</span>
                        <h2>{{ $displayFeatured->title }}</h2>
                        
                        <div class="blog-meta-row">
                            <span>By KUVUO Team</span>
                            <div class="blog-meta-dot"></div>
                            <span>{{ $displayFeatured->published_at?->format('M d, Y') ?? 'Recently' }}</span>
                        </div>
                        
                        <p>{{ $displayFeatured->excerptText(220) }}</p>
                        
                        <a href="{{ route('blog.details', $displayFeatured->slug) }}" class="blog-btn-editorial">
                            Read Full Guide <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>
        </section>
    @endif

    <!-- Articles Grid -->
    <section class="blog-section" style="padding-top: 35px;">
        <div class="blog-shell">
            <div class="blog-section-title">
                @if($selectedCategory)
                    Category: {{ $allPosts->firstWhere(fn($p) => \Illuminate\Support\Str::slug($p->category) === $selectedCategory)->category ?? 'Articles' }}
                @else
                    Latest Updates
                @endif
            </div>

            @if ($displayGrid->isNotEmpty())
                <div class="blog-grid">
                    @foreach ($displayGrid as $post)
                        <article class="blog-card">
                            <div class="blog-card-image-wrap">
                                <img src="{{ $post->featured_image ?: 'https://placehold.co/960x720/EEF5F0/12372A?text=KUVUO+Journal' }}" 
                                     alt="{{ $post->title }}" 
                                     class="blog-card-image">
                            </div>
                            <div class="blog-card-body">
                                <span class="blog-tag" style="margin-bottom: 12px; font-size: 10px; padding: 2px 8px;">
                                    {{ $post->category }}
                                </span>
                                
                                <h3>{{ $post->title }}</h3>
                                
                                <div class="blog-meta-row" style="margin-bottom: 14px; font-size: 12px;">
                                    <span>{{ $post->published_at?->format('M d, Y') ?? 'Recently' }}</span>
                                </div>
                                
                                <p>{{ $post->excerptText(130) }}</p>
                                
                                <a href="{{ route('blog.details', $post->slug) }}" class="blog-btn-editorial" style="font-size: 13px;">
                                    Read Article <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="blog-empty">
                    <i class="fa-regular fa-newspaper"></i>
                    <h3>No articles found</h3>
                    <p>There are no published articles under this category yet. Please check back later or view all stories.</p>
                    <a href="{{ route('blog') }}" class="blog-cat-link is-active" style="display: inline-block;">
                        Back to All Stories
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Support CTA -->
    <section class="blog-cta-section">
        <div class="blog-shell">
            <div class="blog-cta-card">
                <h2>Looking for Equipment Specs or Pricing?</h2>
                <p>Browse our catalog of premium mini excavators and attachments or speak directly to a specialist today.</p>
                <div style="display: flex; justify-content: center; gap: 14px; flex-wrap: wrap;">
                    <a href="{{ route('shop') }}" class="blog-cta-btn" style="background:#fff; color:var(--blog-green-900);">
                        View Products Catalog
                    </a>
                    <a href="{{ route('contact') }}" class="blog-cta-btn">
                        Get in Touch
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
