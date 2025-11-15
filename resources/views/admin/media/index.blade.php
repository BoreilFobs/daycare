@extends('admin.layouts.app')

@section('title', 'Media Library')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Media Library</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Media</li>
            </ol>
        </nav>
    </div>
    <div class="page-actions">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
            <i class="fas fa-cloud-upload-alt me-2"></i>Upload Files
        </button>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">All Media</h5>
            <div class="d-flex gap-2">
                <select class="form-select form-select-sm" id="folderFilter" style="width: 200px;">
                    <option value="all">All Folders</option>
                    <option value="images">Images</option>
                    <option value="services">Services</option>
                    <option value="programs">Programs</option>
                    <option value="events">Events</option>
                    <option value="blog">Blog</option>
                    <option value="team">Team</option>
                    <option value="gallery">Gallery</option>
                    <option value="testimonials">Testimonials</option>
                </select>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-sm btn-outline-secondary active" id="gridView">
                        <i class="fas fa-th"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary" id="listView">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
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

        <!-- Search -->
        <div class="mb-4">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" class="form-control" id="mediaSearch" placeholder="Search media files...">
            </div>
        </div>

        <!-- Grid View -->
        <div id="mediaGrid" class="row g-3">
            @forelse($media as $item)
                <div class="col-md-2 col-sm-3 col-4 media-item" data-folder="{{ $item->folder }}" data-name="{{ strtolower($item->name) }}">
                    <div class="card h-100">
                        <div class="position-relative">
                            @if(in_array($item->extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                <img src="{{ Storage::url($item->path) }}" class="card-img-top" alt="{{ $item->name }}" style="height: 150px; object-fit: cover;">
                            @else
                                <div class="card-img-top d-flex align-items-center justify-content-center bg-light" style="height: 150px;">
                                    <i class="fas fa-file fa-3x text-muted"></i>
                                </div>
                            @endif
                            <div class="position-absolute top-0 end-0 p-2">
                                <button type="button" class="btn btn-sm btn-danger" onclick="deleteMedia({{ $item->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <small class="d-block text-truncate" title="{{ $item->name }}">{{ $item->name }}</small>
                            <small class="text-muted">{{ formatBytes($item->size) }}</small>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-images fa-4x text-muted mb-3"></i>
                        <p class="text-muted">No media files found. Upload some to get started!</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- List View (Hidden by default) -->
        <div id="mediaList" class="d-none">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="60">Preview</th>
                            <th>Name</th>
                            <th>Folder</th>
                            <th>Size</th>
                            <th>Uploaded</th>
                            <th width="100" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($media as $item)
                            <tr class="media-item" data-folder="{{ $item->folder }}" data-name="{{ strtolower($item->name) }}">
                                <td>
                                    @if(in_array($item->extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                        <img src="{{ Storage::url($item->path) }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <i class="fas fa-file fa-2x text-muted"></i>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $item->name }}</strong><br>
                                    <small class="text-muted">{{ $item->extension }}</small>
                                </td>
                                <td><span class="badge bg-secondary">{{ $item->folder }}</span></td>
                                <td>{{ formatBytes($item->size) }}</td>
                                <td>{{ $item->created_at->format('M d, Y') }}</td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-sm btn-info" onclick="copyUrl('{{ Storage::url($item->path) }}')">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteMedia({{ $item->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $media->links() }}
        </div>
    </div>
</div>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Media Files</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.media.upload') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Select Folder</label>
                        <select name="folder" class="form-select" required>
                            <option value="images">Images</option>
                            <option value="services">Services</option>
                            <option value="programs">Programs</option>
                            <option value="events">Events</option>
                            <option value="blog">Blog</option>
                            <option value="team">Team</option>
                            <option value="gallery">Gallery</option>
                            <option value="testimonials">Testimonials</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Select Files</label>
                        <input type="file" name="files[]" class="form-control" multiple accept="image/*" required>
                        <small class="text-muted">You can select multiple files. Max size: 5MB per file</small>
                    </div>

                    <div id="uploadPreview" class="row g-2 mt-2"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-cloud-upload-alt me-2"></i>Upload Files
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
// View toggle
document.getElementById('gridView').addEventListener('click', function() {
    document.getElementById('mediaGrid').classList.remove('d-none');
    document.getElementById('mediaList').classList.add('d-none');
    this.classList.add('active');
    document.getElementById('listView').classList.remove('active');
});

document.getElementById('listView').addEventListener('click', function() {
    document.getElementById('mediaGrid').classList.add('d-none');
    document.getElementById('mediaList').classList.remove('d-none');
    this.classList.add('active');
    document.getElementById('gridView').classList.remove('active');
});

// Folder filter
document.getElementById('folderFilter').addEventListener('change', function() {
    const folder = this.value;
    const items = document.querySelectorAll('.media-item');
    
    items.forEach(item => {
        if (folder === 'all' || item.dataset.folder === folder) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
});

// Search
document.getElementById('mediaSearch').addEventListener('input', function() {
    const search = this.value.toLowerCase();
    const items = document.querySelectorAll('.media-item');
    
    items.forEach(item => {
        const name = item.dataset.name;
        if (name.includes(search)) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
});

// File preview
document.querySelector('input[name="files[]"]').addEventListener('change', function() {
    const preview = document.getElementById('uploadPreview');
    preview.innerHTML = '';
    
    Array.from(this.files).forEach(file => {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const col = document.createElement('div');
                col.className = 'col-md-3';
                col.innerHTML = `
                    <div class="card">
                        <img src="${e.target.result}" class="card-img-top" style="height: 100px; object-fit: cover;">
                        <div class="card-body p-2">
                            <small class="text-truncate d-block">${file.name}</small>
                        </div>
                    </div>
                `;
                preview.appendChild(col);
            };
            reader.readAsDataURL(file);
        }
    });
});

function copyUrl(url) {
    navigator.clipboard.writeText(url).then(() => {
        alert('URL copied to clipboard!');
    });
}

function deleteMedia(id) {
    if (confirm('Are you sure you want to delete this file?')) {
        fetch(`/admin/media/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error deleting file');
            }
        });
    }
}
</script>
@endpush

@php
function formatBytes($bytes) {
    if ($bytes >= 1073741824) {
        return number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        return number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        return number_format($bytes / 1024, 2) . ' KB';
    } else {
        return $bytes . ' bytes';
    }
}
@endphp
