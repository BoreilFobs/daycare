@extends('layouts.web')
@section('content')
     <!-- Page Header Start -->
    <div class="container-fluid page-header py-5" data-aos="fade-down" data-aos-duration="1000">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">Our Blog</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Community</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">Our Blog</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Blog Start-->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="mx-auto text-center" data-aos="fade-up" data-aos-duration="1000" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Latest News & Blog</h4>
                <h1 class="mb-4 display-3">Read Our Latest News & Blog</h1>
                <p class="text-muted mb-5">At ABC Children Centre, we believe that learning begins long before school — it begins at home, in play, and in every caring gesture. Our blog is a space for sharing joy, knowledge, and connections among parents, educators, and community partners who believe in giving little children a strong start in life.</p>
            </div>
            
            {{-- About Our Blog Section --}}
            <div class="row justify-content-center mb-5" data-aos="zoom-in" data-aos-delay="200">
                <div class="col-lg-10">
                    <div class="bg-light border border-primary rounded p-4 p-md-5">
                        <h3 class="text-primary mb-4">Welcome to the ABC Children Centre Blog</h3>
                        <p class="mb-4">Through this blog, we'll share updates from our classrooms, stories of discovery and growth, simple tips you can use at home and in school to manage various types of behaviors in children, and lots more. Whether it's a child's first drawing, a fun learning activity, or a community event, we'll celebrate the little moments that make childhood magical.</p>
                        <p class="mb-4">We'll also bring you expert advice on early childhood development — how to build routines, support healthy eating, and encourage curiosity through play. Each post will help strengthen the bridge between home and school, so that every child thrives in both worlds.</p>
                        <p class="mb-0"><strong class="text-primary">As you read, comment, and share, you become part of the ABC story</strong> — a story of togetherness, hope, and love. Let's walk this journey hand in hand and give every little one a strong start in life. <strong>Welcome to the Family of Strong Beginnings!</strong></p>
                    </div>
                </div>
            </div>
            
            {{-- Search and Filter Form --}}
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8">
                    <form action="{{ route('blog.index') }}" method="GET" class="row g-3">
                        <div class="col-md-5">
                            <input type="text" name="search" class="form-control" placeholder="Search posts..." value="{{ request('search') }}">
                        </div>
                        <div class="col-md-4">
                            <select name="category" class="form-select">
                                <option value="">All Categories</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary w-100">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="row g-5 justify-content-center">
                @forelse($blogPosts as $index => $blog)
                    <div class="col-md-6 col-lg-6 col-xl-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-aos-duration="1000">
                        <div class="blog-item rounded-bottom h-100 d-flex flex-column">
                            <div class="blog-img overflow-hidden position-relative img-border-radius">
                                <img src="{{ $blog->featured_image ?? asset("img/default-blog.webp") }}" class="img-fluid w-100" alt="{{ $blog->title }}" loading="lazy" style="height: 250px; object-fit: cover;" loading="lazy">
                            </div>
                            <div class="d-flex justify-content-between px-4 py-3 bg-light border-bottom border-primary blog-date-comments">
                                <small class="text-dark"><i class="fas fa-calendar me-1 text-dark"></i> {{ $blog->published_at ? $blog->published_at->format('d M Y') : $blog->created_at->format('d M Y') }}</small>
                                <small class="text-dark"><i class="fas fa-comment-alt me-1 text-dark"></i> {{ $blog->comments_count ?? 0 }} Comments</small>
                            </div>
                            <div class="blog-content d-flex align-items-center px-4 py-3 bg-light">
                                <div class="overflow-hidden rounded-circle rounded-top border border-primary">
                                    <img src="{{ $blog->author_image ?? asset("img/admin-profile.avif") }}" class="img-fluid rounded-circle p-2 rounded-top" alt="{{ $blog->author_display_name }}" loading="lazy" style="width: 70px; height: 70px; border-style: dotted; border-color: var(--bs-primary) !important;" loading="lazy">
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-primary mb-0">{{ $blog->author_display_name }}</h6>
                                    <p class="text-muted mb-0 small">{{ $blog->category ?? 'Blog Post' }}</p>
                                </div>
                            </div>
                            <div class="px-4 pb-4 bg-light rounded-bottom flex-grow-1 d-flex flex-column">
                                <div class="blog-text-inner flex-grow-1">
                                    <a href="{{ route('blog.show', $blog->slug) }}" class="h4 d-block mb-3">{{ $blog->title }}</a>
                                    <p class="mb-3">{{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 120) }}</p>
                                    <div class="d-flex gap-3 text-muted small mb-3">
                                        <span><i class="fas fa-eye me-1"></i> {{ number_format($blog->views ?? 0) }} Views</span>
                                        <span><i class="fas fa-clock me-1"></i> {{ $blog->reading_time }} min read</span>
                                    </div>
                                </div>
                                <div class="text-center mt-auto">
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
                
                {{-- Pagination --}}
                @if($blogPosts->hasPages())
                    <div class="col-12 aos-fade" data-aos-delay="0.1s">
                        <div class="d-flex justify-content-center">
                            {{ $blogPosts->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Blog End-->

@endsection