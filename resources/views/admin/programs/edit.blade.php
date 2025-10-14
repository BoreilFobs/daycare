@extends('admin.layouts.app')

@section('title', 'Edit Program')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Edit Program</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.programs.index') }}">Programs</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>
</div>

<form action="{{ route('admin.programs.update', $program) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Program Information</h5>
                </div>
                <div class="card-body">
                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Program Title <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('title') is-invalid @enderror" 
                               id="title" 
                               name="title" 
                               value="{{ old('title', $program->title) }}" 
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="5" 
                                  required>{{ old('description', $program->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Features -->
                    <div class="mb-3">
                        <label for="features" class="form-label">Features</label>
                        <textarea class="form-control @error('features') is-invalid @enderror" 
                                  id="features" 
                                  name="features" 
                                  rows="4" 
                                  placeholder="Enter one feature per line">{{ old('features', $program->features) }}</textarea>
                        <small class="text-muted">Enter each feature on a new line</small>
                        @error('features')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Teacher Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Teacher Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="teacher_name" class="form-label">Teacher Name</label>
                            <input type="text" 
                                   class="form-control @error('teacher_name') is-invalid @enderror" 
                                   id="teacher_name" 
                                   name="teacher_name" 
                                   value="{{ old('teacher_name', $program->teacher_name) }}">
                            @error('teacher_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="teacher_qualification" class="form-label">Teacher Qualification</label>
                            <input type="text" 
                                   class="form-control @error('teacher_qualification') is-invalid @enderror" 
                                   id="teacher_qualification" 
                                   name="teacher_qualification" 
                                   value="{{ old('teacher_qualification', $program->teacher_qualification) }}">
                            @error('teacher_qualification')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="teacher_image" class="form-label">Teacher Image</label>
                        @if($program->teacher_image)
                            <div class="mb-2">
                                <img src="{{ Storage::url($program->teacher_image) }}" 
                                     alt="Current Teacher Image" 
                                     class="img-thumbnail" 
                                     style="max-height: 100px;">
                                <p class="text-muted small mb-0">Current image (upload new to replace)</p>
                            </div>
                        @endif
                        <input type="file" 
                               class="form-control @error('teacher_image') is-invalid @enderror" 
                               id="teacher_image" 
                               name="teacher_image" 
                               accept="image/*">
                        <small class="text-muted">Recommended size: 200x200px</small>
                        @error('teacher_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Program Image -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Program Image</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Main Image</label>
                        @if($program->image)
                            <div class="mb-2">
                                <img src="{{ Storage::url($program->image) }}" 
                                     alt="Current Program Image" 
                                     class="img-thumbnail" 
                                     style="max-height: 200px;">
                                <p class="text-muted small mb-0">Current image (upload new to replace)</p>
                            </div>
                        @endif
                        <input type="file" 
                               class="form-control @error('image') is-invalid @enderror" 
                               id="image" 
                               name="image" 
                               accept="image/*">
                        <small class="text-muted">Recommended size: 800x600px</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div id="imagePreview" class="mt-3" style="display: none;">
                        <img src="" alt="Preview" class="img-thumbnail" style="max-height: 200px;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Pricing & Capacity -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Pricing & Capacity</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" 
                                   class="form-control @error('price') is-invalid @enderror" 
                                   id="price" 
                                   name="price" 
                                   value="{{ old('price', $program->price) }}" 
                                   step="0.01" 
                                   min="0" 
                                   required>
                        </div>
                        @error('price')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="currency" class="form-label">Currency</label>
                        <select class="form-select @error('currency') is-invalid @enderror" 
                                id="currency" 
                                name="currency">
                            <option value="USD" {{ old('currency', $program->currency) == 'USD' ? 'selected' : '' }}>USD ($)</option>
                            <option value="EUR" {{ old('currency', $program->currency) == 'EUR' ? 'selected' : '' }}>EUR (€)</option>
                            <option value="GBP" {{ old('currency', $program->currency) == 'GBP' ? 'selected' : '' }}>GBP (£)</option>
                        </select>
                        @error('currency')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="total_sits" class="form-label">Total Seats <span class="text-danger">*</span></label>
                        <input type="number" 
                               class="form-control @error('total_sits') is-invalid @enderror" 
                               id="total_sits" 
                               name="total_sits" 
                               value="{{ old('total_sits', $program->total_sits) }}" 
                               min="1" 
                               required>
                        @error('total_sits')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Age Group & Schedule -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Age Group & Schedule</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="age_group" class="form-label">Age Group</label>
                        <input type="text" 
                               class="form-control @error('age_group') is-invalid @enderror" 
                               id="age_group" 
                               name="age_group" 
                               value="{{ old('age_group', $program->age_group) }}" 
                               placeholder="e.g., 3-5 years">
                        @error('age_group')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" 
                               class="form-control @error('duration') is-invalid @enderror" 
                               id="duration" 
                               name="duration" 
                               value="{{ old('duration', $program->duration) }}" 
                               placeholder="e.g., 3 months, 6 weeks">
                        @error('duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="schedule" class="form-label">Schedule</label>
                        <textarea class="form-control @error('schedule') is-invalid @enderror" 
                                  id="schedule" 
                                  name="schedule" 
                                  rows="3" 
                                  placeholder="e.g., Monday to Friday, 9:00 AM - 12:00 PM">{{ old('schedule', $program->schedule) }}</textarea>
                        @error('schedule')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Status & Settings -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Status & Settings</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="order" class="form-label">Display Order</label>
                        <input type="number" 
                               class="form-control @error('order') is-invalid @enderror" 
                               id="order" 
                               name="order" 
                               value="{{ old('order', $program->order) }}" 
                               min="0">
                        <small class="text-muted">Lower numbers appear first</small>
                        @error('order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input type="hidden" name="is_featured" value="0">
                        <input class="form-check-input" 
                               type="checkbox" 
                               id="is_featured" 
                               name="is_featured" 
                               value="1" 
                               {{ old('is_featured', $program->is_featured) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">
                            <i class="fas fa-star text-warning me-1"></i> Featured Program
                        </label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input type="hidden" name="is_active" value="0">
                        <input class="form-check-input" 
                               type="checkbox" 
                               id="is_active" 
                               name="is_active" 
                               value="1" 
                               {{ old('is_active', $program->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                            Active
                        </label>
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary w-100 mb-2">
                        <i class="fas fa-save me-2"></i>Update Program
                    </button>
                    <a href="{{ route('admin.programs.index') }}" class="btn btn-secondary w-100">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
    // Image preview
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#imagePreview img').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
