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
use Illuminate\Support\Str;
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
            'featured_programs' => Program::featured()->count(),
            'events' => Event::count(),
            'upcoming_events' => Event::upcoming()->count(),
            'blog_posts' => BlogPost::count(),
            'published_posts' => BlogPost::published()->count(),
            'team_members' => TeamMember::count(),
            'testimonials' => Testimonial::approved()->count(),
            'gallery_images' => Gallery::count(),
            'total_views' => BlogPost::sum('views'),
        ];

        // Pending approvals
        $pending = [
            'comments' => BlogComment::pending()->count(),
            'testimonials' => Testimonial::pending()->count(),
            'registrations' => EventRegistration::pending()->count(),
            'messages' => ContactMessage::unread()->count(),
        ];
        $pending['total'] = $pending['comments'] + $pending['testimonials'] + $pending['registrations'];

        // Recent activity - combine different types
        $recentActivity = $this->getRecentActivity();

        // Popular blog posts
        $popularPosts = BlogPost::published()
            ->withCount('comments')
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        // Upcoming events
        $upcomingEvents = Event::upcoming()
            ->withCount('registrations')
            ->orderBy('event_date', 'asc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'pending',
            'recentActivity',
            'popularPosts',
            'upcomingEvents'
        ));
    }

    /**
     * Get recent activity from various sources
     */
    private function getRecentActivity(): array
    {
        $activity = [];

        // Recent comments
        $recentComments = BlogComment::with('blogPost')
            ->latest()
            ->take(3)
            ->get();
        
        foreach ($recentComments as $comment) {
            $activity[] = [
                'title' => 'New Comment',
                'description' => 'On "' . Str::limit($comment->blogPost->title ?? 'Unknown Post', 40) . '"',
                'time' => $comment->created_at->diffForHumans(),
                'icon' => 'fas fa-comment',
                'color' => '#3B82F6',
            ];
        }

        // Recent messages
        $recentMessages = ContactMessage::latest()
            ->take(2)
            ->get();
        
        foreach ($recentMessages as $message) {
            $activity[] = [
                'title' => 'New Message',
                'description' => 'From ' . $message->name,
                'time' => $message->created_at->diffForHumans(),
                'icon' => 'fas fa-envelope',
                'color' => '#EF4444',
            ];
        }

        // Recent registrations
        $recentRegistrations = EventRegistration::with('event')
            ->latest()
            ->take(2)
            ->get();
        
        foreach ($recentRegistrations as $registration) {
            $activity[] = [
                'title' => 'New Registration',
                'description' => $registration->name . ' - ' . ($registration->event->title ?? 'Unknown Event'),
                'time' => $registration->created_at->diffForHumans(),
                'icon' => 'fas fa-user-check',
                'color' => '#10B981',
            ];
        }

        // Sort by time (most recent first)
        usort($activity, function($a, $b) {
            return strcmp($b['time'], $a['time']);
        });

        return array_slice($activity, 0, 7);
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
