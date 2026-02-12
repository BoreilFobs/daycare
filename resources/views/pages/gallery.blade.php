@extends('layouts.web')
@section('title', __('site.nav.gallery'))
@section('content')
    <!-- Breadcrumnd Banner Start -->
    <section class="breadcrumnd-banner cmn-bg overflow-hidden">
        <div class="container">
            <div class="breadcrumnd-wrapper">
                <div class="breadcrumnd-content">
                    <h1 class="black mb-lg-4 mb-md-3 mb-2">
                        {{ __('site.gallery.title') }}
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
                            {{ __('site.nav.gallery') }}
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

    <!-- Gallery Section Start -->
    <section class="gallery-section mt-60 overflow-hidden space-bottom">
        <div class="container">
            <div class="section-title text-center mb-50">
                <span class="sub-title d-block p1-clr mb-15">
                    {{ __('site.nav.gallery') }}
                </span>
                <h2 class="black fw-medium">
                    {{ __('site.gallery.subtitle') }}
                </h2>
            </div>

            <!-- Filter Buttons -->
            <div class="gallery-filter text-center mb-40">
                <div class="btn-group flex-wrap justify-content-center" role="group">
                    <a href="{{ route('gallery') }}" class="theme-btn {{ !request('category') ? 'p2-bg' : 'gra-border' }} round100 py-2 px-4 mx-2 mb-2">
                        <span class="{{ !request('category') ? 'white' : 'black' }} fw-medium">{{ __('site.gallery.all') }}</span>
                    </a>
                    @foreach($categories as $category)
                    <a href="{{ route('gallery', ['category' => $category]) }}" class="theme-btn {{ request('category') == $category ? 'p2-bg' : 'gra-border' }} round100 py-2 px-4 mx-2 mb-2">
                        <span class="{{ request('category') == $category ? 'white' : 'black' }} fw-medium">{{ ucfirst($category) }}</span>
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- Beautiful Masonry Gallery Grid -->
            <div class="gallery-masonry row g-4">
                @forelse($images as $image)
                <div class="col-lg-4 col-md-6 gallery-masonry-item">
                    <div class="gallery-card position-relative overflow-hidden round10 wow fadeInUp" data-wow-delay=".{{ ($loop->index % 3 + 1) }}s">
                        <a href="{{ $image->image_url ?? asset('images/imported/gallery-' . (($loop->index % 14) + 1) . '.jpeg') }}" 
                           class="gallery-lightbox" 
                           data-title="{{ $image->title ?? 'Gallery Image' }}"
                           data-category="{{ $image->category ?? '' }}">
                            <img src="{{ $image->image_url ?? asset('images/imported/gallery-' . (($loop->index % 14) + 1) . '.jpeg') }}" 
                                 alt="{{ $image->title ?? 'Gallery Image' }}" 
                                 class="gallery-img w-100">
                            <div class="gallery-hover">
                                <div class="gallery-hover-content">
                                    <div class="icon-zoom">
                                        <i class="fa-solid fa-expand white fs-1"></i>
                                    </div>
                                    <h5 class="white mt-3 mb-1">{{ $image->title ?? 'Gallery Image' }}</h5>
                                    @if($image->category)
                                    <span class="white opacity-75 small">{{ ucfirst($image->category) }}</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @empty
                @for($i = 1; $i <= 14; $i++)
                <div class="col-lg-4 col-md-6 gallery-masonry-item">
                    <div class="gallery-card position-relative overflow-hidden round10 wow fadeInUp" data-wow-delay=".{{ ($i % 3 + 1) }}s">
                        <a href="{{ asset('images/imported/gallery-' . $i . '.jpeg') }}" 
                           class="gallery-lightbox"
                           data-title="Gallery Image {{ $i }}">
                            <img src="{{ asset('images/imported/gallery-' . $i . '.jpeg') }}" 
                                 alt="Gallery Image {{ $i }}" 
                                 class="gallery-img w-100">
                            <div class="gallery-hover">
                                <div class="gallery-hover-content">
                                    <div class="icon-zoom">
                                        <i class="fa-solid fa-expand white fs-1"></i>
                                    </div>
                                    <h5 class="white mt-3 mb-1">{{ __('site.gallery.view_image') }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endfor
                @endforelse
            </div>

            @if($images->hasPages())
            <div class="pagination-wrap mt-50 d-flex justify-content-center">
                {{ $images->links() }}
            </div>
            @endif
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div class="gallery-lightbox-modal" id="galleryLightbox">
        <div class="lightbox-backdrop"></div>
        <div class="lightbox-container">
            <button class="lightbox-close" aria-label="Close">&times;</button>
            <button class="lightbox-nav lightbox-prev" aria-label="Previous"><i class="fa-solid fa-chevron-left"></i></button>
            <button class="lightbox-nav lightbox-next" aria-label="Next"><i class="fa-solid fa-chevron-right"></i></button>
            <div class="lightbox-content">
                <img src="" alt="" class="lightbox-image">
                <div class="lightbox-caption">
                    <h4 class="lightbox-title"></h4>
                    <span class="lightbox-counter"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Stay Section Start -->
    <section class="stay-section pt-50 pb-50 cmn-bg overflow-hidden position-relative">
        <div class="container">
            <div class="row justify-content-between align-items-center g-4">
                <div class="col-lg-5 col-md-6 col-sm-7">
                    <div class="stay-content">
                        <div class="section-title">
                            <span class="sub-title wow fadeInUp black">
                                {{ __('site.gallery.schedule_visit') }}
                            </span>
                            <h3 class="m-title wow fadeInUp black mb-sm-3 mb-2" data-wow-delay=".3s">
                                {{ __('site.gallery.come_see') }}
                            </h3>
                            <p class="mb-24 pra wow fadeInUp" data-wow-delay=".4s">
                                {{ __('site.about.description') }}
                            </p>
                            <a href="{{ route('contact') }}" class="theme-btn round100 p2-bg py-3">
                                <span class="white fw-medium">
                                    {{ __('site.gallery.book_tour') }}
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 me-xl-5 col-sm-5">
                    <div class="stay-thumb w-100">
                        <img src="{{ asset('images/stay-thumb.png') }}" alt="img" class="w-100">
                    </div>
                </div>
            </div>
        </div>
        <!-- Element-->
        <img src="{{ asset('img/aservices/stay-shape.png') }}" alt="img" class="stay-element">
    </section>
@endsection

@push('styles')
<style>
    /* Gallery Card Styles */
    .gallery-card {
        cursor: pointer;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .gallery-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    .gallery-img {
        transition: transform 0.5s ease;
        aspect-ratio: 4/3;
        object-fit: cover;
    }
    .gallery-card:hover .gallery-img {
        transform: scale(1.1);
    }
    .gallery-hover {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(180deg, rgba(0,0,0,0.2) 0%, rgba(255,72,128,0.8) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .gallery-card:hover .gallery-hover {
        opacity: 1;
    }
    .gallery-hover-content {
        text-align: center;
        transform: translateY(20px);
        transition: transform 0.3s ease;
    }
    .gallery-card:hover .gallery-hover-content {
        transform: translateY(0);
    }
    .icon-zoom {
        width: 70px;
        height: 70px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        backdrop-filter: blur(5px);
    }
    
    /* Lightbox Modal Styles */
    .gallery-lightbox-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
    }
    .gallery-lightbox-modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .lightbox-backdrop {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.95);
    }
    .lightbox-container {
        position: relative;
        max-width: 90vw;
        max-height: 90vh;
        z-index: 1;
    }
    .lightbox-content {
        text-align: center;
    }
    .lightbox-image {
        max-width: 90vw;
        max-height: 80vh;
        object-fit: contain;
        border-radius: 10px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.5);
        animation: lightboxFadeIn 0.3s ease;
    }
    @keyframes lightboxFadeIn {
        from { opacity: 0; transform: scale(0.9); }
        to { opacity: 1; transform: scale(1); }
    }
    .lightbox-caption {
        margin-top: 20px;
        color: #fff;
    }
    .lightbox-title {
        font-size: 1.5rem;
        margin-bottom: 5px;
    }
    .lightbox-counter {
        opacity: 0.7;
        font-size: 0.9rem;
    }
    .lightbox-close {
        position: absolute;
        top: -50px;
        right: 0;
        background: none;
        border: none;
        color: #fff;
        font-size: 40px;
        cursor: pointer;
        transition: transform 0.2s ease;
        z-index: 10;
    }
    .lightbox-close:hover {
        transform: scale(1.2);
    }
    .lightbox-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255,255,255,0.1);
        border: none;
        color: #fff;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
        transition: background 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .lightbox-nav:hover {
        background: rgba(255,72,128,0.8);
    }
    .lightbox-prev {
        left: -80px;
    }
    .lightbox-next {
        right: -80px;
    }
    
    /* Mobile Responsive */
    @media (max-width: 768px) {
        .lightbox-nav {
            width: 40px;
            height: 40px;
        }
        .lightbox-prev {
            left: 10px;
        }
        .lightbox-next {
            right: 10px;
        }
        .lightbox-close {
            top: 10px;
            right: 10px;
            font-size: 30px;
        }
        .lightbox-title {
            font-size: 1.1rem;
        }
        .icon-zoom {
            width: 50px;
            height: 50px;
        }
        .icon-zoom i {
            font-size: 1.5rem !important;
        }
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const lightbox = document.getElementById('galleryLightbox');
    const lightboxImage = lightbox.querySelector('.lightbox-image');
    const lightboxTitle = lightbox.querySelector('.lightbox-title');
    const lightboxCounter = lightbox.querySelector('.lightbox-counter');
    const galleryLinks = document.querySelectorAll('.gallery-lightbox');
    let currentIndex = 0;
    
    // Open lightbox
    galleryLinks.forEach((link, index) => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            currentIndex = index;
            openLightbox();
        });
    });
    
    function openLightbox() {
        const link = galleryLinks[currentIndex];
        lightboxImage.src = link.href;
        lightboxTitle.textContent = link.dataset.title || '';
        lightboxCounter.textContent = `${currentIndex + 1} / ${galleryLinks.length}`;
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    
    function closeLightbox() {
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
    }
    
    function navigate(direction) {
        currentIndex += direction;
        if (currentIndex < 0) currentIndex = galleryLinks.length - 1;
        if (currentIndex >= galleryLinks.length) currentIndex = 0;
        openLightbox();
    }
    
    // Event listeners
    lightbox.querySelector('.lightbox-close').addEventListener('click', closeLightbox);
    lightbox.querySelector('.lightbox-backdrop').addEventListener('click', closeLightbox);
    lightbox.querySelector('.lightbox-prev').addEventListener('click', () => navigate(-1));
    lightbox.querySelector('.lightbox-next').addEventListener('click', () => navigate(1));
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (!lightbox.classList.contains('active')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') navigate(-1);
        if (e.key === 'ArrowRight') navigate(1);
    });
    
    // Touch swipe support
    let touchStartX = 0;
    lightbox.addEventListener('touchstart', (e) => touchStartX = e.touches[0].clientX);
    lightbox.addEventListener('touchend', function(e) {
        const diff = touchStartX - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 50) navigate(diff > 0 ? 1 : -1);
    });
});
</script>
@endpush
