@extends('layouts.web')
@section('title', __('site.nav.team'))
@section('content')
    <!-- Breadcrumnd Banner Start -->
    <section class="breadcrumnd-banner cmn-bg overflow-hidden">
        <div class="container">
            <div class="breadcrumnd-wrapper">
                <div class="breadcrumnd-content">
                    <h1 class="black mb-lg-4 mb-md-3 mb-2">
                        {{ __('site.nav.team') }}
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
                            {{ __('site.nav.team') }}
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

    <!-- Team Section Start -->
    <section class="team-section mt-60 overflow-hidden space-bottom">
        <div class="container">
            <div class="section-title text-center mb-50">
                <span class="sub-title d-block p1-clr mb-15">
                    {{ __('site.info.staff') }}
                </span>
                <h2 class="black fw-medium">
                    Our Professional Team
                </h2>
            </div>
            <div class="row g-4">
                @forelse($teamMembers ?? [] as $member)
                <div class="col-lg-3 col-md-6">
                    <div class="professional-item wow fadeInUp" data-wow-delay=".{{ $loop->iteration }}s">
                        <div class="professional-thumb position-relative">
                            <img src="{{ $member->image_url ?? asset('img/about/professional1.png') }}" alt="{{ $member->name }}" class="w-100">
                            <div class="professional-social">
                                @if($member->facebook)
                                <a href="{{ $member->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                @endif
                                @if($member->twitter)
                                <a href="{{ $member->twitter }}"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if($member->instagram)
                                <a href="{{ $member->instagram }}"><i class="fab fa-instagram"></i></a>
                                @endif
                                @if($member->linkedin)
                                <a href="{{ $member->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="professional-content text-center p-4">
                            <h5 class="black mb-2">{{ $member->name }}</h5>
                            <span class="pra">{{ $member->position ?? $member->role ?? 'Team Member' }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-lg-3 col-md-6">
                    <div class="professional-item wow fadeInUp" data-wow-delay=".3s">
                        <div class="professional-thumb position-relative">
                            <img src="{{ asset('img/about/professional1.png') }}" alt="Team Member" class="w-100">
                            <div class="professional-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="professional-content text-center p-4">
                            <h5 class="black mb-2">Sarah Johnson</h5>
                            <span class="pra">Head Teacher</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="professional-item wow fadeInUp" data-wow-delay=".4s">
                        <div class="professional-thumb position-relative">
                            <img src="{{ asset('img/about/professional2.png') }}" alt="Team Member" class="w-100">
                            <div class="professional-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="professional-content text-center p-4">
                            <h5 class="black mb-2">Michael Davis</h5>
                            <span class="pra">Care Coordinator</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="professional-item wow fadeInUp" data-wow-delay=".5s">
                        <div class="professional-thumb position-relative">
                            <img src="{{ asset('img/about/professional3.png') }}" alt="Team Member" class="w-100">
                            <div class="professional-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="professional-content text-center p-4">
                            <h5 class="black mb-2">Emily Wilson</h5>
                            <span class="pra">Activity Leader</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="professional-item wow fadeInUp" data-wow-delay=".6s">
                        <div class="professional-thumb position-relative">
                            <img src="{{ asset('img/about/professional4.png') }}" alt="Team Member" class="w-100">
                            <div class="professional-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="professional-content text-center p-4">
                            <h5 class="black mb-2">David Brown</h5>
                            <span class="pra">Program Director</span>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Stay Section Start -->
    <section class="stay-section overflow-hidden cmn-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="stay-content py-60">
                        <span class="sub-title d-block p1-clr mb-15">
                            Join Our Team
                        </span>
                        <h2 class="black fw-medium mb-4">
                            We're Always Looking for Passionate Educators
                        </h2>
                        <p class="pra mb-4">
                            If you share our passion for early childhood education and want to make a difference in children's lives, we'd love to hear from you.
                        </p>
                        <a href="{{ route('contact') }}" class="theme-btn round100 p2-bg py-3 px-xl-5 px-4">
                            <span class="white fw-medium">
                                Contact Us
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
