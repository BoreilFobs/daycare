@extends('admin.layouts.app')

@section('title', 'View Program')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">{{ $program->title }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.programs.index') }}">Programs</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
        </nav>
    </div>
    <div class="page-actions">
        <a href="{{ route('admin.programs.edit', $program) }}" class="btn btn-primary">
            <i class="fas fa-edit me-2"></i>Edit Program
        </a>
        <a href="{{ route('admin.programs.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
    </div>
</div>

<div class="row">
    <!-- Main Content -->
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Program Details</h5>
            </div>
            <div class="card-body">
                @if($program->image)
                    <div class="mb-4">
                        <img src="{{ Storage::url($program->image) }}" 
                             alt="{{ $program->title }}" 
                             class="img-fluid rounded" 
                             style="max-height: 300px; width: 100%; object-fit: cover;">
                    </div>
                @endif

                <h4 class="mb-3">{{ $program->title }}</h4>
                
                <div class="mb-4">
                    <h6 class="text-muted mb-2">Short Description</h6>
                    <p>{{ $program->description }}</p>
                </div>

                @if($program->full_description)
                    <div class="mb-4">
                        <h6 class="text-muted mb-2">Full Description</h6>
                        <div class="border rounded p-3 bg-light">
                            {!! nl2br(e($program->full_description)) !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Teacher Information -->
        @if($program->teacher_name)
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Teacher Information</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3">
                        @if($program->teacher_image)
                            <img src="{{ Storage::url($program->teacher_image) }}" 
                                 alt="{{ $program->teacher_name }}" 
                                 class="rounded-circle" 
                                 style="width: 80px; height: 80px; object-fit: cover;">
                        @else
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px;">
                                <i class="fas fa-user text-white fa-2x"></i>
                            </div>
                        @endif
                        <div>
                            <h5 class="mb-1">{{ $program->teacher_name }}</h5>
                            @if($program->teacher_title)
                                <span class="text-muted">{{ $program->teacher_title }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
        <!-- Status Card -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Status</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <span class="text-muted">Status:</span>
                    @if($program->is_active)
                        <span class="badge bg-success ms-2">Active</span>
                    @else
                        <span class="badge bg-secondary ms-2">Inactive</span>
                    @endif
                </div>
                <div class="mb-3">
                    <span class="text-muted">Featured:</span>
                    @if($program->is_featured)
                        <span class="badge bg-warning text-dark ms-2"><i class="fas fa-star"></i> Featured</span>
                    @else
                        <span class="badge bg-light text-dark ms-2">Not Featured</span>
                    @endif
                </div>
                <div class="mb-3">
                    <span class="text-muted">Created:</span>
                    <span class="ms-2">{{ $program->created_at->format('M d, Y') }}</span>
                </div>
                <div>
                    <span class="text-muted">Updated:</span>
                    <span class="ms-2">{{ $program->updated_at->format('M d, Y') }}</span>
                </div>
            </div>
        </div>

        <!-- Pricing Card -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Pricing & Capacity</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                    <span class="text-muted">Price</span>
                    <strong class="h5 mb-0">{{ $program->formatted_price }}</strong>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                    <span class="text-muted">Total Seats</span>
                    <span class="badge bg-primary">{{ $program->total_sits }} seats</span>
                </div>
                @if($program->total_lessons)
                    <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                        <span class="text-muted">Total Lessons</span>
                        <span>{{ $program->total_lessons }} lessons</span>
                    </div>
                @endif
                @if($program->total_hours)
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Total Hours</span>
                        <span>{{ $program->total_hours }} hours</span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Actions Card -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.programs.edit', $program) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Program
                    </a>
                    <form action="{{ route('admin.programs.toggle-featured', $program) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-warning w-100">
                            <i class="fas fa-star me-2"></i>
                            {{ $program->is_featured ? 'Remove from Featured' : 'Mark as Featured' }}
                        </button>
                    </form>
                    <form action="{{ route('admin.programs.destroy', $program) }}" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this program?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100">
                            <i class="fas fa-trash me-2"></i>Delete Program
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
