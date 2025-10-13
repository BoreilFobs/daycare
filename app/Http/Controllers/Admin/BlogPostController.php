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
        $posts = BlogPost::with('author')->latest()->paginate(15);
        return view('admin.blog.index', compact('posts'));
    }

    public function create(): View
    {
        return view('admin.blog.create');
    }

    public function store(StoreBlogPostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated['author_id'] = Auth::user()->id;

        // Handle featured image
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $this->imageUploadService->upload(
                $request->file('featured_image'),
                'blog',
                1200,
                630
            );
        }

        // Handle author image
        if ($request->hasFile('author_image')) {
            $validated['author_image'] = $this->imageUploadService->upload(
                $request->file('author_image'),
                'authors',
                200,
                200
            );
        }

        BlogPost::create($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post created successfully.');
    }

    public function edit(BlogPost $blogPost): View
    {
        return view('admin.blog.edit', compact('blogPost'));
    }

    public function update(UpdateBlogPostRequest $request, BlogPost $blogPost): RedirectResponse
    {
        $validated = $request->validated();

        // Handle featured image
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $this->imageUploadService->replace(
                $request->file('featured_image'),
                $blogPost->featured_image,
                'blog',
                1200,
                630
            );
        }

        // Handle author image
        if ($request->hasFile('author_image')) {
            $validated['author_image'] = $this->imageUploadService->replace(
                $request->file('author_image'),
                $blogPost->author_image,
                'authors',
                200,
                200
            );
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
        $blogPost->update([
            'is_published' => !$blogPost->is_published,
            'published_at' => !$blogPost->is_published ? now() : $blogPost->published_at,
        ]);

        return redirect()->back()->with('success', 'Blog post publish status updated.');
    }
}
