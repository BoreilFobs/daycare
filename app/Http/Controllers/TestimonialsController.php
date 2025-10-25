<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\PageSection;

class TestimonialsController extends Controller
{
    public function index()
    {
        $pageSections = all_page_sections('testimonials');

        $testimonials = Testimonial::where('is_active', true)
            ->where('status', 'approved')
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('pages.testimonials', compact('testimonials', 'pageSections'));
    }
}
