@extends('admin.layouts.app')

@section('title', 'Add Testimonial')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Add New Testimonial</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.testimonials.index') }}">Testimonials</a></li>
                <li class="breadcrumb-item active">Add New</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Client Information</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="client_name" class="form-label">Client Name <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('client_name') is-invalid @enderror" 
                                   id="client_name" 
                                   name="client_name" 
                                   value="{{ old('client_name') }}" 
                                   required>
                            @error('client_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="client_position" class="form-label">Position/Role</label>
                            <input type="text" 
                                   class="form-control @error('client_position') is-invalid @enderror" 
                                   id="client_position" 
                                   name="client_position" 
                                   value="{{ old('client_position') }}" 
                                   placeholder="e.g., Parent of Emma, Age 4">
                            @error('client_position')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" 
                                   class="form-control @error('phone') is-invalid @enderror" 
                                   id="phone" 
                                   name="phone" 
                                   value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="client_image" class="form-label">Client Photo</label>
                            <input type="file" 
                                   class="form-control @error('client_image') is-invalid @enderror" 
                                   id="client_image" 
                                   name="client_image" 
                                   accept="image/jpeg,image/png,image/jpg">
                            <small class="text-muted">Recommended size: 400x400px (JPEG, PNG, JPG, max 2MB)</small>
                            @error('client_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div id="imagePreview" class="mt-3" style="display: none;">
                                <img src="" alt="Preview" class="img-thumbnail" style="max-width: 200px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Testimonial Content</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating <span class="text-danger">*</span></label>
                        <select class="form-select @error('rating') is-invalid @enderror" 
                                id="rating" 
                                name="rating" 
                                required>
                            <option value="">Select Rating</option>
                            @for($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                                    {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                                    @for($j = 0; $j < $i; $j++) ⭐ @endfor
                                </option>
                            @endfor
                        </select>
                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Testimonial Message <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('message') is-invalid @enderror" 
                                  id="message" 
                                  name="message" 
                                  rows="6" 
                                  required>{{ old('message') }}</textarea>
                        <small class="text-muted">Share the client's experience and feedback</small>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Display Settings</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="order" class="form-label">Display Order</label>
                            <input type="number" 
                                   class="form-control @error('order') is-invalid @enderror" 
                                   id="order" 
                                   name="order" 
                                   value="{{ old('order', 0) }}" 
                                   min="0">
                            <small class="text-muted">Lower numbers appear first (0 = automatic)</small>
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="is_active" 
                                       name="is_active" 
                                       {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    <strong>Active</strong>
                                    <small class="d-block text-muted">Display this testimonial on the website</small>
                                </label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="is_featured" 
                                       name="is_featured" 
                                       {{ old('is_featured') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">
                                    <strong>Featured</strong>
                                    <small class="d-block text-muted">Show on homepage and featured sections</small>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Create Testimonial
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-info-circle me-2"></i>Guidelines</h5>
            </div>
            <div class="card-body">
                <h6>Best Practices:</h6>
                <ul class="small">
                    <li>Include the client's full name and relationship to the center</li>
                    <li>Keep testimonials authentic and specific</li>
                    <li>Photos should be clear and professional</li>
                    <li>Ratings should reflect the actual experience</li>
                    <li>Featured testimonials appear on the homepage</li>
                </ul>

                <hr>

                <h6>Image Requirements:</h6>
                <ul class="small mb-0">
                    <li><strong>Size:</strong> 400x400px (square)</li>
                    <li><strong>Format:</strong> JPEG, PNG, or JPG</li>
                    <li><strong>Max Size:</strong> 2MB</li>
                    <li><strong>Style:</strong> Professional headshot or portrait</li>
                </ul>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-star me-2"></i>Rating Guide</h5>
            </div>
            <div class="card-body">
                <ul class="small mb-0">
                    <li><strong>5 Stars:</strong> Exceptional experience</li>
                    <li><strong>4 Stars:</strong> Very satisfied</li>
                    <li><strong>3 Stars:</strong> Satisfied</li>
                    <li><strong>2 Stars:</strong> Below expectations</li>
                    <li><strong>1 Star:</strong> Poor experience</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Image preview
    document.getElementById('client_image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('imagePreview');
                preview.querySelector('img').src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });

    // Character counter for message
    const messageField = document.getElementById('message');
    if (messageField) {
        const counter = document.createElement('small');
        counter.className = 'text-muted float-end';
        messageField.parentNode.insertBefore(counter, messageField.nextSibling);
        
        function updateCounter() {
            const length = messageField.value.length;
            counter.textContent = `${length} characters`;
        }
        
        messageField.addEventListener('input', updateCounter);
        updateCounter();
    }
</script>
@endpush
