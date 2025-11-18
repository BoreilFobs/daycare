@extends('admin.layouts.app')

@section('title', 'Edit Testimonial')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Edit Testimonial</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.testimonials.index') }}">Testimonials</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
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
                                   value="{{ old('client_name', $testimonial->client_name) }}" 
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
                                   value="{{ old('client_position', $testimonial->client_position) }}" 
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
                                   value="{{ old('email', $testimonial->email) }}">
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
                                   value="{{ old('phone', $testimonial->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="client_image" class="form-label">Client Photo</label>
                            
                            @if($testimonial->client_image)
                                <div class="mb-3">
                                    <img src="{{ $testimonial->image_url }}" 
                                         alt="{{ $testimonial->client_name }}" 
                                         class="img-thumbnail" 
                                         style="max-width: 200px;">
                                    <p class="small text-muted mt-1">Current photo</p>
                                </div>
                            @endif

                            <input type="file" 
                                   class="form-control @error('client_image') is-invalid @enderror" 
                                   id="client_image" 
                                   name="client_image" 
                                   accept="image/jpeg,image/png,image/jpg">
                            <small class="text-muted">Leave empty to keep current photo. Recommended size: 400x400px (JPEG, PNG, JPG, max 2MB)</small>
                            @error('client_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div id="imagePreview" class="mt-3" style="display: none;">
                                <img src="" alt="Preview" class="img-thumbnail" style="max-width: 200px;">
                                <p class="small text-muted mt-1">New photo preview</p>
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
                                <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>
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
                                  required>{{ old('message', $testimonial->message) }}</textarea>
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
                                   value="{{ old('order', $testimonial->order ?? 0) }}" 
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
                                       {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}>
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
                                       {{ old('is_featured', $testimonial->is_featured) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">
                                    <strong>Featured</strong>
                                    <small class="d-block text-muted">Show on homepage and featured sections</small>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Metadata</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <p class="form-control-plaintext">
                                @if($testimonial->status == 'approved')
                                    <span class="badge bg-success">Approved</span>
                                @elseif($testimonial->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @else
                                    <span class="badge bg-danger">Rejected</span>
                                @endif
                            </p>
                        </div>

                        @if($testimonial->approved_at)
                            <div class="col-md-6">
                                <label class="form-label">Approved At</label>
                                <p class="form-control-plaintext">{{ $testimonial->approved_at->format('M d, Y H:i') }}</p>
                            </div>
                        @endif

                        @if($testimonial->approvedBy)
                            <div class="col-md-6">
                                <label class="form-label">Approved By</label>
                                <p class="form-control-plaintext">{{ $testimonial->approvedBy->name }}</p>
                            </div>
                        @endif

                        <div class="col-md-6">
                            <label class="form-label">Created</label>
                            <p class="form-control-plaintext">{{ $testimonial->created_at->format('M d, Y H:i') }}</p>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Last Updated</label>
                            <p class="form-control-plaintext">{{ $testimonial->updated_at->format('M d, Y H:i') }}</p>
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
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Testimonial
                            </button>
                        </div>
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
                <h5 class="card-title mb-0"><i class="fas fa-cog me-2"></i>Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    @if($testimonial->status == 'pending')
                        <form action="{{ route('admin.testimonials.approve', $testimonial) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-check me-2"></i>Approve Testimonial
                            </button>
                        </form>
                    @endif

                    <form action="{{ route('admin.testimonials.toggle-featured', $testimonial) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary w-100">
                            <i class="fas fa-star me-2"></i>
                            {{ $testimonial->is_featured ? 'Remove from Featured' : 'Mark as Featured' }}
                        </button>
                    </form>

                    <hr>

                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this testimonial? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-trash me-2"></i>Delete Testimonial
                        </button>
                    </form>
                </div>
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
