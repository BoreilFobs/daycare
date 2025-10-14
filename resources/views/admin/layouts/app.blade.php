<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') - {{ config('app.name', 'Admin Panel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />

    <!-- Custom Admin CSS -->
        <style>
            :root {
                --sidebar-width: 260px;
                --sidebar-collapsed-width: 80px;
                --header-height: 60px;
                --primary-color: #ff4880;
                --primary-dark: #e63d70;
                --secondary-color: #4d65f9;
                --sidebar-bg: #1E293B;
                --sidebar-text: #E2E8F0;
                --sidebar-text-hover: #FFFFFF;
                --sidebar-hover: #334155;
                --sidebar-active: #ff4880;
                --text-muted: #64748B;
            }        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #F8FAFC;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            transition: all 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }

        .sidebar-brand {
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-color), var(--sidebar-active));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            flex-shrink: 0;
        }

        .sidebar-brand-text {
            color: white;
            font-size: 18px;
            font-weight: 700;
            white-space: nowrap;
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .sidebar-brand-text {
            opacity: 0;
            width: 0;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-section-title {
            padding: 15px 20px 10px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--sidebar-text);
            opacity: 0.5;
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .menu-section-title {
            opacity: 0;
            height: 0;
            padding: 0;
        }

        .menu-item {
            position: relative;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: var(--sidebar-text);
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            border-left: 3px solid transparent;
        }

        .menu-link:hover {
            background: var(--sidebar-hover);
            color: var(--sidebar-text-hover);
            border-left-color: var(--sidebar-active);
        }

        .menu-link.active {
            background: var(--sidebar-hover);
            color: var(--sidebar-text-hover);
            border-left-color: var(--sidebar-active);
        }

        .menu-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 3px;
            background: var(--sidebar-active);
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .menu-text {
            font-size: 14px;
            font-weight: 500;
            white-space: nowrap;
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .menu-text {
            opacity: 0;
            width: 0;
        }

        .menu-badge {
            margin-left: auto;
            padding: 2px 8px;
            background: #EF4444;
            color: white;
            border-radius: 10px;
            font-size: 11px;
            font-weight: 600;
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .menu-badge {
            opacity: 0;
            width: 0;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        .sidebar.collapsed ~ .main-content {
            margin-left: var(--sidebar-collapsed-width);
        }

        /* Header */
        .admin-header {
            background: white;
            height: var(--header-height);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            border-bottom: 1px solid #E2E8F0;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .sidebar-toggle {
            width: 40px;
            height: 40px;
            border: none;
            background: #F1F5F9;
            border-radius: 10px;
            color: #64748B;
            cursor: pointer;
            transition: all 0.3s;
        }

        .sidebar-toggle:hover {
            background: #E2E8F0;
            color: #334155;
        }

        .breadcrumb {
            background: none;
            padding: 0;
            margin: 0;
            font-size: 14px;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            content: '›';
            color: #CBD5E1;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-search {
            position: relative;
            display: none;
        }

        @media (min-width: 768px) {
            .header-search {
                display: block;
            }
        }

        .header-search input {
            width: 300px;
            padding: 8px 40px 8px 15px;
            border: 1px solid #E2E8F0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s;
        }

        .header-search input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .header-search-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #94A3B8;
        }

        .header-icon-btn {
            width: 40px;
            height: 40px;
            border: none;
            background: transparent;
            color: #64748B;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
        }

        .header-icon-btn:hover {
            background: #F1F5F9;
            color: #334155;
        }

        .header-icon-btn .badge {
            position: absolute;
            top: 5px;
            right: 5px;
            padding: 2px 5px;
            font-size: 10px;
        }

        .user-dropdown {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 5px 10px 5px 5px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .user-dropdown:hover {
            background: #F1F5F9;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            object-fit: cover;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
            color: #1E293B;
            line-height: 1.2;
        }

        .user-role {
            font-size: 12px;
            color: #94A3B8;
        }

        /* Page Content */
        .page-content {
            padding: 30px;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #1E293B;
            margin-bottom: 5px;
        }

        .page-subtitle {
            color: #64748B;
            font-size: 14px;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 24px;
        }

        .card-header {
            background: white;
            border-bottom: 1px solid #F1F5F9;
            padding: 20px 24px;
            border-radius: 12px 12px 0 0 !important;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: #1E293B;
            margin: 0;
        }

        .card-body {
            padding: 24px;
        }

        /* Buttons */
        .btn {
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s;
        }

        .btn-primary {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        /* Alerts */
        .alert {
            border-radius: 10px;
            border: none;
            padding: 15px 20px;
            margin-bottom: 20px;
        }

        /* Tables */
        .table {
            font-size: 14px;
        }

        .table thead th {
            background: #F8FAFC;
            color: #64748B;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #E2E8F0;
        }

        /* Badges */
        .badge {
            padding: 4px 10px;
            border-radius: 6px;
            font-weight: 500;
            font-size: 12px;
        }

        /* Mobile Overlay */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .sidebar-overlay.show {
            display: block;
            opacity: 1;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0 !important;
            }

            .page-content {
                padding: 20px 15px;
            }

            .header-search {
                display: none;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr) !important;
            }
        }

        @media (max-width: 576px) {
            .stats-grid {
                grid-template-columns: 1fr !important;
            }

            .card-body {
                padding: 16px;
            }

            .page-header {
                padding: 15px;
            }

            .page-title {
                font-size: 20px;
            }
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Mobile Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="sidebar-brand-icon">
                <i class="fas fa-baby"></i>
            </div>
            <span class="sidebar-brand-text">Bébés Cameroun</span>
        </div>

        <nav class="sidebar-menu">
            <!-- Main -->
            <div class="menu-section-title">Main</div>
            <div class="menu-item">
                <a href="{{ route('admin.dashboard') }}" class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="menu-icon fas fa-home"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </div>

            <!-- Content Management -->
            <div class="menu-section-title">Content Management</div>
            
            <div class="menu-item">
                <a href="{{ route('admin.page-sections.index') }}" class="menu-link {{ request()->routeIs('admin.page-sections.*') ? 'active' : '' }}">
                    <i class="menu-icon fas fa-file-alt"></i>
                    <span class="menu-text">Page Sections</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('admin.services.index') }}" class="menu-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <i class="menu-icon fas fa-briefcase"></i>
                    <span class="menu-text">Services</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('admin.programs.index') }}" class="menu-link {{ request()->routeIs('admin.programs.*') ? 'active' : '' }}">
                    <i class="menu-icon fas fa-graduation-cap"></i>
                    <span class="menu-text">Programs</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('admin.events.index') }}" class="menu-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
                    <i class="menu-icon fas fa-calendar"></i>
                    <span class="menu-text">Events</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('admin.blog.index') }}" class="menu-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
                    <i class="menu-icon fas fa-blog"></i>
                    <span class="menu-text">Blog Posts</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('admin.gallery.index') }}" class="menu-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                    <i class="menu-icon fas fa-images"></i>
                    <span class="menu-text">Gallery</span>
                </a>
            </div>

            <!-- User Interactions -->
            <div class="menu-section-title">User Interactions</div>
            
            <div class="menu-item">
                <a href="{{ route('admin.comments.index') }}" class="menu-link {{ request()->routeIs('admin.comments.*') ? 'active' : '' }}">
                    <i class="menu-icon fas fa-comments"></i>
                    <span class="menu-text">Comments</span>
                    @if(isset($pendingCommentsCount) && $pendingCommentsCount > 0)
                        <span class="menu-badge">{{ $pendingCommentsCount }}</span>
                    @endif
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('admin.testimonials.index') }}" class="menu-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <i class="menu-icon fas fa-quote-right"></i>
                    <span class="menu-text">Testimonials</span>
                    @if(isset($pendingTestimonialsCount) && $pendingTestimonialsCount > 0)
                        <span class="menu-badge">{{ $pendingTestimonialsCount }}</span>
                    @endif
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('admin.messages.index') }}" class="menu-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                    <i class="menu-icon fas fa-envelope"></i>
                    <span class="menu-text">Messages</span>
                    @if(isset($unreadMessagesCount) && $unreadMessagesCount > 0)
                        <span class="menu-badge">{{ $unreadMessagesCount }}</span>
                    @endif
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('admin.registrations.index') }}" class="menu-link {{ request()->routeIs('admin.registrations.*') ? 'active' : '' }}">
                    <i class="menu-icon fas fa-user-check"></i>
                    <span class="menu-text">Registrations</span>
                    @if(isset($pendingRegistrationsCount) && $pendingRegistrationsCount > 0)
                        <span class="menu-badge">{{ $pendingRegistrationsCount }}</span>
                    @endif
                </a>
            </div>

            <!-- Team & About -->
            <div class="menu-section-title">Team & About</div>
            
            <div class="menu-item">
                <a href="{{ route('admin.team.index') }}" class="menu-link {{ request()->routeIs('admin.team.*') ? 'active' : '' }}">
                    <i class="menu-icon fas fa-users"></i>
                    <span class="menu-text">Team Members</span>
                </a>
            </div>

            <!-- Settings -->
            <div class="menu-section-title">Settings</div>
            
            <div class="menu-item">
                <a href="{{ route('admin.settings.index') }}" class="menu-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <i class="menu-icon fas fa-cog"></i>
                    <span class="menu-text">Site Settings</span>
                </a>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header -->
        <header class="admin-header">
            <div class="header-left">
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        @yield('breadcrumbs')
                    </ol>
                </nav>
            </div>

            <div class="header-right">
                <div class="header-search">
                    <input type="text" placeholder="Search...">
                    <i class="header-search-icon fas fa-search"></i>
                </div>

                <button class="header-icon-btn" title="Notifications">
                    <i class="fas fa-bell"></i>
                    @if(isset($totalPendingCount) && $totalPendingCount > 0)
                        <span class="badge bg-danger">{{ $totalPendingCount }}</span>
                    @endif
                </button>

                <div class="dropdown">
                    <div class="user-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}" class="user-avatar">
                        <div class="user-info d-none d-md-block">
                            <div class="user-name">{{ Auth::user()->name }}</div>
                            <div class="user-role">Administrator</div>
                        </div>
                        <i class="fas fa-chevron-down ms-2 text-muted" style="font-size: 12px;"></i>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.settings.index') }}"><i class="fas fa-cog me-2"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="page-content">
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- SortableJS -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

    <!-- Custom Admin JS -->
    <script>
        // Sidebar Toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function toggleSidebar() {
            if (window.innerWidth <= 992) {
                // Mobile: Show/hide sidebar
                sidebar.classList.toggle('show');
                sidebarOverlay.classList.toggle('show');
            } else {
                // Desktop: Collapse/expand sidebar
                sidebar.classList.toggle('collapsed');
            }
        }

        sidebarToggle.addEventListener('click', toggleSidebar);

        // Close sidebar when clicking overlay
        sidebarOverlay.addEventListener('click', function() {
            sidebar.classList.remove('show');
            sidebarOverlay.classList.remove('show');
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 992) {
                sidebar.classList.remove('show');
                sidebarOverlay.classList.remove('show');
            }
        });

        // Auto-hide alerts
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);

        // Initialize Select2
        if ($.fn.select2) {
            $('.select2').select2({
                theme: 'bootstrap-5'
            });
        }

        // Initialize Flatpickr
        if (typeof flatpickr !== 'undefined') {
            flatpickr('.datepicker', {
                dateFormat: 'Y-m-d',
            });

            flatpickr('.datetimepicker', {
                enableTime: true,
                dateFormat: 'Y-m-d H:i',
            });

            flatpickr('.timepicker', {
                enableTime: true,
                noCalendar: true,
                dateFormat: 'H:i',
            });
        }

        // Confirm Delete
        function confirmDelete(message) {
            return confirm(message || 'Are you sure you want to delete this item? This action cannot be undone.');
        }

        // CSRF Token for AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
