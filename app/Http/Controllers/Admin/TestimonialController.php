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

    public function create(): View
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'order' => 'nullable|integer',
        ]);

        // Handle image upload
        if ($request->hasFile('client_image')) {
            $validated['client_image'] = $this->imageUploadService->upload(
                $request->file('client_image'),
                'testimonials',
                400,
                400
            );
        }

        // Set defaults and boolean values
        $validated['status'] = 'approved';
        $validated['approved_at'] = now();
        $validated['approved_by'] = Auth::id();
        $validated['is_active'] = $request->has('is_active') ? true : false;
        $validated['is_featured'] = $request->has('is_featured') ? true : false;

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'order' => 'nullable|integer',
        ]);

        // Handle image upload
        if ($request->hasFile('client_image')) {
            // Delete old image
            $this->imageUploadService->delete($testimonial->client_image);
            
            $validated['client_image'] = $this->imageUploadService->upload(
                $request->file('client_image'),
                'testimonials',
                400,
                400
            );
        }

        // Set boolean values explicitly
        $validated['is_active'] = $request->has('is_active') ? true : false;
        $validated['is_featured'] = $request->has('is_featured') ? true : false;

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
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

    public function reorder(Request $request): RedirectResponse
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer|exists:testimonials,id',
        ]);

        foreach ($request->order as $index => $id) {
            Testimonial::where('id', $id)->update(['order' => $index + 1]);
        }

        return redirect()->back()->with('success', 'Testimonials reordered successfully.');
    }
}
