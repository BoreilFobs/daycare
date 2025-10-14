@extends('admin.layouts.app')

@section('title', 'Site Settings')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Site Settings</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Settings</li>
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

        <!-- Settings Tabs -->
        <ul class="nav nav-tabs mb-4" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#general">
                    <i class="fas fa-cog me-2"></i>General
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#contact">
                    <i class="fas fa-address-book me-2"></i>Contact Info
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#social">
                    <i class="fas fa-share-alt me-2"></i>Social Media
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#appearance">
                    <i class="fas fa-palette me-2"></i>Appearance
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#seo">
                    <i class="fas fa-search me-2"></i>SEO
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#email">
                    <i class="fas fa-envelope me-2"></i>Email
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <!-- General Settings -->
            <div class="tab-pane fade show active" id="general">
                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="section" value="general">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Site Name</label>
                                <input type="text" name="site_name" class="form-control" value="{{ old('site_name', setting('site_name', 'Daycare')) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Site Tagline</label>
                                <input type="text" name="site_tagline" class="form-control" value="{{ old('site_tagline', setting('site_tagline', '')) }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Site Description</label>
                        <textarea name="site_description" class="form-control" rows="3">{{ old('site_description', setting('site_description', '')) }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Logo</label>
                                @if(setting('logo'))
                                    <div class="mb-2">
                                        <img src="{{ Storage::url(setting('logo')) }}" class="img-thumbnail" style="max-height: 100px;">
                                    </div>
                                @endif
                                <input type="file" name="logo" class="form-control" accept="image/*">
                                <small class="text-muted">Recommended size: 200x60px</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Favicon</label>
                                @if(setting('favicon'))
                                    <div class="mb-2">
                                        <img src="{{ Storage::url(setting('favicon')) }}" class="img-thumbnail" style="max-height: 50px;">
                                    </div>
                                @endif
                                <input type="file" name="favicon" class="form-control" accept="image/x-icon,image/png">
                                <small class="text-muted">Recommended size: 32x32px or 64x64px</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Timezone</label>
                                <select name="timezone" class="form-select">
                                    <option value="UTC" {{ setting('timezone', 'UTC') === 'UTC' ? 'selected' : '' }}>UTC</option>
                                    <option value="America/New_York" {{ setting('timezone') === 'America/New_York' ? 'selected' : '' }}>Eastern Time</option>
                                    <option value="America/Chicago" {{ setting('timezone') === 'America/Chicago' ? 'selected' : '' }}>Central Time</option>
                                    <option value="America/Denver" {{ setting('timezone') === 'America/Denver' ? 'selected' : '' }}>Mountain Time</option>
                                    <option value="America/Los_Angeles" {{ setting('timezone') === 'America/Los_Angeles' ? 'selected' : '' }}>Pacific Time</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Date Format</label>
                                <select name="date_format" class="form-select">
                                    <option value="Y-m-d" {{ setting('date_format', 'Y-m-d') === 'Y-m-d' ? 'selected' : '' }}>YYYY-MM-DD</option>
                                    <option value="m/d/Y" {{ setting('date_format') === 'm/d/Y' ? 'selected' : '' }}>MM/DD/YYYY</option>
                                    <option value="d/m/Y" {{ setting('date_format') === 'd/m/Y' ? 'selected' : '' }}>DD/MM/YYYY</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Currency</label>
                                <select name="currency" class="form-select">
                                    <option value="USD" {{ setting('currency', 'USD') === 'USD' ? 'selected' : '' }}>USD ($)</option>
                                    <option value="EUR" {{ setting('currency') === 'EUR' ? 'selected' : '' }}>EUR (€)</option>
                                    <option value="GBP" {{ setting('currency') === 'GBP' ? 'selected' : '' }}>GBP (£)</option>
                                    <option value="CAD" {{ setting('currency') === 'CAD' ? 'selected' : '' }}>CAD ($)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save General Settings
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="tab-pane fade" id="contact">
                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="section" value="contact">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="fas fa-phone text-primary me-2"></i>Phone Number
                                </label>
                                <input type="tel" name="contact_phone" class="form-control" value="{{ old('contact_phone', setting('contact_phone', '')) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="fas fa-envelope text-primary me-2"></i>Email Address
                                </label>
                                <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email', setting('contact_email', '')) }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>Physical Address
                        </label>
                        <textarea name="contact_address" class="form-control" rows="3">{{ old('contact_address', setting('contact_address', '')) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="fas fa-map text-primary me-2"></i>Google Maps Embed URL
                        </label>
                        <input type="url" name="contact_map_url" class="form-control" value="{{ old('contact_map_url', setting('contact_map_url', '')) }}">
                        <small class="text-muted">Get embed URL from Google Maps (Share → Embed a map)</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="fas fa-clock text-primary me-2"></i>Business Hours
                        </label>
                        <textarea name="business_hours" class="form-control" rows="5" placeholder="Monday - Friday: 7:00 AM - 6:00 PM&#10;Saturday: 8:00 AM - 4:00 PM&#10;Sunday: Closed">{{ old('business_hours', setting('business_hours', '')) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Contact Info
                    </button>
                </form>
            </div>

            <!-- Social Media -->
            <div class="tab-pane fade" id="social">
                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="section" value="social">
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="fab fa-facebook text-primary me-2"></i>Facebook URL
                        </label>
                        <input type="url" name="social_facebook" class="form-control" value="{{ old('social_facebook', setting('social_facebook', '')) }}" placeholder="https://facebook.com/yourpage">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="fab fa-twitter text-info me-2"></i>Twitter URL
                        </label>
                        <input type="url" name="social_twitter" class="form-control" value="{{ old('social_twitter', setting('social_twitter', '')) }}" placeholder="https://twitter.com/yourhandle">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="fab fa-instagram text-danger me-2"></i>Instagram URL
                        </label>
                        <input type="url" name="social_instagram" class="form-control" value="{{ old('social_instagram', setting('social_instagram', '')) }}" placeholder="https://instagram.com/yourhandle">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="fab fa-linkedin text-primary me-2"></i>LinkedIn URL
                        </label>
                        <input type="url" name="social_linkedin" class="form-control" value="{{ old('social_linkedin', setting('social_linkedin', '')) }}" placeholder="https://linkedin.com/company/yourcompany">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="fab fa-youtube text-danger me-2"></i>YouTube URL
                        </label>
                        <input type="url" name="social_youtube" class="form-control" value="{{ old('social_youtube', setting('social_youtube', '')) }}" placeholder="https://youtube.com/c/yourchannel">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Social Media Links
                    </button>
                </form>
            </div>

            <!-- Appearance -->
            <div class="tab-pane fade" id="appearance">
                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="section" value="appearance">
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Primary Color</label>
                                <input type="color" name="primary_color" class="form-control form-control-color" value="{{ old('primary_color', setting('primary_color', '#ff4880')) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Secondary Color</label>
                                <input type="color" name="secondary_color" class="form-control form-control-color" value="{{ old('secondary_color', setting('secondary_color', '#4d65f9')) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Accent Color</label>
                                <input type="color" name="accent_color" class="form-control form-control-color" value="{{ old('accent_color', setting('accent_color', '#ffc107')) }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Header Style</label>
                        <select name="header_style" class="form-select">
                            <option value="default" {{ setting('header_style', 'default') === 'default' ? 'selected' : '' }}>Default</option>
                            <option value="transparent" {{ setting('header_style') === 'transparent' ? 'selected' : '' }}>Transparent</option>
                            <option value="sticky" {{ setting('header_style') === 'sticky' ? 'selected' : '' }}>Sticky</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Footer Layout</label>
                        <select name="footer_layout" class="form-select">
                            <option value="default" {{ setting('footer_layout', 'default') === 'default' ? 'selected' : '' }}>Default (4 Columns)</option>
                            <option value="minimal" {{ setting('footer_layout') === 'minimal' ? 'selected' : '' }}>Minimal</option>
                            <option value="centered" {{ setting('footer_layout') === 'centered' ? 'selected' : '' }}>Centered</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Appearance Settings
                    </button>
                </form>
            </div>

            <!-- SEO -->
            <div class="tab-pane fade" id="seo">
                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="section" value="seo">
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', setting('meta_title', '')) }}">
                        <small class="text-muted">Recommended length: 50-60 characters</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', setting('meta_description', '')) }}</textarea>
                        <small class="text-muted">Recommended length: 150-160 characters</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords', setting('meta_keywords', '')) }}">
                        <small class="text-muted">Separate keywords with commas</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Google Analytics Tracking ID</label>
                        <input type="text" name="google_analytics" class="form-control" value="{{ old('google_analytics', setting('google_analytics', '')) }}" placeholder="UA-XXXXXXXXX-X or G-XXXXXXXXXX">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Google Search Console Verification Code</label>
                        <input type="text" name="google_verification" class="form-control" value="{{ old('google_verification', setting('google_verification', '')) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save SEO Settings
                    </button>
                </form>
            </div>

            <!-- Email -->
            <div class="tab-pane fade" id="email">
                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="section" value="email">
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Configure SMTP settings to send emails from your domain
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Admin Email</label>
                        <input type="email" name="admin_email" class="form-control" value="{{ old('admin_email', setting('admin_email', '')) }}">
                        <small class="text-muted">Email address to receive notifications and form submissions</small>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">SMTP Host</label>
                                <input type="text" name="smtp_host" class="form-control" value="{{ old('smtp_host', setting('smtp_host', '')) }}" placeholder="smtp.gmail.com">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">SMTP Port</label>
                                <input type="number" name="smtp_port" class="form-control" value="{{ old('smtp_port', setting('smtp_port', '587')) }}" placeholder="587">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">SMTP Username</label>
                                <input type="text" name="smtp_username" class="form-control" value="{{ old('smtp_username', setting('smtp_username', '')) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">SMTP Password</label>
                                <input type="password" name="smtp_password" class="form-control" value="{{ old('smtp_password', setting('smtp_password', '')) }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">SMTP Encryption</label>
                        <select name="smtp_encryption" class="form-select">
                            <option value="tls" {{ setting('smtp_encryption', 'tls') === 'tls' ? 'selected' : '' }}>TLS</option>
                            <option value="ssl" {{ setting('smtp_encryption') === 'ssl' ? 'selected' : '' }}>SSL</option>
                            <option value="none" {{ setting('smtp_encryption') === 'none' ? 'selected' : '' }}>None</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Email Settings
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
