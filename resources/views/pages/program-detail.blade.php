@extends('layouts.web')
@section('title', $program->title ?? 'Program Detail')
@section('content')
    <!-- Breadcrumnd Banner Start -->
    <section class="breadcrumnd-banner cmn-bg overflow-hidden">
        <div class="container">
            <div class="breadcrumnd-wrapper">
                <div class="breadcrumnd-content">
                    <h1 class="black mb-lg-4 mb-md-3 mb-2">
                        {{ $program->title ?? 'Program Details' }}
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
                            <a href="{{ route('programs') }}">
                                Programs
                            </a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                            {{ Str::limit($program->title, 20) }}
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

    <!-- Program Details Section Start -->
    <section class="program-details-section mt-60 overflow-hidden space-bottom">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="program-details-wrap">
                        <div class="program-details-thumb mb-40 position-relative">
                            <img src="{{ $program->image_url }}" alt="{{ $program->title }}" class="w-100 round10">
                            <div class="program-icon-large p1-bg round-circle">
                                <i class="fa-solid fa-book"></i>
                            </div>
                        </div>
                        <h3 class="program-details-title black mb-30">
                            {{ $program->title }}
                        </h3>
                        <div class="program-details-meta mb-30 d-flex flex-wrap gap-4">
                            @if($program->total_sits)
                            <div class="meta-item d-flex align-items-center gap-2">
                                <i class="fa-solid fa-users p1-clr"></i>
                                <span>{{ $program->total_sits }} Seats Available</span>
                            </div>
                            @endif
                            @if($program->total_lessons)
                            <div class="meta-item d-flex align-items-center gap-2">
                                <i class="fa-solid fa-book p1-clr"></i>
                                <span>{{ $program->total_lessons }} Lessons</span>
                            </div>
                            @endif
                            @if($program->total_hours)
                            <div class="meta-item d-flex align-items-center gap-2">
                                <i class="fa-solid fa-clock p1-clr"></i>
                                <span>{{ $program->total_hours }} Hours</span>
                            </div>
                            @endif
                            @if($program->price)
                            <div class="meta-item d-flex align-items-center gap-2">
                                <i class="fa-solid fa-tag p1-clr"></i>
                                <span>{{ $program->formatted_price }}</span>
                            </div>
                            @endif
                        </div>
                        <div class="program-details-content mb-40">
                            @if($program->full_description)
                                {!! $program->full_description !!}
                            @else
                                <p>{{ $program->description }}</p>
                            @endif
                        </div>

                        @if($program->teacher_name)
                        <div class="program-teacher mb-40 p-4 gra-border round10">
                            <h4 class="black mb-20">Program Instructor</h4>
                            <div class="d-flex align-items-center gap-3">
                                @if($program->teacher_image)
                                <img src="{{ Storage::url($program->teacher_image) }}" alt="{{ $program->teacher_name }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                                @else
                                <div class="rounded-circle p1-bg d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                    <i class="fa-solid fa-user-tie white fa-2x"></i>
                                </div>
                                @endif
                                <div>
                                    <h5 class="black mb-1">{{ $program->teacher_name }}</h5>
                                    @if($program->teacher_title)
                                    <span class="pra">{{ $program->teacher_title }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="program-sidebar">
                        <!-- Program Info Card -->
                        <div class="sidebar-widget p-4 gra-border round10 mb-30 wow fadeInUp" data-wow-delay=".3s">
                            <h4 class="black mb-20">Program Information</h4>
                            <ul class="program-info-list">
                                @if($program->total_sits)
                                <li class="d-flex justify-content-between mb-3">
                                    <span class="pra">Total Seats:</span>
                                    <span class="black">{{ $program->total_sits }}</span>
                                </li>
                                @endif
                                @if($program->total_lessons)
                                <li class="d-flex justify-content-between mb-3">
                                    <span class="pra">Total Lessons:</span>
                                    <span class="black">{{ $program->total_lessons }}</span>
                                </li>
                                @endif
                                @if($program->total_hours)
                                <li class="d-flex justify-content-between mb-3">
                                    <span class="pra">Duration:</span>
                                    <span class="black">{{ $program->total_hours }} Hours</span>
                                </li>
                                @endif
                                @if($program->price)
                                <li class="d-flex justify-content-between mb-3">
                                    <span class="pra">Price:</span>
                                    <span class="black fw-bold">{{ $program->formatted_price }}</span>
                                </li>
                                @endif
                            </ul>
                            <a href="{{ route('contact') }}" class="theme-btn round100 p1-bg py-3 w-100 text-center mt-3">
                                <span class="white fw-medium">Enroll Now</span>
                            </a>
                        </div>

                        <!-- Other Programs -->
                        <div class="sidebar-widget p-4 gra-border round10 wow fadeInUp" data-wow-delay=".4s">
                            <h4 class="black mb-20">Other Programs</h4>
                            <div class="other-programs">
                                @forelse($relatedPrograms ?? [] as $other)
                                <div class="other-program-item d-flex gap-3 mb-20">
                                    <div class="thumb">
                                        <img src="{{ $other->image_url }}" alt="{{ $other->title }}" class="round5" width="80">
                                    </div>
                                    <div class="content">
                                        <h6><a href="{{ route('programs.show', $other->id) }}">{{ $other->title }}</a></h6>
                                        @if($other->total_lessons)
                                        <span class="pra small"><i class="fa-solid fa-book me-1"></i>{{ $other->total_lessons }} Lessons</span>
                                        @endif
                                    </div>
                                </div>
                                @empty
                                <p class="pra">No other programs available.</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- Contact Card -->
                        <div class="sidebar-widget p-4 p1-bg round10 wow fadeInUp" data-wow-delay=".5s">
                            <h4 class="white mb-20">Have Questions?</h4>
                            <p class="white mb-4">Contact us for more information about this program.</p>
                            <a href="{{ route('contact') }}" class="theme-btn round100 white-bg py-3 w-100 text-center">
                                <span class="black fw-medium">Contact Us</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
