@extends('admin.layouts.app')

@section('title', 'Messages')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Messages</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Messages</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Inbox</h5>
        <div class="btn-group btn-group-sm">
            <button type="button" class="btn btn-outline-primary" id="markAsRead">
                <i class="fas fa-check me-1"></i>Mark as Read
            </button>
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

        <!-- Filter Tabs -->
        <ul class="nav nav-pills mb-4" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="pill" href="#all-messages">
                    <i class="fas fa-inbox me-1"></i>All ({{ $messages->count() }})
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#unread-messages">
                    <i class="fas fa-envelope me-1"></i>Unread ({{ $messages->where('is_read', false)->count() }})
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#read-messages">
                    <i class="fas fa-envelope-open me-1"></i>Read ({{ $messages->where('is_read', true)->count() }})
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="all-messages">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="messagesTable">
                        <thead>
                            <tr>
                                <th width="3%">
                                    <input type="checkbox" class="form-check-input" id="selectAll">
                                </th>
                                <th width="20%">From</th>
                                <th width="15%">Contact</th>
                                <th width="40%">Message</th>
                                <th width="12%">Received</th>
                                <th width="10%" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $message)
                                <tr class="{{ $message->is_read ? '' : 'table-active fw-semibold' }}">
                                    <td>
                                        <input type="checkbox" class="form-check-input message-checkbox" value="{{ $message->id }}">
                                    </td>
                                    <td>
                                        <div>
                                            @if(!$message->is_read)
                                                <i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>
                                            @endif
                                            <span class="{{ $message->is_read ? '' : 'fw-bold' }}">{{ $message->name }}</span>
                                        </div>
                                        @if($message->subject)
                                            <small class="text-muted">{{ Str::limit($message->subject, 30) }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <small class="text-muted">
                                                <i class="fas fa-envelope me-1"></i>{{ $message->email }}
                                            </small>
                                        </div>
                                        @if($message->phone)
                                            <small class="text-muted">
                                                <i class="fas fa-phone me-1"></i>{{ $message->phone }}
                                            </small>
                                        @endif
                                    </td>
                                    <td>
                                        <p class="mb-0 small">{{ Str::limit($message->message, 80) }}</p>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" 
                                                    class="btn btn-outline-primary view-message"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#messageModal"
                                                    data-id="{{ $message->id }}"
                                                    data-name="{{ $message->name }}"
                                                    data-email="{{ $message->email }}"
                                                    data-phone="{{ $message->phone }}"
                                                    data-subject="{{ $message->subject }}"
                                                    data-message="{{ $message->message }}"
                                                    data-date="{{ $message->created_at->format('M d, Y h:i A') }}"
                                                    title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <form action="{{ route('admin.messages.destroy', $message) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this message?');">
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
                                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                        <p class="text-muted mb-0">No messages yet</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="unread-messages">
                <div class="list-group">
                    @forelse($messages->where('is_read', false) as $message)
                        <div class="list-group-item list-group-item-action">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between mb-2">
                                        <h6 class="mb-0">
                                            <i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>
                                            {{ $message->name }}
                                        </h6>
                                        <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-1 text-muted">{{ Str::limit($message->message, 100) }}</p>
                                    <small class="text-muted">
                                        <i class="fas fa-envelope me-1"></i>{{ $message->email }}
                                    </small>
                                </div>
                                <div class="ms-3">
                                    <button class="btn btn-sm btn-primary view-message"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#messageModal"
                                            data-id="{{ $message->id }}"
                                            data-name="{{ $message->name }}"
                                            data-email="{{ $message->email }}"
                                            data-phone="{{ $message->phone }}"
                                            data-subject="{{ $message->subject }}"
                                            data-message="{{ $message->message }}"
                                            data-date="{{ $message->created_at->format('M d, Y h:i A') }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">
                            <p class="text-muted mb-0">No unread messages</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="tab-pane fade" id="read-messages">
                <div class="list-group">
                    @forelse($messages->where('is_read', true) as $message)
                        <div class="list-group-item">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between mb-2">
                                        <h6 class="mb-0">{{ $message->name }}</h6>
                                        <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-1 text-muted">{{ Str::limit($message->message, 100) }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">
                            <p class="text-muted mb-0">No read messages</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Message Modal -->
<div class="modal fade" id="messageModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Message Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="text-muted small">From:</label>
                    <div class="fw-semibold" id="modalName"></div>
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
                <div class="mb-3">
                    <label class="text-muted small">Subject:</label>
                    <div id="modalSubject"></div>
                </div>
                <div class="mb-3">
                    <label class="text-muted small">Message:</label>
                    <div class="p-3 bg-light rounded" id="modalMessage"></div>
                </div>
                <div class="mb-0">
                    <label class="text-muted small">Received:</label>
                    <div id="modalDate"></div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" id="replyEmail" class="btn btn-primary">
                    <i class="fas fa-reply me-2"></i>Reply via Email
                </a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Select All
        $('#selectAll').on('change', function() {
            $('.message-checkbox').prop('checked', $(this).prop('checked'));
        });

        // View Message Modal
        $('.view-message').on('click', function() {
            const messageId = $(this).data('id');
            $('#modalName').text($(this).data('name'));
            $('#modalEmail').text($(this).data('email'));
            $('#modalPhone').text($(this).data('phone') || '—');
            $('#modalSubject').text($(this).data('subject') || '—');
            $('#modalMessage').text($(this).data('message'));
            $('#modalDate').text($(this).data('date'));
            $('#replyEmail').attr('href', 'mailto:' + $(this).data('email'));

            // Mark as read
            $.ajax({
                url: '/admin/messages/' + messageId + '/mark-read',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function() {
                    $('tr').find('input[value="' + messageId + '"]').closest('tr')
                        .removeClass('table-active fw-semibold')
                        .find('.fa-circle').remove();
                }
            });
        });

        // Mark as Read
        $('#markAsRead').on('click', function() {
            const selected = $('.message-checkbox:checked').map(function() {
                return $(this).val();
            }).get();

            if (selected.length === 0) {
                alert('Please select messages to mark as read');
                return;
            }

            if (confirm(`Mark ${selected.length} message(s) as read?`)) {
                // Mark each message as read individually
                let completed = 0;
                selected.forEach(function(id) {
                    $.ajax({
                        url: '/admin/messages/' + id + '/mark-read',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function() {
                            completed++;
                            if (completed === selected.length) {
                                location.reload();
                            }
                        }
                    });
                });
            }
        });

        // Bulk Delete
        $('#bulkDelete').on('click', function() {
            const selected = $('.message-checkbox:checked').map(function() {
                return $(this).val();
            }).get();

            if (selected.length === 0) {
                alert('Please select messages to delete');
                return;
            }

            if (confirm(`Delete ${selected.length} message(s)? This action cannot be undone.`)) {
                // Delete each message individually
                let completed = 0;
                selected.forEach(function(id) {
                    $.ajax({
                        url: '/admin/messages/' + id,
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function() {
                            completed++;
                            if (completed === selected.length) {
                                location.reload();
                            }
                        }
                    });
                });
            }
        });
    });
</script>
@endpush
