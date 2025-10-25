@extends('layouts.web')

@section('title', $post->title . ' - Blog')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 display-md-2 text-white mb-4">{{ $post->title }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blog.index') }}" class="text-white">Blog</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">{{ Str::limit($post->title, 50) }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Blog Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <div class="row g-5">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Featured Image -->
                    <div class="mb-4 wow fadeIn" data-wow-delay="0.1s">
                        <img src="{{ $post->featured_image_url }}" class="img-fluid w-100 rounded" alt="{{ $post->title }}" style="max-height: 500px; object-fit: cover;">
                    </div>

                    <!-- Post Meta -->
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 pb-4 border-bottom wow fadeIn" data-wow-delay="0.2s">
                        <div class="d-flex align-items-center mb-3 mb-md-0">
                            <img src="{{ $post->author_image_url }}" class="rounded-circle me-3" alt="{{ $post->author_display_name }}" style="width: 60px; height: 60px; object-fit: cover;">
                            <div>
                                <h6 class="mb-0 text-primary">{{ $post->author_display_name }}</h6>
                                @if($post->author_title)
                                    <small class="text-muted">{{ $post->author_title }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 text-muted small">
                            <span><i class="fas fa-calendar me-1"></i> {{ $post->published_at->format('M d, Y') }}</span>
                            <span><i class="fas fa-clock me-1"></i> {{ $post->reading_time }} min read</span>
                            <span><i class="fas fa-eye me-1"></i> {{ number_format($post->views) }} views</span>
                            <span><i class="fas fa-comment me-1"></i> {{ $post->approvedComments->count() }} comments</span>
                        </div>
                    </div>

                    @if($post->category)
                        <div class="mb-4 wow fadeIn" data-wow-delay="0.3s">
                            <span class="badge bg-primary px-3 py-2">{{ $post->category }}</span>
                        </div>
                    @endif

                    @if($post->tags)
                        <div class="mb-4 wow fadeIn" data-wow-delay="0.3s">
                            @foreach($post->tags_array as $tag)
                                <span class="badge bg-light text-dark border me-2 mb-2 px-3 py-2">{{ $tag }}</span>
                            @endforeach
                        </div>
                    @endif

                    <!-- Post Content -->
                    <div class="blog-content mb-5 wow fadeIn" data-wow-delay="0.4s">
                        {!! $post->content !!}
                    </div>

                    <!-- Share Buttons -->
                    <div class="border-top border-bottom py-4 mb-5 wow fadeIn" data-wow-delay="0.5s">
                        <h5 class="mb-3">Share this post:</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="btn btn-primary btn-sm px-4">
                                <i class="fab fa-facebook-f me-2"></i>Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}" target="_blank" class="btn btn-info btn-sm px-4 text-white">
                                <i class="fab fa-twitter me-2"></i>Twitter
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($post->title) }}" target="_blank" class="btn btn-primary btn-sm px-4">
                                <i class="fab fa-linkedin-in me-2"></i>LinkedIn
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . url()->current()) }}" target="_blank" class="btn btn-success btn-sm px-4">
                                <i class="fab fa-whatsapp me-2"></i>WhatsApp
                            </a>
                            <button onclick="copyLink()" class="btn btn-secondary btn-sm px-4">
                                <i class="fas fa-link me-2"></i>Copy Link
                            </button>
                        </div>
                    </div>

                    <!-- Comments Section -->
                    <div class="comments-section mb-5 wow fadeIn" data-wow-delay="0.6s">
                        <h4 class="mb-4 pb-3 border-bottom">
                            <i class="fas fa-comments me-2 text-primary"></i>
                            Comments ({{ $post->approvedComments->count() }})
                        </h4>

                        @forelse($post->approvedComments as $comment)
                            <div class="comment-item mb-4 p-4 bg-light rounded">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="fas fa-user fa-lg"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div>
                                                <h6 class="mb-0">{{ $comment->name }}</h6>
                                                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                        <p class="mb-0">{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-5 bg-light rounded">
                                <i class="fas fa-comment-slash fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No comments yet. Be the first to comment!</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Comment Form -->
                    <div class="comment-form wow fadeIn" data-wow-delay="0.7s">
                        <h4 class="mb-4 pb-3 border-bottom">
                            <i class="fas fa-pen me-2 text-primary"></i>
                            Leave a Comment
                        </h4>
                        <form action="{{ route('blog.comments.store', $post) }}" method="POST" class="bg-light p-4 rounded">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="author_name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('author_name') is-invalid @enderror" id="author_name" name="author_name" value="{{ old('author_name') }}" required>
                                    @error('author_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="author_email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('author_email') is-invalid @enderror" id="author_email" name="author_email" value="{{ old('author_email') }}" required>
                                    @error('author_email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-12">
                                    <label for="content" class="form-label">Comment <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
                                    @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-5 py-3">
                                        <i class="fas fa-paper-plane me-2"></i>Post Comment
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Related Posts -->
                    @if($relatedPosts->count() > 0)
                        <div class="related-posts mt-5 pt-5 border-top wow fadeIn" data-wow-delay="0.8s">
                            <h4 class="mb-4">Related Posts</h4>
                            <div class="row g-4">
                                @foreach($relatedPosts as $relatedPost)
                                    <div class="col-md-4">
                                        <div class="card h-100 border-0 shadow-sm">
                                            <img src="{{ $relatedPost->featured_image_url }}" class="card-img-top" alt="{{ $relatedPost->title }}" style="height: 180px; object-fit: cover;">
                                            <div class="card-body">
                                                <h6 class="card-title">
                                                    <a href="{{ route('blog.show', $relatedPost->slug) }}" class="text-dark text-decoration-none">
                                                        {{ Str::limit($relatedPost->title, 60) }}
                                                    </a>
                                                </h6>
                                                <p class="card-text small text-muted">{{ Str::limit($relatedPost->excerpt ?? strip_tags($relatedPost->content), 80) }}</p>
                                                <a href="{{ route('blog.show', $relatedPost->slug) }}" class="btn btn-primary btn-sm">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Recent Posts -->
                    <div class="mb-5 wow fadeIn" data-wow-delay="0.2s">
                        <h5 class="mb-4 pb-3 border-bottom">Recent Posts</h5>
                        @foreach($recentPosts as $recentPost)
                            <div class="d-flex mb-4">
                                <img src="{{ $recentPost->featured_image_url }}" class="rounded me-3" alt="{{ $recentPost->title }}" style="width: 80px; height: 80px; object-fit: cover;">
                                <div>
                                    <h6 class="mb-2">
                                        <a href="{{ route('blog.show', $recentPost->slug) }}" class="text-dark text-decoration-none">
                                            {{ Str::limit($recentPost->title, 50) }}
                                        </a>
                                    </h6>
                                    <small class="text-muted">
                                        <i class="fas fa-calendar me-1"></i>
                                        {{ $recentPost->published_at->format('M d, Y') }}
                                    </small>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Back to Blog Button -->
                    <div class="wow fadeIn" data-wow-delay="0.4s">
                        <a href="{{ route('blog.index') }}" class="btn btn-primary w-100 py-3">
                            <i class="fas fa-arrow-left me-2"></i>Back to All Posts
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Detail End -->
@endsection

@push('scripts')
<script>
    function copyLink() {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            alert('Link copied to clipboard!');
        });
    }
</script>
@endpush
