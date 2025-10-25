@extends('admin.layouts.app')

@section('title', 'Blog Posts')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Blog Posts</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Blog Posts</li>
            </ol>
        </nav>
    </div>
    <div class="page-actions">
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Create Post
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">All Blog Posts</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Filter Tabs -->
        <ul class="nav nav-pills mb-4" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="pill" href="#all-posts">
                    <i class="fas fa-list me-1"></i>All ({{ $posts->count() }})
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#published-posts">
                    <i class="fas fa-check-circle me-1"></i>Published ({{ $posts->where('is_published', true)->count() }})
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#draft-posts">
                    <i class="fas fa-file-alt me-1"></i>Drafts ({{ $posts->where('is_published', false)->count() }})
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="all-posts">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="blogTable">
                        <thead>
                            <tr>
                                <th width="45%">Post</th>
                                <th width="15%">Author</th>
                                <th width="10%">Category</th>
                                <th width="10%">Stats</th>
                                <th width="10%">Status</th>
                                <th width="10%" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $post)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            @if($post->image)
                                                <img src="{{ Storage::url($post->image) }}" 
                                                     alt="{{ $post->title }}" 
                                                     class="rounded" 
                                                     style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                                     style="width: 60px; height: 60px;">
                                                    <i class="fas fa-newspaper text-muted fa-2x"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <div class="fw-semibold">{{ $post->title }}</div>
                                                <small class="text-muted">
                                                    <i class="fas fa-calendar me-1"></i>
                                                    {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Draft' }}
                                                </small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center">
                                                {{ strtoupper(substr($post->author->name ?? 'A', 0, 1)) }}
                                            </div>
                                            <small>{{ $post->author->name ?? 'Unknown' }}</small>
                                        </div>
                                    </td>
                                    <td>
                                        @if($post->category)
                                            <span class="badge bg-light text-dark">{{ $post->category }}</span>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            <i class="fas fa-eye me-1"></i>{{ number_format($post->views ?? 0) }}<br>
                                            <i class="fas fa-comments me-1"></i>{{ number_format($post->comments_count ?? 0) }}
                                        </small>
                                    </td>
                                    <td>
                                        @if($post->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Draft</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            @if($post->is_published)
                                                <form action="{{ route('admin.blog.toggle-publish', $post) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-warning" title="Unpublish">
                                                        <i class="fas fa-eye-slash"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.blog.toggle-publish', $post) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-success" title="Publish">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            <a href="{{ route('admin.blog.edit', $post) }}" 
                                               class="btn btn-outline-primary"
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.blog.destroy', $post) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this post?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                                        <p class="text-muted mb-0">No blog posts found. Create your first post!</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="published-posts">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Post</th>
                                <th>Published</th>
                                <th>Views</th>
                                <th>Comments</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts->where('is_published', true) as $post)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            @if($post->image)
                                                <img src="{{ Storage::url($post->image) }}" 
                                                     alt="{{ $post->title }}" 
                                                     class="rounded" 
                                                     style="width: 50px; height: 50px; object-fit: cover;">
                                            @endif
                                            <div class="fw-semibold">{{ $post->title }}</div>
                                        </div>
                                    </td>
                                    <td>{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Not published' }}</td>
                                    <td><i class="fas fa-eye me-1"></i>{{ number_format($post->views ?? 0) }}</td>
                                    <td><i class="fas fa-comments me-1"></i>{{ number_format($post->comments_count ?? 0) }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.blog.edit', $post) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <p class="text-muted mb-0">No published posts</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="draft-posts">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Post</th>
                                <th>Created</th>
                                <th>Author</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts->where('is_published', false) as $post)
                                <tr>
                                    <td>
                                        <div class="fw-semibold">{{ $post->title }}</div>
                                    </td>
                                    <td>{{ $post->created_at->format('M d, Y') }}</td>
                                    <td>{{ $post->author->name ?? 'Unknown' }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.blog.edit', $post) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i> Edit & Publish
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5">
                                        <p class="text-muted mb-0">No draft posts</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


