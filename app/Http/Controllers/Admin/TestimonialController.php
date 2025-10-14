<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Services\ImageUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    protected ImageUploadService $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }

    public function index(): View
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function pending(): View
    {
        $testimonials = Testimonial::pending()->latest()->paginate(20);
        return view('admin.testimonials.pending', compact('testimonials'));
    }

    public function approve(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->approve(Auth::user());

        return redirect()->back()->with('success', 'Testimonial approved successfully.');
    }

    public function reject(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->reject();

        return redirect()->back()->with('success', 'Testimonial rejected successfully.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $this->imageUploadService->delete($testimonial->client_image);
        $testimonial->delete();

        return redirect()->back()->with('success', 'Testimonial deleted successfully.');
    }

    public function toggleFeatured(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->update(['is_featured' => !$testimonial->is_featured]);

        return redirect()->back()->with('success', 'Testimonial featured status updated.');
    }
}
