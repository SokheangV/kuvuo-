<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = Post::published()
            ->orderByDesc('is_featured')
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->get();

        $featuredPost = $posts->firstWhere('is_featured', true) ?? $posts->first();
        $listPosts = $featuredPost
            ? $posts->reject(fn (Post $post) => $post->is($featuredPost))->values()
            : collect();

        return view('blog', [
            'featuredPost' => $featuredPost,
            'posts' => $listPosts,
        ]);
    }

    public function show(string $slug): View
    {
        $post = Post::published()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('blog-details', compact('post'));
    }

    public function adminIndex(): View
    {
        $search = request()->string('search')->trim()->toString();
        $status = request('status');

        $posts = Post::query()
            ->when($search !== '', function (Builder $query) use ($search) {
                $query->where(function (Builder $query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('category', 'like', '%' . $search . '%')
                        ->orWhere('slug', 'like', '%' . $search . '%');
                });
            })
            ->when(in_array($status, ['draft', 'published'], true), fn (Builder $query) => $query->where('status', $status))
            ->orderByDesc('published_at')
            ->orderByDesc('updated_at')
            ->paginate(15);

        $posts->withQueryString();

        $stats = [
            'total' => Post::count(),
            'published' => Post::where('status', 'published')->count(),
            'drafts' => Post::where('status', 'draft')->count(),
            'featured' => Post::where('is_featured', true)->count(),
        ];

        return view('admin.blog-posts.index', compact('posts', 'stats', 'search', 'status'));
    }

    public function create(): View
    {
        return view('admin.blog-posts.form', [
            'post' => new Post([
                'status' => 'draft',
                'featured_image' => '',
                'excerpt' => '',
                'content' => '',
            ]),
            'formAction' => route('admin.blog-posts.store'),
            'formMethod' => 'POST',
            'pageTitle' => 'Create Blog Post',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $post = new Post();

        $this->savePost($post, $request);

        return redirect()
            ->route('admin.blog-posts.index')
            ->with('success', 'Blog post created successfully.');
    }

    public function edit(Post $post): View
    {
        return view('admin.blog-posts.form', [
            'post' => $post,
            'formAction' => route('admin.blog-posts.update', $post),
            'formMethod' => 'PUT',
            'pageTitle' => 'Edit Blog Post',
        ]);
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $this->savePost($post, $request);

        return redirect()
            ->route('admin.blog-posts.index')
            ->with('success', 'Blog post updated successfully.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()
            ->route('admin.blog-posts.index')
            ->with('success', 'Blog post deleted successfully.');
    }

    private function savePost(Post $post, Request $request): void
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:120'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'featured_image' => ['nullable', 'url', 'max:2048'],
            'content' => ['required', 'string'],
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $data['slug'] = $this->uniqueSlug($data['title'], $post->id);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['featured_image'] = $data['featured_image'] ?: null;
        $data['excerpt'] = $data['excerpt'] ?: null;

        if ($data['status'] === 'published') {
            $data['published_at'] = ! empty($data['published_at'])
                ? Carbon::parse($data['published_at'])
                : ($post->published_at ?? now());
        } else {
            $data['published_at'] = ! empty($data['published_at'])
                ? Carbon::parse($data['published_at'])
                : null;
        }

        $post->fill($data)->save();

        if ($post->is_featured) {
            Post::query()
                ->whereKeyNot($post->id)
                ->update(['is_featured' => false]);
        }
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title) ?: 'blog-post';
        $slug = $base;
        $counter = 2;

        while (
            Post::query()
                ->when($ignoreId, fn ($query) => $query->whereKeyNot($ignoreId))
                ->where('slug', $slug)
                ->exists()
        ) {
            $slug = $base . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
