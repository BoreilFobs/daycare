{{-- 
  EXAMPLE: How to use dynamic page sections in welcome.blade.php
  This shows the hero and about sections updated to use database content
--}}

@extends('layouts.web')
@section('content')
    <!-- Hero Start -->
    <div class="container-fluid py-5 hero-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7 col-md-12">
                    {{-- Dynamic hero title from page_sections --}}
                    <h1 class="mb-3 text-primary">
                        {{ $pageSections['hero']['title'] ?? 'We Care Your Baby' }}
                    </h1>
                    
                    {{-- Dynamic hero subtitle --}}
                    <h1 class="mb-5 display-1 text-white">
                        {{ $pageSections['hero']['subtitle'] ?? 'The Best Play Area For Your Kids' }}
                    </h1>
                    
                    {{-- Dynamic button 1 --}}
                    <a href="{{ $pageSections['hero']['button_1_link'] ?? '/contact' }}" 
                       class="btn btn-primary px-4 py-3 px-md-5 me-4 btn-border-radius">
                        {{ $pageSections['hero']['button_1_text'] ?? 'Get Started' }}
                    </a>
                    
                    {{-- Dynamic button 2 --}}
                    <a href="{{ $pageSections['hero']['button_2_link'] ?? '/about' }}" 
                       class="btn btn-primary px-4 py-3 px-md-5 btn-border-radius">
                        {{ $pageSections['hero']['button_2_text'] ?? 'Learn More' }}
                    </a>
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
                        <button type="button" class="btn btn-play" data-bs-toggle="modal" 
                                data-src="{{ $pageSections['hero']['video_url'] ?? 'https://www.youtube.com/embed/DWRcNpR6Kdc' }}" 
                                data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                    {{-- Dynamic about section title --}}
                    <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                        {{ $pageSections['about']['title'] ?? 'About Us' }}
                    </h4>
                    
                    {{-- Dynamic about heading --}}
                    <h1 class="text-dark mb-4 display-5">
                        {{ $pageSections['about']['heading'] ?? 'We Learn Smart Way To Build Bright Future For Your Children' }}
                    </h1>
                    
                    {{-- Dynamic about description --}}
                    <p class="text-dark mb-4">
                        {{ $pageSections['about']['description'] ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry...' }}
                    </p>
                    
                    {{-- Dynamic features list --}}
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <h6 class="mb-3">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ $pageSections['about']['feature_1'] ?? 'Sport Activities' }}
                            </h6>
                            <h6 class="mb-3">
                                <i class="fas fa-check-circle me-2 text-primary"></i>
                                {{ $pageSections['about']['feature_2'] ?? 'Outdoor Games' }}
                            </h6>
                            <h6 class="mb-3">
                                <i class="fas fa-check-circle me-2 text-secondary"></i>
                                {{ $pageSections['about']['feature_3'] ?? 'Nutritious Foods' }}
                            </h6>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="mb-3">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ $pageSections['about']['feature_4'] ?? 'Highly Secured' }}
                            </h6>
                            <h6 class="mb-3">
                                <i class="fas fa-check-circle me-2 text-primary"></i>
                                {{ $pageSections['about']['feature_5'] ?? 'Friendly Environment' }}
                            </h6>
                            <h6>
                                <i class="fas fa-check-circle me-2 text-secondary"></i>
                                {{ $pageSections['about']['feature_6'] ?? 'Qualified Teacher' }}
                            </h6>
                        </div>
                    </div>
                    <a href="{{ route('about') }}" class="btn btn-primary px-5 py-3 btn-border-radius">More Details</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Programs Start (Using Dynamic Data from Database) -->
    <div class="container-fluid program py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                {{-- Dynamic programs section title --}}
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                    {{ $pageSections['programs']['title'] ?? 'Our Programs' }}
                </h4>
                
                {{-- Dynamic programs heading --}}
                <h1 class="mb-5 display-3">
                    {{ $pageSections['programs']['heading'] ?? 'Explore Our Programs' }}
                </h1>
            </div>
            
            {{-- Display Featured Programs from Database --}}
            <div class="row g-5 justify-content-center">
                @forelse($featuredPrograms as $program)
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="{{ 0.1 * $loop->iteration }}s">
                        <div class="program-item rounded">
                            <div class="program-img position-relative">
                                <div class="overflow-hidden img-border-radius">
                                    <img src="{{ $program->image_url }}" class="img-fluid w-100" alt="{{ $program->title }}">
                                </div>
                            </div>
                            <div class="program-text bg-white px-4 pb-3">
                                <div class="program-text-inner">
                                    <a href="{{ route('programs.show', $program->id) }}" class="h4">{{ $program->title }}</a>
                                    <p class="mt-3 mb-0">{{ Str::limit($program->description, 120) }}</p>
                                </div>
                            </div>
                            <div class="program-teacher d-flex align-items-center border-top border-primary bg-white px-4 py-3">
                                @if($program->teacher_image)
                                    <img src="{{ Storage::url($program->teacher_image) }}" class="img-fluid rounded-circle p-2 border border-primary bg-white" alt="Teacher" style="width: 70px; height: 70px;">
                                @endif
                                <div class="ms-3">
                                    <h6 class="mb-0 text-primary">{{ $program->teacher_name ?? 'Our Teacher' }}</h6>
                                    <small>{{ $program->age_group }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No programs available at the moment.</p>
                    </div>
                @endforelse
            </div>
            
            <div class="text-center mt-5">
                <a href="{{ route('programs') }}" class="btn btn-primary px-5 py-3 btn-border-radius">View All Programs</a>
            </div>
        </div>
    </div>
    <!-- Programs End -->

    {{-- Similar pattern for Events, Services, Testimonials, Gallery, Blog sections --}}
    {{-- Each would use:
        1. $pageSections['section_name']['key'] for text content
        2. $variableName (like $upcomingEvents, $services, etc.) for dynamic database content
    --}}

@endsection

{{--
  HOW TO EDIT CONTENT:
  
  1. Static Text (Hero, About, etc.):
     - Go to Admin Panel → Page Sections
     - Filter by "Home" page
     - Edit any section (hero, about, programs, etc.)
     - Changes appear immediately on the website
  
  2. Dynamic Content (Programs, Events, etc.):
     - Go to Admin Panel → Programs/Events/Blog/etc.
     - Create/Edit/Delete items
     - Changes reflect on homepage and detail pages
  
  3. The admin can control:
     ✓ All headings and titles
     ✓ All descriptions and paragraphs
     ✓ All button texts and links
     ✓ All feature items
     ✓ Video URLs
     ✓ Which programs/events/blog posts to feature
     ✓ Order of items displayed
--}}
