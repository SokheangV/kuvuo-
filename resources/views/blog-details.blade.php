@extends('layouts.app')

@section('content')
<style>
    :root {
        --article-green-900: #12372A;
        --article-green-700: #1F5D45;
        --article-green-50: #EEF5F0;
        --article-green-25: #F6FAF7;
        --article-ink: #111827;
        --article-muted: #6B7280;
        --article-border: #D7DED9;
        --article-accent: #D97706;
        --article-white: #FFFFFF;
    }

    .article-page,
    .article-page * {
        box-sizing: border-box;
    }

    .article-page {
        background: var(--article-white);
        color: var(--article-ink);
        font-family: 'Nunito', Arial, Helvetica, sans-serif;
    }

    .article-shell {
        max-width: 1080px;
        margin: 0 auto;
        padding: 0 28px;
    }

    .article-hero {
        padding: 84px 0 72px;
        background:
            radial-gradient(60% 75% at 100% 0%, var(--article-green-50) 0%, transparent 60%),
            linear-gradient(180deg, var(--article-white) 0%, var(--article-green-25) 100%);
        border-bottom: 1px solid var(--article-border);
    }

    .article-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 6px 12px;
        border: 1px solid var(--article-green-900);
        color: var(--article-green-900);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        background: var(--article-white);
    }

    .article-eyebrow::before {
        content: "";
        width: 8px;
        height: 8px;
        display: block;
        background: var(--article-accent);
    }

    .article-hero h1,
    .article-content h2,
    .article-cta h2 {
        font-family: 'Science Gothic', Arial, Helvetica, sans-serif;
    }

    .article-hero h1 {
        margin: 20px 0 18px;
        font-size: clamp(36px, 4.2vw, 54px);
        line-height: 1.08;
        letter-spacing: -0.02em;
        color: var(--article-ink);
    }

    .article-hero p {
        max-width: 760px;
        color: var(--article-muted);
        font-size: 17px;
        line-height: 1.75;
    }

    .article-image-frame {
        margin-top: 34px;
        overflow: hidden;
        border: 1px solid var(--article-border);
        box-shadow: 0 28px 56px -34px rgba(18, 55, 42, 0.25);
    }

    .article-image-frame img {
        display: block;
        width: 100%;
        height: 520px;
        object-fit: cover;
    }

    .article-content-wrap {
        padding: 72px 0 96px;
    }

    .article-content {
        font-size: 17px;
        line-height: 1.9;
        color: var(--article-ink);
    }

    .article-content h2 {
        margin: 40px 0 16px;
        font-size: clamp(28px, 3vw, 38px);
        line-height: 1.12;
        letter-spacing: -0.02em;
        color: var(--article-ink);
    }

    .article-content p {
        margin: 0 0 18px;
        color: var(--article-muted);
    }

    .article-content ul,
    .article-content ol {
        margin: 0 0 20px 22px;
        color: var(--article-muted);
    }

    .article-content li + li {
        margin-top: 8px;
    }

    .article-cta {
        margin-top: 42px;
        padding: 34px;
        background: var(--article-green-50);
        border: 1px solid var(--article-border);
    }

    .article-cta h2 {
        margin: 0 0 12px;
        font-size: 30px;
        line-height: 1.12;
    }

    .article-cta p {
        margin: 0 0 22px;
        color: var(--article-muted);
        line-height: 1.75;
    }

    .article-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 14px 24px;
        border: 1.5px solid var(--article-green-900);
        background: var(--article-green-900);
        color: var(--article-white);
        text-decoration: none;
        font-family: 'Google Sans', Arial, Helvetica, sans-serif;
        font-size: 15px;
        font-weight: 600;
        transition: background-color .18s ease, border-color .18s ease, transform .12s ease, box-shadow .18s ease;
    }

    .article-button:hover {
        transform: translateY(-1px);
        background: var(--article-green-700);
        border-color: var(--article-green-700);
        box-shadow: 0 10px 24px rgba(18, 55, 42, 0.18);
    }

    @media (max-width: 768px) {
        .article-shell {
            padding: 0 18px;
        }

        .article-hero {
            padding-top: 72px;
            padding-bottom: 60px;
        }

        .article-content-wrap {
            padding-top: 60px;
            padding-bottom: 72px;
        }

        .article-image-frame img {
            height: 320px;
        }

        .article-cta {
            padding: 24px 20px;
        }
    }
</style>

<div class="article-page">
    <section class="article-hero">
        <div class="article-shell">
            <span class="article-eyebrow">{{ $post->category }}</span>
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->excerptText(220) }}</p>

            <div class="article-image-frame">
                <img src="{{ $post->featured_image ?: 'https://placehold.co/1200x720/EEF5F0/12372A?text=KUVUO+Blog' }}" alt="{{ $post->title }}">
            </div>
        </div>
    </section>

    <section class="article-content-wrap">
        <div class="article-shell">
            <div class="article-content">
                {!! $post->content !!}
            </div>

            <div class="article-cta">
                <h2>Need help turning this research into a real quote request?</h2>
                <p>Send the machine category, intended use, or product name to the KUVUO team and we can help you take the next step.</p>
                <a href="{{ route('contact') }}" class="article-button">Contact KUVUO</a>
            </div>
        </div>
    </section>
</div>
@endsection
