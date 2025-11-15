@extends('layouts.web')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 aos-fade" data-aos-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 display-md-2 text-white mb-4">{{ $program->title }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('programs') }}">Programs</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">{{ Str::limit($program->title, 30) }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Program Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-4 g-lg-5">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="mb-4 mb-lg-5">
                        <!-- Program Image -->
                        <div class="position-relative mb-4 aos-fade" data-aos-delay="0.1s">
                            <img src="{{ $program->image_url ?? asset('img/program-1.jpg') }}" 
                                 class="img-fluid w-100 rounded" 
                                 alt="{{ $program->title }}"
                                 style="object-fit: cover; max-height: 500px;">
                            @if($program->price > 0)
                                <div class="position-absolute top-0 end-0 m-2 m-md-3">
                                    <span class="badge bg-primary fs-6 fs-md-5 px-3 px-md-4 py-2 py-md-3">
                                        {{ $program->currency }}{{ number_format($program->price, 2) }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Program Title & Meta -->
                        <div class="mb-4 aos-fade" data-aos-delay="0.3s">
                            <h1 class="display-6 display-md-5 mb-4">{{ $program->title }}</h1>
                            
                            <!-- Program Stats - Mobile Friendly Grid -->
                            <div class="row g-3 mb-4">
                                @if($program->total_sits > 0)
                                    <div class="col-6 col-md-3">
                                        <div class="bg-light rounded p-3 text-center h-100">
                                            <i class="fas fa-users fa-2x text-primary mb-2"></i>
                                            <small class="text-muted d-block">Seats</small>
                                            <strong class="d-block">{{ $program->total_sits }}</strong>
                                        </div>
                                    </div>
                                @endif

                                @if($program->total_lessons > 0)
                                    <div class="col-6 col-md-3">
                                        <div class="bg-light rounded p-3 text-center h-100">
                                            <i class="fas fa-book fa-2x text-primary mb-2"></i>
                                            <small class="text-muted d-block">Lessons</small>
                                            <strong class="d-block">{{ $program->total_lessons }}</strong>
                                        </div>
                                    </div>
                                @endif

                                @if($program->total_hours > 0)
                                    <div class="col-6 col-md-3">
                                        <div class="bg-light rounded p-3 text-center h-100">
                                            <i class="fas fa-clock fa-2x text-primary mb-2"></i>
                                            <small class="text-muted d-block">Hours</small>
                                            <strong class="d-block">{{ $program->total_hours }}</strong>
                                        </div>
                                    </div>
                                @endif

                                @if($program->price > 0)
                                    <div class="col-6 col-md-3">
                                        <div class="bg-light rounded p-3 text-center h-100">
                                            <i class="fas fa-tag fa-2x text-primary mb-2"></i>
                                            <small class="text-muted d-block">Price</small>
                                            <strong class="d-block text-primary">{{ $program->currency }}{{ number_format($program->price, 2) }}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Short Description -->
                        <div class="mb-4 aos-fade" data-aos-delay="0.5s">
                            <h4 class="text-primary mb-3">Overview</h4>
                            <p class="fs-6 fs-md-5 text-dark">{{ $program->description }}</p>
                        </div>

                        <!-- Full Description -->
                        @if($program->full_description)
                            <div class="mb-5 aos-fade" data-aos-delay="0.7s">
                                <h4 class="text-primary mb-3">Program Details</h4>
                                <div class="text-dark">
                                    {!! nl2br(e($program->full_description)) !!}
                                </div>
                            </div>
                        @endif

                        <!-- Teacher Information -->
                        @if($program->teacher_name)
                            <div class="card border-primary mb-5 aos-fade" data-aos-delay="0.9s">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0"><i class="fas fa-chalkboard-teacher me-2"></i>About Your Teacher</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-3 text-center mb-3 mb-md-0">
                                            <img src="{{ $program->teacher_image_url ?? asset('img/program-teacher.jpg') }}" 
                                                 class="rounded-circle border border-primary p-2" 
                                                 alt="{{ $program->teacher_name }}"
                                                 style="width: 150px; height: 150px; object-fit: cover;">
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="text-primary mb-2">{{ $program->teacher_name }}</h4>
                                            @if($program->teacher_title)
                                                <p class="text-muted mb-3">
                                                    <i class="fas fa-graduation-cap me-2"></i>{{ $program->teacher_title }}
                                                </p>
                                            @endif
                                            <p class="mb-0">
                                                Our experienced educator is dedicated to providing the best learning environment for your child. 
                                                With years of expertise in early childhood education, they ensure each child receives personalized 
                                                attention and care.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Enrollment CTA -->
                        <div class="bg-light p-4 p-md-5 rounded text-center aos-fade" data-aos-delay="1.1s">
                            <h3 class="mb-3">Ready to Enroll?</h3>
                            <p class="mb-4">Join our program today and give your child the best start in their educational journey!</p>
                            <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
                                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg px-4 px-md-5 py-3 btn-border-radius">
                                    <i class="fas fa-envelope me-2"></i>Contact Us
                                </a>
                                <a href="{{ route('programs') }}" class="btn btn-outline-primary btn-lg px-4 px-md-5 py-3 btn-border-radius">
                                    <i class="fas fa-arrow-left me-2"></i>View All Programs
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Program Info Card -->
                    <div class="card border-primary mb-4 aos-fade" data-aos-delay="0.1s">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Program Information</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                @if($program->total_sits > 0)
                                    <li class="border-bottom py-3">
                                        <div class="d-flex justify-content-between">
                                            <span><i class="fas fa-users text-primary me-2"></i>Available Seats</span>
                                            <strong>{{ $program->total_sits }}</strong>
                                        </div>
                                    </li>
                                @endif
                                @if($program->total_lessons > 0)
                                    <li class="border-bottom py-3">
                                        <div class="d-flex justify-content-between">
                                            <span><i class="fas fa-book text-primary me-2"></i>Total Lessons</span>
                                            <strong>{{ $program->total_lessons }}</strong>
                                        </div>
                                    </li>
                                @endif
                                @if($program->total_hours > 0)
                                    <li class="border-bottom py-3">
                                        <div class="d-flex justify-content-between">
                                            <span><i class="fas fa-clock text-primary me-2"></i>Total Hours</span>
                                            <strong>{{ $program->total_hours }} hrs</strong>
                                        </div>
                                    </li>
                                @endif
                                @if($program->price > 0)
                                    <li class="border-bottom py-3">
                                        <div class="d-flex justify-content-between">
                                            <span><i class="fas fa-tag text-primary me-2"></i>Program Fee</span>
                                            <strong class="text-primary fs-5">{{ $program->currency }}{{ number_format($program->price, 2) }}</strong>
                                        </div>
                                    </li>
                                @endif
                                @if($program->teacher_name)
                                    <li class="py-3">
                                        <div class="d-flex justify-content-between">
                                            <span><i class="fas fa-chalkboard-teacher text-primary me-2"></i>Instructor</span>
                                            <strong>{{ $program->teacher_name }}</strong>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <!-- Quick Contact Card -->
                    <div class="card border-primary mb-4 aos-fade" data-aos-delay="0.3s">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-phone me-2"></i>Quick Contact</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-3">Have questions about this program? Get in touch with us!</p>
                            <div class="d-grid gap-2">
                                <a href="tel:{{ str_replace(' ', '', $siteSettings['contact_phone'] ?? '') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-phone me-2"></i>Call Us
                                </a>
                                <a href="mailto:{{ $siteSettings['contact_email'] ?? '' }}" class="btn btn-outline-primary">
                                    <i class="fas fa-envelope me-2"></i>Email Us
                                </a>
                                <a href="{{ route('contact') }}" class="btn btn-primary">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Share Card -->
                    <div class="card border-primary aos-fade" data-aos-delay="0.5s">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-share-alt me-2"></i>Share This Program</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex gap-2">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                                   target="_blank" 
                                   class="btn btn-primary btn-sm flex-fill">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($program->title) }}" 
                                   target="_blank" 
                                   class="btn btn-info btn-sm flex-fill">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($program->title . ' - ' . url()->current()) }}" 
                                   target="_blank" 
                                   class="btn btn-success btn-sm flex-fill">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="mailto:?subject={{ urlencode($program->title) }}&body={{ urlencode(url()->current()) }}" 
                                   class="btn btn-secondary btn-sm flex-fill">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Programs -->
            @if($relatedPrograms->count() > 0)
                <div class="mt-5 pt-5 border-top">
                    <div class="mx-auto text-center aos-fade" data-aos-delay="0.1s" style="max-width: 700px;">
                        <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Related Programs</h4>
                        <h1 class="mb-5 display-5">You May Also Like</h1>
                    </div>
                    <div class="row g-5 justify-content-center">
                        @foreach($relatedPrograms as $index => $relatedProgram)
                            <div class="col-md-6 col-lg-4 aos-fade" data-aos-delay="{{ 0.1 + ($index * 0.2) }}s">
                                <div class="program-item rounded">
                                    <div class="program-img position-relative">
                                        <div class="overflow-hidden img-border-radius">
                                            <img src="{{ $relatedProgram->image_url ?? asset('img/program-' . (($index % 3) + 1) . '.jpg') }}" 
                                                 class="img-fluid w-100" 
                                                 alt="{{ $relatedProgram->title }}">
                                        </div>
                                        @if($relatedProgram->price > 0)
                                            <div class="px-4 py-2 bg-primary text-white program-rate">{{ $relatedProgram->currency }}{{ number_format($relatedProgram->price, 2) }}</div>
                                        @endif
                                    </div>
                                    <div class="program-text bg-white px-4 pb-3">
                                        <div class="program-text-inner">
                                            <a href="{{ route('programs.show', $relatedProgram->id) }}" class="h4">{{ $relatedProgram->title }}</a>
                                            <p class="mt-3 mb-0">{{ Str::limit($relatedProgram->description, 100) }}</p>
                                        </div>
                                    </div>
                                    @if($relatedProgram->teacher_name)
                                        <div class="program-teacher d-flex align-items-center border-top border-primary bg-white px-4 py-3">
                                            <img src="{{ $relatedProgram->teacher_image_url ?? asset('img/program-teacher.jpg') }}" 
                                                 class="img-fluid rounded-circle p-2 border border-primary bg-white" 
                                                 alt="{{ $relatedProgram->teacher_name }}" 
                                                 style="width: 70px; height: 70px;">
                                            <div class="ms-3">
                                                <h6 class="mb-0 text-primary">{{ $relatedProgram->teacher_name }}</h6>
                                                @if($relatedProgram->teacher_title)
                                                    <small>{{ $relatedProgram->teacher_title }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                    <div class="bg-primary rounded-bottom">
                                        <div class="d-flex justify-content-between px-4 py-2">
                                            @if($relatedProgram->total_sits > 0)
                                                <small class="text-white"><i class="fas fa-users me-1"></i> {{ $relatedProgram->total_sits }} Seats</small>
                                            @endif
                                            @if($relatedProgram->total_lessons > 0)
                                                <small class="text-white"><i class="fas fa-book me-1"></i> {{ $relatedProgram->total_lessons }} Lessons</small>
                                            @endif
                                            @if($relatedProgram->total_hours > 0)
                                                <small class="text-white"><i class="fas fa-clock me-1"></i> {{ $relatedProgram->total_hours }} Hours</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Program Detail End -->
@endsection
