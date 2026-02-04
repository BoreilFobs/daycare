@extends('layouts.web')
@section('title', 'Gallery')
@section('content')
    <!-- Breadcrumnd Banner Start -->
    <section class="breadcrumnd-banner cmn-bg overflow-hidden">
        <div class="container">
            <div class="breadcrumnd-wrapper">
                <div class="breadcrumnd-content">
                    <h1 class="black mb-lg-4 mb-md-3 mb-2">
                        Our Gallery
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
                            Gallery
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

    <!-- Gallery Section Start -->
    <section class="gallery-section mt-60 overflow-hidden space-bottom">
        <div class="container">
            <div class="section-title text-center mb-50">
                <span class="sub-title d-block p1-clr mb-15">
                    Photo Gallery
                </span>
                <h2 class="black fw-medium">
                    Moments at Our Daycare
                </h2>
            </div>

            <!-- Filter Buttons -->
            <div class="gallery-filter text-center mb-40">
                <div class="btn-group flex-wrap justify-content-center" role="group">
                    <a href="{{ route('gallery') }}" class="theme-btn {{ !request('category') ? 'p2-bg' : 'gra-border' }} round100 py-2 px-4 mx-2 mb-2">
                        <span class="{{ !request('category') ? 'white' : 'black' }} fw-medium">All</span>
                    </a>
                    @foreach($categories as $category)
                    <a href="{{ route('gallery', ['category' => $category]) }}" class="theme-btn {{ request('category') == $category ? 'p2-bg' : 'gra-border' }} round100 py-2 px-4 mx-2 mb-2">
                        <span class="{{ request('category') == $category ? 'white' : 'black' }} fw-medium">{{ ucfirst($category) }}</span>
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- Gallery Grid -->
            <div class="row g-4">
                @forelse($images as $image)
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item position-relative overflow-hidden round10 wow fadeInUp" data-wow-delay=".{{ ($loop->index % 3 + 1) }}s">
                        <a href="{{ $image->image_url ?? asset('img/aprotfolio/prot1.png') }}" class="gallery-popup">
                            <img src="{{ $image->image_url ?? asset('img/aprotfolio/prot1.png') }}" alt="{{ $image->title ?? 'Gallery Image' }}" class="w-100">
                            <div class="gallery-overlay">
                                <div class="gallery-content text-center">
                                    <i class="fa-solid fa-magnifying-glass-plus white fs-2 mb-2"></i>
                                    <h5 class="white mb-1">{{ $image->title ?? 'Gallery Image' }}</h5>
                                    @if($image->category)
                                    <span class="white opacity-75">{{ ucfirst($image->category) }}</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <div class="empty-state p-5">
                        <i class="fa-solid fa-images fa-4x pra mb-4"></i>
                        <h4 class="black mb-3">No Images Yet</h4>
                        <p class="pra">Our gallery is being updated. Check back soon for photos of our activities!</p>
                    </div>
                </div>
                @endforelse
            </div>

            @if($images->hasPages())
            <div class="pagination-wrap mt-50 d-flex justify-content-center">
                {{ $images->links() }}
            </div>
            @endif
        </div>
    </section>

    <!-- Stay Section Start -->
    <section class="stay-section overflow-hidden cmn-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="stay-content py-60">
                        <span class="sub-title d-block p1-clr mb-15">
                            Schedule a Visit
                        </span>
                        <h2 class="black fw-medium mb-4">
                            Come See Our Facilities
                        </h2>
                        <p class="pra mb-4">
                            Pictures only tell part of the story. Schedule a tour to experience our nurturing environment firsthand and see why families love our daycare.
                        </p>
                        <a href="{{ route('contact') }}" class="theme-btn round100 p2-bg py-3 px-xl-5 px-4">
                            <span class="white fw-medium">
                                Book a Tour
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="stay-thumb">
                        <img src="{{ asset('img/ainspair/stay-thumb.png') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    .gallery-item {
        cursor: pointer;
    }
    .gallery-item img {
        transition: transform 0.5s ease;
        aspect-ratio: 4/3;
        object-fit: cover;
    }
    .gallery-item:hover img {
        transform: scale(1.1);
    }
    .gallery-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }
    .empty-state i {
        opacity: 0.3;
    }
</style>
@endpush
