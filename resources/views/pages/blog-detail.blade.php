@extends('layouts.web')
@section('title', $post->title ?? 'Blog Detail')
@section('content')
    <!-- Breadcrumnd Banner Start -->
    <section class="breadcrumnd-banner cmn-bg overflow-hidden">
        <div class="container">
            <div class="breadcrumnd-wrapper">
                <div class="breadcrumnd-content">
                    <h1 class="black mb-lg-4 mb-md-3 mb-2">
                        Blog Details
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
                            <a href="{{ route('blog') }}">
                                Blog
                            </a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                            Details
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

    <!-- Blog Details Section Start -->
    <section class="blog-details-section mt-60 overflow-hidden space-bottom">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="blog-details-wrap">
                        <div class="blog-details-thumb mb-40">
                            <img src="{{ $post->featured_image_url ?? asset('img/ablog/blog-details-b1.png') }}" alt="{{ $post->title ?? '' }}" class="w-100 round10">
                        </div>
                        <div class="blog-details-meta mb-30 d-flex flex-wrap gap-3">
                            <span><i class="fa-solid fa-calendar-days me-2"></i>{{ isset($post) ? ($post->published_at ? $post->published_at->format('F d, Y') : $post->created_at->format('F d, Y')) : 'January 19, 2024' }}</span>
                            <span><i class="fa-regular fa-user me-2"></i>By {{ $post->author_display_name ?? 'Admin' }}</span>
                            <span><i class="fa-regular fa-comments me-2"></i>{{ $post->comments_count ?? 0 }} Comments</span>
                        </div>
                        <h3 class="blog-details-title black mb-30">
                            {{ $post->title ?? 'Education for a brighter future' }}
                        </h3>
                        <div class="blog-details-content mb-40">
                            {!! $post->content ?? '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ultricies aliquam volutpat ullamcorper laoreet neque, a lacinia curabitur lacinia mollis. Sed dis lorem ipsum dummy text education for kids.</p>' !!}
                        </div>

                        @php
                            $postTags = isset($post->tags) && $post->tags ? array_map('trim', explode(',', $post->tags)) : [];
                            $shareUrl = urlencode(request()->url());
                            $shareTitle = urlencode($post->title ?? 'Blog Post');
                        @endphp
                        <div class="blog-tags-share mb-40 d-flex justify-content-between flex-wrap gap-3 p-4 gra-border round10">
                            @if(count($postTags) > 0)
                            <div class="tags">
                                <strong class="black me-2"><i class="fa-solid fa-tags me-1"></i>Tags:</strong>
                                @foreach($postTags as $tag)
                                <a href="{{ route('blog', ['tag' => Str::slug($tag)]) }}" class="tag-link badge bg-light text-dark px-3 py-2 rounded-pill text-decoration-none">{{ $tag }}</a>
                                @endforeach
                            </div>
                            @endif
                            <div class="share d-flex align-items-center gap-2">
                                <strong class="black me-2"><i class="fa-solid fa-share-nodes me-1"></i>Share:</strong>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank" class="social-share d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px; background: #1877f2; color: white;" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}" target="_blank" class="social-share d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px; background: #000; color: white;" title="Share on X (Twitter)">
                                    <svg width="14" height="14" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.55735 5.16157L10.5183 0.65625H9.57971L6.14039 4.56816L3.39341 0.65625H0.225098L4.37906 6.57174L0.225098 11.2963H1.16378L4.79579 7.16516L7.6968 11.2963H10.8651L6.55712 5.16157H6.55735ZM5.2717 6.62386L4.85082 6.03481L1.502 1.34768H2.94375L5.64629 5.13034L6.06717 5.71939L9.58015 10.6363H8.13839L5.2717 6.62409V6.62386Z" fill="white"/>
                                    </svg>
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $shareUrl }}&title={{ $shareTitle }}" target="_blank" class="social-share d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px; background: #0077b5; color: white;" title="Share on LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://wa.me/?text={{ $shareTitle }}%20{{ $shareUrl }}" target="_blank" class="social-share d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px; background: #25d366; color: white;" title="Share on WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                <a href="https://pinterest.com/pin/create/button/?url={{ $shareUrl }}&description={{ $shareTitle }}" target="_blank" class="social-share d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px; background: #e60023; color: white;" title="Share on Pinterest"><i class="fab fa-pinterest-p"></i></a>
                                <a href="mailto:?subject={{ $shareTitle }}&body=Check out this article: {{ $shareUrl }}" class="social-share d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px; background: #6c757d; color: white;" title="Share via Email"><i class="fa-solid fa-envelope"></i></a>
                                <button onclick="navigator.clipboard.writeText('{{ request()->url() }}'); alert('Link copied to clipboard!');" class="social-share d-inline-flex align-items-center justify-content-center rounded-circle border-0" style="width: 40px; height: 40px; background: #495057; color: white; cursor: pointer;" title="Copy Link"><i class="fa-solid fa-link"></i></button>
                            </div>
                        </div>

                        <!-- Comments Section -->
                        <div class="comments-section mb-40">
                            <h4 class="black mb-30">Comments ({{ $comments->count() ?? 0 }})</h4>
                            @forelse($comments ?? [] as $comment)
                            <div class="comment-item mb-30 p-4 gra-border round10">
                                <div class="d-flex gap-3">
                                    <div class="comment-avatar">
                                        <img src="{{ $comment->avatar ?? asset('img/atestimonial/testimonial-small.png') }}" alt="{{ $comment->name }}" class="rounded-circle" width="60">
                                    </div>
                                    <div class="comment-content">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h5 class="black mb-0">{{ $comment->name }}</h5>
                                            <span class="pra small">{{ $comment->created_at->format('M d, Y') }}</span>
                                        </div>
                                        <p class="pra">{{ $comment->content }}</p>
                                        <a href="#comment-form" class="reply-btn">Reply</a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p class="pra">No comments yet. Be the first to comment!</p>
                            @endforelse
                        </div>

                        <!-- Comment Form -->
                        <div class="comment-form-wrap p-4 p-lg-5 gra-border round10" id="comment-form" style="background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%);">
                            <div class="section-title mb-4">
                                <h4 class="black mb-2"><i class="fa-solid fa-comment-dots me-2 p5-clr"></i>Leave a Comment</h4>
                                <p class="pra">Your email address will not be published. Required fields are marked *</p>
                            </div>
                            
                            @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <i class="fa-solid fa-check-circle me-2"></i>{{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            
                            @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                                <i class="fa-solid fa-exclamation-circle me-2"></i>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            
                            <form action="{{ isset($post) ? route('blog.comment', $post->id) : '#' }}" method="POST" class="row g-4">
                                @csrf
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="name" class="form-label fw-medium mb-2"><i class="fa-solid fa-user me-1 p5-clr"></i>Your Name *</label>
                                        <input type="text" id="name" name="name" class="form-control py-3 px-4 rounded-3" placeholder="Enter your full name" value="{{ old('name') }}" required style="border: 2px solid #e9ecef; transition: all 0.3s ease;">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="email" class="form-label fw-medium mb-2"><i class="fa-solid fa-envelope me-1 p5-clr"></i>Your Email *</label>
                                        <input type="email" id="email" name="email" class="form-control py-3 px-4 rounded-3" placeholder="Enter your email address" value="{{ old('email') }}" required style="border: 2px solid #e9ecef; transition: all 0.3s ease;">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group position-relative">
                                        <label for="website" class="form-label fw-medium mb-2"><i class="fa-solid fa-globe me-1 p5-clr"></i>Website (Optional)</label>
                                        <input type="url" id="website" name="website" class="form-control py-3 px-4 rounded-3" placeholder="https://yourwebsite.com" value="{{ old('website') }}" style="border: 2px solid #e9ecef; transition: all 0.3s ease;">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group position-relative">
                                        <label for="content" class="form-label fw-medium mb-2"><i class="fa-solid fa-message me-1 p5-clr"></i>Your Comment *</label>
                                        <textarea id="content" name="content" rows="6" class="form-control py-3 px-4 rounded-3" placeholder="Write your thoughts here..." required style="border: 2px solid #e9ecef; transition: all 0.3s ease; resize: vertical;">{{ old('content') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="save_info" name="save_info" style="width: 18px; height: 18px;">
                                        <label class="form-check-label pra ms-2" for="save_info">
                                            Save my name and email in this browser for the next time I comment.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="theme-btn round100 p2-bg py-3 px-5 d-inline-flex align-items-center gap-2">
                                        <i class="fa-solid fa-paper-plane"></i>
                                        <span class="white fw-medium">Post Comment</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-right-wrap">
                        <!-- Search Widget -->
                        <div class="blog-right-common blog-search wow fadeInUp" data-wow-delay=".3s">
                            <h4 class="black mb-20">Search</h4>
                            <form action="{{ route('blog') }}" method="GET" class="search-form">
                                <input type="text" name="search" placeholder="Search...">
                                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>

                        <!-- Categories Widget -->
                        <div class="blog-right-common blog-category wow fadeInUp" data-wow-delay=".4s">
                            <h4 class="black mb-20">Categories</h4>
                            <ul class="category-list">
                                @forelse($categories ?? [] as $category)
                                <li>
                                    <a href="{{ route('blog', ['category' => $category->slug]) }}">
                                        <span>{{ $category->name }}</span>
                                        <span class="count">({{ $category->posts_count ?? 0 }})</span>
                                    </a>
                                </li>
                                @empty
                                <li><a href="#"><span>Education</span><span class="count">(5)</span></a></li>
                                <li><a href="#"><span>Parenting</span><span class="count">(3)</span></a></li>
                                <li><a href="#"><span>Activities</span><span class="count">(7)</span></a></li>
                                @endforelse
                            </ul>
                        </div>

                        <!-- Recent Posts Widget -->
                        <div class="blog-right-common blog-recent wow fadeInUp" data-wow-delay=".5s">
                            <h4 class="black mb-20">Recent Posts</h4>
                            <div class="recent-posts">
                                @forelse($recentPosts ?? [] as $recent)
                                <div class="recent-post-item d-flex gap-3 mb-20">
                                    <div class="thumb">
                                        <img src="{{ $recent->featured_image_url ?? asset('img/ablog/blog-small1.png') }}" alt="{{ $recent->title }}">
                                    </div>
                                    <div class="content">
                                        <span class="date"><i class="fa-solid fa-calendar-days"></i> {{ $recent->created_at->format('M d, Y') }}</span>
                                        <h6><a href="{{ route('blog.show', $recent->slug ?? $recent->id) }}">{{ Str::limit($recent->title, 40) }}</a></h6>
                                    </div>
                                </div>
                                @empty
                                <div class="recent-post-item d-flex gap-3 mb-20">
                                    <div class="thumb">
                                        <img src="{{ asset('img/ablog/blog-small1.png') }}" alt="img">
                                    </div>
                                    <div class="content">
                                        <span class="date"><i class="fa-solid fa-calendar-days"></i> Jan 19, 2024</span>
                                        <h6><a href="#">Education for a brighter future</a></h6>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>

                        <!-- Tags Widget -->
                        <div class="blog-right-common blog-tags wow fadeInUp" data-wow-delay=".6s">
                            <h4 class="black mb-20">Tags</h4>
                            <div class="tag-list">
                                @forelse($tags ?? [] as $tag)
                                <a href="{{ route('blog', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a>
                                @empty
                                <a href="#">Education</a>
                                <a href="#">Kids</a>
                                <a href="#">Learning</a>
                                <a href="#">Daycare</a>
                                <a href="#">Preschool</a>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
