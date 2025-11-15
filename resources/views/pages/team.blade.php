@extends('layouts.web')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 data-aos="fade-down" data-aos-duration="1000">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">{{ $pageSections['header']['title'] ?? 'Our Team' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Community</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">{{ $pageSections['header']['title'] ?? 'Our Team' }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Team Start-->
    <div class="container-fluid team py-5">
        <div class="container py-5">
            <div class="mx-auto text-center data-aos="fade-down" data-aos-duration="1000" style="max-width: 600px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">{{ $pageSections['content']['title'] ?? 'Our Team' }}</h4>
                <h1 class="mb-5 display-3">{{ $pageSections['content']['heading'] ?? 'Meet With Our Expert Teacher' }}</h1>
            </div>
            <div class="row g-5 justify-content-center">
                @forelse($teamMembers as $index => $member)
                    <div class="col-md-6 col-lg-4 col-xl-3 aos-fade" data-aos-delay="{{ 0.1 + ($index * 0.2) }}s">
                        <div class="team-item border border-primary img-border-radius overflow-hidden">
                            <div class="team-img">
                                <img src="{{ $member->image_url }}" alt="{{ $member->name }}" loading="lazy">
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
                                    <p class="text-muted small px-3">{{ Str::limit($member->bio, 100) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No team members available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Team End-->
@endsection