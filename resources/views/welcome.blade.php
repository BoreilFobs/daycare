@extends('layouts.web')
@section('content')
    <!-- Hero Start -->
    <div class="container-fluid py-5 hero-header" data-aos="fade-up" data-aos-duration="1000">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7 col-md-12">
                    <h1 class="mb-3 text-primary" data-aos="fade-right" data-aos-delay="200">{{ $pageSections['hero']['title'] ?? 'We Care Your Baby' }}</h1>
                    <h1 class="mb-5 display-1 text-white" data-aos="fade-right" data-aos-delay="400">{{ $pageSections['hero']['subtitle'] ?? 'let\'s give our little ones a strong start in life
' }}</h1>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <a href="{{ $pageSections['hero']['button_1_link'] ?? '/contact' }}" class="btn btn-primary px-4 py-3 px-md-5  me-4 btn-border-radius">{{ $pageSections['hero']['button_1_text'] ?? 'Get Started' }}</a>
                        <a href="{{ $pageSections['hero']['button_2_link'] ?? '/about' }}" class="btn btn-primary px-4 py-3 px-md-5 btn-border-radius">{{ $pageSections['hero']['button_2_text'] ?? 'Learn More' }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- About Start -->
    <div class="container-fluid py-5 about bg-light">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="video border">
                        <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="{{ $pageSections['home_about']['video_url'] ?? 'https://www.youtube.com/embed/DWRcNpR6Kdc' }}" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                    <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">{{ $pageSections['home_about']['title'] ?? 'About Us' }}</h4>
                    <h1 class="text-dark mb-4 display-5">{{ $pageSections['home_about']['heading'] ?? 'We Learn Smart Way To Build Bright Future For Your Children' }}</h1>
                    <p class="text-dark mb-4">{{ $pageSections['home_abou']['description'] ?? 'At ABC Children Centre, we believe that every child deserves a joyful beginning — one filled with laughter, love, and learning. We’re excited to welcome you into our growing community of parents, teachers, & friends who share a common dream: to nurture little children for a bright and confident future.
' }}
                    </p>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2"></i>{{ $pageSections['home_about']['feature_1'] ?? 'Sport Activities' }}</h6>
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>{{ $pageSections['home_about']['feature_2'] ?? 'Outdoor Games' }}</h6>
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-secondary"></i>{{ $pageSections['home_about']['feature_3'] ?? 'Nutritious Foods' }}</h6>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2"></i>{{ $pageSections['home_about']['feature_4'] ?? 'Highly Secured' }}</h6>
                            <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>{{ $pageSections['home_about']['feature_5'] ?? 'Friendly Environment' }}</h6>
                            <h6><i class="fas fa-check-circle me-2 text-secondary"></i>{{ $pageSections['home_about']['feature_6'] ?? 'Qualified Teacher' }}</h6>
                        </div>
                    </div>
                    <a href="{{ route('about') }}" class="btn btn-primary px-5 py-3 btn-border-radius">More Details</a>
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


    <!-- Service Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="mx-auto text-center" data-aos="fade-up" data-aos-duration="1000" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">{{ $pageSections['services']['title'] ?? 'Our Services' }}</h4>
                <h1 class="mb-5 display-3">{{ $pageSections['services']['heading'] ?? 'What We Offer For You' }}</h1>
            </div>
            <div class="row g-5">
                @forelse($services as $index => $service)
                    <div class="col-md-6 col-lg-6 col-xl-3" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-aos-duration="1000">
                        <div class="text-center border-primary border bg-white service-item">
                            <div class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-inner">
                                    <div class="p-4"><i class="{{ $service->icon ?? 'fas fa-child' }} fa-6x text-primary"></i></div>
                                    <a href="{{ route('services') }}" class="h4">{{ $service->title }}</a>
                                    <p class="my-3">{{ Str::limit($service->description, 120) }}</p>
                                    <a href="{{ route('services') }}" class="btn btn-primary text-white px-4 py-2 my-2 btn-border-radius">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No services available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Programs Start -->
    <div class="container-fluid program  py-5">
        <div class="container py-5">
            <div class="mx-auto text-center" data-aos="fade-up" data-aos-duration="1000" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">{{ $pageSections['programs']['title'] ?? 'Our Programs' }}</h4>
                <h1 class="mb-5 display-3">{{ $pageSections['programs']['heading'] ?? 'We Offer An Exclusive Program For Kids' }}</h1>
            </div>
            <div class="row g-5 justify-content-center">
                @forelse($featuredPrograms as $index => $program)
                    <div class="col-md-6 col-lg-6 col-xl-4" data-aos="zoom-in" data-aos-delay="{{ $index * 150 }}" data-aos-duration="1000">
                        <div class="program-item rounded">
                            <div class="program-img position-relative">
                                <div class="overflow-hidden img-border-radius">
                                    <img src="{{ $program->image_url ?? asset('img/program-' . (($index % 3) + 1) . '.jpg') }}" class="img-fluid w-100" alt="{{ $program->title }}" loading="lazy">
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
                                    <img src="{{ $program->teacher_image_url ?? asset('img/program-teacher.jpg') }}" class="img-fluid rounded-circle p-2 border border-primary bg-white" alt="{{ $program->teacher_name }}" style="width: 70px; height: 70px;" loading="lazy">
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
                <div class="d-inline-block text-center" data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ route('programs') }}" class="btn btn-primary px-5 py-3 text-white btn-border-radius">View All Programs</a>
                </div>
            </div> 
        </div>
    </div>
    <!-- Program End -->


    <!-- Events Start -->
    <div class="container-fluid events py-5 bg-light">
        <div class="container py-5">
            <div class="mx-auto text-center" data-aos="fade-up" data-aos-duration="1000" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">{{ $pageSections['events']['title'] ?? 'Our Events' }}</h4>
                <h1 class="mb-5 display-3">{{ $pageSections['events']['heading'] ?? 'Our Upcoming Events' }}</h1>
            </div>
            <div class="row g-5 justify-content-center">
                @forelse($upcomingEvents as $index => $event)
                    <div class="col-md-6 col-lg-6 col-xl-4" data-aos="flip-left" data-aos-delay="{{ $index * 150 }}" data-aos-duration="1000">
                        <div class="events-item bg-primary rounded">
                            <div class="events-inner position-relative">
                                <div class="events-img overflow-hidden rounded-circle position-relative">
                                    <img src="{{ $event->image_url ?? asset('img/event-' . (($index % 3) + 1) . '.jpg') }}" class="img-fluid w-100 rounded-circle" alt="{{ $event->title }}" loading="lazy">
                                    <div class="event-overlay">
                                        <a href="{{ $event->image_url ?? asset('img/event-' . (($index % 3) + 1) . '.jpg') }}" data-lightbox="event-{{ $event->id }}"><i class="fas fa-search-plus text-white fa-2x"></i></a>
                                    </div>
                                </div>
                                <div class="px-4 py-2 bg-secondary text-white text-center events-rate">{{ $event->event_date->format('d M') }}</div>
                                <div class="d-flex justify-content-between px-4 py-2 bg-secondary">
                                    <small class="text-white"><i class="fas fa-calendar me-1 text-primary"></i> {{ $event->start_time ? \Carbon\Carbon::parse($event->start_time)->format('g:i A') : 'TBA' }}</small>
                                    <small class="text-white"><i class="fas fa-map-marker-alt me-1 text-primary"></i> {{ Str::limit($event->location, 15) ?? 'TBA' }}</small>
                                </div>
                            </div>
                            <div class="events-text p-4 border border-primary bg-white border-top-0 rounded-bottom">
                                <a href="{{ route('events.show', $event->id) }}" class="h4 d-block mb-3">{{ $event->title }}</a>
                                <p class="mb-3">{{ Str::limit($event->description, 80) }}</p>
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary btn-sm px-4 py-2">
                                    Read More <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No upcoming events at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Events End-->


    <!-- Blog Start-->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="mx-auto text-center" data-aos="fade-up" data-aos-duration="1000" style="max-width: 600px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">{{ $pageSections['blog']['title'] ?? 'Latest News & Blog' }}</h4>
                <h1 class="mb-5 display-3">{{ $pageSections['blog']['heading'] ?? 'Read Our Latest News & Blog' }}</h1>
            </div>
            <div class="row g-5 justify-content-center">
                @forelse($recentBlogs as $index => $blog)
                    <div class="col-md-6 col-lg-6 col-xl-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-aos-duration="1000">
                        <div class="blog-item rounded-bottom">
                            <div class="blog-img overflow-hidden position-relative img-border-radius">
                                <img src="{{ $blog->featured_image_url }}" class="img-fluid w-100" alt="{{ $blog->title }}" style="height: 250px; object-fit: cover;" loading="lazy">
                            </div>
                            <div class="d-flex justify-content-between px-4 py-3 bg-light border-bottom border-primary blog-date-comments">
                                <small class="text-dark"><i class="fas fa-calendar me-1 text-dark"></i> {{ $blog->published_at ? $blog->published_at->format('d M Y') : $blog->created_at->format('d M Y') }}</small>
                                <small class="text-dark"><i class="fas fa-comment-alt me-1 text-dark"></i> Comments ({{ $blog->comments_count ?? 0 }})</small>
                            </div>
                            <div class="blog-content d-flex align-items-center px-4 py-3 bg-light">
                                <div class="overflow-hidden rounded-circle rounded-top border border-primary">
                                    <img src="{{ $blog->author_image_url }}" class="img-fluid rounded-circle p-2 rounded-top" alt="{{ $blog->author_display_name }}" style="width: 70px; height: 70px; border-style: dotted; border-color: var(--bs-primary) !important;" loading="lazy">
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-primary">{{ $blog->author_display_name }}</h6>
                                    <p class="text-muted mb-0">{{ $blog->category ?? 'Blog Post' }}</p>
                                </div>
                            </div>
                            <div class="px-4 pb-4 bg-light rounded-bottom">
                                <div class="blog-text-inner">
                                    <a href="{{ route('blog.show', $blog->slug) }}" class="h4">{{ $blog->title }}</a>
                                    <p class="mt-3 mb-4">{{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 100) }}</p>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('blog.show', $blog->slug) }}" class="btn btn-primary text-white px-4 py-2 mb-3 btn-border-radius">Read More <i class="fas fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No blog posts available at the moment.</p>
                    </div>
                @endforelse
            </div>
            
            @if($recentBlogs->count() > 0)
                <div class="text-center mt-5 wow fadeIn" data-wow-delay="0.5s">
                    <a href="{{ route('blog.index') }}" class="btn btn-primary btn-lg px-5 py-3 btn-border-radius">
                        View More Blogs <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            @endif
        </div>
    </div>
    <!-- Blog End-->


    <!-- Team Start-->
    <div class="container-fluid team py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Our Team</h4>
                <h1 class="mb-5 display-3">Meet With Our Expert Teacher</h1>
            </div>
            <div class="row g-5 justify-content-center">
                @forelse($teamMembers as $index => $member)
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="{{ 0.1 + ($index * 0.2) }}s">
                        <div class="team-item border border-primary img-border-radius overflow-hidden">
                            <div class="team-img">
                                <img src="{{ $member->image_url }}" alt="{{ $member->name }}">
                            </div>
                            <div class="team-icon d-flex align-items-center justify-content-center">
                                <a class="share btn btn-primary btn-md-square text-white rounded-circle me-3" href=""><i class="fas fa-share-alt"></i></a>
                                @if($member->facebook_url)
                                    <a class="share-link btn btn-primary btn-md-square text-white rounded-circle me-3" href="{{ $member->facebook_url }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                @endif
                                @if($member->twitter_url)
                                    <a class="share-link btn btn-primary btn-md-square text-white rounded-circle me-3" href="{{ $member->twitter_url }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if($member->instagram_url)
                                    <a class="share-link btn btn-primary btn-md-square text-white rounded-circle" href="{{ $member->instagram_url }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                @endif
                                @if($member->linkedin_url)
                                    <a class="share-link btn btn-primary btn-md-square text-white rounded-circle ms-3" href="{{ $member->linkedin_url }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                @endif
                            </div>
                            <div class="team-content text-center py-3">
                                <h4 class="text-primary">{{ $member->name }}</h4>
                                <p class="text-muted mb-2">{{ $member->position }}</p>
                                @if($member->bio)
                                    <p class="text-muted small px-3">{{ Str::limit($member->bio, 80) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                        <div class="team-item border border-primary img-border-radius overflow-hidden">
                            <div class="team-img">
                                <img src="img/team-1.jpg" alt="Team Member">
                            </div>
                            <div class="team-icon d-flex align-items-center justify-content-center">
                                <a class="share btn btn-primary btn-md-square text-white rounded-circle me-3" href=""><i class="fas fa-share-alt"></i></a>
                            </div>
                            <div class="team-content text-center py-3">
                                <h4 class="text-primary">Our Team</h4>
                                <p class="text-muted mb-2">Coming Soon</p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Team End-->


    <!-- Testimonial Start -->
    <div class="container-fluid testimonial py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">{{ $pageSections['testimonials']['title'] ?? 'Our Testimonials' }}</h4>
                <h1 class="mb-5 display-3">{{ $pageSections['testimonials']['heading'] ?? 'Parents Say About Us' }}</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.3s">
                @forelse($testimonials as $testimonial)
                    <div class="testimonial-item img-border-radius bg-light border border-primary p-4">
                        <div class="p-4 position-relative">
                            <i class="fa fa-quote-right fa-2x text-primary position-absolute" style="top: 15px; right: 15px;"></i>
                            <div class="d-flex align-items-center">
                                <div class="border border-primary bg-white rounded-circle">
                                    <img src="{{ $testimonial->image_url ? asset('storage/' . $testimonial->image_url) : asset('img/testimonial-2.jpg') }}" class="rounded-circle p-2" style="width: 80px; height: 80px; border-style: dotted; border-color: var(--bs-primary);" alt="{{ $testimonial->parent_name }}">
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
        </div>
    </div>
@endsection
