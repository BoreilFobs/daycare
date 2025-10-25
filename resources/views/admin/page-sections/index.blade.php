@extends('admin.layouts.app')

@section('title', 'Page Sections Management')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Page Sections</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Page Sections</li>
            </ol>
        </nav>
    </div>
    <div class="page-actions">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fas fa-plus me-2"></i>Add New Section
        </button>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Content Management</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Filter Tabs -->
        <ul class="nav nav-pills mb-4" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-page="all" href="#all">
                    <i class="fas fa-list me-1"></i>All Sections
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-page="home" href="#home">
                    <i class="fas fa-home me-1"></i>Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-page="about" href="#about">
                    <i class="fas fa-info-circle me-1"></i>About
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-page="programs" href="#programs">
                    <i class="fas fa-graduation-cap me-1"></i>Programs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-page="events" href="#events">
                    <i class="fas fa-calendar me-1"></i>Events
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-page="contact" href="#contact">
                    <i class="fas fa-envelope me-1"></i>Contact
                </a>
            </li>
        </ul>

        <!-- Sections Table -->
        <div class="table-responsive">
            <table class="table table-hover align-middle" id="sectionsTable">
                <thead>
                    <tr>
                        <th width="15%">Page</th>
                        <th width="20%">Section Name</th>
                        <th width="15%">Key</th>
                        <th width="25%">Value</th>
                        <th width="10%">Type</th>
                        <th width="5%">Order</th>
                        <th width="10%" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($grouped->flatten() as $section)
                        <tr data-page="{{ $section->page }}">
                            <td>
                                <span class="badge bg-primary">{{ ucfirst($section->page) }}</span>
                            </td>
                            <td>
                                <strong>{{ $section->section_name }}</strong>
                            </td>
                            <td>
                                <code>{{ $section->key }}</code>
                            </td>
                            <td>
                                @if($section->type === 'image')
                                    @if($section->value)
                                        <img src="{{ Storage::url($section->value) }}" 
                                             alt="{{ $section->key }}" 
                                             class="rounded"
                                             style="max-height: 40px; max-width: 80px; object-fit: cover;">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                @elseif($section->type === 'textarea' || $section->type === 'wysiwyg')
                                    <small class="text-muted">{{ Str::limit($section->value ?? '', 50) }}</small>
                                @elseif($section->type === 'color')
                                    <div class="d-flex align-items-center gap-2">
                                        <div style="width: 30px; height: 30px; background: {{ $section->value }}; border: 1px solid #dee2e6; border-radius: 4px;"></div>
                                        <code>{{ $section->value }}</code>
                                    </div>
                                @else
                                    <span>{{ Str::limit($section->value ?? '', 50) }}</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $section->type }}</span>
                            </td>
                            <td>
                                <span class="badge bg-secondary">{{ $section->order }}</span>
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <button type="button" 
                                            class="btn btn-outline-primary edit-section"
                                            data-id="{{ $section->id }}"
                                            data-page="{{ $section->page }}"
                                            data-section-name="{{ $section->section_name }}"
                                            data-key="{{ $section->key }}"
                                            data-value="{{ $section->value }}"
                                            data-type="{{ $section->type }}"
                                            data-order="{{ $section->order }}"
                                            data-is-active="{{ $section->is_active }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editModal"
                                            title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('admin.page-sections.destroy', $section) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this section?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                                <p class="text-muted mb-0">No page sections found. Create your first section!</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.page-sections.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New Section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Page <span class="text-danger">*</span></label>
                            <select name="page" class="form-select" required>
                                <option value="">Select Page</option>
                                <option value="home">Home</option>
                                <option value="about">About</option>
                                <option value="programs">Programs</option>
                                <option value="events">Events</option>
                                <option value="contact">Contact</option>
                                <option value="blog">Blog</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Section Name <span class="text-danger">*</span></label>
                            <input type="text" name="section_name" class="form-control" placeholder="e.g., hero, about, services" required>
                            <small class="text-muted">Group identifier for related fields</small>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label class="form-label">Key <span class="text-danger">*</span></label>
                            <input type="text" name="key" class="form-control" placeholder="e.g., title, subtitle, image" required>
                            <small class="text-muted">Unique identifier for this field</small>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Type <span class="text-danger">*</span></label>
                            <select name="type" id="createType" class="form-select" required>
                                <option value="text">Text</option>
                                <option value="textarea">Textarea</option>
                                <option value="wysiwyg">Rich Text (WYSIWYG)</option>
                                <option value="image">Image</option>
                                <option value="video">Video URL</option>
                                <option value="color">Color Picker</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Value</label>
                        <input type="text" name="value" id="createValueText" class="form-control value-field">
                        <textarea name="value" id="createValueTextarea" class="form-control value-field" rows="4" style="display: none;"></textarea>
                        <input type="file" name="value" id="createValueImage" class="form-control value-field" accept="image/*" style="display: none;">
                        <input type="color" name="value" id="createValueColor" class="form-control value-field" style="display: none;">
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" class="form-control" value="0" min="0">
                            <small class="text-muted">Display order (lower number = first)</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status</label>
                            <div class="form-check form-switch mt-2">
                                <input type="checkbox" name="is_active" class="form-check-input" id="createIsActive" value="1" checked>
                                <label class="form-check-label" for="createIsActive">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Create Section
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Page <span class="text-danger">*</span></label>
                            <select name="page" id="editPage" class="form-select" required>
                                <option value="">Select Page</option>
                                <option value="home">Home</option>
                                <option value="about">About</option>
                                <option value="programs">Programs</option>
                                <option value="events">Events</option>
                                <option value="contact">Contact</option>
                                <option value="blog">Blog</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Section Name <span class="text-danger">*</span></label>
                            <input type="text" name="section_name" id="editSectionName" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label class="form-label">Key <span class="text-danger">*</span></label>
                            <input type="text" name="key" id="editKey" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Type <span class="text-danger">*</span></label>
                            <select name="type" id="editType" class="form-select" required>
                                <option value="text">Text</option>
                                <option value="textarea">Textarea</option>
                                <option value="wysiwyg">Rich Text (WYSIWYG)</option>
                                <option value="image">Image</option>
                                <option value="video">Video URL</option>
                                <option value="color">Color Picker</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Value</label>
                        <div id="editCurrentImage" style="display: none;" class="mb-2">
                            <img src="" alt="Current Image" class="img-thumbnail" style="max-height: 100px;">
                            <p class="text-muted small mb-0">Current image (upload new to replace)</p>
                        </div>
                        <input type="text" name="value" id="editValueText" class="form-control edit-value-field">
                        <textarea name="value" id="editValueTextarea" class="form-control edit-value-field" rows="4" style="display: none;"></textarea>
                        <input type="file" name="value" id="editValueImage" class="form-control edit-value-field" accept="image/*" style="display: none;">
                        <input type="color" name="value" id="editValueColor" class="form-control edit-value-field" style="display: none;">
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" id="editOrder" class="form-control" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status</label>
                            <div class="form-check form-switch mt-2">
                                <input type="checkbox" name="is_active" class="form-check-input" id="editIsActive" value="1">
                                <label class="form-check-label" for="editIsActive">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Section
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Page Filter
        $('.nav-link[data-page]').on('click', function(e) {
            e.preventDefault();
            $('.nav-link[data-page]').removeClass('active');
            $(this).addClass('active');
            
            const page = $(this).data('page');
            if (page === 'all') {
                $('tr[data-page]').show();
            } else {
                $('tr[data-page]').hide();
                $(`tr[data-page="${page}"]`).show();
            }
        });

        // Create Modal - Type Change
        $('#createType').on('change', function() {
            const type = $(this).val();
            $('.value-field').hide().prop('disabled', true).prop('required', false);
            
            switch(type) {
                case 'textarea':
                case 'wysiwyg':
                    $('#createValueTextarea').show().prop('disabled', false);
                    break;
                case 'image':
                    $('#createValueImage').show().prop('disabled', false);
                    break;
                case 'color':
                    $('#createValueColor').show().prop('disabled', false);
                    break;
                default:
                    $('#createValueText').show().prop('disabled', false);
            }
        });

        // Edit Modal - Type Change
        $('#editType').on('change', function() {
            const type = $(this).val();
            $('.edit-value-field').hide().prop('disabled', true).prop('required', false);
            $('#editCurrentImage').hide();
            
            switch(type) {
                case 'textarea':
                case 'wysiwyg':
                    $('#editValueTextarea').show().prop('disabled', false);
                    break;
                case 'image':
                    $('#editValueImage').show().prop('disabled', false);
                    break;
                case 'color':
                    $('#editValueColor').show().prop('disabled', false);
                    break;
                default:
                    $('#editValueText').show().prop('disabled', false);
            }
        });

        // Edit Button Click
        $('.edit-section').on('click', function() {
            const id = $(this).data('id');
            const page = $(this).data('page');
            const sectionName = $(this).data('section-name');
            const key = $(this).data('key');
            const value = $(this).data('value');
            const type = $(this).data('type');
            const order = $(this).data('order');
            const isActive = $(this).data('is-active');

            // Set form action - use the correct route with admin prefix
            $('#editForm').attr('action', `{{ url('admin/page-sections') }}/${id}`);

            // Fill form fields
            $('#editPage').val(page);
            $('#editSectionName').val(sectionName);
            $('#editKey').val(key);
            $('#editType').val(type);
            $('#editOrder').val(order);
            $('#editIsActive').prop('checked', isActive == 1);

            // Handle value based on type
            $('.edit-value-field').hide().prop('disabled', true).prop('required', false);
            $('#editCurrentImage').hide();

            switch(type) {
                case 'textarea':
                case 'wysiwyg':
                    $('#editValueTextarea').val(value).show().prop('disabled', false);
                    break;
                case 'image':
                    $('#editValueImage').show().prop('disabled', false);
                    if (value) {
                        $('#editCurrentImage img').attr('src', `/storage/${value}`);
                        $('#editCurrentImage').show();
                    }
                    break;
                case 'color':
                    $('#editValueColor').val(value).show().prop('disabled', false);
                    break;
                default:
                    $('#editValueText').val(value).show().prop('disabled', false);
            }
        });
    });
</script>
@endpush
