@extends('layouts.web')
@section('title', __('site.nav.events'))
@section('content')
    <!-- Breadcrumnd Banner Start -->
    <section class="breadcrumnd-banner cmn-bg overflow-hidden">
        <div class="container">
            <div class="breadcrumnd-wrapper">
                <div class="breadcrumnd-content">
                    <h1 class="black mb-lg-4 mb-md-3 mb-2">
                        {{ __('site.events.title') }}
                    </h1>
                    <ul class="bread-list d-flex align-items-center gap-lg-4 gap-md-3 gap-2">
                        <li>
                            <a href="{{ route('home') }}">
                                {{ __('site.nav.home') }}
                            </a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                            {{ __('site.nav.events') }}
                        </li>
                    </ul>
                </div>
                <div class="breadcrumnd-thumb position-relative">
                    <img src="{{ asset('img/abanner/bread-thumb.png') }}" alt="img" class="mimg">
                    <img src="{{ asset('img/abanner/bread-child.png') }}" alt="img" class="bread-child">
                    <img src="{{ asset('img/abanner/bread-cat.png') }}" alt="img" class="bread-cat">
                </div>
            </div>
        </div>
    </section>

    <!-- Events Section Start -->
    <section class="events-section mt-60 overflow-hidden space-bottom">
        <div class="container">
            <div class="row g-4">
                @forelse($events ?? [] as $event)
                <div class="col-lg-6">
                    <div class="event-card d-flex flex-wrap flex-md-nowrap gap-4 wow fadeInUp" data-wow-delay=".{{ $loop->iteration }}s">
                        <div class="event-thumb position-relative">
                            <img src="{{ $event->image_url ?? asset('img/aservices/program-item1.png') }}" alt="{{ $event->title }}" class="round10">
                            <div class="event-date p2-bg text-center p-2 round5">
                                <span class="d-block white fw-bold fs-4">{{ $event->event_date->format('d') }}</span>
                                <span class="d-block white">{{ $event->event_date->format('M') }}</span>
                            </div>
                        </div>
                        <div class="event-content">
                            <span class="event-meta d-flex flex-wrap gap-3 mb-3">
                                <span><i class="fa-solid fa-clock me-2"></i>{{ $event->event_time ?? '9:00 AM' }}</span>
                                <span><i class="fa-solid fa-location-dot me-2"></i>{{ $event->location ?? 'Main Hall' }}</span>
                            </span>
                            <h4 class="black mb-3">
                                <a href="{{ route('events.show', $event->slug ?? $event->id) }}">{{ $event->title }}</a>
                            </h4>
                            <p class="pra mb-3">{{ Str::limit($event->description, 100) }}</p>
                            <a href="{{ route('events.show', $event->slug ?? $event->id) }}" class="theme-btn round100 p2-bg py-2 px-4">
                                <span class="white fw-medium">View Details</span>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p class="pra">No events scheduled at the moment. Check back soon!</p>
                </div>
                @endforelse
            </div>

            @if(isset($events) && $events->hasPages())
            <div class="pagination-wrap mt-50 d-flex justify-content-center">
                {{ $events->links() }}
            </div>
            @endif
        </div>
    </section>
@endsection
