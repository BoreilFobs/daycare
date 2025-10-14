@extends('admin.layouts.app')

@section('title', 'Event Registrations')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Event Registrations</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Registrations</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">All Registrations</h5>
        <div class="btn-group btn-group-sm">
            <button type="button" class="btn btn-outline-success" id="bulkConfirm">
                <i class="fas fa-check me-1"></i>Confirm Selected
            </button>
            <button type="button" class="btn btn-outline-danger" id="bulkCancel">
                <i class="fas fa-times me-1"></i>Cancel Selected
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

        <!-- Filters -->
        <div class="row mb-4">
            <div class="col-md-4">
                <label class="form-label">Filter by Event</label>
                <select class="form-select" id="eventFilter">
                    <option value="">All Events</option>
                    @foreach($registrations->unique('event_id')->pluck('event') as $event)
                        <option value="{{ $event->id }}">{{ $event->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Filter by Status</label>
                <select class="form-select" id="statusFilter">
                    <option value="">All Statuses</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle" id="registrationsTable">
                <thead>
                    <tr>
                        <th width="3%">
                            <input type="checkbox" class="form-check-input" id="selectAll">
                        </th>
                        <th width="25%">Registrant</th>
                        <th width="30%">Event</th>
                        <th width="10%">Date</th>
                        <th width="8%">Attendees</th>
                        <th width="12%">Status</th>
                        <th width="12%" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registrations as $registration)
                        <tr data-event="{{ $registration->event_id }}" data-status="{{ $registration->status }}">
                            <td>
                                <input type="checkbox" class="form-check-input registration-checkbox" value="{{ $registration->id }}">
                            </td>
                            <td>
                                <div>
                                    <div class="fw-semibold">{{ $registration->name }}</div>
                                    <small class="text-muted">
                                        <i class="fas fa-envelope me-1"></i>{{ $registration->email }}
                                    </small><br>
                                    @if($registration->phone)
                                        <small class="text-muted">
                                            <i class="fas fa-phone me-1"></i>{{ $registration->phone }}
                                        </small>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    @if($registration->event->image)
                                        <img src="{{ Storage::url($registration->event->image) }}" 
                                             alt="{{ $registration->event->title }}" 
                                             class="rounded" 
                                             style="width: 40px; height: 40px; object-fit: cover;">
                                    @endif
                                    <div>
                                        <div class="fw-semibold">{{ $registration->event->title }}</div>
                                        <small class="text-muted">
                                            <i class="fas fa-calendar me-1"></i>
                                            {{ $registration->event->event_date->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <small class="text-muted">{{ $registration->created_at->format('M d, Y') }}</small>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">
                                    <i class="fas fa-users me-1"></i>{{ $registration->number_of_attendees ?? 1 }}
                                </span>
                            </td>
                            <td>
                                @if($registration->status === 'confirmed')
                                    <span class="badge bg-success">Confirmed</span>
                                @elseif($registration->status === 'cancelled')
                                    <span class="badge bg-danger">Cancelled</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @if($registration->status !== 'confirmed')
                                            <li>
                                                <form action="{{ route('admin.registrations.confirm', $registration) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item text-success">
                                                        <i class="fas fa-check me-2"></i>Confirm
                                                    </button>
                                                </form>
                                            </li>
                                        @endif
                                        @if($registration->status !== 'cancelled')
                                            <li>
                                                <form action="{{ route('admin.registrations.cancel', $registration) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <i class="fas fa-times me-2"></i>Cancel
                                                    </button>
                                                </form>
                                            </li>
                                        @endif
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <button type="button" 
                                                    class="dropdown-item view-registration"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#registrationModal"
                                                    data-name="{{ $registration->name }}"
                                                    data-email="{{ $registration->email }}"
                                                    data-phone="{{ $registration->phone }}"
                                                    data-attendees="{{ $registration->number_of_attendees ?? 1 }}"
                                                    data-message="{{ $registration->message }}"
                                                    data-event="{{ $registration->event->title }}"
                                                    data-date="{{ $registration->created_at->format('M d, Y h:i A') }}">
                                                <i class="fas fa-eye me-2"></i>View Details
                                            </button>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('admin.registrations.destroy', $registration) }}" 
                                                  method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this registration?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger">
                                                    <i class="fas fa-trash me-2"></i>Delete
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="fas fa-calendar-check fa-3x text-muted mb-3"></i>
                                <p class="text-muted mb-0">No registrations yet</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Registration Details Modal -->
<div class="modal fade" id="registrationModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registration Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="text-muted small">Name:</label>
                        <div class="fw-semibold" id="modalName"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Event:</label>
                        <div class="fw-semibold" id="modalEvent"></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="text-muted small">Email:</label>
                        <div id="modalEmail"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Phone:</label>
                        <div id="modalPhone"></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="text-muted small">Number of Attendees:</label>
                        <div id="modalAttendees"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Registered:</label>
                        <div id="modalDate"></div>
                    </div>
                </div>
                <div class="mb-0">
                    <label class="text-muted small">Additional Message:</label>
                    <div class="p-3 bg-light rounded" id="modalMessage"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize DataTable
        const table = $('#registrationsTable').DataTable({
            "order": [[3, "desc"]],
            "columnDefs": [
                { "orderable": false, "targets": [0, 6] }
            ],
            "pageLength": 25
        });

        // Event Filter
        $('#eventFilter').on('change', function() {
            const eventId = $(this).val();
            if (eventId) {
                table.column(2).search(eventId).draw();
            } else {
                table.column(2).search('').draw();
            }
        });

        // Status Filter
        $('#statusFilter').on('change', function() {
            const status = $(this).val();
            if (status) {
                $('tbody tr').hide();
                $('tbody tr[data-status="' + status + '"]').show();
            } else {
                $('tbody tr').show();
            }
        });

        // Select All
        $('#selectAll').on('change', function() {
            $('.registration-checkbox').prop('checked', $(this).prop('checked'));
        });

        // View Registration Modal
        $('.view-registration').on('click', function() {
            $('#modalName').text($(this).data('name'));
            $('#modalEmail').text($(this).data('email'));
            $('#modalPhone').text($(this).data('phone') || '—');
            $('#modalAttendees').text($(this).data('attendees'));
            $('#modalEvent').text($(this).data('event'));
            $('#modalMessage').text($(this).data('message') || 'No additional message');
            $('#modalDate').text($(this).data('date'));
        });

        // Bulk Confirm
        $('#bulkConfirm').on('click', function() {
            const selected = $('.registration-checkbox:checked').map(function() {
                return $(this).val();
            }).get();

            if (selected.length === 0) {
                alert('Please select registrations to confirm');
                return;
            }

            if (confirm(`Confirm ${selected.length} registration(s)?`)) {
                $.ajax({
                    url: '{{ route("admin.registrations.bulk-confirm") }}',
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

        // Bulk Cancel
        $('#bulkCancel').on('click', function() {
            const selected = $('.registration-checkbox:checked').map(function() {
                return $(this).val();
            }).get();

            if (selected.length === 0) {
                alert('Please select registrations to cancel');
                return;
            }

            if (confirm(`Cancel ${selected.length} registration(s)?`)) {
                $.ajax({
                    url: '{{ route("admin.registrations.bulk-cancel") }}',
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
