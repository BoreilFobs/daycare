@extends('admin.layouts.app')

@section('title', 'Testimonials')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Testimonials</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Testimonials</li>
            </ol>
        </nav>
    </div>
    <div class="page-actions">
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add Testimonial
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">All Testimonials</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle" id="testimonialsTable">
                <thead>
                    <tr>
                        <th width="40%">Person</th>
                        <th width="15%">Position</th>
                        <th width="10%">Rating</th>
                        <th width="20%">Testimonial</th>
                        <th width="10%">Status</th>
                        <th width="5%" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    @if($testimonial->image)
                                        <img src="{{ Storage::url($testimonial->image) }}" 
                                             alt="{{ $testimonial->client_name }}" 
                                             class="rounded-circle" 
                                             style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                                             style="width: 50px; height: 50px;">
                                            <i class="fas fa-user fa-lg"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="fw-semibold">{{ $testimonial->client_name }}</div>
                                        <small class="text-muted">
                                            <i class="fas fa-calendar me-1"></i>
                                            {{ $testimonial->created_at->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted">{{ $testimonial->position ?? '—' }}</span>
                            </td>
                            <td>
                                <div class="rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= ($testimonial->rating ?? 5))
                                            <i class="fas fa-star text-warning"></i>
                                        @else
                                            <i class="far fa-star text-muted"></i>
                                        @endif
                                    @endfor
                                </div>
                                <small class="text-muted d-block">{{ $testimonial->rating ?? 5 }}/5</small>
                            </td>
                            <td>
                                <p class="mb-0 small">{{ Str::limit($testimonial->content, 60) }}</p>
                            </td>
                            <td>
                                @if($testimonial->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" 
                                       class="btn btn-outline-primary"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
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
                                <i class="fas fa-quote-left fa-3x text-muted mb-3"></i>
                                <p class="text-muted mb-0">No testimonials yet. Add your first testimonial!</p>
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
    $(document).ready(function() {
        $('#testimonialsTable').DataTable({
            "order": [[0, "desc"]],
            "columnDefs": [
                { "orderable": false, "targets": [5] }
            ],
            "pageLength": 25
        });
    });
</script>
@endpush
