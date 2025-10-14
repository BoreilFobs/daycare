@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<div class="page-header">
    <h1 class="page-title">Dashboard</h1>
    <p class="page-subtitle">Welcome back, {{ Auth::user()->name }}! Here's what's happening today.</p>
</div>

<!-- Statistics Cards -->
<div class="row g-3 mb-4">
    <!-- Services -->
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <p class="text-muted mb-1" style="font-size: 13px;">Services</p>
                        <h3 class="mb-0" style="font-weight: 700;">{{ $stats['services'] ?? 0 }}</h3>
                    </div>
                    <div style="width: 48px; height: 48px; background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-briefcase text-white" style="font-size: 20px;"></i>
                    </div>
                </div>
                <div class="text-muted" style="font-size: 13px;">
                    <i class="fas fa-arrow-up text-success"></i>
                    <span class="text-success fw-semibold">Active</span> services
                </div>
            </div>
        </div>
    </div>

    <!-- Programs -->
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <p class="text-muted mb-1" style="font-size: 13px;">Programs</p>
                        <h3 class="mb-0" style="font-weight: 700;">{{ $stats['programs'] ?? 0 }}</h3>
                    </div>
                    <div style="width: 48px; height: 48px; background: linear-gradient(135deg, #8B5CF6 0%, #7C3AED 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-graduation-cap text-white" style="font-size: 20px;"></i>
                    </div>
                </div>
                <div class="text-muted" style="font-size: 13px;">
                    <span class="fw-semibold">{{ $stats['featured_programs'] ?? 0 }}</span> featured
                </div>
            </div>
        </div>
    </div>

    <!-- Events -->
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <p class="text-muted mb-1" style="font-size: 13px;">Events</p>
                        <h3 class="mb-0" style="font-weight: 700;">{{ $stats['events'] ?? 0 }}</h3>
                    </div>
                    <div style="width: 48px; height: 48px; background: linear-gradient(135deg, #10B981 0%, #059669 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-calendar text-white" style="font-size: 20px;"></i>
                    </div>
                </div>
                <div class="text-muted" style="font-size: 13px;">
                    <span class="fw-semibold">{{ $stats['upcoming_events'] ?? 0 }}</span> upcoming
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Posts -->
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <p class="text-muted mb-1" style="font-size: 13px;">Blog Posts</p>
                        <h3 class="mb-0" style="font-weight: 700;">{{ $stats['blog_posts'] ?? 0 }}</h3>
                    </div>
                    <div style="width: 48px; height: 48px; background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-blog text-white" style="font-size: 20px;"></i>
                    </div>
                </div>
                <div class="text-muted" style="font-size: 13px;">
                    <span class="fw-semibold">{{ $stats['published_posts'] ?? 0 }}</span> published
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Secondary Stats -->
<div class="row g-3 mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1" style="font-size: 13px;">Team Members</p>
                        <h4 class="mb-0" style="font-weight: 600;">{{ $stats['team_members'] ?? 0 }}</h4>
                    </div>
                    <i class="fas fa-users text-primary" style="font-size: 24px; opacity: 0.7;"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1" style="font-size: 13px;">Gallery Images</p>
                        <h4 class="mb-0" style="font-weight: 600;">{{ $stats['gallery_images'] ?? 0 }}</h4>
                    </div>
                    <i class="fas fa-images text-info" style="font-size: 24px; opacity: 0.7;"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1" style="font-size: 13px;">Total Views</p>
                        <h4 class="mb-0" style="font-weight: 600;">{{ number_format($stats['total_views'] ?? 0) }}</h4>
                    </div>
                    <i class="fas fa-eye text-success" style="font-size: 24px; opacity: 0.7;"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1" style="font-size: 13px;">Testimonials</p>
                        <h4 class="mb-0" style="font-weight: 600;">{{ $stats['testimonials'] ?? 0 }}</h4>
                    </div>
                    <i class="fas fa-quote-right text-warning" style="font-size: 24px; opacity: 0.7;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Pending Approvals -->
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="fas fa-clock text-warning me-2"></i>
                    Pending Approvals
                </h5>
                <span class="badge bg-warning">{{ $pending['total'] ?? 0 }}</span>
            </div>
            <div class="card-body">
                @if(($pending['total'] ?? 0) > 0)
                    <div class="list-group list-group-flush">
                        @if(($pending['comments'] ?? 0) > 0)
                            <a href="{{ route('admin.comments.pending') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-comments text-primary me-2"></i>
                                    <span class="fw-semibold">Comments</span>
                                </div>
                                <span class="badge bg-primary rounded-pill">{{ $pending['comments'] }}</span>
                            </a>
                        @endif

                        @if(($pending['testimonials'] ?? 0) > 0)
                            <a href="{{ route('admin.testimonials.pending') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-quote-right text-success me-2"></i>
                                    <span class="fw-semibold">Testimonials</span>
                                </div>
                                <span class="badge bg-success rounded-pill">{{ $pending['testimonials'] }}</span>
                            </a>
                        @endif

                        @if(($pending['registrations'] ?? 0) > 0)
                            <a href="{{ route('admin.registrations.pending') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-user-check text-info me-2"></i>
                                    <span class="fw-semibold">Event Registrations</span>
                                </div>
                                <span class="badge bg-info rounded-pill">{{ $pending['registrations'] }}</span>
                            </a>
                        @endif
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 48px; opacity: 0.5;"></i>
                        <p class="text-muted mt-3 mb-0">All caught up! No pending approvals.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Unread Messages -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="fas fa-envelope text-danger me-2"></i>
                    Unread Messages
                </h5>
                <span class="badge bg-danger">{{ $pending['messages'] ?? 0 }}</span>
            </div>
            <div class="card-body">
                @if(($pending['messages'] ?? 0) > 0)
                    <a href="{{ route('admin.messages.unread') }}" class="btn btn-danger btn-sm w-100">
                        <i class="fas fa-envelope-open me-2"></i>
                        View {{ $pending['messages'] }} Unread Message{{ $pending['messages'] > 1 ? 's' : '' }}
                    </a>
                @else
                    <div class="text-center py-3">
                        <i class="fas fa-inbox text-muted" style="font-size: 36px; opacity: 0.3;"></i>
                        <p class="text-muted mt-2 mb-0 small">No unread messages</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-history text-info me-2"></i>
                    Recent Activity
                </h5>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($recentActivity ?? [] as $activity)
                        <div class="list-group-item">
                            <div class="d-flex gap-3">
                                <div class="flex-shrink-0">
                                    <div style="width: 40px; height: 40px; background: {{ $activity['color'] ?? '#E2E8F0' }}; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                        <i class="{{ $activity['icon'] ?? 'fas fa-circle' }} text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1" style="font-size: 14px;">{{ $activity['title'] ?? '' }}</h6>
                                        <small class="text-muted">{{ $activity['time'] ?? '' }}</small>
                                    </div>
                                    <p class="text-muted mb-0 small">{{ $activity['description'] ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4">
                            <i class="fas fa-history text-muted" style="font-size: 48px; opacity: 0.3;"></i>
                            <p class="text-muted mt-3 mb-0">No recent activity</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Popular Content & Upcoming Events -->
<div class="row">
    <!-- Popular Blog Posts -->
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-fire text-danger me-2"></i>
                    Popular Blog Posts
                </h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Post</th>
                                <th class="text-center">Views</th>
                                <th class="text-center">Comments</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($popularPosts ?? [] as $post)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            @if($post->featured_image)
                                                <img src="{{ Storage::url($post->featured_image) }}" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 6px;">
                                            @endif
                                            <div>
                                                <div class="fw-semibold" style="font-size: 14px;">{{ Str::limit($post->title, 40) }}</div>
                                                <small class="text-muted">{{ $post->created_at->format('M d, Y') }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-light text-dark">{{ number_format($post->views ?? 0) }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-light text-dark">{{ $post->comments_count ?? 0 }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted">No blog posts yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Events -->
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="fas fa-calendar-alt text-success me-2"></i>
                    Upcoming Events
                </h5>
                <a href="{{ route('admin.events.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus me-1"></i> Add Event
                </a>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($upcomingEvents ?? [] as $event)
                        <a href="{{ route('admin.events.edit', $event) }}" class="list-group-item list-group-item-action">
                            <div class="d-flex gap-3">
                                <div class="flex-shrink-0">
                                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #10B981, #059669); border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; color: white;">
                                        <div style="font-size: 18px; font-weight: 700; line-height: 1;">{{ $event->event_date->format('d') }}</div>
                                        <div style="font-size: 10px; text-transform: uppercase;">{{ $event->event_date->format('M') }}</div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1" style="font-size: 14px; font-weight: 600;">{{ $event->title }}</h6>
                                    <div class="small text-muted">
                                        <i class="fas fa-clock me-1"></i>
                                        {{ $event->event_date->format('l, M d, Y') }}
                                        @if($event->event_time)
                                            at {{ $event->event_time }}
                                        @endif
                                    </div>
                                    @if($event->location)
                                        <div class="small text-muted">
                                            <i class="fas fa-map-marker-alt me-1"></i>
                                            {{ $event->location }}
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="badge bg-success">{{ $event->registrations_count ?? 0 }} registered</span>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="text-center py-4">
                            <i class="fas fa-calendar-times text-muted" style="font-size: 48px; opacity: 0.3;"></i>
                            <p class="text-muted mt-3 mb-0">No upcoming events</p>
                            <a href="{{ route('admin.events.create') }}" class="btn btn-sm btn-outline-primary mt-2">
                                Create Your First Event
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">
            <i class="fas fa-bolt text-warning me-2"></i>
            Quick Actions
        </h5>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('admin.blog.create') }}" class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center" style="height: 100px;">
                    <div class="text-center">
                        <i class="fas fa-plus-circle mb-2" style="font-size: 24px;"></i>
                        <div>New Blog Post</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('admin.events.create') }}" class="btn btn-outline-success w-100 d-flex align-items-center justify-content-center" style="height: 100px;">
                    <div class="text-center">
                        <i class="fas fa-calendar-plus mb-2" style="font-size: 24px;"></i>
                        <div>New Event</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('admin.programs.create') }}" class="btn btn-outline-info w-100 d-flex align-items-center justify-content-center" style="height: 100px;">
                    <div class="text-center">
                        <i class="fas fa-graduation-cap mb-2" style="font-size: 24px;"></i>
                        <div>New Program</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-warning w-100 d-flex align-items-center justify-content-center" style="height: 100px;">
                    <div class="text-center">
                        <i class="fas fa-images mb-2" style="font-size: 24px;"></i>
                        <div>Manage Gallery</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
