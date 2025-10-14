<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = GalleryImage::latest()->get();
        
        return view('admin.gallery.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string',
        ]);

        $uploadedCount = 0;

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('gallery', 'public');
                
                GalleryImage::create([
                    'title' => null,
                    'description' => null,
                    'image' => $path,
                    'category' => $validated['category'],
                    'order' => 0,
                    'is_active' => true,
                ]);
                
                $uploadedCount++;
            }
        }

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', "$uploadedCount image(s) uploaded successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(GalleryImage $galleryImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryImage $galleryImage)
    {
        return view('admin.gallery.edit', compact('galleryImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GalleryImage $galleryImage)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($galleryImage->image) {
                Storage::disk('public')->delete($galleryImage->image);
            }
            $validated['image'] = $request->file('image')->store('gallery', 'public');
        }

        $galleryImage->update($validated);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Image updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryImage $galleryImage)
    {
        if ($galleryImage->image) {
            Storage::disk('public')->delete($galleryImage->image);
        }
        
        $galleryImage->delete();
        
        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Image deleted successfully.');
    }

    /**
     * Reorder gallery images
     */
    public function reorder(Request $request)
    {
        foreach ($request->order as $item) {
            GalleryImage::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Bulk delete images
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:galleries,id',
        ]);

        $images = GalleryImage::whereIn('id', $request->ids)->get();

        foreach ($images as $image) {
            // Delete image file from storage
            if ($image->image) {
                Storage::disk('public')->delete($image->image);
            }
            $image->delete();
        }

        return response()->json([
            'success' => true,
            'message' => count($request->ids) . ' image(s) deleted successfully.'
        ]);
    }
}
