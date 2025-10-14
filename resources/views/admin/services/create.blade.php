@extends('admin.layouts.app')

@section('title', 'Create Service')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Services</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
<div class="page-header">
    <h1 class="page-title">Create New Service</h1>
    <p class="page-subtitle">Add a new service to your "What We Do" section</p>
</div>

<form action="{{ route('admin.services.store') }}" method="POST">
    @csrf
    
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Service Information</h5>
                </div>
                <div class="card-body">
                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold">
                            Title <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('title') is-invalid @enderror" 
                               id="title" 
                               name="title" 
                               value="{{ old('title') }}" 
                               placeholder="e.g. Child Care" 
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">A short, descriptive title for your service</small>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="form-label fw-semibold">
                            Description <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="4" 
                                  placeholder="Describe what this service offers..."
                                  required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Brief description of the service (will be displayed on the website)</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Icon Selection -->
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Icon</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="icon" class="form-label fw-semibold">
                            Icon Class <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('icon') is-invalid @enderror" 
                               id="icon" 
                               name="icon" 
                               value="{{ old('icon', 'fas fa-briefcase') }}" 
                               placeholder="fas fa-briefcase"
                               required>
                        @error('icon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted d-block mb-3">
                            Use <a href="https://fontawesome.com/icons" target="_blank">Font Awesome</a> icon classes
                        </small>
                    </div>

                    <!-- Icon Preview -->
                    <div class="text-center p-4" style="background: #F8FAFC; border-radius: 8px;">
                        <div id="iconPreview" style="width: 80px; height: 80px; background: linear-gradient(135deg, #4F46E5, #3B82F6); border-radius: 12px; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 10px;">
                            <i class="fas fa-briefcase text-white" style="font-size: 32px;"></i>
                        </div>
                        <div class="small text-muted">Icon Preview</div>
                    </div>

                    <!-- Popular Icons -->
                    <div class="mt-3">
                        <label class="form-label small fw-semibold">Quick Select:</label>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary icon-select" data-icon="fas fa-baby" title="Baby">
                                <i class="fas fa-baby"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary icon-select" data-icon="fas fa-heart" title="Heart">
                                <i class="fas fa-heart"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary icon-select" data-icon="fas fa-graduation-cap" title="Education">
                                <i class="fas fa-graduation-cap"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary icon-select" data-icon="fas fa-utensils" title="Food">
                                <i class="fas fa-utensils"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary icon-select" data-icon="fas fa-medkit" title="Health">
                                <i class="fas fa-medkit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary icon-select" data-icon="fas fa-book" title="Books">
                                <i class="fas fa-book"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary icon-select" data-icon="fas fa-music" title="Music">
                                <i class="fas fa-music"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary icon-select" data-icon="fas fa-palette" title="Art">
                                <i class="fas fa-palette"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary icon-select" data-icon="fas fa-bus" title="Transport">
                                <i class="fas fa-bus"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary icon-select" data-icon="fas fa-clock" title="Schedule">
                                <i class="fas fa-clock"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary icon-select" data-icon="fas fa-users" title="Community">
                                <i class="fas fa-users"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary icon-select" data-icon="fas fa-shield-alt" title="Safety">
                                <i class="fas fa-shield-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Display Order -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Display Settings</h5>
                </div>
                <div class="card-body">
                    <div class="mb-0">
                        <label for="order" class="form-label fw-semibold">Display Order</label>
                        <input type="number" 
                               class="form-control @error('order') is-invalid @enderror" 
                               id="order" 
                               name="order" 
                               value="{{ old('order', 0) }}" 
                               min="0">
                        @error('order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Lower numbers appear first. Leave as 0 for automatic ordering.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Actions -->
    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Create Service
                </button>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Icon preview update
    function updateIconPreview() {
        var iconClass = $('#icon').val();
        var iconHtml = '<i class="' + iconClass + ' text-white" style="font-size: 32px;"></i>';
        $('#iconPreview').html(iconHtml);
    }

    // Update preview on input change
    $('#icon').on('input', function() {
        updateIconPreview();
    });

    // Quick select icons
    $('.icon-select').on('click', function() {
        var icon = $(this).data('icon');
        $('#icon').val(icon);
        updateIconPreview();
        
        // Visual feedback
        $('.icon-select').removeClass('active');
        $(this).addClass('active');
    });

    // Initial preview
    updateIconPreview();
});
</script>
@endpush
