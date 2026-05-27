@extends('layouts.app')

@section('content')
<style>
    .ablog-page,
    .ablog-page * { box-sizing: border-box; }
    .ablog-page {
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
    .ablog-shell { max-width: 1320px; margin: 0 auto; padding: 64px 28px 88px; }
    .ablog-head { display: flex; justify-content: space-between; align-items: end; gap: 24px; margin-bottom: 28px; }
    .ablog-head h1 {
        margin: 0 0 10px;
        font-family: 'Science Gothic', Arial, sans-serif;
        font-size: clamp(30px, 3vw, 42px);
        line-height: 1.08;
    }
    .ablog-head p { margin: 0; color: var(--muted); line-height: 1.7; max-width: 640px; }
    .ablog-head-actions { display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }
    .ablog-btn {
        display: inline-flex; align-items: center; justify-content: center;
        padding: 14px 22px; background: var(--green); color: #fff; text-decoration: none;
        border: 1px solid var(--green); font-weight: 700;
    }
    .ablog-btn:hover { background: var(--green-mid); border-color: var(--green-mid); }
    .ablog-logout {
        display: inline-flex; align-items: center; justify-content: center;
        padding: 14px 18px; background: #fff; color: var(--green);
        border: 1px solid var(--border); font: inherit; font-weight: 700; cursor: pointer;
    }
    .ablog-logout:hover { border-color: var(--green); }
    .ablog-flash {
        margin-bottom: 20px; padding: 14px 16px; border: 1px solid var(--border);
        background: var(--soft); color: var(--green); font-weight: 700;
    }
    .ablog-table-wrap { border: 1px solid var(--border); overflow: hidden; }
    .ablog-table { width: 100%; border-collapse: collapse; background: #fff; }
    .ablog-table th, .ablog-table td { padding: 16px 18px; text-align: left; border-bottom: 1px solid var(--border); vertical-align: top; }
    .ablog-table th {
        font-size: 12px; letter-spacing: 0.12em; text-transform: uppercase; color: var(--green);
        background: var(--soft);
    }
    .ablog-table td { font-size: 14px; color: var(--text); }
    .ablog-table tr:last-child td { border-bottom: none; }
    .ablog-title { font-weight: 800; margin-bottom: 4px; }
    .ablog-meta { color: var(--muted); font-size: 13px; line-height: 1.55; }
    .ablog-badge {
        display: inline-flex; align-items: center; padding: 6px 10px; border: 1px solid var(--border);
        font-size: 12px; font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase;
    }
    .ablog-badge.published { color: var(--green); background: var(--soft); }
    .ablog-badge.draft { color: var(--muted); background: #fff; }
    .ablog-featured { color: #B7791F; font-weight: 800; font-size: 12px; letter-spacing: 0.08em; text-transform: uppercase; }
    .ablog-actions { display: flex; gap: 10px; flex-wrap: wrap; }
    .ablog-link, .ablog-delete {
        border: 1px solid var(--border); background: #fff; color: var(--green); text-decoration: none;
        padding: 8px 12px; font: inherit; font-weight: 700; cursor: pointer;
    }
    .ablog-link:hover, .ablog-delete:hover { border-color: var(--green); }
    .ablog-empty {
        padding: 36px 28px; text-align: center; color: var(--muted); border: 1px solid var(--border);
    }
    .ablog-pagination { margin-top: 22px; }
    @media (max-width: 840px) {
        .ablog-shell { padding: 48px 18px 72px; }
        .ablog-head { flex-direction: column; align-items: start; }
        .ablog-table-wrap { overflow-x: auto; }
        .ablog-table { min-width: 860px; }
    }
</style>

<div class="ablog-page">
    <div class="ablog-shell">
        <div class="ablog-head">
            <div>
                <h1>Blog Posts</h1>
                <p>Create, edit, publish, and feature blog posts from one place. Published posts appear automatically on the public blog page.</p>
            </div>
            <div class="ablog-head-actions">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="ablog-logout">Logout</button>
                </form>
                <a href="{{ route('admin.blog-posts.create') }}" class="ablog-btn">Create Post</a>
            </div>
        </div>

        @if (session('success'))
            <div class="ablog-flash">{{ session('success') }}</div>
        @endif

        @if ($posts->isEmpty())
            <div class="ablog-empty">
                No blog posts yet. Create your first one and it will show up on the blog page once published.
            </div>
        @else
            <div class="ablog-table-wrap">
                <table class="ablog-table">
                    <thead>
                        <tr>
                            <th>Post</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Published</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>
                                    <div class="ablog-title">{{ $post->title }}</div>
                                    <div class="ablog-meta">Slug: {{ $post->slug }}</div>
                                    @if ($post->is_featured)
                                        <div class="ablog-featured">Featured Post</div>
                                    @endif
                                </td>
                                <td>{{ $post->category }}</td>
                                <td>
                                    <span class="ablog-badge {{ $post->status }}">
                                        {{ $post->status }}
                                    </span>
                                </td>
                                <td>{{ $post->published_at?->format('M d, Y H:i') ?? 'Not scheduled' }}</td>
                                <td>
                                    <div class="ablog-actions">
                                        <a href="{{ route('admin.blog-posts.edit', $post) }}" class="ablog-link">Edit</a>
                                        @if ($post->status === 'published')
                                            <a href="{{ route('blog.details', $post->slug) }}" class="ablog-link" target="_blank" rel="noopener noreferrer">View</a>
                                        @endif
                                        <form method="POST" action="{{ route('admin.blog-posts.destroy', $post) }}" onsubmit="return confirm('Delete this blog post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ablog-delete">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="ablog-pagination">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
