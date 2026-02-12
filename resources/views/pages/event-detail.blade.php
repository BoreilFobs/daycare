@extends('layouts.web')
@section('title', $event->title ?? 'Event Detail')
@section('content')
    <!-- Breadcrumnd Banner Start -->
    <section class="breadcrumnd-banner cmn-bg overflow-hidden">
        <div class="container">
            <div class="breadcrumnd-wrapper">
                <div class="breadcrumnd-content">
                    <h1 class="black mb-lg-4 mb-md-3 mb-2">
                        Event Details
                    </h1>
                    <ul class="bread-list d-flex align-items-center gap-lg-4 gap-md-3 gap-2">
                        <li>
                            <a href="{{ route('home') }}">
                                Home
                            </a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                            <a href="{{ route('events') }}">
                                Events
                            </a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                            Details
                        </li>
                    </ul>
                </div>
                <div class="breadcrumnd-thumb position-relative">
                    <img src="{{ asset('images/bread-thumb.png') }}" alt="img" class="mimg">
                    <img src="{{ asset('images/bread-child.png') }}" alt="img" class="bread-child">
                    <img src="{{ asset('images/bread-cat.png') }}" alt="img" class="bread-cat">
                </div>
            </div>
        </div>
    </section>

    <!-- Event Details Section Start -->
    <section class="event-details-section mt-60 overflow-hidden space-bottom">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="event-details-wrap">
                        <div class="event-details-thumb mb-40">
                            <img src="{{ $event->image_url ?? asset('img/aservices/program-item1.png') }}" alt="{{ $event->title ?? '' }}" class="w-100 round10">
                        </div>
                        <div class="event-details-info mb-30 d-flex flex-wrap gap-4">
                            <div class="info-item d-flex align-items-center gap-2">
                                <i class="fa-solid fa-calendar-days p1-clr"></i>
                                <span>{{ isset($event) ? $event->event_date->format('F d, Y') : 'January 19, 2024' }}</span>
                            </div>
                            <div class="info-item d-flex align-items-center gap-2">
                                <i class="fa-solid fa-clock p1-clr"></i>
                                <span>{{ $event->event_time ?? '9:00 AM - 5:00 PM' }}</span>
                            </div>
                            <div class="info-item d-flex align-items-center gap-2">
                                <i class="fa-solid fa-location-dot p1-clr"></i>
                                <span>{{ $event->location ?? 'Main Campus' }}</span>
                            </div>
                        </div>
                        <h3 class="event-details-title black mb-30">
                            {{ $event->title ?? 'Event Title' }}
                        </h3>
                        <div class="event-details-content mb-40">
                            {!! $event->content ?? $event->description ?? '<p>Event details coming soon.</p>' !!}
                        </div>

                        @if(isset($event->organizer))
                        <div class="event-organizer mb-40 p-4 gra-border round10">
                            <h5 class="black mb-3">Organizer</h5>
                            <p class="pra">{{ $event->organizer }}</p>
                        </div>
                        @endif

                        <!-- Registration Form -->
                        @if($event->registration_open ?? false)
                        <div class="event-registration-form">
                            <h4 class="black mb-30">Register for This Event</h4>
                            <form action="{{ route('events.register', $event->id) }}" method="POST" class="row g-lg-4 g-3">
                                @csrf
                                <div class="col-lg-6">
                                    <div class="form-grp">
                                        <input type="text" name="name" placeholder="Your Name" required>
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-grp">
                                        <input type="email" name="email" placeholder="Your Email" required>
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-grp">
                                        <input type="tel" name="phone" placeholder="Your Phone">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-grp">
                                        <input type="number" name="attendees" placeholder="Number of Attendees" min="1" value="1">
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="theme-btn round100 p2-bg py-3 px-xl-5 px-4">
                                        <span class="white fw-medium">Register Now</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="event-sidebar">
                        <!-- Event Info Card -->
                        <div class="sidebar-widget p-4 gra-border round10 mb-30 wow fadeInUp" data-wow-delay=".3s">
                            <h4 class="black mb-20">Event Information</h4>
                            <ul class="event-info-list">
                                <li class="d-flex justify-content-between mb-3">
                                    <span class="pra">Date:</span>
                                    <span class="black">{{ isset($event) ? $event->event_date->format('M d, Y') : 'TBA' }}</span>
                                </li>
                                <li class="d-flex justify-content-between mb-3">
                                    <span class="pra">Time:</span>
                                    <span class="black">{{ $event->event_time ?? 'TBA' }}</span>
                                </li>
                                <li class="d-flex justify-content-between mb-3">
                                    <span class="pra">Location:</span>
                                    <span class="black">{{ $event->location ?? 'TBA' }}</span>
                                </li>
                                @if(isset($event->price))
                                <li class="d-flex justify-content-between mb-3">
                                    <span class="pra">Price:</span>
                                    <span class="black">{{ $event->price > 0 ? '$' . number_format($event->price, 2) : 'Free' }}</span>
                                </li>
                                @endif
                            </ul>
                        </div>

                        <!-- Upcoming Events -->
                        <div class="sidebar-widget p-4 gra-border round10 wow fadeInUp" data-wow-delay=".4s">
                            <h4 class="black mb-20">Upcoming Events</h4>
                            <div class="upcoming-events">
                                @forelse($upcomingEvents ?? [] as $upcoming)
                                <div class="upcoming-event-item d-flex gap-3 mb-20">
                                    <div class="date-box p1-bg text-center p-2 round5">
                                        <span class="d-block white fw-bold">{{ $upcoming->event_date->format('d') }}</span>
                                        <span class="d-block white small">{{ $upcoming->event_date->format('M') }}</span>
                                    </div>
                                    <div class="content">
                                        <h6><a href="{{ route('events.show', $upcoming->slug ?? $upcoming->id) }}">{{ Str::limit($upcoming->title, 35) }}</a></h6>
                                        <span class="pra small"><i class="fa-solid fa-clock me-1"></i>{{ $upcoming->event_time ?? '9:00 AM' }}</span>
                                    </div>
                                </div>
                                @empty
                                <p class="pra">No upcoming events at the moment.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
