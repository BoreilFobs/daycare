@extends('layouts.web')
@section('content')
 <!-- Page Header Start -->
<div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4">{{ $pageSections['header']['title'] ?? 'About Us' }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                {{-- <li class="breadcrumb-item"><a href="#">Pages</a></li> --}}
                <li class="breadcrumb-item text-white" aria-current="page">{{ $pageSections['header']['title'] ?? 'About Us' }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- About Start -->
<div class="container-fluid py-5 about bg-light">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="video border">
                    <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="{{ $pageSections['about']['video_url'] ?? 'https://www.youtube.com/embed/DWRcNpR6Kdc' }}" data-bs-target="#videoModal">
                        <span></span>
                    </button>
                </div>
            </div>
            <div class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">{{ $pageSections['about']['title'] ?? 'About Us' }}</h4>
                <h1 class="text-dark mb-4 display-5">{{ $pageSections['about']['heading'] ?? 'We Learn Smart Way To Build Bright Future For Your Children' }}</h1>
                <p class="text-dark mb-3">At ABC Children Centre, we believe that every child deserves a joyful beginning — one filled with laughter, love, and learning. We're excited to welcome you into our growing community of parents, teachers, & friends who share a common dream: to nurture little children for a bright and confident future.</p>
                <p class="text-dark mb-4">Our approach goes beyond traditional education. We create an environment where curiosity is encouraged, creativity is celebrated, and every child feels valued. From their first steps into our classrooms to the friendships they build and the skills they develop, we're here to support every milestone along the way.</p>
                <div class="row mb-4">
                    <div class="col-lg-6">
                        <h6 class="mb-3"><i class="fas fa-check-circle me-2"></i>{{ $pageSections['about']['feature_1'] ?? 'Sport Activities' }}</h6>
                        <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>{{ $pageSections['about']['feature_2'] ?? 'Outdoor Games' }}</h6>
                        <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-secondary"></i>{{ $pageSections['about']['feature_3'] ?? 'Nutritious Foods' }}</h6>
                    </div>
                    <div class="col-lg-6">
                        <h6 class="mb-3"><i class="fas fa-check-circle me-2"></i>{{ $pageSections['about']['feature_4'] ?? 'Highly Secured' }}</h6>
                        <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>{{ $pageSections['about']['feature_5'] ?? 'Friendly Environment' }}</h6>
                        <h6><i class="fas fa-check-circle me-2 text-secondary"></i>{{ $pageSections['about']['feature_6'] ?? 'Qualified Teacher' }}</h6>
                    </div>
                </div>
                <a href="{{ $pageSections['about']['button_link'] ?? route('contact') }}" class="btn btn-primary px-5 py-3 btn-border-radius">{{ $pageSections['about']['button_text'] ?? 'More Details' }}</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal Video -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                        allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Our Mission & Values Start -->
<div class="container-fluid py-5 bg-white">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="border border-primary rounded p-5 h-100">
                    <h3 class="text-primary mb-4"><i class="fas fa-heart me-2"></i>Our Mission</h3>
                    <p class="mb-4">We celebrate the little moments that make childhood magical — whether it's a child's first drawing, a fun learning activity, or a community event. Our mission is to create an environment where every child feels safe, loved, and inspired to explore the world around them.</p>
                    <p class="mb-0">Through play-based learning, nurturing relationships, and family partnerships, we lay the foundation for lifelong success and happiness.</p>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="border border-secondary rounded p-5 h-100">
                    <h3 class="text-secondary mb-4"><i class="fas fa-star me-2"></i>Our Approach</h3>
                    <p class="mb-4">We bring expert advice on early childhood development — how to build routines, support healthy eating, and encourage curiosity through play. Each interaction is designed to strengthen the bridge between home and school, ensuring that every child thrives in both worlds.</p>
                    <p class="mb-0">We believe in the power of community. When parents, teachers, and children come together, amazing things happen!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our Mission & Values End -->

<!-- Join Our Family Start -->
<div class="container-fluid py-5 bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 wow fadeIn text-center" data-wow-delay="0.1s">
                <h2 class="display-4 text-primary mb-4">Welcome to the Family of Strong Beginnings</h2>
                <p class="lead mb-4">As you explore our programs, meet our team, and connect with other families, you become part of the ABC story — a story of togetherness, hope, and love.</p>
                <p class="mb-5">Let's walk this journey hand in hand and give every little one a strong start in life. Together, we'll create beautiful memories and build a foundation for success that lasts a lifetime.</p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="{{ route('programs') }}" class="btn btn-primary px-5 py-3 btn-border-radius">Explore Programs</a>
                    <a href="{{ route('contact') }}" class="btn btn-secondary px-5 py-3 btn-border-radius">Schedule a Visit</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Join Our Family End -->

@endsection