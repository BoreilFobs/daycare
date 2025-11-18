<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Services\ImageUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    protected ImageUploadService $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }

    public function index(): View
    {
        $images = Gallery::ordered()->paginate(20);
        $categories = Gallery::getCategories();
        
        return view('admin.gallery.index', compact('images', 'categories'));
    }

    public function create(): View
    {
        $categories = Gallery::getCategories();
        return view('admin.gallery.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|max:2048',
            'category' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $validated['image'] = $this->imageUploadService->upload(
            $request->file('image'),
            'gallery',
            1200,
            800
        );

        $validated['is_active'] = $request->has('is_active') ? true : false;

        Gallery::create($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Image uploaded successfully.');
    }

    public function edit(Gallery $gallery): View
    {
        $categories = Gallery::getCategories();
        return view('admin.gallery.edit', compact('gallery', 'categories'));
    }

    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'category' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $this->imageUploadService->replace(
                $request->file('image'),
                $gallery->image,
                'gallery',
                1200,
                800
            );
        }

        $validated['is_active'] = $request->has('is_active') ? true : false;

        $gallery->update($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Image updated successfully.');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        $this->imageUploadService->delete($gallery->image);
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Image deleted successfully.');
    }

    public function bulkUpload(Request $request): RedirectResponse
    {
        $request->validate([
            'images.*' => 'required|image|max:2048',
            'category' => 'required|string|max:255',
        ]);

        $category = $request->input('category');
        $files = $request->file('images', []);

        foreach ($files as $file) {
            $path = $this->imageUploadService->upload($file, 'gallery', 1200, 800);
            
            Gallery::create([
                'title' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                'image' => $path,
                'category' => $category,
                'is_active' => true,
            ]);
        }

        return redirect()->route('admin.gallery.index')->with('success', count($files) . ' images uploaded successfully.');
    }

    public function bulkDelete(Request $request): JsonResponse
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:galleries,id',
        ]);

        $images = Gallery::whereIn('id', $request->ids)->get();
        
        foreach ($images as $image) {
            $this->imageUploadService->delete($image->image);
            $image->delete();
        }

        return response()->json([
            'success' => true,
            'message' => count($images) . ' images deleted successfully.'
        ]);
    }

    public function reorder(Request $request): RedirectResponse
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer|exists:galleries,id',
        ]);

        foreach ($request->order as $index => $id) {
            Gallery::where('id', $id)->update(['order' => $index + 1]);
        }

        return redirect()->back()->with('success', 'Gallery images reordered successfully.');
    }
}
