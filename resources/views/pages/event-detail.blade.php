@extends('layouts.web')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 aos-fade" data-aos-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 display-md-2 text-white mb-4">{{ $event->title }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('events') }}">Events</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">{{ Str::limit($event->title, 30) }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Event Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-4 g-lg-5">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Event Image -->
                    <div class="mb-4 mb-lg-5 aos-fade" data-aos-delay="0.1s">
                        <img src="{{ $event->image ?? asset('img/default-event.jpg') }}" 
                             class="img-fluid w-100 rounded" 
                             alt="{{ $event->title }}"
                             style="max-height: 500px; object-fit: cover;">
                    </div>

                    <!-- Event Info Cards - Mobile Optimized -->
                    <div class="row g-3 mb-4 mb-lg-5 aos-fade" data-aos-delay="0.2s">
                        <div class="col-6 col-sm-6 col-md-3">
                            <div class="bg-light rounded p-3 p-md-4 text-center h-100">
                                <i class="fas fa-calendar-alt fa-2x text-primary mb-2 mb-md-3"></i>
                                <h6 class="mb-1 small">Date</h6>
                                <p class="mb-0 fw-bold small">{{ $event->event_date->format('d M Y') }}</p>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3">
                            <div class="bg-light rounded p-3 p-md-4 text-center h-100">
                                <i class="fas fa-clock fa-2x text-primary mb-2 mb-md-3"></i>
                                <h6 class="mb-1 small">Time</h6>
                                <p class="mb-0 fw-bold small">{{ $event->event_time }}</p>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3">
                            <div class="bg-light rounded p-3 p-md-4 text-center h-100">
                                <i class="fas fa-map-marker-alt fa-2x text-primary mb-2 mb-md-3"></i>
                                <h6 class="mb-1 small">Location</h6>
                                <p class="mb-0 fw-bold small">{{ Str::limit($event->location, 15) }}</p>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3">
                            <div class="bg-light rounded p-3 p-md-4 text-center h-100">
                                <i class="fas fa-users fa-2x text-primary mb-2 mb-md-3"></i>
                                <h6 class="mb-1 small">Capacity</h6>
                                <p class="mb-0 fw-bold small">
                                    @if($event->max_attendees)
                                        {{ $event->max_attendees }} People
                                    @else
                                        Unlimited
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Event Description -->
                    <div class="aos-fade" data-aos-delay="0.3s">
                        <h2 class="mb-3 mb-md-4">About This Event</h2>
                        <div class="mb-4">
                            <p class="text-dark">{{ $event->description }}</p>
                        </div>

                        @if($event->full_description)
                            <div class="mb-4">
                                <h4 class="mb-3">Event Details</h4>
                                <div class="text-dark">{!! $event->full_description !!}</div>
                            </div>
                        @endif

                        <!-- Location Map Link -->
                        @if($event->location_link)
                            <div class="mb-4">
                                <h4 class="mb-3">Location</h4>
                                <p><i class="fas fa-map-marker-alt text-primary me-2"></i>{{ $event->location }}</p>
                                <a href="{{ $event->location_link }}" 
                                   target="_blank" 
                                   class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-map me-2"></i>View on Map
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Registration Card -->
                    <div class="card border-primary mb-4 aos-fade" data-aos-delay="0.2s">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-ticket-alt me-2"></i>Event Information</h5>
                        </div>
                        <div class="card-body">
                            <!-- Price -->
                            <div class="mb-3 pb-3 border-bottom">
                                <h6 class="text-muted mb-2">Price</h6>
                                @if($event->price > 0)
                                    <h3 class="text-primary mb-0">${{ number_format($event->price, 2) }}</h3>
                                @else
                                    <h3 class="text-success mb-0">Free Event</h3>
                                @endif
                            </div>

                            <!-- Availability -->
                            @if($event->max_attendees)
                                <div class="mb-3 pb-3 border-bottom">
                                    <h6 class="text-muted mb-2">Availability</h6>
                                    @if($availableSpots !== null && $availableSpots > 0)
                                        <p class="mb-0">
                                            <span class="badge bg-success">{{ $availableSpots }} spots available</span>
                                        </p>
                                        <small class="text-muted">{{ $registrationsCount }} / {{ $event->max_attendees }} registered</small>
                                    @elseif($availableSpots === 0)
                                        <p class="mb-0">
                                            <span class="badge bg-danger">Fully Booked</span>
                                        </p>
                                    @else
                                        <p class="mb-0">
                                            <span class="badge bg-info">Open Registration</span>
                                        </p>
                                    @endif
                                </div>
                            @endif

                            <!-- Event Status -->
                            <div class="mb-3">
                                <h6 class="text-muted mb-2">Event Status</h6>
                                @if($event->event_date >= now()->toDateString())
                                    <span class="badge bg-primary">Upcoming</span>
                                @else
                                    <span class="badge bg-secondary">Past Event</span>
                                @endif
                            </div>

                            <!-- Register Button -->
                            @if($event->event_date >= now()->toDateString())
                                @if(!$event->max_attendees || ($availableSpots !== null && $availableSpots > 0))
                                    <a href="{{ route('contact') }}" class="btn btn-primary w-100 py-3">
                                        <i class="fas fa-ticket-alt me-2"></i>Register Now
                                    </a>
                                @else
                                    <button class="btn btn-secondary w-100 py-3" disabled>
                                        <i class="fas fa-exclamation-circle me-2"></i>Fully Booked
                                    </button>
                                @endif
                            @endif
                        </div>
                    </div>

                    <!-- Share Event -->
                    <div class="card mb-4 aos-fade" data-aos-delay="0.3s">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Share This Event</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex gap-2 flex-wrap">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                                   target="_blank" 
                                   class="btn btn-primary btn-sm flex-fill">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($event->title) }}" 
                                   target="_blank" 
                                   class="btn btn-info btn-sm flex-fill">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($event->title . ' - ' . url()->current()) }}" 
                                   target="_blank" 
                                   class="btn btn-success btn-sm flex-fill">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <button onclick="copyLink()" class="btn btn-secondary btn-sm flex-fill">
                                    <i class="fas fa-link"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="card border-0 bg-light aos-fade" data-aos-delay="0.4s">
                        <div class="card-body">
                            <h5 class="mb-3">Need Help?</h5>
                            <p class="mb-2">
                                <i class="fas fa-phone text-primary me-2"></i>
                                <a href="tel:{{ str_replace(' ', '', setting('contact_phone', '')) }}">{{ setting('contact_phone', 'Contact Us') }}</a>
                            </p>
                            <p class="mb-0">
                                <i class="fas fa-envelope text-primary me-2"></i>
                                <a href="mailto:{{ setting('contact_email', '') }}">{{ setting('contact_email', 'Email Us') }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Events -->
            @if($relatedEvents->count() > 0)
                <div class="mt-5 pt-5 border-top aos-fade" data-aos-delay="0.5s">
                    <h2 class="mb-4 text-center">Other Upcoming Events</h2>
                    <div class="row g-4">
                        @foreach($relatedEvents as $index => $relatedEvent)
                            <div class="col-md-6 col-lg-4">
                                <div class="events-item bg-primary rounded h-100">
                                    <div class="events-inner position-relative">
                                        <div class="events-img overflow-hidden rounded-circle position-relative">
                                            <img src="{{ $relatedEvent->image ?? asset('img/default-event.jpg') }}" class="img-fluid w-100 rounded-circle" alt="{{ $relatedEvent->title }}" loading="lazy">
                                            <div class="event-overlay">
                                                <a href="{{ route('events.show', $relatedEvent->id) }}"><i class="fas fa-eye text-white fa-2x"></i></a>
                                            </div>
                                        </div>
                                        <div class="px-4 py-2 bg-secondary text-white text-center events-rate">{{ $relatedEvent->event_date->format('d M') }}</div>
                                        <div class="d-flex justify-content-between px-4 py-2 bg-secondary">
                                            <small class="text-white"><i class="fas fa-calendar me-1 text-primary"></i> {{ $relatedEvent->event_time }}</small>
                                            <small class="text-white"><i class="fas fa-map-marker-alt me-1 text-primary"></i> {{ Str::limit($relatedEvent->location, 15) }}</small>
                                        </div>
                                    </div>
                                    <div class="events-text p-4 border border-primary bg-white border-top-0 rounded-bottom">
                                        <a href="{{ route('events.show', $relatedEvent->id) }}" class="h4 d-block mb-3">{{ $relatedEvent->title }}</a>
                                        <p class="mb-3">{{ Str::limit($relatedEvent->description, 80) }}</p>
                                        <a href="{{ route('events.show', $relatedEvent->id) }}" class="btn btn-primary btn-sm">
                                            Read More <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Event Detail End -->
@endsection

@push('scripts')
<script>
function copyLink() {
    const url = window.location.href;
    navigator.clipboard.writeText(url).then(() => {
        alert('Link copied to clipboard!');
    }).catch(err => {
        console.error('Failed to copy:', err);
    });
}
</script>
@endpush
