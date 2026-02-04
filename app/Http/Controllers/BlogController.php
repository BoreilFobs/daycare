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

        // Tag filter
        if ($request->has('tag') && $request->tag) {
            $query->where('tags', 'like', '%' . $request->tag . '%');
        }

        // Search filter
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('excerpt', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        $posts = $query->orderBy('published_at', 'desc')->paginate(9);

        // Get categories with post counts
        $categories = BlogPost::where('is_published', true)
            ->selectRaw('category as name, category as slug, count(*) as posts_count')
            ->whereNotNull('category')
            ->groupBy('category')
            ->get();

        $recentPosts = BlogPost::where('is_published', true)
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        // Get unique tags
        $tags = collect();
        BlogPost::where('is_published', true)
            ->whereNotNull('tags')
            ->pluck('tags')
            ->each(function($tagString) use ($tags) {
                if ($tagString) {
                    $tagArray = is_array($tagString) ? $tagString : explode(',', $tagString);
                    foreach ($tagArray as $tag) {
                        $tag = trim($tag);
                        if ($tag && !$tags->contains('name', $tag)) {
                            $tags->push((object)['name' => $tag, 'slug' => \Str::slug($tag)]);
                        }
                    }
                }
            });

        return view('pages.blog', compact('posts', 'categories', 'recentPosts', 'tags'));
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

        // Get comments
        $comments = $post->approvedComments ?? collect();

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

        // Get categories with post counts
        $categories = BlogPost::where('is_published', true)
            ->selectRaw('category as name, category as slug, count(*) as posts_count')
            ->whereNotNull('category')
            ->groupBy('category')
            ->get();

        // Get unique tags
        $tags = collect();
        BlogPost::where('is_published', true)
            ->whereNotNull('tags')
            ->pluck('tags')
            ->each(function($tagString) use ($tags) {
                if ($tagString) {
                    $tagArray = is_array($tagString) ? $tagString : explode(',', $tagString);
                    foreach ($tagArray as $tag) {
                        $tag = trim($tag);
                        if ($tag && !$tags->contains('name', $tag)) {
                            $tags->push((object)['name' => $tag, 'slug' => \Str::slug($tag)]);
                        }
                    }
                }
            });

        return view('pages.blog-detail', compact('post', 'comments', 'relatedPosts', 'recentPosts', 'categories', 'tags'));
    }

    /**
     * Store a new comment for a blog post
     */
    public function storeComment(Request $request, $postId)
    {
        $post = BlogPost::findOrFail($postId);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string|max:1000',
        ]);

        \App\Models\Comment::create([
            'blog_post_id' => $post->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'comment' => $validated['content'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'pending',
        ]);

        return redirect()
            ->route('blog.show', $post->slug)
            ->with('success', 'Thank you for your comment! It will be published after review.');
    }
}
