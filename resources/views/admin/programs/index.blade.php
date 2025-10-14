@extends('admin.layouts.app')

@section('title', 'Programs Management')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Programs</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Programs</li>
            </ol>
        </nav>
    </div>
    <div class="page-actions">
        <a href="{{ route('admin.programs.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add New Program
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">All Programs</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle" id="programsTable">
                <thead>
                    <tr>
                        <th width="5%">
                            <i class="fas fa-grip-vertical text-muted"></i>
                        </th>
                        <th width="40%">Program</th>
                        <th width="15%">Price</th>
                        <th width="10%">Students</th>
                        <th width="15%">Status</th>
                        <th width="15%" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody id="sortable-programs">
                    @forelse($programs as $program)
                        <tr data-id="{{ $program->id }}">
                            <td>
                                <i class="fas fa-grip-vertical text-muted sortable-handle" style="cursor: move;"></i>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    @if($program->image)
                                        <img src="{{ Storage::url($program->image) }}" 
                                             alt="{{ $program->title }}" 
                                             class="rounded" 
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                             style="width: 60px; height: 60px;">
                                            <i class="fas fa-graduation-cap text-muted fa-2x"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="fw-semibold">{{ $program->title }}</div>
                                        <small class="text-muted">{{ Str::limit($program->description, 50) }}</small>
                                        @if($program->is_featured)
                                            <span class="badge bg-warning text-dark ms-2">
                                                <i class="fas fa-star"></i> Featured
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <strong>{{ $program->currency }} {{ number_format($program->price, 2) }}</strong>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $program->total_sits }} sits</span>
                            </td>
                            <td>
                                @if($program->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.programs.edit', $program) }}" 
                                       class="btn btn-outline-primary"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.programs.destroy', $program) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this program?');">
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
                                <i class="fas fa-graduation-cap fa-3x text-muted mb-3"></i>
                                <p class="text-muted mb-0">No programs found. Create your first program!</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize DataTable
    $(document).ready(function() {
        $('#programsTable').DataTable({
            "order": [],
            "columnDefs": [
                { "orderable": false, "targets": [0, 5] }
            ],
            "pageLength": 25
        });

        // Initialize Sortable for drag-drop reordering
        const sortableList = document.getElementById('sortable-programs');
        if (sortableList) {
            new Sortable(sortableList, {
                handle: '.sortable-handle',
                animation: 150,
                onEnd: function(evt) {
                    const order = [];
                    document.querySelectorAll('#sortable-programs tr').forEach((row, index) => {
                        order.push({
                            id: row.dataset.id,
                            order: index + 1
                        });
                    });

                    // Send AJAX request to save order
                    fetch('{{ route("admin.programs.reorder") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ order: order })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Show success message
                            const alert = document.createElement('div');
                            alert.className = 'alert alert-success alert-dismissible fade show';
                            alert.innerHTML = '<i class="fas fa-check-circle me-2"></i>Order updated successfully!';
                            document.querySelector('.card-body').prepend(alert);
                            setTimeout(() => alert.remove(), 3000);
                        }
                    });
                }
            });
        }
    });
</script>
@endpush
