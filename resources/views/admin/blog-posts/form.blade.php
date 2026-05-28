@extends('layouts.admin')

@section('title', 'KUVUO CMS - ' . $pageTitle)
@section('cms_title', $pageTitle)
@section('cms_subtitle', 'Fill in the article details below. When the post status is set to published, it will appear on the public blog page automatically.')

@section('cms_content')
<style>
    .cms-btn-primary {
        display: inline-flex; align-items: center; justify-content: center;
        padding: 12px 20px; background: var(--cms-green-900); color: #fff; text-decoration: none;
        border: 1px solid var(--cms-green-900); font-weight: 700; transition: background-color .15s ease;
        font-size: 14px; cursor: pointer;
    }
    .cms-btn-primary:hover { background: var(--cms-green-700); border-color: var(--cms-green-700); }
    
    .cms-btn-secondary {
        display: inline-flex; align-items: center; justify-content: center;
        padding: 12px 20px; background: #fff; color: var(--cms-green-900); text-decoration: none;
        border: 1px solid var(--cms-border); font-weight: 700; transition: border-color .15s ease, background-color .15s ease;
        font-size: 14px; cursor: pointer;
    }
    .cms-btn-secondary:hover { border-color: var(--cms-green-900); background: var(--cms-green-25); }

    .cms-card {
        background: var(--cms-white);
        border: 1px solid var(--cms-border);
        padding: 28px;
        margin-bottom: 24px;
        box-shadow: var(--cms-shadow);
    }

    .cms-errors {
        margin-bottom: 20px; padding: 14px 16px; border: 1px solid rgba(185, 28, 28, 0.2);
        background: #FFF1F2; color: #991B1B; font-weight: 600;
    }
    .cms-errors ul { margin: 8px 0 0 18px; font-weight: normal; }

    .cms-grid {
        display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 20px;
    }
    .cms-field { display: grid; gap: 8px; }
    .cms-field.full { grid-column: 1 / -1; }
    .cms-field label {
        color: var(--cms-ink); font-size: 12px; font-weight: 800; letter-spacing: 0.12em; text-transform: uppercase;
    }
    .cms-field input,
    .cms-field select,
    .cms-field textarea {
        width: 100%; min-width: 0; padding: 14px 16px; border: 1px solid var(--cms-border);
        background: #fff; color: var(--cms-ink); font: inherit; outline: none;
    }
    .cms-field input:focus,
    .cms-field select:focus,
    .cms-field textarea:focus {
        border-color: var(--cms-green-900); box-shadow: 0 0 0 4px rgba(18, 55, 42, 0.08);
    }
    .cms-field textarea { min-height: 140px; resize: vertical; }
    .cms-field textarea#post-content { min-height: 280px; }
    .cms-checkbox {
        display: flex; align-items: center; gap: 10px; margin-top: 8px; color: var(--cms-ink); font-weight: 700;
        cursor: pointer;
    }
    .cms-checkbox input { width: 18px; height: 18px; cursor: pointer; }
    
    .cms-actions {
        display: flex; gap: 12px; flex-wrap: wrap; margin-top: 28px; padding-top: 20px;
        border-top: 1px solid var(--cms-border);
    }
</style>

@if ($errors->any())
    <div class="cms-errors">
        Please review the form and fix the following issues:
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="cms-card">
    <form method="POST" action="{{ $formAction }}">
        @csrf
        @if ($formMethod !== 'POST')
            @method($formMethod)
        @endif

        <div class="cms-grid">
            <div class="cms-field full">
                <label for="post-title">Title</label>
                <input id="post-title" type="text" name="title" value="{{ old('title', $post->title) }}" required placeholder="e.g. 5 Maintenance Habits for Mini Excavators">
            </div>

            <div class="cms-field">
                <label for="post-category">Category</label>
                <input id="post-category" type="text" name="category" value="{{ old('category', $post->category) }}" required placeholder="e.g. Maintenance & Repair">
            </div>

            <div class="cms-field">
                <label for="post-status">Status</label>
                <select id="post-status" name="status" required>
                    <option value="draft" @selected(old('status', $post->status) === 'draft')>Draft</option>
                    <option value="published" @selected(old('status', $post->status) === 'published')>Published</option>
                </select>
            </div>

            <div class="cms-field full">
                <label for="post-image">Featured Image URL</label>
                <input id="post-image" type="url" name="featured_image" value="{{ old('featured_image', $post->featured_image) }}" placeholder="https://example.com/images/blog-banner.jpg">
            </div>

            <div class="cms-field full">
                <label for="post-excerpt">Excerpt (Short Summary)</label>
                <textarea id="post-excerpt" name="excerpt" placeholder="Optional. Write a brief hook for your readers. If left blank, one will be generated automatically from the content.">{{ old('excerpt', $post->excerpt) }}</textarea>
            </div>

            <div class="cms-field full">
                <label for="post-content">Content (HTML tags allowed)</label>
                <textarea id="post-content" name="content" required placeholder="<p>Write your detailed blog post content here...</p>">{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="cms-field">
                <label for="post-published-at">Publish Date & Time</label>
                <input
                    id="post-published-at"
                    type="datetime-local"
                    name="published_at"
                    value="{{ old('published_at', $post->published_at?->format('Y-m-d\\TH:i')) }}"
                >
            </div>

            <div class="cms-field">
                <label>Featured Article</label>
                <label class="cms-checkbox">
                    <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $post->is_featured))>
                    <span>Highlight this article as the main featured post</span>
                </label>
            </div>
        </div>

        <div class="cms-actions">
            <button type="submit" class="cms-btn-primary">Save Blog Post</button>
            <a href="{{ route('admin.blog-posts.index') }}" class="cms-btn-secondary">Cancel</a>
            @if ($post->exists && $post->status === 'published')
                <a href="{{ route('blog.details', $post->slug) }}" class="cms-btn-secondary" target="_blank" rel="noopener noreferrer">View Live Post</a>
            @endif
        </div>
    </form>
</div>
@endsection
