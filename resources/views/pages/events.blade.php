@extends('layouts.web')
@section('content')
     <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">{{ $pageSections['header']['title'] ?? 'Events' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">Pages</a></li> --}}
                    <li class="breadcrumb-item text-white" aria-current="page">{{ $pageSections['header']['title'] ?? 'Events' }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Events Start -->
    <div class="container-fluid events py-5 bg-light">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">{{ $pageSections['content']['title'] ?? 'Our Events' }}</h4>
                <h1 class="mb-5 display-3">{{ $pageSections['content']['heading'] ?? 'Our Upcoming Events' }}</h1>
            </div>
            <div class="row g-5 justify-content-center">
                @forelse($events as $index => $event)
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="{{ 0.1 + ($index * 0.2) }}s">
                        <div class="events-item bg-primary rounded">
                            <div class="events-inner position-relative">
                                <div class="events-img overflow-hidden rounded-circle position-relative">
                                    <img src="{{ $event->image_url ?? asset('img/event-' . (($index % 3) + 1) . '.jpg') }}" class="img-fluid w-100 rounded-circle" alt="{{ $event->title }}">
                                    <div class="event-overlay">
                                        <a href="{{ $event->image_url ?? asset('img/event-' . (($index % 3) + 1) . '.jpg') }}" data-lightbox="event-{{ $event->id }}"><i class="fas fa-search-plus text-white fa-2x"></i></a>
                                    </div>
                                </div>
                                <div class="px-4 py-2 bg-secondary text-white text-center events-rate">{{ $event->event_date->format('d M') }}</div>
                                <div class="d-flex justify-content-between px-4 py-2 bg-secondary">
                                    <small class="text-white"><i class="fas fa-calendar me-1 text-primary"></i> {{ $event->start_time ? \Carbon\Carbon::parse($event->start_time)->format('g:i A') : 'TBA' }}</small>
                                    <small class="text-white"><i class="fas fa-map-marker-alt me-1 text-primary"></i> {{ Str::limit($event->location, 15) ?? 'TBA' }}</small>
                                </div>
                            </div>
                            <div class="events-text p-4 border border-primary bg-white border-top-0 rounded-bottom">
                                <a href="{{ route('events.show', $event->id) }}" class="h4 d-block mb-3">{{ $event->title }}</a>
                                <p class="mb-3">{{ Str::limit($event->description, 100) }}</p>
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary btn-sm px-4 py-2">
                                    Read More <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No events available at the moment.</p>
                    </div>
                @endforelse
                
                {{-- Pagination --}}
                @if($events->hasPages())
                    <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex justify-content-center">
                            {{ $events->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Events End-->

@endsection