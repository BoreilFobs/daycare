@extends('admin.layouts.app')

@section('title', 'Services')

@section('breadcrumbs')
    <li class="breadcrumb-item active">Services</li>
@endsection

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Services</h1>
        <p class="page-subtitle">Manage your "What We Do" services section</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Service
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="servicesTable" class="table table-hover">
                <thead>
                    <tr>
                        <th style="width: 50px;"></th>
                        <th style="width: 60px;">Icon</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th style="width: 100px;" class="text-center">Order</th>
                        <th style="width: 150px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="sortable-services">
                    @forelse($services as $service)
                        <tr data-id="{{ $service->id }}">
                            <td class="text-center">
                                <i class="fas fa-grip-vertical text-muted" style="cursor: move;" title="Drag to reorder"></i>
                            </td>
                            <td class="text-center">
                                <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #4F46E5, #3B82F6); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                    <i class="{{ $service->icon }} text-white"></i>
                                </div>
                            </td>
                            <td>
                                <div class="fw-semibold">{{ $service->title }}</div>
                            </td>
                            <td>
                                <div class="text-muted small">{{ Str::limit($service->description, 80) }}</div>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark">{{ $service->order }}</span>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-outline-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline" onsubmit="return confirmDelete('Are you sure you want to delete this service?')">
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
                            <td colspan="6" class="text-center py-5">
                                <i class="fas fa-briefcase text-muted" style="font-size: 48px; opacity: 0.3;"></i>
                                <p class="text-muted mt-3 mb-3">No services found</p>
                                <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus me-1"></i> Create Your First Service
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@if($services->isNotEmpty())
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        <strong>Tip:</strong> Drag and drop rows to reorder services. Changes are saved automatically.
    </div>
@endif
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize DataTable
    @if($services->isNotEmpty())
    var table = $('#servicesTable').DataTable({
        order: [[4, 'asc']], // Order by the order column
        pageLength: 25,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search services..."
        },
        columnDefs: [
            { orderable: false, targets: [0, 1, 5] } // Disable sorting for drag handle, icon, and actions
        ]
    });
    
    // Initialize SortableJS for drag and drop
    var sortable = new Sortable(document.getElementById('sortable-services'), {
        handle: '.fa-grip-vertical',
        animation: 150,
        onEnd: function(evt) {
            var order = [];
            $('#sortable-services tr').each(function(index) {
                var id = $(this).data('id');
                if (id) {
                    order.push({
                        id: id,
                        order: index + 1
                    });
                }
            });
            
            // Save new order
            $.ajax({
                url: '{{ route("admin.services.reorder") }}',
                method: 'POST',
                data: {
                    order: order
                },
                success: function(response) {
                    // Show success message
                    var alert = $('<div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-3" style="z-index: 9999; max-width: 300px;" role="alert">' +
                        '<i class="fas fa-check-circle me-2"></i>Services reordered successfully!' +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                        '</div>');
                    $('body').append(alert);
                    
                    setTimeout(function() {
                        alert.fadeOut(function() {
                            $(this).remove();
                        });
                    }, 3000);
                    
                    // Reload page to reflect changes
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                },
                error: function() {
                    alert('Error reordering services. Please try again.');
                }
            });
        }
    });
    @endif
});
</script>
@endpush
