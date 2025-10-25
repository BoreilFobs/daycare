<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Event;
use App\Models\BlogPost;
use App\Models\Testimonial;
use App\Models\Service;
use App\Models\PageSection;
use App\Models\GalleryImage;
use App\Models\TeamMember;

class HomeController extends Controller
{
    public function index()
    {
        $pageSections = all_page_sections('home');

        $featuredPrograms = Program::where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('order')
            ->take(3)
            ->get();

        $upcomingEvents = Event::where('is_active', true)
            ->where('event_date', '>=', now())
            ->orderBy('event_date')
            ->take(3)
            ->get();

        $recentBlogs = BlogPost::where('is_published', true)
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $testimonials = Testimonial::where('is_active', true)
            ->where('status', 'approved')
            ->orderBy('order')
            ->take(6)
            ->get();

        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->take(6)
            ->get();

        $galleryImages = GalleryImage::where('is_active', true)
            ->orderBy('order')
            ->take(9)
            ->get();

        $teamMembers = TeamMember::where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('order')
            ->take(4)
            ->get();

        return view('welcome', compact(
            'pageSections',
            'featuredPrograms',
            'upcomingEvents',
            'recentBlogs',
            'testimonials',
            'services',
            'galleryImages',
            'teamMembers'
        ));
    }
}
