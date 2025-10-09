<div class="bg-white shadow-sm rounded p-4">
    <div class="sidebar-header mb-4">
        <h4 class="text-primary mb-0">Dashboard</h4>
    </div>

    <div class="sidebar-nav">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link text-dark {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt me-2 text-primary"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link text-dark {{ request()->routeIs('about') ? 'active' : '' }}">
                    <i class="fas fa-building me-2 text-primary"></i> About Us
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('services') }}" class="nav-link text-dark {{ request()->routeIs('services') ? 'active' : '' }}">
                    <i class="fas fa-hand-holding-heart me-2 text-primary"></i> Our Services
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('programs') }}" class="nav-link text-dark {{ request()->routeIs('programs') ? 'active' : '' }}">
                    <i class="fas fa-child me-2 text-primary"></i> Programs
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('events') }}" class="nav-link text-dark {{ request()->routeIs('events') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check me-2 text-primary"></i> Events
                </a>
            </li>
            
            <!-- Blog Management Dropdown -->
            <li class="nav-item">
                <a class="nav-link text-dark d-flex justify-content-between align-items-center" 
                   data-bs-toggle="collapse" 
                   href="#blogManagement" 
                   role="button">
                    <span><i class="fas fa-pencil-alt me-2 text-primary"></i> Content Management</span>
                    <i class="fas fa-chevron-down"></i>
                </a>
                <div class="collapse" id="blogManagement">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-dark">
                                <i class="fas fa-feather me-2 text-primary"></i> Write Post
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-dark">
                                <i class="fas fa-comment-dots me-2 text-primary"></i> Comments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-dark">
                                <i class="fas fa-star me-2 text-primary"></i> Reviews
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-dark">
                                <i class="fas fa-tags me-2 text-primary"></i> Categories
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Pages Dropdown -->
            <li class="nav-item">
                <a class="nav-link text-dark d-flex justify-content-between align-items-center" 
                   data-bs-toggle="collapse" 
                   href="#pagesManagement" 
                   role="button">
                    <span><i class="fas fa-file-alt me-2 text-primary"></i> Website Pages</span>
                    <i class="fas fa-chevron-down"></i>
                </a>
                <div class="collapse" id="pagesManagement">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a href="{{ route('blog') }}" class="nav-link text-dark {{ request()->routeIs('blog') ? 'active' : '' }}">
                                <i class="fas fa-rss me-2 text-primary"></i> Blog Posts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('team') }}" class="nav-link text-dark {{ request()->routeIs('team') ? 'active' : '' }}">
                                <i class="fas fa-user-friends me-2 text-primary"></i> Team Members
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('testimonials') }}" class="nav-link text-dark {{ request()->routeIs('testimonials') ? 'active' : '' }}">
                                <i class="fas fa-comment-alt me-2 text-primary"></i> Testimonials
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link text-dark {{ request()->routeIs('contact') ? 'active' : '' }}">
                                <i class="fas fa-phone-alt me-2 text-primary"></i> Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>