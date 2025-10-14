@extends('admin.layouts.app')

@section('title', 'Comments Management')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Comments</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Comments</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">All Comments</h5>
        <div class="btn-group btn-group-sm">
            <button type="button" class="btn btn-outline-success" id="bulkApprove">
                <i class="fas fa-check me-1"></i>Approve Selected
            </button>
            <button type="button" class="btn btn-outline-danger" id="bulkDelete">
                <i class="fas fa-trash me-1"></i>Delete Selected
            </button>
        </div>
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
                <a class="nav-link active" data-bs-toggle="pill" href="#all-comments">
                    <i class="fas fa-list me-1"></i>All ({{ $comments->count() }})
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#pending-comments">
                    <i class="fas fa-clock me-1"></i>Pending ({{ $comments->where('is_approved', false)->count() }})
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#approved-comments">
                    <i class="fas fa-check-circle me-1"></i>Approved ({{ $comments->where('is_approved', true)->count() }})
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#spam-comments">
                    <i class="fas fa-ban me-1"></i>Spam (0)
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="all-comments">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="commentsTable">
                        <thead>
                            <tr>
                                <th width="3%">
                                    <input type="checkbox" class="form-check-input" id="selectAll">
                                </th>
                                <th width="25%">Author</th>
                                <th width="40%">Comment</th>
                                <th width="17%">Post</th>
                                <th width="10%">Status</th>
                                <th width="5%" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($comments as $comment)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input comment-checkbox" value="{{ $comment->id }}">
                                    </td>
                                    <td>
                                        <div>
                                            <div class="fw-semibold">{{ $comment->author_name }}</div>
                                            <small class="text-muted">{{ $comment->author_email }}</small><br>
                                            <small class="text-muted">
                                                <i class="fas fa-calendar me-1"></i>
                                                {{ $comment->created_at->diffForHumans() }}
                                            </small>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-1">{{ Str::limit($comment->content, 100) }}</p>
                                        @if($comment->parent_id)
                                            <small class="text-muted">
                                                <i class="fas fa-reply me-1"></i>Reply to another comment
                                            </small>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.blog.edit', $comment->blog_post_id) }}" class="text-decoration-none">
                                            {{ Str::limit($comment->blog_post->title ?? 'Unknown', 30) }}
                                        </a>
                                    </td>
                                    <td>
                                        @if($comment->is_approved)
                                            <span class="badge bg-success">Approved</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                @if(!$comment->is_approved)
                                                    <li>
                                                        <form action="{{ route('admin.comments.approve', $comment) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="dropdown-item text-success">
                                                                <i class="fas fa-check me-2"></i>Approve
                                                            </button>
                                                        </form>
                                                    </li>
                                                @endif
                                                <li>
                                                    <form action="{{ route('admin.comments.spam', $comment) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item text-warning">
                                                            <i class="fas fa-ban me-2"></i>Mark as Spam
                                                        </button>
                                                    </form>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <form action="{{ route('admin.comments.destroy', $comment) }}" 
                                                          method="POST"
                                                          onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger">
                                                            <i class="fas fa-trash me-2"></i>Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                                        <p class="text-muted mb-0">No comments yet</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="pending-comments">
                <div class="list-group">
                    @forelse($comments->where('is_approved', false) as $comment)
                        <div class="list-group-item">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1">{{ $comment->author_name }}</h6>
                                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-2">{{ $comment->content }}</p>
                                    <small class="text-muted">
                                        On: <a href="{{ route('admin.blog.edit', $comment->blog_post_id) }}">{{ $comment->blog_post->title ?? 'Unknown' }}</a>
                                    </small>
                                </div>
                                <div class="ms-3">
                                    <form action="{{ route('admin.comments.approve', $comment) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">
                            <p class="text-muted mb-0">No pending comments</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="tab-pane fade" id="approved-comments">
                <div class="list-group">
                    @forelse($comments->where('is_approved', true) as $comment)
                        <div class="list-group-item">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1">{{ $comment->author_name }}</h6>
                                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-2">{{ $comment->content }}</p>
                                    <small class="text-muted">
                                        On: <a href="{{ route('admin.blog.edit', $comment->blog_post_id) }}">{{ $comment->blog_post->title ?? 'Unknown' }}</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">
                            <p class="text-muted mb-0">No approved comments</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="tab-pane fade" id="spam-comments">
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Comments marked as spam are hidden from public view
                </div>
                <div class="list-group">
                    <div class="text-center py-5">
                        <p class="text-muted mb-0">No spam comments</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Select All
        $('#selectAll').on('change', function() {
            $('.comment-checkbox').prop('checked', $(this).prop('checked'));
        });

        // Bulk Approve
        $('#bulkApprove').on('click', function() {
            const selected = $('.comment-checkbox:checked').map(function() {
                return $(this).val();
            }).get();

            if (selected.length === 0) {
                alert('Please select comments to approve');
                return;
            }

            if (confirm(`Approve ${selected.length} comment(s)?`)) {
                $.ajax({
                    url: '{{ route("admin.comments.bulk-approve") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        ids: selected
                    },
                    success: function() {
                        location.reload();
                    }
                });
            }
        });

        // Bulk Delete
        $('#bulkDelete').on('click', function() {
            const selected = $('.comment-checkbox:checked').map(function() {
                return $(this).val();
            }).get();

            if (selected.length === 0) {
                alert('Please select comments to delete');
                return;
            }

            if (confirm(`Delete ${selected.length} comment(s)? This action cannot be undone.`)) {
                $.ajax({
                    url: '{{ route("admin.comments.bulk-delete") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        ids: selected
                    },
                    success: function() {
                        location.reload();
                    }
                });
            }
        });
    });
</script>
@endpush
