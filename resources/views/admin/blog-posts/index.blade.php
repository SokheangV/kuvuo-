@extends('layouts.admin')

@section('title', 'KUVUO CMS - Blog Posts')
@section('cms_title', 'Blog Posts')
@section('cms_subtitle', 'Create, edit, publish, and feature blog posts from one place.')

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
        padding: 24px;
        margin-bottom: 24px;
        box-shadow: var(--cms-shadow);
    }

    .cms-filters {
        display: flex;
        gap: 12px;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }
    .cms-filters form {
        display: flex;
        gap: 12px;
        flex-grow: 1;
        flex-wrap: wrap;
    }
    .cms-input {
        padding: 10px 14px;
        border: 1px solid var(--cms-border);
        font: inherit;
        outline: none;
        min-width: 240px;
        background: #fff;
    }
    .cms-input:focus {
        border-color: var(--cms-green-900);
        box-shadow: 0 0 0 3px rgba(18, 55, 42, 0.08);
    }
    .cms-select {
        padding: 10px 14px;
        border: 1px solid var(--cms-border);
        font: inherit;
        outline: none;
        background: #fff;
    }
    .cms-select:focus {
        border-color: var(--cms-green-900);
        box-shadow: 0 0 0 3px rgba(18, 55, 42, 0.08);
    }

    .cms-table-wrap {
        border: 1px solid var(--cms-border);
        overflow-x: auto;
        background: var(--cms-white);
    }
    .cms-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }
    .cms-table th, .cms-table td {
        padding: 16px 20px;
        border-bottom: 1px solid var(--cms-border);
        vertical-align: middle;
    }
    .cms-table th {
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--cms-green-900);
        background: var(--cms-green-50);
    }
    .cms-table td {
        font-size: 14px;
    }
    .cms-table tr:hover td {
        background: var(--cms-green-25);
    }

    .cms-badge {
        display: inline-flex;
        align-items: center;
        padding: 4px 8px;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        border: 1px solid var(--cms-border);
    }
    .cms-badge.published {
        color: var(--cms-green-700);
        background: var(--cms-green-50);
        border-color: var(--cms-border-strong);
    }
    .cms-badge.draft {
        color: var(--cms-muted);
        background: #f3f4f6;
    }

    .cms-alert-success {
        padding: 14px 18px;
        background: var(--cms-green-50);
        color: var(--cms-green-900);
        border: 1px solid var(--cms-border-strong);
        margin-bottom: 20px;
        font-weight: 600;
    }
    .cms-pagination {
        margin-top: 24px;
    }
</style>

@if (session('success'))
    <div class="cms-alert-success">{{ session('success') }}</div>
@endif

<div class="cms-card">
    <div class="cms-filters">
        <form method="GET" action="{{ route('admin.blog-posts.index') }}">
            <input type="text" name="search" class="cms-input" placeholder="Search title or category..." value="{{ request('search') }}">
            <select name="status" class="cms-select" onchange="this.form.submit()">
                <option value="">All Statuses</option>
                <option value="published" @selected(request('status') === 'published')>Published</option>
                <option value="draft" @selected(request('status') === 'draft')>Draft</option>
            </select>
            <button type="submit" class="cms-btn-secondary">Filter</button>
            @if(request()->anyFilled(['search', 'status']))
                <a href="{{ route('admin.blog-posts.index') }}" class="cms-btn-secondary" style="border-style: dashed;">Clear</a>
            @endif
        </form>
        <div>
            <a href="{{ route('admin.blog-posts.create') }}" class="cms-btn-primary">Create Post</a>
        </div>
    </div>

    @if ($posts->isEmpty())
        <div style="padding: 50px 20px; text-align: center; color: var(--cms-muted); border: 1px dashed var(--cms-border); background: var(--cms-green-25);">
            <i class="fa-regular fa-folder-open" style="font-size: 32px; color: var(--cms-border-strong); margin-bottom: 12px; display: block;"></i>
            <span style="font-size: 15px; font-weight: 700; display: block; margin-bottom: 4px;">No blog posts found</span>
            <span style="font-size: 13px;">Create your first post or adjust the filters.</span>
        </div>
    @else
        <div class="cms-table-wrap">
            <table class="cms-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Published Date</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                <div style="font-weight: 700; color: var(--cms-ink); margin-bottom: 2px;">{{ $post->title }}</div>
                                <div style="font-size: 12px; color: var(--cms-muted);">Slug: {{ $post->slug }}</div>
                                @if ($post->is_featured)
                                    <span style="font-size: 10px; font-weight: 800; color: var(--cms-accent); background: #fef3c7; border: 1px solid #fde68a; padding: 2px 6px; display: inline-block; margin-top: 4px; text-transform: uppercase;">Featured</span>
                                @endif
                            </td>
                            <td>{{ $post->category }}</td>
                            <td>
                                <span class="cms-badge {{ $post->status }}">
                                    {{ $post->status }}
                                </span>
                            </td>
                            <td>{{ $post->published_at?->format('M d, Y H:i') ?? 'Not published' }}</td>
                            <td>
                                <div style="display: flex; gap: 8px; justify-content: flex-end;">
                                    <a href="{{ route('admin.blog-posts.edit', $post) }}" class="cms-btn-secondary" style="padding: 8px 14px; font-size: 13px;">Edit</a>
                                    @if ($post->status === 'published')
                                        <a href="{{ route('blog.details', $post->slug) }}" class="cms-btn-secondary" style="padding: 8px 14px; font-size: 13px;" target="_blank">View</a>
                                    @endif
                                    <form method="POST" action="{{ route('admin.blog-posts.destroy', $post) }}" onsubmit="return confirm('Are you sure you want to delete this blog post?');" style="margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="cms-btn-secondary" style="padding: 8px 14px; font-size: 13px; color: #dc2626; border-color: rgba(220, 38, 38, 0.2);">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="cms-pagination">
            {{ $posts->links() }}
        </div>
    @endif
</div>
@endsection
