@extends('layouts.web')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5" data-aos="fade-down" data-aos-duration="1000">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">{{ $pageSections['header']['title'] ?? 'Programs' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">Pages</a></li> --}}
                    <li class="breadcrumb-item text-white" aria-current="page">{{ $pageSections['header']['title'] ?? 'Programs' }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Programs Start -->
    <div class="container-fluid program  py-5">
        <div class="container py-5">
            <div class="mx-auto text-center" data-aos="fade-up" data-aos-duration="1000" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">{{ $pageSections['content']['title'] ?? 'Our Programs' }}</h4>
                <h1 class="mb-5 display-3">{{ $pageSections['content']['heading'] ?? 'We Offer An Exclusive Program For Kids' }}</h1>
                <div class="bg-light border-primary rounded p-4 mb-5" data-aos="fade-up" data-aos-delay="200">
                    <p class="mb-3">At ABC Children Centre, we believe that every child deserves a joyful beginning — one filled with laughter, love, and learning. Our carefully crafted programs are designed to meet children where they are and guide them gently toward where they can be.</p>
                    <p class="mb-0">Each program combines play-based learning with structured activities that nurture cognitive, social, emotional, and physical development. We create safe, welcoming spaces where children can explore, discover, and grow at their own pace while building the foundation for lifelong learning.</p>
                </div>
            </div>
            <div class="row g-5 justify-content-center">
                @forelse($programs as $index => $program)
                    <div class="col-md-6 col-lg-6 col-xl-4" data-aos="zoom-in" data-aos-delay="{{ $index * 150 }}" data-aos-duration="1000">
                        <div class="program-item rounded">
                            <div class="program-img position-relative">
                                <div class="overflow-hidden img-border-radius">
                                    <img src="{{ $program->image_url ?? asset('img/program-' . (($index % 3) + 1) . '.jpg') }}" class="img-fluid w-100" alt="{{ $program->title }}" loading="lazy" loading="lazy">
                                </div>
                                @if($program->price)
                                    <div class="px-4 py-2 bg-primary text-white program-rate">${{ number_format($program->price, 2) }}</div>
                                @endif
                            </div>
                            <div class="program-text bg-white px-4 pb-3">
                                <div class="program-text-inner">
                                    <a href="{{ route('programs.show', $program->id) }}" class="h4">{{ $program->title }}</a>
                                    <p class="mt-3 mb-3">{{ Str::limit($program->description, 100) }}</p>
                                    <a href="{{ route('programs.show', $program->id) }}" class="btn btn-primary btn-sm px-4 py-2 btn-border-radius">
                                        Read More <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                            @if($program->teacher_name)
                                <div class="program-teacher d-flex align-items-center border-top border-primary bg-white px-4 py-3">
                                    <img src="{{ $program->teacher_image_url ?? asset('img/program-teacher.jpg') }}" class="img-fluid rounded-circle p-2 border border-primary bg-white" alt="{{ $program->teacher_name }}" loading="lazy" style="width: 70px; height: 70px;" loading="lazy">
                                    <div class="ms-3">
                                        <h6 class="mb-0 text-primary">{{ $program->teacher_name }}</h6>
                                        @if($program->teacher_title)
                                            <small>{{ $program->teacher_title }}</small>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            <div class="bg-primary rounded-bottom">
                                <div class="d-flex justify-content-between px-4 py-2">
                                    @if($program->total_sits > 0)
                                        <small class="text-white"><i class="fas fa-users me-1"></i> {{ $program->total_sits }} Seats</small>
                                    @endif
                                    @if($program->total_lessons > 0)
                                        <small class="text-white"><i class="fas fa-book me-1"></i> {{ $program->total_lessons }} Lessons</small>
                                    @endif
                                    @if($program->total_hours > 0)
                                        <small class="text-white"><i class="fas fa-clock me-1"></i> {{ $program->total_hours }} Hours</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No programs available at the moment.</p>
                    </div>
                @endforelse
                
                {{-- Pagination --}}
                @if($programs->hasPages())
                    <div class="col-12 aos-fade" data-aos-delay="0.1s">
                        <div class="d-flex justify-content-center">
                            {{ $programs->links() }}
                        </div>
                    </div>
                @endif
            </div> 
        </div>
    </div>
    <!-- Program End -->
@endsection