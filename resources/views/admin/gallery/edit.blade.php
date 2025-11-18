@extends('admin.layouts.app')

@section('title', 'Edit Gallery Image')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Edit Gallery Image</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.gallery.index') }}">Gallery</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Image Information</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Current Image</label>
                            <div class="mb-3">
                                <img src="{{ $gallery->image_url }}" 
                                     alt="{{ $gallery->title }}" 
                                     class="img-thumbnail" 
                                     style="max-width: 100%; max-height: 400px;">
                            </div>
                            
                            <label for="image" class="form-label">Replace Image (Optional)</label>
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*">
                            <small class="text-muted">Leave empty to keep current image. Recommended: 1200x800px (max 2MB)</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div id="imagePreview" class="mt-3" style="display: none;">
                                <p class="small text-muted">New image preview:</p>
                                <img src="" alt="Preview" class="img-thumbnail" style="max-width: 100%; max-height: 400px;">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title', $gallery->title) }}" 
                                   required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                            <select class="form-select @error('category') is-invalid @enderror" 
                                    id="category" 
                                    name="category" 
                                    required>
                                <option value="">Select Category</option>
                                @foreach($categories as $key => $label)
                                    <option value="{{ $key }}" {{ old('category', $gallery->category) == $key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="4">{{ old('description', $gallery->description) }}</textarea>
                            <small class="text-muted">Provide details about this image</small>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
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
                                   value="{{ old('order', $gallery->order ?? 0) }}" 
                                   min="0">
                            <small class="text-muted">Lower numbers appear first (0 = automatic)</small>
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="is_active" 
                                       name="is_active" 
                                       {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    <strong>Active</strong>
                                    <small class="d-block text-muted">Display this image in the public gallery</small>
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
                            <label class="form-label">Created</label>
                            <p class="form-control-plaintext">{{ $gallery->created_at->format('M d, Y H:i') }}</p>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Last Updated</label>
                            <p class="form-control-plaintext">{{ $gallery->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Image
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
                <h6>Image Requirements:</h6>
                <ul class="small">
                    <li><strong>Size:</strong> 1200x800px recommended</li>
                    <li><strong>Format:</strong> JPEG, PNG, GIF, WebP</li>
                    <li><strong>Max Size:</strong> 2MB</li>
                    <li><strong>Orientation:</strong> Landscape preferred</li>
                </ul>

                <hr>

                <h6>Categories:</h6>
                <ul class="small mb-0">
                    <li><strong>General:</strong> Everyday photos</li>
                    <li><strong>Events:</strong> Special occasions</li>
                    <li><strong>Activities:</strong> Learning activities</li>
                    <li><strong>Facilities:</strong> Rooms and spaces</li>
                    <li><strong>Celebrations:</strong> Parties and celebrations</li>
                </ul>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-cog me-2"></i>Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ $gallery->image_url }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-external-link-alt me-2"></i>View Full Size
                    </a>

                    <hr>

                    <form action="{{ route('admin.gallery.destroy', $gallery) }}" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this image? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm w-100">
                            <i class="fas fa-trash me-2"></i>Delete Image
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
    document.getElementById('image').addEventListener('change', function(e) {
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
</script>
@endpush
