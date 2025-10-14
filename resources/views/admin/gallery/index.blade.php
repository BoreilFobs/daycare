@extends('admin.layouts.app')

@section('title', 'Gallery Management')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Gallery</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Gallery</li>
            </ol>
        </nav>
    </div>
    <div class="page-actions">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
            <i class="fas fa-upload me-2"></i>Upload Images
        </button>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">All Images ({{ $images->count() }})</h5>
        <div class="btn-group btn-group-sm">
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

        <!-- Category Filters -->
        <ul class="nav nav-pills mb-4" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-category="all" href="#all">
                    <i class="fas fa-images me-1"></i>All ({{ $images->count() }})
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-category="general" href="#general">
                    General ({{ $images->where('category', 'general')->count() }})
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-category="events" href="#events">
                    Events ({{ $images->where('category', 'events')->count() }})
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-category="activities" href="#activities">
                    Activities ({{ $images->where('category', 'activities')->count() }})
                </a>
            </li>
        </ul>

        <!-- Gallery Grid -->
        <div class="row g-3" id="galleryGrid">
            @forelse($images as $image)
                <div class="col-6 col-md-4 col-lg-3 col-xl-2 gallery-item" data-category="{{ $image->category }}">
                    <div class="card h-100 gallery-card position-relative">
                        <!-- Checkbox for selection -->
                        <div class="position-absolute top-0 start-0 p-2" style="z-index: 10;">
                            <input type="checkbox" class="form-check-input image-checkbox" value="{{ $image->id }}">
                        </div>
                        
                        <!-- Image -->
                        <img src="{{ Storage::url($image->image) }}" 
                             alt="{{ $image->title }}" 
                             class="card-img-top gallery-image"
                             style="height: 200px; object-fit: cover; cursor: pointer;"
                             data-bs-toggle="modal"
                             data-bs-target="#imageModal"
                             data-id="{{ $image->id }}"
                             data-title="{{ $image->title }}"
                             data-description="{{ $image->description }}"
                             data-category="{{ $image->category }}"
                             data-image="{{ Storage::url($image->image) }}"
                             data-date="{{ $image->created_at->format('M d, Y') }}">
                        
                        <!-- Card Body -->
                        <div class="card-body p-2">
                            <h6 class="card-title mb-1 small text-truncate" title="{{ $image->title }}">
                                {{ $image->title ?? 'Untitled' }}
                            </h6>
                            <small class="text-muted d-block mb-2">{{ $image->category ?? 'General' }}</small>
                            
                            <!-- Actions -->
                            <div class="btn-group btn-group-sm w-100">
                                <button type="button" 
                                        class="btn btn-outline-primary edit-image"
                                        data-id="{{ $image->id }}"
                                        data-title="{{ $image->title }}"
                                        data-description="{{ $image->description }}"
                                        data-category="{{ $image->category }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.gallery.destroy', $image) }}" 
                                      method="POST" 
                                      class="flex-fill"
                                      onsubmit="return confirm('Delete this image?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger w-100">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-images fa-3x text-muted mb-3"></i>
                        <p class="text-muted mb-0">No images yet. Upload your first images!</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Upload Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Select Images</label>
                        <input type="file" name="images[]" class="form-control" multiple accept="image/*" required>
                        <small class="text-muted">You can select multiple images at once</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select">
                            <option value="general">General</option>
                            <option value="events">Events</option>
                            <option value="activities">Activities</option>
                            <option value="facilities">Facilities</option>
                            <option value="team">Team</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-upload me-2"></i>Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Image View Modal -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="" id="imageModalImg" class="img-fluid rounded mb-3" alt="">
                <p class="text-muted" id="imageModalDescription"></p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="badge bg-light text-dark" id="imageModalCategory"></span>
                    <small class="text-muted" id="imageModalDate"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" id="editTitle" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="editDescription" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" id="editCategory" class="form-select">
                            <option value="general">General</option>
                            <option value="events">Events</option>
                            <option value="activities">Activities</option>
                            <option value="facilities">Facilities</option>
                            <option value="team">Team</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .gallery-card {
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .gallery-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
    .gallery-image {
        transition: opacity 0.2s;
    }
    .gallery-image:hover {
        opacity: 0.9;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Category Filter
        $('.nav-link[data-category]').on('click', function(e) {
            e.preventDefault();
            $('.nav-link[data-category]').removeClass('active');
            $(this).addClass('active');
            
            const category = $(this).data('category');
            if (category === 'all') {
                $('.gallery-item').show();
            } else {
                $('.gallery-item').hide();
                $(`.gallery-item[data-category="${category}"]`).show();
            }
        });

        // View Image Modal
        $('.gallery-image').on('click', function() {
            $('#imageModalTitle').text($(this).data('title') || 'Untitled');
            $('#imageModalImg').attr('src', $(this).data('image'));
            $('#imageModalDescription').text($(this).data('description') || 'No description');
            $('#imageModalCategory').text($(this).data('category') || 'General');
            $('#imageModalDate').text($(this).data('date'));
        });

        // Edit Image Modal
        $('.edit-image').on('click', function() {
            const id = $(this).data('id');
            $('#editForm').attr('action', `/admin/gallery/${id}`);
            $('#editTitle').val($(this).data('title'));
            $('#editDescription').val($(this).data('description'));
            $('#editCategory').val($(this).data('category'));
        });

        // Bulk Delete
        $('#bulkDelete').on('click', function() {
            const selected = $('.image-checkbox:checked').map(function() {
                return $(this).val();
            }).get();

            if (selected.length === 0) {
                alert('Please select images to delete');
                return;
            }

            if (confirm(`Delete ${selected.length} image(s)? This action cannot be undone.`)) {
                $.ajax({
                    url: '{{ route("admin.gallery.bulk-delete") }}',
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
