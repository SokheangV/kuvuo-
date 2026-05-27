@extends('layouts.app')

@section('content')
<style>
    .ablog-form-page,
    .ablog-form-page * { box-sizing: border-box; }
    .ablog-form-page {
        --green: #12372A;
        --green-mid: #1F5D45;
        --soft: #F6FAF7;
        --border: #D7DED9;
        --text: #111827;
        --muted: #6B7280;
        background: #fff;
        color: var(--text);
        font-family: 'Nunito', Arial, sans-serif;
    }
    .ablog-form-shell { max-width: 1080px; margin: 0 auto; padding: 64px 28px 88px; }
    .ablog-form-head { margin-bottom: 28px; }
    .ablog-form-head-top { display: flex; justify-content: space-between; align-items: start; gap: 16px; flex-wrap: wrap; margin-bottom: 10px; }
    .ablog-form-head h1 {
        margin: 0;
        font-family: 'Science Gothic', Arial, sans-serif;
        font-size: clamp(30px, 3vw, 42px);
        line-height: 1.08;
    }
    .ablog-form-head p { margin: 0; color: var(--muted); line-height: 1.7; }
    .ablog-logout {
        display: inline-flex; align-items: center; justify-content: center; padding: 14px 18px;
        background: #fff; border: 1px solid var(--border); color: var(--green);
        text-decoration: none; font: inherit; font-weight: 700; cursor: pointer;
    }
    .ablog-logout:hover { border-color: var(--green); }
    .ablog-errors {
        margin-bottom: 20px; padding: 14px 16px; border: 1px solid rgba(185, 28, 28, 0.2);
        background: #FFF1F2; color: #991B1B;
    }
    .ablog-errors ul { margin: 8px 0 0 18px; }
    .ablog-card {
        border: 1px solid var(--border); background: #fff; padding: 28px;
    }
    .ablog-grid {
        display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px;
    }
    .ablog-field { display: grid; gap: 8px; }
    .ablog-field.full { grid-column: 1 / -1; }
    .ablog-field label {
        color: var(--text); font-size: 12px; font-weight: 800; letter-spacing: 0.12em; text-transform: uppercase;
    }
    .ablog-field input,
    .ablog-field select,
    .ablog-field textarea {
        width: 100%; min-width: 0; padding: 14px 16px; border: 1px solid var(--border);
        background: #fff; color: var(--text); font: inherit; outline: none;
    }
    .ablog-field input:focus,
    .ablog-field select:focus,
    .ablog-field textarea:focus {
        border-color: var(--green); box-shadow: 0 0 0 4px rgba(18, 55, 42, 0.08);
    }
    .ablog-field textarea { min-height: 160px; resize: vertical; }
    .ablog-checkbox {
        display: flex; align-items: center; gap: 10px; margin-top: 8px; color: var(--text); font-weight: 700;
    }
    .ablog-checkbox input { width: 18px; height: 18px; }
    .ablog-actions {
        display: flex; gap: 12px; flex-wrap: wrap; margin-top: 24px;
    }
    .ablog-btn, .ablog-secondary {
        display: inline-flex; align-items: center; justify-content: center; padding: 14px 22px;
        text-decoration: none; font-weight: 700; font: inherit;
    }
    .ablog-btn { background: var(--green); border: 1px solid var(--green); color: #fff; cursor: pointer; }
    .ablog-btn:hover { background: var(--green-mid); border-color: var(--green-mid); }
    .ablog-secondary { background: #fff; border: 1px solid var(--border); color: var(--green); }
    .ablog-secondary:hover { border-color: var(--green); }
    .ablog-help { margin-top: 16px; color: var(--muted); font-size: 14px; line-height: 1.7; }
    @media (max-width: 768px) {
        .ablog-form-shell { padding: 48px 18px 72px; }
        .ablog-card { padding: 22px; }
        .ablog-grid { grid-template-columns: 1fr; }
    }
</style>

<div class="ablog-form-page">
    <div class="ablog-form-shell">
        <div class="ablog-form-head">
            <div class="ablog-form-head-top">
                <h1>{{ $pageTitle }}</h1>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="ablog-logout">Logout</button>
                </form>
            </div>
            <p>Fill in the article details below. When the post status is set to published, it will appear on the public blog page automatically.</p>
        </div>

        @if ($errors->any())
            <div class="ablog-errors">
                Please review the form and fix the following issues:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="ablog-card">
            <form method="POST" action="{{ $formAction }}">
                @csrf
                @if ($formMethod !== 'POST')
                    @method($formMethod)
                @endif

                <div class="ablog-grid">
                    <div class="ablog-field full">
                        <label for="post-title">Title</label>
                        <input id="post-title" type="text" name="title" value="{{ old('title', $post->title) }}" required>
                    </div>

                    <div class="ablog-field">
                        <label for="post-category">Category</label>
                        <input id="post-category" type="text" name="category" value="{{ old('category', $post->category) }}" required>
                    </div>

                    <div class="ablog-field">
                        <label for="post-status">Status</label>
                        <select id="post-status" name="status" required>
                            <option value="draft" @selected(old('status', $post->status) === 'draft')>Draft</option>
                            <option value="published" @selected(old('status', $post->status) === 'published')>Published</option>
                        </select>
                    </div>

                    <div class="ablog-field full">
                        <label for="post-image">Featured Image URL</label>
                        <input id="post-image" type="url" name="featured_image" value="{{ old('featured_image', $post->featured_image) }}" placeholder="https://example.com/image.jpg">
                    </div>

                    <div class="ablog-field full">
                        <label for="post-excerpt">Excerpt</label>
                        <textarea id="post-excerpt" name="excerpt" placeholder="Optional short summary shown on the blog page.">{{ old('excerpt', $post->excerpt) }}</textarea>
                    </div>

                    <div class="ablog-field full">
                        <label for="post-content">Content (HTML allowed)</label>
                        <textarea id="post-content" name="content" required placeholder="<p>Your blog content here...</p>">{{ old('content', $post->content) }}</textarea>
                    </div>

                    <div class="ablog-field">
                        <label for="post-published-at">Publish Date</label>
                        <input
                            id="post-published-at"
                            type="datetime-local"
                            name="published_at"
                            value="{{ old('published_at', $post->published_at?->format('Y-m-d\\TH:i')) }}"
                        >
                    </div>

                    <div class="ablog-field">
                        <label>Featured Post</label>
                        <label class="ablog-checkbox">
                            <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $post->is_featured))>
                            Mark this article as the featured blog post
                        </label>
                    </div>
                </div>

                <div class="ablog-actions">
                    <button type="submit" class="ablog-btn">Save Post</button>
                    <a href="{{ route('admin.blog-posts.index') }}" class="ablog-secondary">Back to Posts</a>
                    @if ($post->exists && $post->status === 'published')
                        <a href="{{ route('blog.details', $post->slug) }}" class="ablog-secondary" target="_blank" rel="noopener noreferrer">View Public Post</a>
                    @endif
                </div>

                <p class="ablog-help">
                    Tip: if you leave the excerpt blank, the blog pages will automatically generate a short summary from the content.
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
