<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = GalleryImage::where('is_active', true);

        // Category filter
        if ($request->has('category') && $request->category && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        $images = $query->orderBy('order')->orderBy('created_at', 'desc')->paginate(12);

        $categories = GalleryImage::where('is_active', true)
            ->distinct()
            ->pluck('category')
            ->filter();

        return view('pages.gallery', compact('images', 'categories'));
    }
}
