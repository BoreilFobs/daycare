@extends('layouts.web')
@section('title', __('site.nav.about'))
@section('content')
    <!-- Breadcrumnd Banner Start -->
    <section class="breadcrumnd-banner cmn-bg overflow-hidden">
        <div class="container">
            <div class="breadcrumnd-wrapper">
                <div class="breadcrumnd-content">
                    <h1 class="black mb-lg-4 mb-md-3 mb-2">
                        {{ __('site.about.title') }}
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
                            {{ __('site.about.title') }}
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

    <!-- Vision & Mission Section Start -->
    <section class="about-sectionv1 space-top overflow-hidden space-bottom">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="about-one-thumbs">
                        <div class="thumbs position-relative wow fadeInUp" data-wow-delay="1200">
                            <img src="{{ asset('img/about/about-1.png') }}" alt="img" class="round10 main-img">
                            <div class="customer-satisfaction">
                                <div class="icon d-center">
                                    <i class="fas fa-heart fa-2x text-white"></i>
                                </div>
                                <div class="cont">
                                    <h4 class="white">
                                        3m-5{{ app()->getLocale() == 'fr' ? 'ans' : 'yrs' }}
                                    </h4>
                                    <p class="white">
                                        {{ app()->getLocale() == 'fr' ? 'Âges d\'admission' : 'Admission Ages' }}
                                    </p>
                                </div>
                            </div>
                            <!-- Element -->
                            <img src="{{ asset('img/about/lighing-cmn.png') }}" alt="img" class="about-light1">
                            <img src="{{ asset('img/about/arrows-cmn.png') }}" alt="img" class="about-arrows">
                        </div>
                        <div class="about-one-grow">
                            <div class="academy-box text-center mb-30 wow fadeInUp" data-wow-delay="1400">
                                <i class="fas fa-users fa-3x mb-3" style="color: #ff4880;"></i>
                                <h4 class="black">
                                    {{ app()->getLocale() == 'fr' ? 'Personnel' : 'Staff' }}
                                </h4>
                                <p class="pra">
                                    {{ app()->getLocale() == 'fr' ? 'Formé, jusqu\'à 6 ans d\'expérience' : 'Trained, up to 6 years experience' }}
                                </p>
                            </div>
                            <div class="academy-box2 gra-border round10 wow fadeInUp" data-wow-delay="1600">
                                <div class="content">
                                    <h3>
                                        5,000<span class="small">FCFA</span>
                                    </h3>
                                    <p>{{ app()->getLocale() == 'fr' ? 'Frais moyens/mois' : 'Average fees/month' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="about-contentv1 ps-xxl-5">
                        <div class="section-title mb-40">
                            <span class="sub-title wow fadeInUp p5-clr">
                                {{ __('site.about.subtitle') }}
                            </span>
                            <h3 class="m-title wow fadeInUp black mb-sm-3 mb-2" data-wow-delay=".3s">
                                {{ __('site.about.description') }}
                            </h3>
                        </div>
                        
                        <!-- Vision -->
                        <div class="mb-4 wow fadeInUp" data-wow-delay=".4s">
                            <h5 class="black mb-2"><i class="fas fa-eye me-2 p5-clr"></i>{{ __('site.about.vision_title') }}</h5>
                            <p class="pra">{{ __('site.about.vision_text') }}</p>
                        </div>
                        
                        <!-- Mission -->
                        <div class="mb-4 wow fadeInUp" data-wow-delay=".5s">
                            <h5 class="black mb-2"><i class="fas fa-bullseye me-2 p5-clr"></i>{{ __('site.about.mission_title') }}</h5>
                            <p class="pra">{{ __('site.about.mission_text') }}</p>
                        </div>
                        
                        <a href="{{ route('contact') }}" class="theme-btn p5-bg">
                            <span class="white fw-medium">
                                {{ __('site.nav.donate') }} <i class="fas fa-heart ms-2"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="values-section space-bottom overflow-hidden">
        <div class="container">
            <div class="row justify-content-center mb-60">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <span class="sub-title wow fadeInUp p5-clr">
                            {{ __('site.about.values_title') }}
                        </span>
                        <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                            {{ app()->getLocale() == 'fr' ? 'Nos Principes Directeurs' : 'Our Guiding Principles' }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="value-card text-center p-4 gra-border round10 h-100">
                        <div class="icon mb-3">
                            <i class="fas fa-child fa-3x p5-clr"></i>
                        </div>
                        <h5 class="black mb-2">{{ __('site.about.values.children_first.title') }}</h5>
                        <p class="pra">{{ __('site.about.values.children_first.description') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="value-card text-center p-4 gra-border round10 h-100">
                        <div class="icon mb-3">
                            <i class="fas fa-balance-scale fa-3x p5-clr"></i>
                        </div>
                        <h5 class="black mb-2">{{ __('site.about.values.equity.title') }}</h5>
                        <p class="pra">{{ __('site.about.values.equity.description') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="value-card text-center p-4 gra-border round10 h-100">
                        <div class="icon mb-3">
                            <i class="fas fa-heart fa-3x p5-clr"></i>
                        </div>
                        <h5 class="black mb-2">{{ __('site.about.values.compassion.title') }}</h5>
                        <p class="pra">{{ __('site.about.values.compassion.description') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="value-card text-center p-4 gra-border round10 h-100">
                        <div class="icon mb-3">
                            <i class="fas fa-hands-helping fa-3x p5-clr"></i>
                        </div>
                        <h5 class="black mb-2">{{ __('site.about.values.collaboration.title') }}</h5>
                        <p class="pra">{{ __('site.about.values.collaboration.description') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Approach Section -->
    <section class="approach-section space-bottom overflow-hidden" style="background: linear-gradient(135deg, #fff5f8 0%, #fff 100%);">
        <div class="container">
            <div class="row justify-content-center mb-60 pt-5">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <span class="sub-title wow fadeInUp p5-clr">
                            {{ __('site.about.approach_title') }}
                        </span>
                        <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                            {{ app()->getLocale() == 'fr' ? 'Comment Nous Accompagnons les Enfants' : 'How We Guide Children' }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="approach-card text-center p-4 bg-white round10 shadow-sm h-100">
                        <div class="icon mb-3">
                            <i class="fas fa-ban fa-3x" style="color: #e74c3c;"></i>
                        </div>
                        <h5 class="black mb-2">{{ __('site.about.approach.no_punishment.title') }}</h5>
                        <p class="pra">{{ __('site.about.approach.no_punishment.description') }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="approach-card text-center p-4 bg-white round10 shadow-sm h-100">
                        <div class="icon mb-3">
                            <i class="fas fa-hand-holding-heart fa-3x" style="color: #ff4880;"></i>
                        </div>
                        <h5 class="black mb-2">{{ __('site.about.approach.gentle_guidance.title') }}</h5>
                        <p class="pra">{{ __('site.about.approach.gentle_guidance.description') }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="approach-card text-center p-4 bg-white round10 shadow-sm h-100">
                        <div class="icon mb-3">
                            <i class="fas fa-shoe-prints fa-3x" style="color: #4d65f9;"></i>
                        </div>
                        <h5 class="black mb-2">{{ __('site.about.approach.step_by_step.title') }}</h5>
                        <p class="pra">{{ __('site.about.approach.step_by_step.description') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Section Start -->
    <section class="facilities-section space-bottom overflow-hidden">
        <div class="container">
            <div class="row justify-content-center mb-60">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <span class="sub-title wow fadeInUp p5-clr">
                            {{ __('site.facilities.title') }}
                        </span>
                        <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                            {{ app()->getLocale() == 'fr' ? 'Un Environnement Adapté aux Enfants' : 'A Child-Friendly Environment' }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="facility-card text-center p-4 gra-border round10 h-100">
                        <div class="icon mb-3">
                            <i class="fas fa-puzzle-piece fa-3x p5-clr"></i>
                        </div>
                        <p class="pra">{{ __('site.facilities.playroom') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="facility-card text-center p-4 gra-border round10 h-100">
                        <div class="icon mb-3">
                            <i class="fas fa-bed fa-3x p5-clr"></i>
                        </div>
                        <p class="pra">{{ __('site.facilities.nap_room') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="facility-card text-center p-4 gra-border round10 h-100">
                        <div class="icon mb-3">
                            <i class="fas fa-chalkboard fa-3x p5-clr"></i>
                        </div>
                        <p class="pra">{{ __('site.facilities.learning_space') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="facility-card text-center p-4 gra-border round10 h-100">
                        <div class="icon mb-3">
                            <i class="fas fa-tree fa-3x p5-clr"></i>
                        </div>
                        <p class="pra">{{ __('site.facilities.outdoor') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Support Section -->
    <section class="pricing-sectionv position-relative fix space-bottom">
        <div class="container">
            <div class="row justify-content-center mb-60">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <span class="sub-title wow fadeInUp p5-clr">
                            {{ __('site.support.title') }}
                        </span>
                        <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                            {{ __('site.support.description') }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row g-lg-0 g-4">
                @forelse($pricingPlans ?? [] as $index => $plan)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".{{ 3 + ($index * 2) }}s">
                    <div class="pricing-items {{ $plan->is_featured ? 'cart-active' : '' }}">
                        <h4 class="pricing-head">
                            {{ $plan->name }}
                        </h4>
                        <div class="pricing-body">
                            <h1 class="price-title p4-clr mb-30">
                                ${{ $plan->price }}
                                <span class="mos black">
                                    /mo
                                </span>
                            </h1>
                            <ul class="pricing-listing d-grid gap-2 mb-40">
                                @foreach($plan->features as $feature)
                                <li class="d-flex align-items-center gap-xxl-4 gap-2 pra">
                                    @if($feature['included'])
                                    <i class="fa-solid fa-angles-right p5-clr"></i>
                                    @else
                                    <i class="fa-solid fa-circle-xmark cros"></i>
                                    @endif
                                    {{ $feature['name'] }}
                                </li>
                                @endforeach
                            </ul>
                            <div class="text-center">
                                <a href="{{ route('contact') }}" class="theme-btn">
                                    <span>
                                        Buy Now
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="pricing-items">
                        <h4 class="pricing-head">
                            Starter Plan
                        </h4>
                        <div class="pricing-body">
                            <h1 class="price-title p4-clr mb-30">
                                $19
                                <span class="mos black">
                                    /mo
                                </span>
                            </h1>
                            <ul class="pricing-listing d-grid gap-2 mb-40">
                                <li class="d-flex align-items-center gap-xxl-4 gap-2 pra">
                                    <i class="fa-solid fa-angles-right p5-clr"></i>
                                    Basic Learning Materials
                                </li>
                                <li class="d-flex align-items-center gap-xxl-4 gap-2 pra">
                                    <i class="fa-solid fa-angles-right p5-clr"></i>
                                    Half Day Program
                                </li>
                                <li class="d-flex align-items-center gap-xxl-4 gap-2 pra">
                                    <i class="fa-solid fa-circle-xmark cros"></i>
                                    Lunch Included
                                </li>
                                <li class="d-flex align-items-center gap-xxl-4 gap-2 pra">
                                    <i class="fa-solid fa-circle-xmark cros"></i>
                                    Extended Hours
                                </li>
                                <li class="d-flex align-items-center gap-xxl-4 gap-2 pra">
                                    <i class="fa-solid fa-circle-xmark cros"></i>
                                    Extra Activities
                                </li>
                            </ul>
                            <div class="text-center">
                                <a href="{{ route('contact') }}" class="theme-btn">
                                    <span>
                                        Buy Now
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="pricing-items cart-active">
                        <h4 class="pricing-head">
                            Golden Plan
                        </h4>
                        <div class="pricing-body">
                            <h1 class="price-title p4-clr mb-30">
                                $39
                                <span class="mos black">
                                    /mo
                                </span>
                            </h1>
                            <ul class="pricing-listing d-grid gap-2 mb-40">
                                <li class="d-flex align-items-center gap-xxl-4 gap-2 pra">
                                    <i class="fa-solid fa-angles-right p5-clr"></i>
                                    Full Learning Materials
                                </li>
                                <li class="d-flex align-items-center gap-xxl-4 gap-2 pra">
                                    <i class="fa-solid fa-angles-right p5-clr"></i>
                                    Full Day Program
                                </li>
                                <li class="d-flex align-items-center gap-xxl-4 gap-2 pra">
                                    <i class="fa-solid fa-angles-right p5-clr"></i>
                                    Lunch Included
                                </li>
                                <li class="d-flex align-items-center gap-xxl-4 gap-2 pra">
                                    <i class="fa-solid fa-circle-xmark cros"></i>
                                    Extended Hours
                                </li>
                                <li class="d-flex align-items-center gap-xxl-4 gap-2 pra">
                                    <i class="fa-solid fa-circle-xmark cros"></i>
                                    Extra Activities
                                </li>
                            </ul>
                            <div class="text-center">
                                <a href="{{ route('contact') }}" class="theme-btn">
                                    <span>
                                        Buy Now
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="pricing-items">
                        <h4 class="pricing-head">
                            Premium Plan
                        </h4>
                        <div class="pricing-body">
                            <h1 class="price-title p4-clr mb-30">
                                $59
                                <span class="mos black">
                                    /mo
                                </span>
                            </h1>
                            <ul class="pricing-listing d-grid gap-2 mb-40">
                                <li class="d-flex align-items-center gap-xxl-4 gap-2 pra">
                                    <i class="fa-solid fa-angles-right p5-clr"></i>
                                    Full Learning Materials
                                </li>
                                <li class="d-flex align-items-center gap-xxl-4 gap-2 pra">
                                    <i class="fa-solid fa-angles-right p5-clr"></i>
                                    Full Day Program
                                </li>
                                <li class="d-flex align-items-center gap-xxl-4 gap-2 pra">
                                    <i class="fa-solid fa-angles-right p5-clr"></i>
                                    Lunch Included
                                </li>
                                <li class="d-flex align-items-center gap-xxl-4 gap-2 pra">
                                    <i class="fa-solid fa-angles-right p5-clr"></i>
                                    Extended Hours
                                </li>
                                <li class="d-flex align-items-center gap-xxl-4 gap-2 pra">
                                    <i class="fa-solid fa-angles-right p5-clr"></i>
                                    Extra Activities
                                </li>
                            </ul>
                            <div class="text-center">
                                <a href="{{ route('contact') }}" class="theme-btn">
                                    <span>
                                        Buy Now
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Testimonial V1 Section Start -->
    <section class="testimonial-sectionv1 space-bottom overflow-hidden white-bg">
        <div class="container">
            <div class="row g-2 justify-content-between mb-60">
                <div class="col-lg-4 col-md-5">
                    <div class="section-title">
                        <span class="sub-title wow fadeInUp p5-clr">
                            Clients Testimonial
                        </span>
                        <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                            What Parents Say About Us
                        </h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    {{ $pageSections['testimonial_description'] ?? 'Hear from parents who trust us with their children\'s education and development.' }}
                </div>
            </div>
            <div class="testimonial-innerbox">
                <div class="row justify-content-end">
                    <div class="col-lg-6 col-md-7 col-sm-8">
                        <div class="swiper testimonial-slidewrap01">
                            <div class="swiper-wrapper">
                                @forelse($testimonials ?? [] as $testimonial)
                                <div class="swiper-slide">
                                    <div class="testimonial-item01">
                                        <div class="d-flex align-items-center justify-content-between gap-1">
                                            <div class="man-info d-flex align-items-center">
                                                <div class="thumb">
                                                    <img src="{{ $testimonial->image ?? asset('img/atestimonial/testimonial-small.png') }}" alt="">
                                                </div>
                                                <div class="cont">
                                                    <h4 class="black mb-1">
                                                        {{ $testimonial->name }}
                                                    </h4>
                                                    <span class="black fw-normal">
                                                        {{ $testimonial->position ?? 'Parent' }}
                                                    </span>
                                                </div>
                                            </div>
                                            <img src="{{ asset('img/atestimonial/quote.png') }}" alt="img" class="quote-testi">
                                        </div>
                                        <p class="pra mt-24 mb-40">
                                            {{ $testimonial->content }}
                                        </p>
                                        <div class="ratting-area d-flex align-items-center gap-2">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= ($testimonial->rating ?? 5))
                                                    <i class="fas fa-star"></i>
                                                @else
                                                    <i class="fas fa-star-half-alt"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="swiper-slide">
                                    <div class="testimonial-item01">
                                        <div class="d-flex align-items-center justify-content-between gap-1">
                                            <div class="man-info d-flex align-items-center">
                                                <div class="thumb">
                                                    <img src="{{ asset('img/atestimonial/testimonial-small.png') }}" alt="">
                                                </div>
                                                <div class="cont">
                                                    <h4 class="black mb-1">
                                                        Sarah Johnson
                                                    </h4>
                                                    <span class="black fw-normal">
                                                        Parent
                                                    </span>
                                                </div>
                                            </div>
                                            <img src="{{ asset('img/atestimonial/quote.png') }}" alt="img" class="quote-testi">
                                        </div>
                                        <p class="pra mt-24 mb-40">
                                            The care and attention my child receives at this center is exceptional. The teachers are dedicated and the environment is nurturing.
                                        </p>
                                        <div class="ratting-area d-flex align-items-center gap-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
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
                                    Read More
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 me-xl-5 col-sm-5">
                    <div class="stay-thumb w-100">
                        <img src="{{ asset('img/aservices/stay-thumb.png') }}" alt="img" class="w-100">
                    </div>
                </div>
            </div>
        </div>
        <!-- Element-->
        <img src="{{ asset('img/aservices/stay-shape.png') }}" alt="img" class="stay-element">
    </section>
@endsection
