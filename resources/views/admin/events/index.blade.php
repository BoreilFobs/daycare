@extends('admin.layouts.app')

@section('title', 'Events Management')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Events</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Events</li>
            </ol>
        </nav>
    </div>
    <div class="page-actions">
        <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add New Event
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">All Events</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Filter Tabs -->
        <ul class="nav nav-pills mb-4" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="pill" href="#all-events">
                    <i class="fas fa-list me-1"></i>All Events ({{ $events->count() }})
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#upcoming-events">
                    <i class="fas fa-calendar-alt me-1"></i>Upcoming ({{ $events->filter(fn($e) => $e->event_date->isFuture())->count() }})
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#past-events">
                    <i class="fas fa-history me-1"></i>Past ({{ $events->filter(fn($e) => $e->event_date->isPast())->count() }})
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="all-events">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="eventsTable">
                        <thead>
                            <tr>
                                <th width="40%">Event</th>
                                <th width="15%">Date & Time</th>
                                <th width="10%">Location</th>
                                <th width="10%">Capacity</th>
                                <th width="10%">Status</th>
                                <th width="15%" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($events as $event)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            @if($event->image)
                                                <img src="{{ Storage::url($event->image) }}" 
                                                     alt="{{ $event->title }}" 
                                                     class="rounded" 
                                                     style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                                     style="width: 60px; height: 60px;">
                                                    <i class="fas fa-calendar-day text-muted fa-2x"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <div class="fw-semibold">{{ $event->title }}</div>
                                                <small class="text-muted">{{ Str::limit($event->description, 50) }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <i class="fas fa-calendar text-primary me-1"></i>
                                            {{ $event->event_date->format('M d, Y') }}
                                        </div>
                                        <small class="text-muted">
                                            <i class="fas fa-clock me-1"></i>
                                            {{ $event->event_time }}
                                        </small>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt me-1"></i>
                                            {{ Str::limit($event->location, 20) }}
                                        </small>
                                    </td>
                                    <td>
                                        @if($event->max_capacity)
                                            <span class="badge bg-light text-dark">
                                                {{ $event->registrations_count ?? 0 }}/{{ $event->max_capacity }}
                                            </span>
                                        @else
                                            <span class="badge bg-light text-dark">Unlimited</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($event->event_date->isFuture())
                                            <span class="badge bg-success">Upcoming</span>
                                        @else
                                            <span class="badge bg-secondary">Past</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.events.edit', $event) }}" 
                                               class="btn btn-outline-primary"
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.events.destroy', $event) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this event?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <i class="fas fa-calendar-day fa-3x text-muted mb-3"></i>
                                        <p class="text-muted mb-0">No events found. Create your first event!</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="upcoming-events">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Event</th>
                                <th>Date & Time</th>
                                <th>Location</th>
                                <th>Capacity</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($events->filter(fn($e) => $e->event_date->isFuture()) as $event)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            @if($event->image)
                                                <img src="{{ Storage::url($event->image) }}" 
                                                     alt="{{ $event->title }}" 
                                                     class="rounded" 
                                                     style="width: 50px; height: 50px; object-fit: cover;">
                                            @endif
                                            <div>
                                                <div class="fw-semibold">{{ $event->title }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $event->event_date->format('M d, Y') }} at {{ $event->event_time }}</td>
                                    <td>{{ Str::limit($event->location, 20) }}</td>
                                    <td>
                                        @if($event->max_capacity)
                                            {{ $event->registrations_count ?? 0 }}/{{ $event->max_capacity }}
                                        @else
                                            Unlimited
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-outline-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <p class="text-muted mb-0">No upcoming events</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="past-events">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Event</th>
                                <th>Date</th>
                                <th>Attendees</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($events->filter(fn($e) => $e->event_date->isPast()) as $event)
                                <tr>
                                    <td>
                                        <div class="fw-semibold">{{ $event->title }}</div>
                                    </td>
                                    <td>{{ $event->event_date->format('M d, Y') }}</td>
                                    <td>{{ $event->registrations_count ?? 0 }} attendees</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5">
                                        <p class="text-muted mb-0">No past events</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


