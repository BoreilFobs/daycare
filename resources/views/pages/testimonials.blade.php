@extends('layouts.web')
@section('title', 'Testimonials')
@section('content')
    <!-- Breadcrumnd Banner Start -->
    <section class="breadcrumnd-banner cmn-bg overflow-hidden">
        <div class="container">
            <div class="breadcrumnd-wrapper">
                <div class="breadcrumnd-content">
                    <h1 class="black mb-lg-4 mb-md-3 mb-2">
                        Testimonials
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
                            Testimonials
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

    <!-- Testimonials Section Start -->
    <section class="testimonials-section mt-60 overflow-hidden space-bottom">
        <div class="container">
            <div class="section-title text-center mb-50">
                <span class="sub-title d-block p1-clr mb-15">
                    Parent Testimonials
                </span>
                <h2 class="black fw-medium">
                    What Parents Say About Us
                </h2>
            </div>
            <div class="row g-4">
                @forelse($testimonials ?? [] as $testimonial)
                <div class="col-lg-6">
                    <div class="testimonial-card p-4 gra-border round10 wow fadeInUp" data-wow-delay=".{{ $loop->iteration }}s">
                        <div class="d-flex align-items-start gap-4">
                            <div class="testimonial-avatar">
                                <img src="{{ $testimonial->image_url ?? asset('img/atestimonial/testimonial-small.png') }}" alt="{{ $testimonial->name }}" class="rounded-circle" width="80" height="80">
                            </div>
                            <div class="testimonial-content flex-grow-1">
                                <div class="rating mb-3">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= ($testimonial->rating ?? 5))
                                        <i class="fa-solid fa-star text-warning"></i>
                                        @else
                                        <i class="fa-regular fa-star text-warning"></i>
                                        @endif
                                    @endfor
                                </div>
                                <p class="pra mb-4">{{ $testimonial->content }}</p>
                                <div class="testimonial-author">
                                    <h5 class="black mb-1">{{ $testimonial->name }}</h5>
                                    <span class="pra small">{{ $testimonial->role ?? 'Parent' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="quote-icon position-absolute">
                            <i class="fa-solid fa-quote-right p1-clr opacity-25"></i>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-lg-6">
                    <div class="testimonial-card p-4 gra-border round10 wow fadeInUp" data-wow-delay=".3s">
                        <div class="d-flex align-items-start gap-4">
                            <div class="testimonial-avatar">
                                <img src="{{ asset('img/atestimonial/testimonial-small.png') }}" alt="Parent" class="rounded-circle" width="80" height="80">
                            </div>
                            <div class="testimonial-content flex-grow-1">
                                <div class="rating mb-3">
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                </div>
                                <p class="pra mb-4">"The care and attention my child receives here is outstanding. The teachers are wonderful and the programs are engaging. I couldn't ask for a better daycare!"</p>
                                <div class="testimonial-author">
                                    <h5 class="black mb-1">Jennifer Smith</h5>
                                    <span class="pra small">Parent</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="testimonial-card p-4 gra-border round10 wow fadeInUp" data-wow-delay=".4s">
                        <div class="d-flex align-items-start gap-4">
                            <div class="testimonial-avatar">
                                <img src="{{ asset('img/atestimonial/testimonial-small.png') }}" alt="Parent" class="rounded-circle" width="80" height="80">
                            </div>
                            <div class="testimonial-content flex-grow-1">
                                <div class="rating mb-3">
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                </div>
                                <p class="pra mb-4">"My son has thrived at this daycare. He's learned so much and has made great friends. The staff truly cares about each child's development."</p>
                                <div class="testimonial-author">
                                    <h5 class="black mb-1">Robert Johnson</h5>
                                    <span class="pra small">Parent</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>

            @if(isset($testimonials) && $testimonials->hasPages())
            <div class="pagination-wrap mt-50 d-flex justify-content-center">
                {{ $testimonials->links() }}
            </div>
            @endif
        </div>
    </section>

    <!-- Stay Section Start -->
    <section class="stay-section overflow-hidden cmn-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="stay-content py-60">
                        <span class="sub-title d-block p1-clr mb-15">
                            Share Your Experience
                        </span>
                        <h2 class="black fw-medium mb-4">
                            We'd Love to Hear From You
                        </h2>
                        <p class="pra mb-4">
                            Your feedback helps us continue to provide the best care and education for every child. Share your experience with us!
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
