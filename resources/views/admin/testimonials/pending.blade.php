@extends('admin.layouts.app')

@section('title', 'Pending Testimonials')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Pending Testimonials</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.testimonials.index') }}">Testimonials</a></li>
                <li class="breadcrumb-item active">Pending</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Pending Approval</h5>
            <div class="btn-group btn-group-sm">
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-list me-1"></i>All
                </a>
                <a href="{{ route('admin.testimonials.pending') }}" class="btn btn-outline-warning active">
                    <i class="fas fa-clock me-1"></i>Pending
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @forelse($testimonials as $testimonial)
            <div class="card mb-3 border">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-2 text-center">
                            @if($testimonial->client_image)
                                <img src="{{ $testimonial->image_url }}" 
                                     alt="{{ $testimonial->client_name }}" 
                                     class="rounded-circle" 
                                     style="width: 80px; height: 80px; object-fit: cover;">
                            @else
                                <div class="bg-secondary text-white rounded-circle d-inline-flex align-items-center justify-content-center" 
                                     style="width: 80px; height: 80px;">
                                    <i class="fas fa-user fa-2x"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-7">
                            <h5 class="mb-1">{{ $testimonial->client_name }}</h5>
                            @if($testimonial->client_position)
                                <p class="text-muted small mb-2">{{ $testimonial->client_position }}</p>
                            @endif
                            
                            <div class="mb-2">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $testimonial->rating)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star text-muted"></i>
                                    @endif
                                @endfor
                                <span class="ms-2 text-muted small">{{ $testimonial->rating }}/5</span>
                            </div>

                            <p class="mb-2">{{ $testimonial->message }}</p>

                            <div class="text-muted small">
                                @if($testimonial->email)
                                    <i class="fas fa-envelope me-1"></i>{{ $testimonial->email }}
                                @endif
                                @if($testimonial->phone)
                                    <span class="ms-3"><i class="fas fa-phone me-1"></i>{{ $testimonial->phone }}</span>
                                @endif
                                <span class="ms-3"><i class="fas fa-calendar me-1"></i>{{ $testimonial->created_at->format('M d, Y H:i') }}</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-grid gap-2">
                                <form action="{{ route('admin.testimonials.approve', $testimonial) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm w-100">
                                        <i class="fas fa-check me-2"></i>Approve
                                    </button>
                                </form>
                                
                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit me-2"></i>Edit
                                </a>

                                <form action="{{ route('admin.testimonials.reject', $testimonial) }}" 
                                      method="POST"
                                      onsubmit="return confirm('Are you sure you want to reject this testimonial?');">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm w-100">
                                        <i class="fas fa-times me-2"></i>Reject
                                    </button>
                                </form>

                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" 
                                      method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this testimonial? This action cannot be undone.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm w-100">
                                        <i class="fas fa-trash me-2"></i>Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-5">
                <i class="fas fa-check-circle fa-4x text-success mb-3"></i>
                <h4>All Caught Up!</h4>
                <p class="text-muted">No pending testimonials at the moment.</p>
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-primary">
                    <i class="fas fa-list me-2"></i>View All Testimonials
                </a>
            </div>
        @endforelse

        @if($testimonials->hasPages())
            <div class="mt-4">
                {{ $testimonials->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
