<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('sections.head')
    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->

        <div class="d-flex" id="wrapper">
            <!-- Sidebar Toggle Button (Mobile) -->
            <button class="btn btn-primary position-fixed d-lg-none" 
                    id="sidebarToggle" 
                    style="top: 10px; left: 10px; z-index: 1000;">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Sidebar -->
            <div class="border-end bg-white" id="sidebar-wrapper">
                @yield('sidebar')
            </div>

            <!-- Page Content -->
            <div id="page-content-wrapper" class="w-100">
                @yield('content')
            </div>
        </div>

        @include('sections.scripts')
        
        <!-- Dashboard specific styles -->
        <style>
            #wrapper {
                min-height: 100vh;
            }

            #sidebar-wrapper {
                width: 500px;
                min-height: 100vh;
                transition: margin 0.25s ease-out;
            }

            #sidebar-wrapper .sidebar-heading {
                padding: 0.875rem 1.25rem;
            }

            #page-content-wrapper {
                min-width: 100vw;
                background: #f8f9fa;
            }

            .sidebar-nav {
                width: 300px;
            }

            @media (min-width: 992px) {
                #page-content-wrapper {
                    min-width: 0;
                    width: 100%;
                }
            }

            /* Mobile sidebar collapse */
            @media (max-width: 991.98px) {
                #sidebar-wrapper {
                    margin-left: -300px;
                    position: fixed;
                    height: 100vh;
                    width: 300px;
                    z-index: 999;
                }

                #sidebar-wrapper.active {
                    margin-left: 0;
                }

                #page-content-wrapper {
                    margin-left: 0;
                }
            }

            /* Active state for sidebar items */
            .nav-link.active {
                color: var(--bs-primary) !important;
                background-color: rgba(var(--bs-primary-rgb), 0.1);
            }

            /* Hover effects */
            .nav-link:hover {
                background-color: rgba(var(--bs-primary-rgb), 0.05);
            }
        </style>

        <!-- Dashboard specific scripts -->
        <script>
            window.addEventListener('DOMContentLoaded', event => {
                // Toggle sidebar
                const sidebarToggle = document.getElementById('sidebarToggle');
                const wrapper = document.getElementById('wrapper');
                const sidebar = document.getElementById('sidebar-wrapper');

                if (sidebarToggle) {
                    sidebarToggle.addEventListener('click', event => {
                        event.preventDefault();
                        sidebar.classList.toggle('active');
                    });
                }

                // Close sidebar on mobile when clicking outside
                document.addEventListener('click', event => {
                    const isClickInside = sidebar.contains(event.target) || 
                                       sidebarToggle.contains(event.target);
                    
                    if (!isClickInside && window.innerWidth < 992 && 
                        sidebar.classList.contains('active')) {
                        sidebar.classList.remove('active');
                    }
                });

                // Handle dropdown toggles
                const dropdowns = document.querySelectorAll('[data-bs-toggle="collapse"]');
                dropdowns.forEach(dropdown => {
                    const icon = dropdown.querySelector('.fas.fa-chevron-down');
                    if (icon) {
                        dropdown.addEventListener('click', () => {
                            icon.style.transform = icon.style.transform === 'rotate(180deg)' 
                                ? 'rotate(0deg)' 
                                : 'rotate(180deg)';
                        });
                    }
                });
            });
        </script>
    </body>
</html>