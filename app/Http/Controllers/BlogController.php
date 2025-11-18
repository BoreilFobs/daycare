<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\PageSection;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogPost::where('is_published', true)
            ->where('published_at', '<=', now())
            ->with('author');

        // Category filter
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        // Search filter
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('excerpt', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        $blogPosts = $query->orderBy('published_at', 'desc')->paginate(9);

        $categories = BlogPost::where('is_published', true)
            ->distinct()
            ->pluck('category')
            ->filter();

        $recentPosts = BlogPost::where('is_published', true)
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        return view('pages.blog', compact('blogPosts', 'categories', 'recentPosts'));
    }

    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)
            ->where('is_published', true)
            ->where('published_at', '<=', now())
            ->with(['author', 'approvedComments'])
            ->firstOrFail();

        // Increment views
        $post->increment('views');

        $relatedPosts = BlogPost::where('is_published', true)
            ->where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $recentPosts = BlogPost::where('is_published', true)
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        return view('pages.blog-detail', compact('post', 'relatedPosts', 'recentPosts'));
    }

    /**
     * Store a new comment for a blog post
     */
    public function storeComment(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'author_name' => 'required|string|max:255',
            'author_email' => 'required|email|max:255',
            'content' => 'required|string|max:1000',
        ]);

        \App\Models\Comment::create([
            'blog_post_id' => $blog->id,
            'name' => $validated['author_name'],
            'email' => $validated['author_email'],
            'comment' => $validated['content'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'pending', // Comments need approval
        ]);

        return redirect()
            ->route('blog.show', $blog->slug)
            ->with('success', 'Thank you for your comment! It will be published after review.');
    }
}
