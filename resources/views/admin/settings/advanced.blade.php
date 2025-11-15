@extends('admin.layouts.app')

@section('title', 'Advanced Settings')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Advanced Settings</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.settings.index') }}">Settings</a></li>
                <li class="breadcrumb-item active">Advanced</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Advanced Settings Tabs -->
        <ul class="nav nav-tabs mb-4" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#maintenance">
                    <i class="fas fa-wrench me-2"></i>Maintenance
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#performance">
                    <i class="fas fa-tachometer-alt me-2"></i>Performance
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#security">
                    <i class="fas fa-shield-alt me-2"></i>Security
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#backup">
                    <i class="fas fa-database me-2"></i>Backup
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <!-- Maintenance Mode -->
            <div class="tab-pane fade show active" id="maintenance">
                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="section" value="advanced">
                    
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Maintenance Mode</strong> - When enabled, only administrators can access the site
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="maintenance_mode" id="maintenance_mode" value="1" {{ setting('maintenance_mode') ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="maintenance_mode">
                                Enable Maintenance Mode
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Maintenance Message</label>
                        <textarea name="maintenance_message" class="form-control" rows="4">{{ old('maintenance_message', setting('maintenance_message', 'We are currently performing maintenance. Please check back soon.')) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Expected Return Time</label>
                        <input type="datetime-local" name="maintenance_until" class="form-control" value="{{ old('maintenance_until', setting('maintenance_until', '')) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Maintenance Settings
                    </button>
                </form>
            </div>

            <!-- Performance -->
            <div class="tab-pane fade" id="performance">
                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="section" value="performance">
                    
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="enable_caching" id="enable_caching" value="1" {{ setting('enable_caching', true) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="enable_caching">
                                Enable Caching
                            </label>
                        </div>
                        <small class="text-muted">Cache pages and database queries for faster loading</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Cache Duration (minutes)</label>
                        <input type="number" name="cache_duration" class="form-control" value="{{ old('cache_duration', setting('cache_duration', '60')) }}" min="0">
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="enable_image_optimization" id="enable_image_optimization" value="1" {{ setting('enable_image_optimization', true) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="enable_image_optimization">
                                Enable Image Optimization
                            </label>
                        </div>
                        <small class="text-muted">Automatically optimize uploaded images</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Max Image Upload Size (MB)</label>
                        <input type="number" name="max_image_size" class="form-control" value="{{ old('max_image_size', setting('max_image_size', '5')) }}" min="1" max="50">
                    </div>

                    <div class="mb-4">
                        <button type="button" class="btn btn-warning" onclick="clearCache()">
                            <i class="fas fa-broom me-2"></i>Clear All Cache
                        </button>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Performance Settings
                    </button>
                </form>
            </div>

            <!-- Security -->
            <div class="tab-pane fade" id="security">
                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="section" value="security">
                    
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="enable_recaptcha" id="enable_recaptcha" value="1" {{ setting('enable_recaptcha') ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="enable_recaptcha">
                                Enable reCAPTCHA on Forms
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">reCAPTCHA Site Key</label>
                                <input type="text" name="recaptcha_site_key" class="form-control" value="{{ old('recaptcha_site_key', setting('recaptcha_site_key', '')) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">reCAPTCHA Secret Key</label>
                                <input type="text" name="recaptcha_secret_key" class="form-control" value="{{ old('recaptcha_secret_key', setting('recaptcha_secret_key', '')) }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="enable_rate_limiting" id="enable_rate_limiting" value="1" {{ setting('enable_rate_limiting', true) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="enable_rate_limiting">
                                Enable Rate Limiting
                            </label>
                        </div>
                        <small class="text-muted">Limit the number of requests from a single IP</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Max Requests Per Minute</label>
                        <input type="number" name="rate_limit_max" class="form-control" value="{{ old('rate_limit_max', setting('rate_limit_max', '60')) }}" min="10">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Security Settings
                    </button>
                </form>
            </div>

            <!-- Backup -->
            <div class="tab-pane fade" id="backup">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    Regular backups help protect your data. Configure automatic backups below.
                </div>

                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="section" value="backup">
                    
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="enable_auto_backup" id="enable_auto_backup" value="1" {{ setting('enable_auto_backup') ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="enable_auto_backup">
                                Enable Automatic Backups
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Backup Frequency</label>
                        <select name="backup_frequency" class="form-select">
                            <option value="daily" {{ setting('backup_frequency', 'daily') === 'daily' ? 'selected' : '' }}>Daily</option>
                            <option value="weekly" {{ setting('backup_frequency') === 'weekly' ? 'selected' : '' }}>Weekly</option>
                            <option value="monthly" {{ setting('backup_frequency') === 'monthly' ? 'selected' : '' }}>Monthly</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Backup Retention (days)</label>
                        <input type="number" name="backup_retention" class="form-control" value="{{ old('backup_retention', setting('backup_retention', '30')) }}" min="1">
                        <small class="text-muted">Number of days to keep backups before deletion</small>
                    </div>

                    <div class="mb-4">
                        <button type="button" class="btn btn-success" onclick="createBackup()">
                            <i class="fas fa-download me-2"></i>Create Backup Now
                        </button>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Backup Settings
                    </button>
                </form>

                <hr class="my-4">

                <h5 class="mb-3">Recent Backups</h5>
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Size</th>
                                <th>Type</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4" class="text-center text-muted">No backups available</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function clearCache() {
    if (confirm('Are you sure you want to clear all cache? This may temporarily slow down the site.')) {
        fetch('{{ route("admin.settings.clear-cache") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message || 'Cache cleared successfully!');
            location.reload();
        })
        .catch(error => {
            alert('Error clearing cache. Please try again.');
        });
    }
}

function createBackup() {
    if (confirm('Create a backup of the database now?')) {
        fetch('{{ route("admin.settings.create-backup") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message || 'Backup created successfully!');
            location.reload();
        })
        .catch(error => {
            alert('Error creating backup. Please try again.');
        });
    }
}
</script>
@endpush
