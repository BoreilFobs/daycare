@extends('layouts.web')
@section('title', __('site.services.title'))
@section('content')
    <!-- Breadcrumnd Banner Start -->
    <section class="breadcrumnd-banner cmn-bg overflow-hidden">
        <div class="container">
            <div class="breadcrumnd-wrapper">
                <div class="breadcrumnd-content">
                    <h1 class="black mb-lg-4 mb-md-3 mb-2">
                        {{ __('site.services.title') }}
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
                            {{ __('site.nav.services') }}
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

    <!-- Service Program Section Start -->
    <section class="program-sectionv1 overflow-hidden section-padding position-relative">
        <div class="container">
            <div class="row align-items-center g-4">
                @forelse($services ?? [] as $index => $service)
                <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".{{ 3 + $index }}s">
                    <div class="program-item gra-border">
                        <div class="icons gra-border round10 d-center">
                            @if($service->icon && str_contains($service->icon, 'fa-'))
                                <i class="{{ $service->icon }} p1-clr fs-2"></i>
                            @else
                                <img src="{{ asset('img/aicon/car-icons' . (($index % 6) + 1) . '.png') }}" alt="img">
                            @endif
                        </div>
                        <div class="content">
                            <h4>
                                <a href="{{ route('services.show', $service->id) }}">{{ $service->title }}</a>
                            </h4>
                            <p>
                                {{ Str::limit($service->description, 120) }}
                            </p>
                            <a href="{{ route('services.show', $service->id) }}" class="readmore d-flex align-items-center gap-2">
                                {{ __('site.read_more') }}
                                <span class="arrows mt-1">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="program-item gra-border">
                        <div class="icons gra-border round10 d-center">
                            <img src="{{ asset('img/aicon/car-icons1.png') }}" alt="img">
                        </div>
                        <div class="content">
                            <h4>
                                <a href="#">{{ __('site.services.daycare.title') }}</a>
                            </h4>
                            <p>
                                {{ __('site.services.daycare.description') }}
                            </p>
                            <a href="#" class="readmore d-flex align-items-center gap-2">
                                {{ __('site.read_more') }}
                                <span class="arrows mt-1">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="program-item gra-border">
                        <div class="icons gra-border round10 d-center">
                            <img src="{{ asset('img/aicon/car-icons2.png') }}" alt="img">
                        </div>
                        <div class="content">
                            <h4>
                                <a href="#">{{ __('site.services.early_learning.title') }}</a>
                            </h4>
                            <p>
                                {{ __('site.services.early_learning.description') }}
                            </p>
                            <a href="#" class="readmore d-flex align-items-center gap-2">
                                {{ __('site.read_more') }}
                                <span class="arrows mt-1">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="program-item gra-border">
                        <div class="icons gra-border round10 d-center">
                            <img src="{{ asset('img/aicon/car-icons3.png') }}" alt="img">
                        </div>
                        <div class="content">
                            <h4>
                                <a href="#">Preschool</a>
                            </h4>
                            <p>
                                Early childhood education program that prepares children for kindergarten through play-based learning.
                            </p>
                            <a href="#" class="readmore d-flex align-items-center gap-2">
                                Read More
                                <span class="arrows mt-1">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="program-item gra-border">
                        <div class="icons gra-border round10 d-center">
                            <img src="{{ asset('img/aicon/car-icons4.png') }}" alt="img">
                        </div>
                        <div class="content">
                            <h4>
                                <a href="#">After School Care</a>
                            </h4>
                            <p>
                                Safe and engaging after-school programs with homework assistance and recreational activities.
                            </p>
                            <a href="#" class="readmore d-flex align-items-center gap-2">
                                Read More
                                <span class="arrows mt-1">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="program-item gra-border">
                        <div class="icons gra-border round10 d-center">
                            <img src="{{ asset('img/aicon/car-icons5.png') }}" alt="img">
                        </div>
                        <div class="content">
                            <h4>
                                <a href="#">Summer Camp</a>
                            </h4>
                            <p>
                                Exciting summer programs with outdoor activities, arts and crafts, and educational field trips.
                            </p>
                            <a href="#" class="readmore d-flex align-items-center gap-2">
                                Read More
                                <span class="arrows mt-1">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="program-item gra-border">
                        <div class="icons gra-border round10 d-center">
                            <img src="{{ asset('img/aicon/car-icons6.png') }}" alt="img">
                        </div>
                        <div class="content">
                            <h4>
                                <a href="#">Special Needs Support</a>
                            </h4>
                            <p>
                                Individualized programs tailored to meet the unique needs of every child with specialized support.
                            </p>
                            <a href="#" class="readmore d-flex align-items-center gap-2">
                                Read More
                                <span class="arrows mt-1">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Stay Success Section Start -->
    <section class="stay-section pt-50 pb-50 cmn-bg overflow-hidden position-relative">
        <div class="container">
            <div class="row justify-content-between align-items-center g-4">
                <div class="col-lg-5 col-md-6 col-sm-7">
                    <div class="stay-content">
                        <div class="section-title">
                            <span class="sub-title wow fadeInUp black">
                                Stay With Us
                            </span>
                            <h3 class="m-title wow fadeInUp black mb-sm-3 mb-2" data-wow-delay=".3s">
                                {{ $pageSections['stay_title'] ?? 'The path to success starts with education' }}
                            </h3>
                            <p class="mb-24 pra wow fadeInUp" data-wow-delay=".4s">
                                {{ $pageSections['stay_description'] ?? 'We provide a nurturing environment where children can grow, learn, and develop essential skills for their future.' }}
                            </p>
                            <a href="{{ route('contact') }}" class="theme-btn round100 p2-bg py-3">
                                <span class="white fw-medium">
                                    Contact Us
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
