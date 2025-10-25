@extends('layouts.web')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">{{ $pageSections['header']['title'] ?? 'Services' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">Pages</a></li> --}}
                    <li class="breadcrumb-item text-white" aria-current="page">{{ $pageSections['header']['title'] ?? 'Services' }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Service Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">{{ $pageSections['content']['title'] ?? 'What We Do' }}</h4>
                <h1 class="mb-5 display-3">{{ $pageSections['content']['heading'] ?? 'Our Professional Services' }}</h1>
            </div>
            <div class="row g-5">
                @forelse($services as $index => $service)
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeIn" data-wow-delay="{{ 0.1 + ($index * 0.2) }}s">
                        <div class="text-center border-primary border bg-white service-item">
                            <div class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-inner">
                                    <div class="p-4"><i class="{{ $service->icon ?? 'fas fa-child' }} fa-6x text-primary"></i></div>
                                    <a href="#" class="h4">{{ $service->title }}</a>
                                    <p class="my-3">{{ $service->description }}</p>
                                    @if($service->link)
                                        <a href="{{ $service->link }}" class="btn btn-primary text-white px-4 py-2 my-2 btn-border-radius">Read More</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No services available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection