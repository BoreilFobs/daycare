@extends('layouts.web')
@section('title', 'Page Not Found')
@section('content')
    <!-- Error Section Start -->
    <section class="error-section py-100 overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="error-content">
                        <div class="error-number mb-4">
                            <h1 class="display-1 fw-bold p1-clr" style="font-size: 150px; line-height: 1;">404</h1>
                        </div>
                        <div class="error-thumb mb-40">
                            <img src="{{ asset('images/bread-thumb.png') }}" alt="404" class="img-fluid" style="max-width: 300px;">
                        </div>
                        <h2 class="black fw-medium mb-4">Oops! Page Not Found</h2>
                        <p class="pra mb-40 px-lg-5">
                            The page you are looking for might have been removed, had its name changed, or is temporarily unavailable. Let's get you back on track!
                        </p>
                        <div class="error-buttons d-flex flex-wrap justify-content-center gap-3">
                            <a href="{{ route('home') }}" class="theme-btn round100 p2-bg py-3 px-xl-5 px-4">
                                <span class="white fw-medium">
                                    <i class="fa-solid fa-home me-2"></i>Back to Home
                                </span>
                            </a>
                            <a href="{{ route('contact') }}" class="theme-btn round100 gra-border py-3 px-xl-5 px-4">
                                <span class="black fw-medium">
                                    <i class="fa-solid fa-envelope me-2"></i>Contact Us
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Helpful Links Section -->
    <section class="helpful-links-section cmn-bg py-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h4 class="black text-center mb-40">Helpful Links</h4>
                    <div class="row g-4">
                        <div class="col-md-3 col-6">
                            <a href="{{ route('about') }}" class="helpful-link-card d-block p-4 bg-white round10 text-center text-decoration-none h-100">
                                <i class="fa-solid fa-info-circle p1-clr fs-2 mb-3"></i>
                                <h6 class="black mb-0">About Us</h6>
                            </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="{{ route('programs') }}" class="helpful-link-card d-block p-4 bg-white round10 text-center text-decoration-none h-100">
                                <i class="fa-solid fa-book p1-clr fs-2 mb-3"></i>
                                <h6 class="black mb-0">Programs</h6>
                            </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="{{ route('services') }}" class="helpful-link-card d-block p-4 bg-white round10 text-center text-decoration-none h-100">
                                <i class="fa-solid fa-concierge-bell p1-clr fs-2 mb-3"></i>
                                <h6 class="black mb-0">Services</h6>
                            </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="{{ route('blog') }}" class="helpful-link-card d-block p-4 bg-white round10 text-center text-decoration-none h-100">
                                <i class="fa-solid fa-newspaper p1-clr fs-2 mb-3"></i>
                                <h6 class="black mb-0">Blog</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    .error-section {
        min-height: 60vh;
        display: flex;
        align-items: center;
    }
    .helpful-link-card {
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .helpful-link-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .py-100 {
        padding-top: 100px;
        padding-bottom: 100px;
    }
</style>
@endpush
