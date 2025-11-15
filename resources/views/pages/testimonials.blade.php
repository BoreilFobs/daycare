@extends('layouts.web')
@section('content')
     <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 data-aos="fade-down" data-aos-duration="1000">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">{{ $pageSections['header']['title'] ?? 'Testimonial' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Community</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">{{ $pageSections['header']['title'] ?? 'Testimonials' }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Testimonial Start -->
    <div class="container-fluid testimonial py-5">
        <div class="container py-5">
            <div class="mx-auto text-center data-aos="fade-down" data-aos-duration="1000" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">{{ $pageSections['content']['title'] ?? 'Our Testimonials' }}</h4>
                <h1 class="mb-5 display-3">{{ $pageSections['content']['heading'] ?? 'Parents Say About Us' }}</h1>
            </div>
            <div class="owl-carousel testimonial-carousel data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                @forelse($testimonials as $testimonial)
                    <div class="testimonial-item img-border-radius bg-light border border-primary p-4">
                        <div class="p-4 position-relative">
                            <i class="fa fa-quote-right fa-2x text-primary position-absolute" style="top: 15px; right: 15px;"></i>
                            <div class="d-flex align-items-center">
                                <div class="border border-primary bg-white rounded-circle">
                                    <img src="{{ $testimonial->image_url ? asset('storage/' . $testimonial->image_url) : asset('img/testimonial-2.jpg') }}" class="rounded-circle p-2" style="width: 80px; height: 80px; border-style: dotted; border-color: var(--bs-primary);" alt="{{ $testimonial->parent_name }}" loading="lazy">
                                </div>
                                <div class="ms-4">
                                    <h4 class="text-dark">{{ $testimonial->parent_name }}</h4>
                                    <p class="m-0 pb-3">{{ $testimonial->relation ?? 'Parent' }}</p>
                                    <div class="d-flex pe-5">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-primary' : 'text-secondary' }}"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-primary mt-4 pt-3">
                                <p class="mb-0">{{ $testimonial->message }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="testimonial-item img-border-radius bg-light border border-primary p-4">
                        <div class="p-4 position-relative text-center">
                            <p class="mb-0">No testimonials available at the moment.</p>
                        </div>
                    </div>
                @endforelse
            </div>
            
            {{-- Pagination for non-carousel view (optional) --}}
            @if(isset($testimonials) && method_exists($testimonials, 'hasPages') && $testimonials->hasPages())
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            {{ $testimonials->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Testimonial End -->

@endsection