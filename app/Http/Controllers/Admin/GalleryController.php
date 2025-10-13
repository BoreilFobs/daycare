<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Services\ImageUploadService;
use Illuminate\Http\RedirectResponse;
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

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|max:2048',
            'category' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['image'] = $this->imageUploadService->upload(
            $request->file('image'),
            'gallery',
            1200,
            800
        );

        Gallery::create($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Image uploaded successfully.');
    }

    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'category' => 'sometimes|required|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
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
                'title' => $file->getClientOriginalName(),
                'image' => $path,
                'category' => $category,
                'is_active' => true,
            ]);
        }

        return redirect()->route('admin.gallery.index')->with('success', count($files) . ' images uploaded successfully.');
    }
}
