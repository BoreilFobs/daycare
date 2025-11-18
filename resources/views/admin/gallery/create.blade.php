@extends('admin.layouts.app')

@section('title', 'Add Gallery Image')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Add Gallery Image</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.gallery.index') }}">Gallery</a></li>
                <li class="breadcrumb-item active">Add New</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Image Information</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*"
                                   required>
                            <small class="text-muted">Recommended size: 1200x800px (max 2MB)</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div id="imagePreview" class="mt-3" style="display: none;">
                                <img src="" alt="Preview" class="img-thumbnail" style="max-width: 100%; max-height: 400px;">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title') }}" 
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
                                    <option value="{{ $key }}" {{ old('category') == $key ? 'selected' : '' }}>
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
                                      rows="4">{{ old('description') }}</textarea>
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
                                   value="{{ old('order', 0) }}" 
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
                                       {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    <strong>Active</strong>
                                    <small class="d-block text-muted">Display this image in the public gallery</small>
                                </label>
                            </div>
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
                            <i class="fas fa-save me-2"></i>Upload Image
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
                <h5 class="card-title mb-0"><i class="fas fa-upload me-2"></i>Bulk Upload</h5>
            </div>
            <div class="card-body">
                <p class="small mb-2">Need to upload multiple images?</p>
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-images me-2"></i>Use Bulk Upload
                </a>
                <p class="small text-muted mt-2 mb-0">Available on the main gallery page</p>
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
            
            // Auto-fill title from filename if empty
            const titleField = document.getElementById('title');
            if (!titleField.value) {
                titleField.value = file.name.replace(/\.[^/.]+$/, "").replace(/_/g, ' ');
            }
        }
    });
</script>
@endpush
