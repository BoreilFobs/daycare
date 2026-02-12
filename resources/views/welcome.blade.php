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
                            <img src="{{ asset('images/imported/kid-right-home-hero-section.jpeg') }}" alt="img">
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
                            <img src="{{ asset('images/imported/kid-left-home-hero-section.jpeg') }}" alt="img">
                        </div>
                    </div>
                </div>
                <img src="{{ asset('images/railbow.png') }}" alt="img" class="rainbow-shape">
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
                            <img src="{{ asset('images/imported/about-section.jpeg') }}" alt="img" class="round10 main-img">
                            <!-- Element -->
                            <img src="{{ asset('img/about/lighing-cmn.png') }}" alt="img" class="about-light1">
                            <img src="{{ asset('img/about/arrows-cmn.png') }}" alt="img" class="about-arrows">
                        </div>
                        <div class="about-one-grow">
                            <div class="academy-box text-center mb-30 wow fadeInUp" data-wow-delay="1400">
                                <img src="{{ asset('images/growth-icon.svg') }}" alt="img" style="width: 50px; height: 50px;">
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
                                {{ __('site.about.title') }}
                            </h3>
                            <p class="mb-24 wow fadeInUp" data-wow-delay=".4s">
                                {{ __('site.about.description') }}
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
                                            @if(!empty($service->icon))
                                                <i class="{{ $service->icon }} fa-2x" aria-hidden="true"></i>
                                            @else
                                                <img src="{{ asset('img/aicon/car-icons1.png') }}" alt="img">
                                            @endif
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
        <img src="{{ asset('images/sertd-shape.png') }}" alt="img" class="aservice-shape1">
    </section>

    <!-- FAQ Section Start -->
    <section class="faq-sectionv mt-60 overflow-hidden space-bottom">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6 col-md-5">
                    <div class="faq-thumbs">
                        <img src="{{ asset('images/imported/faq-section.jpeg') }}" alt="img">
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

    <!-- Testimonial Section Start -->
    <section class="testimonial-sectionv1 section-padding overflow-hidden white-bg">
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
                    Hear from parents who trust us with their children's education and development.
                </div>
            </div>
            <div class="testimonial-innerbox">
                <div class="row justify-content-end">
                    <div class="col-lg-6 col-md-7 col-sm-8">
                        <div class="swiper testimonial-slidewrap01">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial-item01 position-relative">
                                        <div class="d-flex align-items-center justify-content-between gap-1 flex-wrap">
                                            <div class="man-info d-flex align-items-center">
                                                <div class="thumb">
                                                    <img src="{{ asset('images/imported/avatar-1.jpeg') }}" alt="Sandrine Tchamba">
                                                </div>
                                                <div class="cont">
                                                    <h4 class="black mb-1">Sandrine Tchamba</h4>
                                                    <span class="black fw-normal">Parent</span>
                                                </div>
                                            </div>
                                            <img src="{{ asset('img/atestimonial/quote.png') }}" alt="img" class="quote-testi">
                                        </div>
                                        <p class="pra mt-24 mb-40">ABC Centre has transformed my daughter's life. She came here shy and withdrawn after we fled our village, but now she's confident, speaks both French and English, and loves learning. The teachers treat every child like their own.</p>
                                        <div class="ratting-area d-flex align-items-center gap-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-item01 position-relative">
                                        <div class="d-flex align-items-center justify-content-between gap-1 flex-wrap">
                                            <div class="man-info d-flex align-items-center">
                                                <div class="thumb">
                                                    <img src="{{ asset('images/imported/avatar-2.jpeg') }}" alt="Emmanuel Ndjock">
                                                </div>
                                                <div class="cont">
                                                    <h4 class="black mb-1">Emmanuel Ndjock</h4>
                                                    <span class="black fw-normal">Parent</span>
                                                </div>
                                            </div>
                                            <img src="{{ asset('img/atestimonial/quote.png') }}" alt="img" class="quote-testi">
                                        </div>
                                        <p class="pra mt-24 mb-40">When we arrived in Foumbot with nothing, ABC Centre gave our children hope. The daily meals ensure they're well-fed, and the education program has prepared my son for primary school. We are forever grateful.</p>
                                        <div class="ratting-area d-flex align-items-center gap-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-item01 position-relative">
                                        <div class="d-flex align-items-center justify-content-between gap-1 flex-wrap">
                                            <div class="man-info d-flex align-items-center">
                                                <div class="thumb">
                                                    <img src="{{ asset('images/imported/avatar-3.jpeg') }}" alt="Yvette Mbianda">
                                                </div>
                                                <div class="cont">
                                                    <h4 class="black mb-1">Yvette Mbianda</h4>
                                                    <span class="black fw-normal">Parent</span>
                                                </div>
                                            </div>
                                            <img src="{{ asset('img/atestimonial/quote.png') }}" alt="img" class="quote-testi">
                                        </div>
                                        <p class="pra mt-24 mb-40">The safe and loving environment at ABC Centre allows me to work and provide for my family. My twins have blossomed here - they can now count, write their names, and sing songs in two languages!</p>
                                        <div class="ratting-area d-flex align-items-center gap-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-item01 position-relative">
                                        <div class="d-flex align-items-center justify-content-between gap-1 flex-wrap">
                                            <div class="man-info d-flex align-items-center">
                                                <div class="thumb">
                                                    <img src="{{ asset('images/imported/avatar-4.jpeg') }}" alt="Patrice Fotso">
                                                </div>
                                                <div class="cont">
                                                    <h4 class="black mb-1">Patrice Fotso</h4>
                                                    <span class="black fw-normal">Parent</span>
                                                </div>
                                            </div>
                                            <img src="{{ asset('img/atestimonial/quote.png') }}" alt="img" class="quote-testi">
                                        </div>
                                        <p class="pra mt-24 mb-40">ABC Centre is more than a daycare - it's a community. The staff helped my family during our most difficult times. Now my children are thriving and I can see a bright future ahead for them.</p>
                                        <div class="ratting-area d-flex align-items-center gap-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section Start -->
    <section class="gallery-section-home overflow-hidden space-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center mb-60">
                        <span class="sub-title wow fadeInUp p4-clr">
                            {{ __('site.nav.gallery') }}
                        </span>
                        <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                            {{ __('site.gallery.title') }}
                        </h3>
                    </div>
                </div>
            </div>
            <!-- Gallery Grid: 1 large left + 4 small right -->
            <div class="row g-3">
                <!-- Large Image Left -->
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="gallery-item gallery-large position-relative overflow-hidden round10 h-100">
                        <a href="{{ asset('images/imported/gallery-1.jpeg') }}" class="gallery-popup d-block h-100">
                            <img src="{{ asset('images/imported/gallery-1.jpeg') }}" alt="Gallery Image" class="w-100 h-100">
                            <div class="gallery-overlay">
                                <div class="gallery-content text-center">
                                    <i class="fa-solid fa-magnifying-glass-plus white fs-2 mb-2"></i>
                                    <h5 class="white mb-1">{{ __('site.gallery.view_image') }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- 4 Small Images Right in 2x2 Grid -->
                <div class="col-lg-6 col-md-6">
                    <div class="row g-3">
                        <div class="col-6 wow fadeInUp" data-wow-delay=".4s">
                            <div class="gallery-item position-relative overflow-hidden round10">
                                <a href="{{ asset('images/imported/gallery-2.jpeg') }}" class="gallery-popup">
                                    <img src="{{ asset('images/imported/gallery-2.jpeg') }}" alt="Gallery Image" class="w-100">
                                    <div class="gallery-overlay">
                                        <div class="gallery-content text-center">
                                            <i class="fa-solid fa-magnifying-glass-plus white fs-2 mb-2"></i>
                                            <h5 class="white mb-1">{{ __('site.gallery.view_image') }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 wow fadeInUp" data-wow-delay=".5s">
                            <div class="gallery-item position-relative overflow-hidden round10">
                                <a href="{{ asset('images/imported/gallery-3.jpeg') }}" class="gallery-popup">
                                    <img src="{{ asset('images/imported/gallery-3.jpeg') }}" alt="Gallery Image" class="w-100">
                                    <div class="gallery-overlay">
                                        <div class="gallery-content text-center">
                                            <i class="fa-solid fa-magnifying-glass-plus white fs-2 mb-2"></i>
                                            <h5 class="white mb-1">{{ __('site.gallery.view_image') }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 wow fadeInUp" data-wow-delay=".6s">
                            <div class="gallery-item position-relative overflow-hidden round10">
                                <a href="{{ asset('images/imported/gallery-4.jpeg') }}" class="gallery-popup">
                                    <img src="{{ asset('images/imported/gallery-4.jpeg') }}" alt="Gallery Image" class="w-100">
                                    <div class="gallery-overlay">
                                        <div class="gallery-content text-center">
                                            <i class="fa-solid fa-magnifying-glass-plus white fs-2 mb-2"></i>
                                            <h5 class="white mb-1">{{ __('site.gallery.view_image') }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 wow fadeInUp" data-wow-delay=".7s">
                            <div class="gallery-item position-relative overflow-hidden round10">
                                <a href="{{ asset('images/imported/gallery-5.jpeg') }}" class="gallery-popup">
                                    <img src="{{ asset('images/imported/gallery-5.jpeg') }}" alt="Gallery Image" class="w-100">
                                    <div class="gallery-overlay">
                                        <div class="gallery-content text-center">
                                            <i class="fa-solid fa-magnifying-glass-plus white fs-2 mb-2"></i>
                                            <h5 class="white mb-1">{{ __('site.gallery.view_image') }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-50">
                <a href="{{ route('gallery') }}" class="theme-btn gra-border2">
                    <span class="black fw-medium">
                        {{ __('site.view_all') }} {{ __('site.nav.gallery') }}
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- Blog Section Start -->
    <section class="blog-sectionv1 section-padding overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-9">
                    <div class="section-title mb-60">
                        <span class="sub-title wow fadeInUp p5-clr">Latest Blog And News</span>
                        <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                            Wonderworks Child Development Center Discovery Kids Preschool
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <!-- Left Column - Two Small Blog Posts -->
                <div class="col-xl-6 col-lg-6">
                    @php 
                        $smallPosts = ($recentBlogs ?? collect())->take(2);
                        $blogDefaults = [
                            'images/imported/WhatsApp Image 2026-02-02 at 06.39.34.jpeg',
                            'images/imported/WhatsApp Image 2026-02-02 at 06.40.20.jpeg',
                        ];
                    @endphp
                    @forelse($smallPosts as $index => $post)
                    <div class="news-small-items {{ $index == 0 ? 'mb-24' : '' }} wow fadeInUp" data-wow-delay=".{{ 3 + $index }}s">
                        <div class="news-thumb">
                            <a href="{{ route('blog.show', $post->slug ?? $post->id) }}">
                                <img src="{{ $post->image_url ?? asset($blogDefaults[$index] ?? $blogDefaults[0]) }}" alt="{{ $post->title }}">
                            </a>
                        </div>
                        <div class="news-content">
                            <ul>
                                <li>
                                    <i class="fa-solid fa-calendar-days"></i>
                                    {{ $post->published_at ? $post->published_at->format('F d, Y') : $post->created_at->format('F d, Y') }}
                                </li>
                                <li>
                                    <i class="fa-regular fa-user"></i>
                                    By {{ $post->author->name ?? 'admin' }}
                                </li>
                            </ul>
                            <h4>
                                <a href="{{ route('blog.show', $post->slug ?? $post->id) }}">
                                    {{ Str::limit($post->title, 60) }}
                                </a>
                            </h4>
                            <a href="{{ route('blog.show', $post->slug ?? $post->id) }}" class="readmore d-flex align-items-center gap-2">
                                {{ __('site.read_more') }}
                                <span class="arrows mt-1">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="news-small-items mb-24 wow fadeInUp" data-wow-delay=".3s">
                        <div class="news-thumb">
                            <a href="{{ route('blog') }}">
                                <img src="{{ asset('images/imported/WhatsApp Image 2026-02-02 at 06.39.34.jpeg') }}" alt="img">
                            </a>
                        </div>
                        <div class="news-content">
                            <ul>
                                <li><i class="fa-solid fa-calendar-days"></i> October 19, 2024</li>
                                <li><i class="fa-regular fa-user"></i> By admin</li>
                            </ul>
                            <h4><a href="{{ route('blog') }}">Empowering Children Through Education The A Igniting</a></h4>
                            <a href="{{ route('blog') }}" class="readmore d-flex align-items-center gap-2">
                                {{ __('site.read_more') }} <span class="arrows mt-1"><i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="news-small-items wow fadeInUp" data-wow-delay=".4s">
                        <div class="news-thumb">
                            <a href="{{ route('blog') }}">
                                <img src="{{ asset('images/imported/WhatsApp Image 2026-02-02 at 06.40.20.jpeg') }}" alt="img">
                            </a>
                        </div>
                        <div class="news-content">
                            <ul>
                                <li><i class="fa-solid fa-calendar-days"></i> October 19, 2024</li>
                                <li><i class="fa-regular fa-user"></i> By admin</li>
                            </ul>
                            <h4><a href="{{ route('blog') }}">Joyful Journeys Childcare And EducationIgniting Curiosity</a></h4>
                            <a href="{{ route('blog') }}" class="readmore d-flex align-items-center gap-2">
                                {{ __('site.read_more') }} <span class="arrows mt-1"><i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                    @endforelse
                </div>
                
                <!-- Right Column - Large Featured Blog Post -->
                <div class="col-xl-6 col-lg-6">
                    @php $featuredPost = ($recentBlogs ?? collect())->skip(2)->first(); @endphp
                    @if($featuredPost)
                    <div class="news-big-item wow fadeInUp" data-wow-delay=".5s">
                        <div class="news-big-thumb overflow-hidden rounded-4">
                            <a href="{{ route('blog.show', $featuredPost->slug ?? $featuredPost->id) }}">
                                <img src="{{ $featuredPost->image_url ?? asset('images/imported/WhatsApp Image 2026-02-02 at 06.40.54.jpeg') }}" alt="{{ $featuredPost->title }}" class="w-100">
                            </a>
                        </div>
                        <div class="news-big-content pt-4">
                            <ul class="d-flex flex-wrap gap-3 mb-2">
                                <li>
                                    <i class="fa-solid fa-calendar-days"></i>
                                    {{ $featuredPost->published_at ? $featuredPost->published_at->format('F d, Y') : $featuredPost->created_at->format('F d, Y') }}
                                </li>
                                <li>
                                    <i class="fa-regular fa-user"></i>
                                    By {{ $featuredPost->author->name ?? 'admin' }}
                                </li>
                            </ul>
                            <h4 class="mb-3">
                                <a href="{{ route('blog.show', $featuredPost->slug ?? $featuredPost->id) }}" class="black">
                                    {{ Str::limit($featuredPost->title, 80) }}
                                </a>
                            </h4>
                            <a href="{{ route('blog.show', $featuredPost->slug ?? $featuredPost->id) }}" class="readmore d-flex align-items-center gap-2">
                                {{ __('site.read_more') }}
                                <span class="arrows mt-1">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="news-big-item wow fadeInUp" data-wow-delay=".5s">
                        <div class="news-big-thumb overflow-hidden rounded-4">
                            <a href="{{ route('blog') }}">
                                <img src="{{ asset('images/imported/WhatsApp Image 2026-02-02 at 06.40.54.jpeg') }}" alt="img" class="w-100">
                            </a>
                        </div>
                        <div class="news-big-content pt-4">
                            <ul class="d-flex flex-wrap gap-3 mb-2">
                                <li><i class="fa-solid fa-calendar-days"></i> October 19, 2024</li>
                                <li><i class="fa-regular fa-user"></i> By admin</li>
                            </ul>
                            <h4 class="mb-3">
                                <a href="{{ route('blog') }}" class="black">Joyful Journeys Childcare And EducationIgniting Curiosity</a>
                            </h4>
                            <a href="{{ route('blog') }}" class="readmore d-flex align-items-center gap-2">
                                {{ __('site.read_more') }} <span class="arrows mt-1"><i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Age Groups Section Start -->
    <section class="age-groups-section py-5 overflow-hidden position-relative" style="background: linear-gradient(135deg, #fff5f8 0%, #f0f7ff 100%);">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-5 col-md-12">
                    <div class="section-title mb-4 mb-lg-0">
                        <span class="sub-title wow fadeInUp p4-clr">
                            {{ __('site.knowledge.subtitle') }}
                        </span>
                        <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                            {{ __('site.knowledge.title') }}
                        </h3>
                        <p class="pra wow fadeInUp" data-wow-delay=".4s">
                            {{ __('site.about.description') }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="age-boxes-wrap d-flex flex-wrap justify-content-center gap-3 wow fadeInUp" data-wow-delay=".3s">
                        <div class="age-box p1-bg d-flex flex-column align-items-center justify-content-center text-center">
                            <span class="age-range white">3m-2{{ app()->getLocale() == 'fr' ? 'ans' : 'yrs' }}</span>
                            <span class="age-label white">{{ __('site.knowledge.infants') }}</span>
                        </div>
                        <div class="age-box p2-bg d-flex flex-column align-items-center justify-content-center text-center">
                            <span class="age-range white">2-4{{ app()->getLocale() == 'fr' ? 'ans' : 'yrs' }}</span>
                            <span class="age-label white">{{ __('site.knowledge.preschool') }}</span>
                        </div>
                        <div class="age-box p5-bg d-flex flex-column align-items-center justify-content-center text-center">
                            <span class="age-range white">4-5{{ app()->getLocale() == 'fr' ? 'ans' : 'yrs' }}</span>
                            <span class="age-label white">{{ __('site.knowledge.kindergarten') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Element -->
        <img src="{{ asset('images/knowledge-animal.png') }}" alt="img" class="knowledge-animal d-none d-xl-block" style="position: absolute; top: 20px; right: 30px; width: 120px; animation: lf 2s linear infinite;">
    </section>

    <!--<< Newsletter Section Start >>-->
    <section class="inspair-section position-relative overflow-hidden">
        <div class="container">
            <div class="row flex-row-reverse g-4 align-items-end justify-content-between">
                <div class="col-lg-5 col-md-6 col-sm-7">
                    <div class="inspair-content">
                        <div class="section-title mb-40">
                            <span class="sub-title wow fadeInUp black">{{ __('site.newsletter.subtitle') }}</span>
                            <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                                {{ __('site.newsletter.title') }}
                            </h3>
                        </div>
                        <form action="{{ route('contact') }}" method="GET" class="footer-form wow fadeInUp" data-wow-delay=".4s">
                            <input type="text" name="email" placeholder="{{ __('site.footer.email_placeholder') }}">
                            <button type="submit" class="white d-flex align-content-center gap-2">
                                {{ __('site.submit') }}
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-5">
                    <div class="inspainr-thumb-box">
                        <div class="inspair-thumb">
                            <img src="{{ asset('images/imported/front-facing-of-campus.jpeg') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    /* Gallery Section Home Styles */
    .gallery-section-home .gallery-item {
        cursor: pointer;
    }
    .gallery-section-home .gallery-item img {
        transition: transform 0.5s ease;
        aspect-ratio: 4/3;
        object-fit: cover;
    }
    .gallery-section-home .gallery-item:hover img {
        transform: scale(1.1);
    }
    .gallery-section-home .gallery-overlay {
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
    .gallery-section-home .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }
    
    /* Age Groups Section Styles */
    .age-groups-section {
        z-index: 1;
    }
    .age-box {
        width: 180px;
        height: 180px;
        border-radius: 15px;
        padding: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .age-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }
    .age-range {
        font-size: 32px;
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 8px;
    }
    .age-label {
        font-size: 18px;
        font-weight: 500;
        opacity: 0.95;
    }
    
    /* Mobile Responsive */
    @media (max-width: 991px) {
        .age-boxes-wrap {
            justify-content: center !important;
        }
        .age-box {
            width: 150px;
            height: 150px;
        }
        .age-range {
            font-size: 26px;
        }
        .age-label {
            font-size: 15px;
        }
    }
    @media (max-width: 576px) {
        .age-box {
            width: 100px;
            height: 100px;
            padding: 12px;
        }
        .age-range {
            font-size: 18px;
            margin-bottom: 4px;
        }
        .age-label {
            font-size: 12px;
        }
        .age-groups-section .section-title {
            text-align: center;
        }
    }
    
    /* Blog Section Styles */
    .news-small-items {
        display: flex;
        gap: 20px;
        background: #fff;
        border-radius: 15px;
        padding: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .news-small-items:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.12);
    }
    .news-small-items .news-thumb {
        flex-shrink: 0;
        width: 160px;
        height: 140px;
        border-radius: 10px;
        overflow: hidden;
    }
    .news-small-items .news-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .news-small-items:hover .news-thumb img {
        transform: scale(1.05);
    }
    .news-small-items .news-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .news-small-items .news-content ul {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 8px;
        padding: 0;
        list-style: none;
    }
    .news-small-items .news-content ul li {
        font-size: 14px;
        color: #666;
    }
    .news-small-items .news-content ul li i {
        margin-right: 5px;
        color: var(--p1);
    }
    .news-small-items .news-content h4 {
        font-size: 18px;
        margin-bottom: 10px;
        line-height: 1.4;
    }
    .news-small-items .news-content h4 a {
        color: #1a1a2e;
        transition: color 0.3s ease;
    }
    .news-small-items .news-content h4 a:hover {
        color: var(--p1);
    }
    .news-small-items .readmore {
        font-weight: 600;
        color: #1a1a2e;
        font-size: 15px;
        transition: gap 0.3s ease, color 0.3s ease;
    }
    .news-small-items .readmore:hover {
        color: var(--p1);
        gap: 10px !important;
    }
    
    /* Large Blog Item */
    .news-big-item {
        background: #fff;
        border-radius: 15px;
        padding: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }
    .news-big-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.12);
    }
    .news-big-thumb {
        border-radius: 12px;
        overflow: hidden;
    }
    .news-big-thumb img {
        width: 100%;
        height: 320px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .news-big-item:hover .news-big-thumb img {
        transform: scale(1.03);
    }
    .news-big-content ul {
        padding: 0;
        list-style: none;
    }
    .news-big-content ul li {
        font-size: 14px;
        color: #666;
    }
    .news-big-content ul li i {
        margin-right: 5px;
        color: var(--p1);
    }
    .news-big-content h4 {
        font-size: 22px;
        line-height: 1.4;
    }
    .news-big-content h4 a {
        transition: color 0.3s ease;
    }
    .news-big-content h4 a:hover {
        color: var(--p1) !important;
    }
    .news-big-content .readmore {
        font-weight: 600;
        color: #1a1a2e;
        transition: gap 0.3s ease, color 0.3s ease;
    }
    .news-big-content .readmore:hover {
        color: var(--p1);
        gap: 10px !important;
    }
    
    /* Mobile Responsive for Blog */
    @media (max-width: 767px) {
        .news-small-items {
            flex-direction: column;
        }
        .news-small-items .news-thumb {
            width: 100%;
            height: 180px;
        }
        .news-big-thumb img {
            height: 220px;
        }
    }
</style>
@endpush
