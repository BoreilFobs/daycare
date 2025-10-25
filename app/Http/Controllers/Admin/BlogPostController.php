<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\BlogPost;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    protected ImageUploadService $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }

    public function index(): View
    {
        $posts = BlogPost::with('author')->latest()->get();
        return view('admin.blog.index', compact('posts'));
    }

    public function create(): View
    {
        return view('admin.blog.create');
    }

    public function store(StoreBlogPostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated['author_id'] = Auth::id();
        $validated['author_name'] = Auth::user()->name;

        // Handle featured image (form field is 'image')
        if ($request->hasFile('image')) {
            $validated['featured_image'] = $this->imageUploadService->upload(
                $request->file('image'),
                'blog',
                1200,
                630
            );
            unset($validated['image']); // Remove the 'image' key as we saved it as 'featured_image'
        }

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Set published_at if publishing
        if (!empty($validated['is_published']) && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        BlogPost::create($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post created successfully.');
    }

    public function edit(BlogPost $blogPost): View
    {
        $post = $blogPost;
        return view('admin.blog.edit', compact('post'));
    }

    public function update(UpdateBlogPostRequest $request, BlogPost $blogPost): RedirectResponse
    {
        $validated = $request->validated();

        // Handle featured image (form field is 'image')
        if ($request->hasFile('image')) {
            $validated['featured_image'] = $this->imageUploadService->replace(
                $request->file('image'),
                $blogPost->featured_image,
                'blog',
                1200,
                630
            );
            unset($validated['image']); // Remove the 'image' key as we saved it as 'featured_image'
        }

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle published_at date
        if (!empty($validated['is_published'])) {
            // If publishing and no published_at is set, use now or the provided date
            if (empty($blogPost->published_at) && empty($validated['published_at'])) {
                $validated['published_at'] = now();
            } elseif (empty($validated['published_at'])) {
                // Keep existing published_at if not provided
                unset($validated['published_at']);
            }
        } else {
            // If unpublishing, clear the published_at date
            $validated['published_at'] = null;
        }

        $blogPost->update($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy(BlogPost $blogPost): RedirectResponse
    {
        $this->imageUploadService->delete($blogPost->featured_image);
        $this->imageUploadService->delete($blogPost->author_image);
        $blogPost->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Blog post deleted successfully.');
    }

    public function togglePublish(BlogPost $blogPost): RedirectResponse
    {
        $isPublished = !$blogPost->is_published;
        
        $blogPost->update([
            'is_published' => $isPublished,
            'published_at' => $isPublished ? now() : null,
        ]);

        $status = $isPublished ? 'published' : 'unpublished';
        return redirect()->back()->with('success', "Blog post {$status} successfully.");
    }
}
