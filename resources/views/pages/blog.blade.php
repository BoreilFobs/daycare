@extends('layouts.web')
@section('title', __('site.nav.blog'))
@section('content')
    <!-- Breadcrumnd Banner Start -->
    <section class="breadcrumnd-banner cmn-bg overflow-hidden">
        <div class="container">
            <div class="breadcrumnd-wrapper">
                <div class="breadcrumnd-content">
                    <h1 class="black mb-lg-4 mb-md-3 mb-2">
                        {{ __('site.nav.blog') }}
                    </h1>
                    <ul class="bread-list d-flex align-items-center gap-lg-4 gap-md-3 gap-2">
                        <li>
                            <a href="{{ route('home') }}">
                                {{ __('site.nav.home') }}
                            </a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                            {{ __('site.nav.blog') }}
                        </li>
                    </ul>
                </div>
                <div class="breadcrumnd-thumb position-relative">
                    <img src="{{ asset('images/bread-thumb.png') }}" alt="img" class="mimg">
                    <img src="{{ asset('images/bread-child.png') }}" alt="img" class="bread-child">
                    <img src="{{ asset('images/bread-cat.png') }}" alt="img" class="bread-cat">
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section Start -->
    <section class="blog-section mt-60 overflow-hidden space-bottom">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="blog-left-wrap">
                        @forelse($posts ?? [] as $index => $post)
                        <div class="blog-single-items overflow-hidden mb-60 wow fadeInUp" data-wow-delay=".{{ 2 + $index }}s">
                            <div class="blog-thumbig w-100">
                                <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-100">
                            </div>
                            <div class="blog-content">
                                <h4 class="mb-40">
                                    <a href="{{ route('blog.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h4>
                                <p class="pra mb-3">{{ Str::limit($post->excerpt ?? strip_tags($post->content), 150) }}</p>
                                <a href="{{ route('blog.show', $post->slug) }}" class="theme-btn theme-btn-2 d-inline-flex align-items-center gap-2">
                                    Read More
                                </a>
                                <ul>
                                    <li>
                                        <i class="fa-solid fa-calendar-days"></i>
                                        {{ $post->published_at ? $post->published_at->format('F d, Y') : $post->created_at->format('F d, Y') }}
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-user"></i> By {{ $post->author_name ?? ($post->author->name ?? 'Admin') }}
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-comments"></i> Comments ({{ $post->comments_count ?? 0 }})
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center py-5">
                            <p class="pra">No blog posts available at the moment. Check back soon!</p>
                        </div>
                        @endforelse

                        @if(isset($posts) && $posts->hasPages())
                        <ul class="cus-pagination">
                            @if($posts->onFirstPage())
                            <li><span class="disabled"><i class="fa-solid fa-chevron-left"></i></span></li>
                            @else
                            <li><a href="{{ $posts->previousPageUrl() }}"><i class="fa-solid fa-chevron-left"></i></a></li>
                            @endif

                            @foreach($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                            <li><a href="{{ $url }}" class="{{ $posts->currentPage() == $page ? 'active' : '' }}">{{ $page }}</a></li>
                            @endforeach

                            @if($posts->hasMorePages())
                            <li><a href="{{ $posts->nextPageUrl() }}"><i class="fa-solid fa-chevron-right"></i></a></li>
                            @else
                            <li><span class="disabled"><i class="fa-solid fa-chevron-right"></i></span></li>
                            @endif
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-right-wrap">
                        <!-- Search Widget -->
                        <div class="blog-right-common blog-search wow fadeInUp" data-wow-delay=".3s">
                            <h4 class="black mb-20">Search</h4>
                            <form action="{{ route('blog') }}" method="GET" class="search-form">
                                <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
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
                                        <img src="{{ $recent->featured_image_url }}" alt="{{ $recent->title }}">
                                    </div>
                                    <div class="content">
                                        <span class="date"><i class="fa-solid fa-calendar-days"></i> {{ $recent->published_at ? $recent->published_at->format('M d, Y') : $recent->created_at->format('M d, Y') }}</span>
                                        <h6><a href="{{ route('blog.show', $recent->slug) }}">{{ Str::limit($recent->title, 40) }}</a></h6>
                                    </div>
                                </div>
                                @empty
                                <p class="pra">No recent posts available.</p>
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
