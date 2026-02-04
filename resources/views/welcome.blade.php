@extends('layouts.web')
@section('title', __('site.nav.home'))
@section('content')
    <!-- Hero Section Start -->
    <section class="banner-section banner-1 overflow-hidden">
        <div class="container">
            <div class="banner-wrapperv1 position-relative">
                <div class="row justify-content-lg-between justify-content-center">
                    <div class="col-lg-3 col-md-4 col-sm-5 order-lg-0 order-1">
                        <div class="banner-shape-thumb1">
                            <img src="{{ asset('img/abanner/bn-v1-thumb1.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="banner-v1-content text-center">
                            <h1 class="wow fadeInDown" data-wow-delay=".6s"> 
                                <span class="title-explore position-relative wow fadeInRight d-inline-block" data-wow-delay=".4s">
                                    <img src="{{ asset('img/abanner/text-layer.png') }}" alt="img" class="text-layer">
                                    {{ __('site.welcome.hero_title') }}
                                </span>
                                ABC Centre
                                <span class="text-sount">
                                    Foumbot
                                </span>
                            </h1>
                            <p class="wow fadeInUp" data-wow-delay=".5s">
                                {{ __('site.welcome.hero_description') }}
                            </p>
                            <a href="{{ route('contact') }}" class="theme-btn p4-bg">
                                <span>
                                    {{ __('site.welcome.learn_more') }}
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-5">
                        <div class="banner-shape-thumb2">
                            <img src="{{ asset('img/abanner/bn-v1-thumb2.png') }}" alt="img">
                        </div>
                    </div>
                </div>
                <img src="{{ asset('img/abanner/railbow.png') }}" alt="img" class="rainbow-shape">
            </div>
        </div>
        <!-- Element -->
        <img src="{{ asset('img/abanner/left-ring.png') }}" alt="img" class="left-ring">
        <img src="{{ asset('img/abanner/right-ring.png') }}" alt="img" class="right-ring">
        <img src="{{ asset('img/abanner/upen-element.png') }}" alt="img" class="global-upen">
        <!-- Element -->
    </section>

    <!-- Vision Mission Section Start -->
    <section class="talk-counter space-top overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="talk-content">
                        <div class="section-title mb-60">
                            <span class="sub-title wow fadeInUp p2-clr">
                                {{ __('site.about.vision_title') }}
                            </span>
                            <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                                {{ __('site.about.vision_text') }}
                            </h3>
                            <p class="wow fadeInUp" data-wow-delay=".4s">
                                {{ __('site.about.mission_text') }}
                            </p>
                            <a href="{{ route('contact') }}" class="theme-btn gra-border2">
                                <span class="black fw-medium">
                                    {{ __('site.nav.donate') }}
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="counter-inner">
                        <div class="counter-talk-items gra-border round10 mb-30">
                            <div class="icon iconbg-v2">
                                <i class="fas fa-child fa-2x" style="color: #ff4880;"></i>
                            </div>
                            <div class="content">
                                <h3>
                                    3m-5{{ app()->getLocale() == 'fr' ? 'ans' : 'yrs' }}
                                </h3>
                                <p>{{ app()->getLocale() == 'fr' ? 'Âges d\'admission' : 'Admission Ages' }}</p>
                            </div>
                        </div>
                        <div class="counter-talk-items gra-border round10">
                            <div class="icon iconbg-v4">
                                <i class="fas fa-clock fa-2x" style="color: #4d65f9;"></i>
                            </div>
                            <div class="content">
                                <h3>
                                    7:30-16:30
                                </h3>
                                <p>{{ app()->getLocale() == 'fr' ? 'Lundi - Vendredi' : 'Monday - Friday' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="counter-inner">
                        <div class="counter-talk-items gra-border round10 mb-30">
                            <div class="icon iconbg-v3">
                                <img src="{{ asset('img/aicon/icon2.png') }}" alt="img">
                            </div>
                            <div class="content">
                                <h3>
                                    <span class="count">{{ $stats['completed'] ?? '12' }}</span>K
                                </h3>
                                <p>Completed</p>
                            </div>
                        </div>
                        <div class="counter-talk-items gra-border round10">
                            <div class="icon iconbg-v5">
                                <img src="{{ asset('img/aicon/icon4.png') }}" alt="img">
                            </div>
                            <div class="content">
                                <h3>
                                    <span class="count">{{ $stats['satisfaction'] ?? '13' }}</span>K
                                </h3>
                                <p>Guardian Satisfaction</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section Start -->
    <section class="about-sectionv1 space-top overflow-hidden space-bottom">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="about-one-thumbs">
                        <div class="thumbs position-relative wow fadeInUp" data-wow-delay="1200">
                            <img src="{{ asset('img/about/about-1.png') }}" alt="img" class="round10 main-img">
                            <!-- Element -->
                            <img src="{{ asset('img/about/lighing-cmn.png') }}" alt="img" class="about-light1">
                            <img src="{{ asset('img/about/arrows-cmn.png') }}" alt="img" class="about-arrows">
                        </div>
                        <div class="about-one-grow">
                            <div class="academy-box text-center mb-30 wow fadeInUp" data-wow-delay="1400">
                                <img src="{{ asset('img/about/grow.svg') }}" alt="img">
                                <h4 class="black">
                                    Academy
                                </h4>
                                <p class="pra">
                                    Learning Ladder School
                                </p>
                            </div>
                            <div class="academy-box2 gra-border round10 wow fadeInUp" data-wow-delay="1600">
                                <div class="content">
                                    <h3>
                                        <span class="count">{{ $stats['experience'] ?? '10' }}</span>+
                                    </h3>
                                    <p>years of experiences</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="about-contentv1 ps-xxl-5">
                        <div class="section-title mb-60">
                            <span class="sub-title wow fadeInUp p5-clr">
                                {{ __('site.about.subtitle') }}
                            </span>
                            <h3 class="m-title wow fadeInUp black mb-sm-3 mb-2" data-wow-delay=".3s">
                                {{ __('site.about.description') }}
                            </h3>
                            <p class="mb-24 wow fadeInUp" data-wow-delay=".4s">
                                {{ __('site.about.mission_text') }}
                            </p>
                            <a href="{{ route('about') }}" class="theme-btn gra-border2">
                                <span class="black fw-medium">
                                    {{ __('site.read_more') }}
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Section Start -->
    <section class="program-sectionv1 overflow-hidden space-bottom position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center mb-60">
                        <span class="sub-title wow fadeInUp p4-clr">
                            {{ __('site.nav.programs') }}
                        </span>
                        <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                            {{ __('site.services.subtitle') }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row g-lg-4 g-3 justify-content-center">
                @forelse($featuredPrograms ?? [] as $index => $program)
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".{{ 3 + $index }}s">
                    <div class="program-item gra-border">
                        <div class="icons gra-border round10 d-center">
                            <img src="{{ $program->icon ?? asset('img/aicon/car-icons' . (($index % 6) + 1) . '.png') }}" alt="img">
                        </div>
                        <div class="content">
                            <h4>
                                <a href="{{ route('programs.show', $program->id) }}">{{ $program->title }}</a>
                            </h4>
                            <p>
                                {{ Str::limit($program->description, 100) }}
                            </p>
                            <a href="{{ route('programs.show', $program->id) }}" class="readmore d-flex align-items-center gap-2">
                                {{ __('site.read_more') }}
                                <span class="arrows mt-1">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="program-item gra-border">
                        <div class="icons gra-border round10 d-center">
                            <img src="{{ asset('img/aicon/car-icons1.png') }}" alt="img">
                        </div>
                        <div class="content">
                            <h4><a href="#">Online Class</a></h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit</p>
                            <a href="#" class="readmore d-flex align-items-center gap-2">
                                Read More
                                <span class="arrows mt-1"><i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="program-item gra-border">
                        <div class="icons gra-border round10 d-center">
                            <img src="{{ asset('img/aicon/car-icons2.png') }}" alt="img">
                        </div>
                        <div class="content">
                            <h4><a href="#">Formal Tuition</a></h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit</p>
                            <a href="#" class="readmore d-flex align-items-center gap-2">
                                Read More
                                <span class="arrows mt-1"><i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="program-item gra-border">
                        <div class="icons gra-border round10 d-center">
                            <img src="{{ asset('img/aicon/car-icons3.png') }}" alt="img">
                        </div>
                        <div class="content">
                            <h4><a href="#">Preschool</a></h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit</p>
                            <a href="#" class="readmore d-flex align-items-center gap-2">
                                Read More
                                <span class="arrows mt-1"><i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Service Section Start -->
    <section class="service-sectionv1 overflow-hidden position-relative">
        <div class="container">
            <div class="row g-2 justify-content-between align-items-center mb-xxl-4 mb-xl-3 mb-2">
                <div class="col-lg-4">
                    <div class="section-title">
                        <span class="sub-title wow fadeInUp p5-clr">
                            {{ __('site.services.title') }}
                        </span>
                        <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                            {{ __('site.services.subtitle') }}
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p class="pra">
                        {{ __('site.about.description') }}
                    </p>
                </div>
            </div>
            <div class="row g-3 justify-content-between">
                <div class="col-lg-3">
                    <div class="service-left">
                        <div class="dot-cmn mb-40"></div>
                        <a href="{{ route('services') }}" class="theme-btn p5-btn p5-border">
                            <span class="black fw-medium">
                                {{ __('site.read_more') }}
                            </span>
                            <i class="fa-solid fa-arrow-right p5-clr"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="d-center">
                        <div class="swiper service-wrapslide">
                            <div class="swiper-wrapper">
                                @forelse($services ?? [] as $service)
                                <div class="swiper-slide">
                                    <div class="program-item gap-3 d-grid justify-content-start">
                                        <div class="icon">
                                            <img src="{{ $service->icon ?? asset('img/aicon/car-icons1.png') }}" alt="img">
                                        </div>
                                        <div class="content">
                                            <h4 class="mb-xxl-3 mb-2">
                                                <a href="{{ route('services') }}">
                                                    {{ $service->title }}
                                                </a>
                                            </h4>
                                            <p class="mb-xxl-3 mb-2">
                                                {{ Str::limit($service->description, 60) }}
                                            </p>
                                            <a href="{{ route('services') }}" class="readmore d-flex align-items-center gap-2">
                                                Read More
                                                <span class="arrows mt-1">
                                                    <i class="fa-solid fa-arrow-right p4-clr"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="swiper-slide">
                                    <div class="program-item gap-3 d-grid justify-content-start">
                                        <div class="icon">
                                            <img src="{{ asset('img/aicon/car-icons1.png') }}" alt="img">
                                        </div>
                                        <div class="content">
                                            <h4 class="mb-xxl-3 mb-2">
                                                <a href="#">Learning School</a>
                                            </h4>
                                            <p class="mb-xxl-3 mb-2">
                                                Quality education for your children
                                            </p>
                                            <a href="#" class="readmore d-flex align-items-center gap-2">
                                                Read More
                                                <span class="arrows mt-1">
                                                    <i class="fa-solid fa-arrow-right p4-clr"></i>
                                                </span>
                                            </a>
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
        <!-- Element -->
        <img src="{{ asset('img/aservices/sertd-shape.png') }}" alt="img" class="aservice-shape1">
    </section>

    <!-- FAQ Section Start -->
    <section class="faq-sectionv mt-60 overflow-hidden space-bottom">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6 col-md-5">
                    <div class="faq-thumbs">
                        <img src="{{ asset('img/about/faq.png') }}" alt="img">
                    </div>
                </div>
                <div class="col-lg-6 col-md-7">
                    <div class="faq-content">
                        <div class="section-title mb-40">
                            <span class="sub-title wow fadeInUp p5-clr">
                                {{ __('site.nav.faq') }}
                            </span>
                            <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                                {{ __('site.info.title') }}
                            </h3>
                        </div>
                        <div class="tab-faq faq">
                            <div class="accordion-section d-grid gap-xxl-4 gap-lg-3 gap-2">
                                @forelse($faqs ?? [] as $faq)
                                <div class="accordion-single">
                                    <h5 class="header-area">
                                        <button class="accordion-btn d-flex align-items-center d-flex position-relative w-100" type="button">
                                            {{ $faq->question }}
                                        </button>
                                    </h5>
                                    <div class="content-area">
                                        <div class="content-body">
                                            <p>{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="accordion-single">
                                    <h5 class="header-area">
                                        <button class="accordion-btn d-flex align-items-center d-flex position-relative w-100" type="button">
                                            What are the prerequisites for this course?
                                        </button>
                                    </h5>
                                    <div class="content-area">
                                        <div class="content-body">
                                            <p>Our programs are designed for children of various ages. Contact us to learn about specific requirements.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-single">
                                    <h5 class="header-area">
                                        <button class="accordion-btn d-flex align-items-center d-flex position-relative w-100" type="button">
                                            What subjects will my child learn?
                                        </button>
                                    </h5>
                                    <div class="content-area">
                                        <div class="content-body">
                                            <p>We offer a comprehensive curriculum including reading, math, science, arts, and social skills development.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-single">
                                    <h5 class="header-area">
                                        <button class="accordion-btn d-flex align-items-center d-flex position-relative w-100" type="button">
                                            How long is a school day?
                                        </button>
                                    </h5>
                                    <div class="content-area">
                                        <div class="content-body">
                                            <p>Our programs run from morning to afternoon with flexible scheduling options to meet your family's needs.</p>
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

    <!-- Professional Section Start -->
    <section class="professional-sectionv1 overflow-hidden mt-2 space-bottom position-relative">
        <div class="container">
            <div class="row justify-content-center mb-60">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <span class="sub-title wow fadeInUp p5-clr">
                            {{ __('site.nav.team') }}
                        </span>
                        <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                            {{ __('site.info.staff') }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row g-lg-4 g-3 justify-content-center">
                @forelse($teamMembers ?? [] as $index => $member)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="professional-item">
                        <div class="thumb mb-24">
                            <img src="{{ $member->image_url ?? asset('img/aprotfolio/professonal' . (($index % 3) + 1) . '.png') }}" alt="{{ $member->name }}">
                        </div>
                        <div class="content">
                            <div class="mb-24">
                                <h4 class="mb-2">
                                    <a href="#" class="black">{{ $member->name }}</a>
                                </h4>
                                <span>{{ $member->position }}</span>
                            </div>
                            <div class="social-wrapper footer-social d-flex align-items-center">
                                @if($member->facebook)
                                <a href="{{ $member->facebook }}" class="white"><i class="white fab fa-facebook-f"></i></a>
                                @endif
                                @if($member->twitter)
                                <a href="{{ $member->twitter }}" class="white">
                                    <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.55735 5.16157L10.5183 0.65625H9.57971L6.14039 4.56816L3.39341 0.65625H0.225098L4.37906 6.57174L0.225098 11.2963H1.16378L4.79579 7.16516L7.6968 11.2963H10.8651L6.55712 5.16157H6.55735ZM5.2717 6.62386L4.85082 6.03481L1.502 1.34768H2.94375L5.64629 5.13034L6.06717 5.71939L9.58015 10.6363H8.13839L5.2717 6.62409V6.62386Z" fill="white"/>
                                    </svg>
                                </a>
                                @endif
                                @if($member->linkedin)
                                <a href="{{ $member->linkedin }}" class="white"><i class="white fa-brands fa-linkedin-in"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="professional-item">
                        <div class="thumb mb-24">
                            <img src="{{ asset('img/aprotfolio/professonal1.png') }}" alt="img">
                        </div>
                        <div class="content">
                            <div class="mb-24">
                                <h4 class="mb-2"><a href="#" class="black">Jane Cooper</a></h4>
                                <span>Head Teacher</span>
                            </div>
                            <div class="social-wrapper footer-social d-flex align-items-center">
                                <a href="#" class="white"><i class="white fab fa-facebook-f"></i></a>
                                <a href="#" class="white"><i class="white fa-brands fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="professional-item">
                        <div class="thumb mb-24">
                            <img src="{{ asset('img/aprotfolio/professonal2.png') }}" alt="img">
                        </div>
                        <div class="content">
                            <div class="mb-24">
                                <h4 class="mb-2"><a href="#" class="black">John Cooper</a></h4>
                                <span>Teacher</span>
                            </div>
                            <div class="social-wrapper footer-social d-flex align-items-center">
                                <a href="#" class="white"><i class="white fab fa-facebook-f"></i></a>
                                <a href="#" class="white"><i class="white fa-brands fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="professional-item">
                        <div class="thumb mb-24">
                            <img src="{{ asset('img/aprotfolio/professonal3.png') }}" alt="img">
                        </div>
                        <div class="content">
                            <div class="mb-24">
                                <h4 class="mb-2"><a href="#" class="black">David Warner</a></h4>
                                <span>Teacher</span>
                            </div>
                            <div class="social-wrapper footer-social d-flex align-items-center">
                                <a href="#" class="white"><i class="white fab fa-facebook-f"></i></a>
                                <a href="#" class="white"><i class="white fa-brands fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Testimonial Section Start -->
    <section class="testimonial-sectionv1 section-padding overflow-hidden white-bg">
        <div class="container">
            <div class="row g-2 justify-content-between mb-60">
                <div class="col-lg-4 col-md-5">
                    <div class="section-title">
                        <span class="sub-title wow fadeInUp p5-clr">
                            {{ __('site.testimonials.subtitle') }}
                        </span>
                        <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                            {{ __('site.testimonials.title') }}
                        </h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    {{ __('site.thanks.description') }}
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
                                                    <h4 class="black mb-1">{{ $testimonial->name }}</h4>
                                                    <span class="black fw-normal">{{ $testimonial->position ?? 'Parent' }}</span>
                                                </div>
                                            </div>
                                            <img src="{{ asset('img/atestimonial/quote.png') }}" alt="img" class="quote-testi">
                                        </div>
                                        <p class="pra mt-24 mb-40">{{ $testimonial->content }}</p>
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
                                                    <h4 class="black mb-1">Sarah Johnson</h4>
                                                    <span class="black fw-normal">Parent</span>
                                                </div>
                                            </div>
                                            <img src="{{ asset('img/atestimonial/quote.png') }}" alt="img" class="quote-testi">
                                        </div>
                                        <p class="pra mt-24 mb-40">The care and attention my child receives at this center is exceptional. The teachers are dedicated and the environment is nurturing.</p>
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

    <!-- Blog Section Start -->
    <section class="blog-sectionv1 section-padding overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-9">
                    <div class="section-title mb-60">
                        <span class="sub-title wow fadeInUp p5-clr">{{ __('site.nav.blog') }}</span>
                        <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                            {{ __('site.events.title') }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                @forelse($latestPosts ?? [] as $index => $post)
                    @if($index < 2)
                    <div class="col-xl-6 col-lg-6 col-md-7">
                        <div class="news-small-items mb-24 wow fadeInUp" data-wow-delay=".{{ 4 + $index }}s">
                            <div class="news-thumb">
                                <img src="{{ $post->image_url ?? asset('img/ablog/blog-small' . ($index + 1) . '.png') }}" alt="img">
                            </div>
                            <div class="news-content">
                                <ul>
                                    <li>
                                        <i class="fa-solid fa-calendar-days"></i>
                                        {{ $post->created_at->format('F d, Y') }}
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-user"></i> By {{ $post->author ?? 'admin' }}
                                    </li>
                                </ul>
                                <h4>
                                    <a href="{{ route('blog.show', $post->slug ?? $post->id) }}">
                                        {{ $post->title }}
                                    </a>
                                </h4>
                                <a href="{{ route('blog.show', $post->slug ?? $post->id) }}" class="readmore d-flex align-items-center gap-2">
                                    Read More
                                    <span class="arrows mt-1">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                @empty
                <div class="col-xl-6 col-lg-6 col-md-7">
                    <div class="news-small-items mb-24 wow fadeInUp" data-wow-delay=".4s">
                        <div class="news-thumb">
                            <img src="{{ asset('img/ablog/blog-small1.png') }}" alt="img">
                        </div>
                        <div class="news-content">
                            <ul>
                                <li><i class="fa-solid fa-calendar-days"></i> October 19, 2024</li>
                                <li><i class="fa-regular fa-user"></i> By admin</li>
                            </ul>
                            <h4><a href="#">Empowering Children Through Education</a></h4>
                            <a href="#" class="readmore d-flex align-items-center gap-2">
                                Read More <span class="arrows mt-1"><i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="news-small-items wow fadeInUp" data-wow-delay=".6s">
                        <div class="news-thumb">
                            <img src="{{ asset('img/ablog/blog-small2.png') }}" alt="img">
                        </div>
                        <div class="news-content">
                            <ul>
                                <li><i class="fa-solid fa-calendar-days"></i> October 19, 2024</li>
                                <li><i class="fa-regular fa-user"></i> By admin</li>
                            </ul>
                            <h4><a href="#">Joyful Journeys in Childcare and Education</a></h4>
                            <a href="#" class="readmore d-flex align-items-center gap-2">
                                Read More <span class="arrows mt-1"><i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!--<< Newsletter Section Start >>-->
    <section class="inspair-section position-relative overflow-hidden">
        <div class="container">
            <div class="row flex-row-reverse g-4 align-items-end justify-content-between">
                <div class="col-lg-5 col-md-6 col-sm-7">
                    <div class="inspair-content">
                        <div class="section-title mb-40">
                            <span class="sub-title wow fadeInUp black">Get Connected</span>
                            <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                                Education That Sparks Imagination & Nurtures Curiosity
                            </h3>
                        </div>
                        <form action="{{ route('contact') }}" method="GET" class="footer-form wow fadeInUp" data-wow-delay=".4s">
                            <input type="text" name="email" placeholder="Enter Your Email">
                            <button type="submit" class="white d-flex align-content-center gap-2">
                                Submit
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-5">
                    <div class="inspainr-thumb-box">
                        <div class="inspair-thumb">
                            <img src="{{ asset('img/ainspair/inspair-thumb.png') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
