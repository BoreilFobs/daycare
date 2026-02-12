@extends('layouts.web')
@section('title', $service->title ?? 'Service Detail')
@section('content')
    <!-- Breadcrumnd Banner Start -->
    <section class="breadcrumnd-banner cmn-bg overflow-hidden">
        <div class="container">
            <div class="breadcrumnd-wrapper">
                <div class="breadcrumnd-content">
                    <h1 class="black mb-lg-4 mb-md-3 mb-2">
                        Service Details
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
                            <a href="{{ route('services') }}">
                                Services
                            </a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                            {{ $service->title ?? 'Details' }}
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

    <!-- Service Details Section Start -->
    <section class="service-details-section mt-60 overflow-hidden space-bottom">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="service-details-wrap">
                        <div class="service-details-thumb mb-40 wow fadeInUp">
                            <img src="{{ asset('img/aservices/service-details.png') }}" alt="{{ $service->title }}" class="w-100 round10">
                        </div>
                        <h3 class="service-details-title black mb-30 wow fadeInUp" data-wow-delay=".2s">
                            {{ $service->title }}
                        </h3>
                        <div class="service-details-content mb-40 wow fadeInUp" data-wow-delay=".3s">
                            {!! $service->description !!}
                        </div>

                        @if($service->full_description)
                        <div class="service-full-description mb-40 wow fadeInUp" data-wow-delay=".4s">
                            <h4 class="black mb-20">Detailed Information</h4>
                            <div class="full-description-content">
                                {!! $service->full_description !!}
                            </div>
                        </div>
                        @endif

                        <!-- Benefits Section -->
                        <div class="service-benefits mb-40 wow fadeInUp" data-wow-delay=".5s">
                            <h4 class="black mb-20">Benefits for Your Child</h4>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="benefit-card p-4 gra-border round10 h-100">
                                        <div class="benefit-icon p1-bg round-circle mb-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fa-solid fa-brain white fs-4"></i>
                                        </div>
                                        <h5 class="black mb-2">Cognitive Development</h5>
                                        <p class="pra small">Stimulating activities that promote thinking, problem-solving, and creativity.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="benefit-card p-4 gra-border round10 h-100">
                                        <div class="benefit-icon p2-bg round-circle mb-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fa-solid fa-heart white fs-4"></i>
                                        </div>
                                        <h5 class="black mb-2">Social Skills</h5>
                                        <p class="pra small">Building friendships and learning to interact positively with others.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="benefit-card p-4 gra-border round10 h-100">
                                        <div class="benefit-icon p1-bg round-circle mb-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fa-solid fa-running white fs-4"></i>
                                        </div>
                                        <h5 class="black mb-2">Physical Growth</h5>
                                        <p class="pra small">Active play and exercises that support healthy physical development.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="benefit-card p-4 gra-border round10 h-100">
                                        <div class="benefit-icon p2-bg round-circle mb-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fa-solid fa-smile white fs-4"></i>
                                        </div>
                                        <h5 class="black mb-2">Emotional Support</h5>
                                        <p class="pra small">A nurturing environment that builds confidence and self-esteem.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-sidebar">
                        <!-- Service Info Card -->
                        <div class="sidebar-widget p-4 gra-border round10 mb-30 wow fadeInUp" data-wow-delay=".3s">
                            <h4 class="black mb-20">Service Information</h4>
                            <ul class="service-info-list">
                                @if($service->icon)
                                <li class="d-flex align-items-center gap-3 mb-3 pb-3 border-bottom">
                                    <i class="{{ $service->icon }} p1-clr fs-5"></i>
                                    <span class="black">{{ $service->title }}</span>
                                </li>
                                @endif
                                <li class="d-flex justify-content-between mb-3">
                                    <span class="pra">Status:</span>
                                    <span class="badge {{ $service->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $service->is_active ? 'Available' : 'Coming Soon' }}</span>
                                </li>
                            </ul>
                            <a href="{{ route('contact') }}" class="theme-btn round100 p2-bg py-3 w-100 text-center mt-3">
                                <span class="white fw-medium">Inquire Now</span>
                            </a>
                        </div>

                        <!-- Other Services -->
                        <div class="sidebar-widget p-4 gra-border round10 mb-30 wow fadeInUp" data-wow-delay=".4s">
                            <h4 class="black mb-20">Other Services</h4>
                            <div class="other-services">
                                @forelse($otherServices ?? [] as $other)
                                <a href="{{ route('services.show', $other->id) }}" class="other-service-item d-flex align-items-center gap-3 p-3 mb-3 gra-border round10 text-decoration-none">
                                    <div class="service-icon p1-bg round-circle" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                        <i class="{{ $other->icon ?? 'fa-solid fa-star' }} white"></i>
                                    </div>
                                    <div>
                                        <h6 class="black mb-0">{{ $other->title }}</h6>
                                    </div>
                                    <i class="fa-solid fa-chevron-right ms-auto pra"></i>
                                </a>
                                @empty
                                <p class="pra">No other services available.</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- Contact Card -->
                        <div class="sidebar-widget p-4 p1-bg round10 wow fadeInUp" data-wow-delay=".5s">
                            <h4 class="white mb-20">{{ __('site.nav.faq') }}</h4>
                            <p class="white opacity-75 mb-4">{{ __('site.contact.send_message') }}</p>
                            <div class="contact-info mb-4">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <i class="fa-solid fa-phone white"></i>
                                    <a href="tel:{{ $siteSettings['contact_phone'] ?? '+237 678 165 580' }}" class="white">{{ $siteSettings['contact_phone'] ?? '+237 678 165 580' }}</a>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <i class="fa-solid fa-envelope white"></i>
                                    <a href="mailto:{{ $siteSettings['contact_email'] ?? 'abccentre4kids@gmail.com' }}" class="white">{{ $siteSettings['contact_email'] ?? 'abccentre4kids@gmail.com' }}</a>
                                </div>
                            </div>
                            <a href="{{ route('contact') }}" class="theme-btn round100 white-bg py-3 w-100 text-center">
                                <span class="p1-clr fw-medium">{{ __('site.nav.contact') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
