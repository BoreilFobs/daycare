@extends('admin.layouts.app')

@section('title', 'Team Members')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Team Members</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Team</li>
            </ol>
        </nav>
    </div>
    <div class="page-actions">
        <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add Team Member
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">All Team Members</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Grid View -->
        <div class="row g-4" id="sortable-team">
            @forelse($teamMembers as $member)
                <div class="col-md-6 col-lg-4 col-xl-3" data-id="{{ $member->id }}">
                    <div class="card h-100 team-card">
                        <div class="card-body text-center position-relative">
                            <div class="sortable-handle position-absolute top-0 start-0 p-2" style="cursor: move;">
                                <i class="fas fa-grip-vertical text-muted"></i>
                            </div>
                            
                            @if($member->image)
                                <img src="{{ Storage::url($member->image) }}" 
                                     alt="{{ $member->name }}" 
                                     class="rounded-circle mb-3"
                                     style="width: 120px; height: 120px; object-fit: cover;">
                            @else
                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                                     style="width: 120px; height: 120px;">
                                    <i class="fas fa-user fa-3x text-muted"></i>
                                </div>
                            @endif
                            
                            <h5 class="card-title mb-1">{{ $member->name }}</h5>
                            <p class="text-muted mb-2">{{ $member->position }}</p>
                            
                            @if($member->bio)
                                <p class="small text-muted mb-3">{{ Str::limit($member->bio, 80) }}</p>
                            @endif
                            
                            <!-- Social Links -->
                            @if($member->facebook || $member->twitter || $member->instagram || $member->linkedin)
                                <div class="social-links mb-3">
                                    @if($member->facebook)
                                        <a href="{{ $member->facebook }}" target="_blank" class="btn btn-sm btn-outline-primary me-1">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    @endif
                                    @if($member->twitter)
                                        <a href="{{ $member->twitter }}" target="_blank" class="btn btn-sm btn-outline-info me-1">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    @endif
                                    @if($member->instagram)
                                        <a href="{{ $member->instagram }}" target="_blank" class="btn btn-sm btn-outline-danger me-1">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    @endif
                                    @if($member->linkedin)
                                        <a href="{{ $member->linkedin }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    @endif
                                </div>
                            @endif
                            
                            <!-- Status Badge -->
                            <div class="mb-3">
                                @if($member->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </div>
                            
                            <!-- Actions -->
                            <div class="btn-group btn-group-sm w-100">
                                <a href="{{ route('admin.team.edit', $member) }}" 
                                   class="btn btn-outline-primary"
                                   title="Edit">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <form action="{{ route('admin.team.destroy', $member) }}" 
                                      method="POST" 
                                      class="flex-fill"
                                      onsubmit="return confirm('Are you sure you want to delete this team member?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger w-100" title="Delete">
                                        <i class="fas fa-trash me-1"></i>Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-users fa-3x text-muted mb-3"></i>
                        <p class="text-muted mb-0">No team members yet. Add your first team member!</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .team-card {
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .team-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
    .sortable-ghost {
        opacity: 0.4;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize Sortable for drag-drop reordering
        const sortableList = document.getElementById('sortable-team');
        if (sortableList) {
            new Sortable(sortableList, {
                handle: '.sortable-handle',
                animation: 150,
                ghostClass: 'sortable-ghost',
                onEnd: function(evt) {
                    const order = [];
                    document.querySelectorAll('#sortable-team > div').forEach((item, index) => {
                        const id = item.dataset.id;
                        if (id) {
                            order.push({
                                id: id,
                                order: index + 1
                            });
                        }
                    });

                    // Send AJAX request to save order
                    fetch('{{ route("admin.team.reorder") }}', {
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
                            alert.className = 'alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3';
                            alert.style.zIndex = '9999';
                            alert.innerHTML = '<i class="fas fa-check-circle me-2"></i>Order updated successfully!';
                            document.body.prepend(alert);
                            setTimeout(() => alert.remove(), 3000);
                        }
                    });
                }
            });
        }
    });
</script>
@endpush
