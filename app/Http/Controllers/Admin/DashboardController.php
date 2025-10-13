<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use App\Models\BlogPost;
use App\Models\ContactMessage;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\Gallery;
use App\Models\Program;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard
     */
    public function index(): View
    {
        // Content statistics
        $stats = [
            'services' => Service::count(),
            'programs' => Program::count(),
            'active_programs' => Program::active()->count(),
            'events' => Event::count(),
            'upcoming_events' => Event::upcoming()->count(),
            'blog_posts' => BlogPost::count(),
            'published_posts' => BlogPost::published()->count(),
            'team_members' => TeamMember::count(),
            'testimonials' => Testimonial::count(),
            'gallery_images' => Gallery::count(),
        ];

        // Pending approvals
        $pending = [
            'comments' => BlogComment::pending()->count(),
            'testimonials' => Testimonial::pending()->count(),
            'registrations' => EventRegistration::pending()->count(),
        ];

        // Recent activity
        $recent = [
            'comments' => BlogComment::pending()->latest()->take(5)->get(),
            'messages' => ContactMessage::unread()->latest()->take(5)->get(),
            'testimonials' => Testimonial::pending()->latest()->take(5)->get(),
            'registrations' => EventRegistration::pending()->latest()->take(5)->get(),
        ];

        // Blog post views
        $popularPosts = BlogPost::published()
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        // Upcoming events
        $upcomingEvents = Event::active()
            ->upcoming()
            ->ordered()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'pending',
            'recent',
            'popularPosts',
            'upcomingEvents'
        ));
    }

    /**
     * Get dashboard statistics as JSON
     */
    public function stats(): array
    {
        return [
            'content' => [
                'services' => Service::count(),
                'programs' => Program::count(),
                'events' => Event::count(),
                'blog_posts' => BlogPost::count(),
                'team_members' => TeamMember::count(),
                'testimonials' => Testimonial::count(),
                'gallery_images' => Gallery::count(),
            ],
            'pending' => [
                'comments' => BlogComment::pending()->count(),
                'testimonials' => Testimonial::pending()->count(),
                'registrations' => EventRegistration::pending()->count(),
                'messages' => ContactMessage::unread()->count(),
            ],
            'activity' => [
                'total_views' => BlogPost::sum('views'),
                'total_comments' => BlogComment::approved()->count(),
                'total_registrations' => EventRegistration::confirmed()->count(),
            ],
        ];
    }
}
