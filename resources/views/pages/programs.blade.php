@extends('layouts.web')
@section('title', __('site.nav.programs'))
@section('content')
    <!-- Breadcrumnd Banner Start -->
    <section class="breadcrumnd-banner cmn-bg overflow-hidden">
        <div class="container">
            <div class="breadcrumnd-wrapper">
                <div class="breadcrumnd-content">
                    <h1 class="black mb-lg-4 mb-md-3 mb-2">
                        {{ __('site.nav.programs') }}
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
                            {{ __('site.nav.programs') }}
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

    <!-- Programs Section Start -->
    <section class="programs-section mt-60 overflow-hidden space-bottom">
        <div class="container">
            <div class="section-title text-center mb-50">
                <span class="sub-title d-block p1-clr mb-15">{{ __('site.programs.subtitle') }}</span>
                <h2 class="black fw-medium">{{ __('site.programs.title') }}</h2>
            </div>
            <div class="row g-4">
                @forelse($programs ?? [] as $program)
                <div class="col-lg-4 col-md-6">
                    <div class="program-card wow fadeInUp" data-wow-delay=".{{ $loop->iteration }}s" style="background: #fff; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.08); transition: all 0.4s ease; height: 100%;">
                        <!-- Image Section -->
                        <div class="program-card-image position-relative" style="height: 220px; overflow: hidden;">
                            <img src="{{ $program->image_url }}" alt="{{ $program->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                            <!-- Price Badge -->
                            @if($program->price)
                            <div class="price-badge position-absolute" style="top: 15px; right: 15px; background: linear-gradient(135deg, #ff6b9d 0%, #ff8e53 100%); color: #fff; padding: 8px 18px; border-radius: 25px; font-weight: 700; font-size: 16px; box-shadow: 0 4px 15px rgba(255,107,157,0.4);">
                                {{ $program->formatted_price }}
                            </div>
                            @endif
                            <!-- Age Group Badge -->
                            <div class="age-badge position-absolute" style="bottom: 15px; left: 15px; background: rgba(255,255,255,0.95); color: #333; padding: 6px 14px; border-radius: 20px; font-size: 13px; font-weight: 600; backdrop-filter: blur(10px);">
                                <i class="fa-solid fa-child me-1" style="color: #ff6b9d;"></i> {{ $program->total_sits }} {{ __('site.programs.seats') }}
                            </div>
                        </div>
                        
                        <!-- Content Section -->
                        <div class="program-card-content" style="padding: 25px;">
                            <!-- Title -->
                            <h4 style="margin-bottom: 12px; font-size: 20px; font-weight: 700;">
                                <a href="{{ route('programs.show', $program->id) }}" style="color: #2d3748; text-decoration: none; transition: color 0.3s;">{{ $program->title }}</a>
                            </h4>
                            
                            <!-- Description -->
                            <p style="color: #718096; font-size: 14px; line-height: 1.6; margin-bottom: 20px; min-height: 44px;">
                                {{ Str::limit($program->description, 80) }}
                            </p>
                            
                            <!-- Stats Row -->
                            <div class="program-stats d-flex justify-content-between align-items-center" style="padding: 15px 0; border-top: 1px solid #edf2f7; border-bottom: 1px solid #edf2f7; margin-bottom: 20px;">
                                @if($program->total_lessons)
                                <div class="stat-item text-center" style="flex: 1;">
                                    <div style="font-size: 20px; font-weight: 700; color: #ff6b9d;">{{ $program->total_lessons }}</div>
                                    <div style="font-size: 12px; color: #a0aec0; text-transform: uppercase;">{{ __('site.programs.lessons') }}</div>
                                </div>
                                @endif
                                @if($program->total_hours)
                                <div class="stat-item text-center" style="flex: 1; border-left: 1px solid #edf2f7;">
                                    <div style="font-size: 20px; font-weight: 700; color: #4299e1;">{{ $program->total_hours }}</div>
                                    <div style="font-size: 12px; color: #a0aec0; text-transform: uppercase;">{{ __('site.programs.hours') }}</div>
                                </div>
                                @endif
                                <div class="stat-item text-center" style="flex: 1; border-left: 1px solid #edf2f7;">
                                    <div style="font-size: 20px; font-weight: 700; color: #48bb78;">{{ $program->total_sits }}</div>
                                    <div style="font-size: 12px; color: #a0aec0; text-transform: uppercase;">{{ __('site.programs.seats') }}</div>
                                </div>
                            </div>
                            
                            <!-- Teacher Info (if available) -->
                            @if($program->teacher_name)
                            <div class="teacher-info d-flex align-items-center mb-20" style="margin-bottom: 20px;">
                                @if($program->teacher_image)
                                <img src="{{ Storage::url($program->teacher_image) }}" alt="{{ $program->teacher_name }}" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; margin-right: 12px; border: 2px solid #ff6b9d;">
                                @else
                                <div style="width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, #ff6b9d 0%, #ff8e53 100%); display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                                    <i class="fa-solid fa-user" style="color: #fff; font-size: 16px;"></i>
                                </div>
                                @endif
                                <div>
                                    <div style="font-size: 14px; font-weight: 600; color: #2d3748;">{{ $program->teacher_name }}</div>
                                    @if($program->teacher_title)
                                    <div style="font-size: 12px; color: #a0aec0;">{{ $program->teacher_title }}</div>
                                    @endif
                                </div>
                            </div>
                            @endif
                            
                            <!-- CTA Button -->
                            <a href="{{ route('programs.show', $program->id) }}" class="enroll-btn d-block text-center" style="background: linear-gradient(135deg, #ff6b9d 0%, #ff8e53 100%); color: #fff; padding: 14px 20px; border-radius: 12px; font-weight: 600; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(255,107,157,0.3);">
                                <span>{{ __('site.programs.learn_more') }}</span>
                                <i class="fa-solid fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <div style="background: #f7fafc; border-radius: 20px; padding: 60px 40px;">
                        <i class="fa-solid fa-graduation-cap" style="font-size: 60px; color: #cbd5e0; margin-bottom: 20px;"></i>
                        <h4 style="color: #4a5568; margin-bottom: 10px;">{{ __('site.programs.no_programs') }}</h4>
                        <p style="color: #a0aec0;">{{ __('site.programs.check_back') }}</p>
                    </div>
                </div>
                @endforelse
            </div>

            @if(isset($programs) && $programs->hasPages())
            <div class="pagination-wrap mt-50 d-flex justify-content-center">
                {{ $programs->links() }}
            </div>
            @endif
        </div>
    </section>

    <style>
        .program-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.15) !important;
        }
        .program-card:hover .program-card-image img {
            transform: scale(1.1);
        }
        .program-card-content h4 a:hover {
            color: #ff6b9d !important;
        }
        .enroll-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255,107,157,0.4) !important;
        }
    </style>

    <!-- Stay Section Start -->
    <section class="stay-section overflow-hidden cmn-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="stay-content py-60">
                        <span class="sub-title d-block p1-clr mb-15">
                            Join Our Community
                        </span>
                        <h2 class="black fw-medium mb-4">
                            Enroll Your Child Today
                        </h2>
                        <p class="pra mb-4">
                            Give your child the best start in life with our nurturing and educational programs designed for every stage of early childhood development.
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
