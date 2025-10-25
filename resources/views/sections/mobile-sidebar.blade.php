<button class="btn btn-primary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
    <i class="fas fa-bars"></i> Menu
</button>

<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
    
    <div class="offcanvas-header bg-primary">
        <h5 class="offcanvas-title text-white" id="mobileSidebarLabel">Navigation Menu</h5>
        {{-- Use a lighter background for the close button --}}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    
    <div class="offcanvas-body p-0">
        {{-- Use a single list group for the main structure --}}
        <div class="list-group list-group-flush">
            
            {{-- Static Links --}}
            <a href="{{ route('home') }}" class="list-group-item list-group-item-action {{ request()->routeIs('home') ? 'active bg-primary text-white border-primary' : '' }}">
                <i class="fas fa-home me-3"></i> Home
            </a>
            <a href="{{ route('about') }}" class="list-group-item list-group-item-action {{ request()->routeIs('about') ? 'active bg-primary text-white border-primary' : '' }}">
                <i class="fas fa-info-circle me-3"></i> About
            </a>
            <a href="{{ route('services') }}" class="list-group-item list-group-item-action {{ request()->routeIs('services') ? 'active bg-primary text-white border-primary' : '' }}">
                <i class="fas fa-cog me-3"></i> Services
            </a>
            <a href="{{ route('programs') }}" class="list-group-item list-group-item-action {{ request()->routeIs('programs') ? 'active bg-primary text-white border-primary' : '' }}">
                <i class="fas fa-graduation-cap me-3"></i> Programs
            </a>
            <a href="{{ route('events') }}" class="list-group-item list-group-item-action {{ request()->routeIs('events') ? 'active bg-primary text-white border-primary' : '' }}">
                <i class="fas fa-calendar me-3"></i> Events
            </a>

            {{-- Collapsible Menu Item: Blog Management --}}
            <div class="list-group-item p-0">
                <a class="list-group-item list-group-item-action d-flex align-items-center"
                   data-bs-toggle="collapse" 
                   href="#mobileBlogManagement" 
                   role="button" 
                   aria-expanded="false" 
                   aria-controls="mobileBlogManagement">
                    <i class="fas fa-blog me-3"></i>
                    <span class="flex-grow-1 fw-bold">Blog Management</span>
                    {{-- Chevron for visual feedback --}}
                    <i class="fas fa-chevron-down ms-auto"></i>
                </a>
                
                <div class="collapse" id="mobileBlogManagement">
                    <div class="list-group list-group-flush ps-4">
                        <a href="#" class="list-group-item list-group-item-action border-0 py-2">
                            <i class="fas fa-plus-circle me-3"></i> Add Post
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0 py-2">
                            <i class="fas fa-comments me-3"></i> View Comments
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0 py-2">
                            <i class="fas fa-check-circle me-3"></i> Approve Testimonials
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0 py-2">
                            <i class="fas fa-tasks me-3"></i> Manage Categories
                        </a>
                    </div>
                </div>
            </div>

            {{-- Collapsible Menu Item: Pages --}}
            <div class="list-group-item p-0">
                <a class="list-group-item list-group-item-action d-flex align-items-center" 
                   data-bs-toggle="collapse" 
                   href="#mobilePagesManagement" 
                   role="button" 
                   aria-expanded="false" 
                   aria-controls="mobilePagesManagement">
                    <i class="fas fa-folder me-3"></i>
                    <span class="flex-grow-1 fw-bold">Pages</span>
                    {{-- Chevron for visual feedback --}}
                    <i class="fas fa-chevron-down ms-auto"></i>
                </a>
                
                <div class="collapse" id="mobilePagesManagement">
                    <div class="list-group list-group-flush ps-4">
                        <a href="{{ route('blog.index') }}" class="list-group-item list-group-item-action border-0 py-2 {{ request()->routeIs('blog.*') ? 'active bg-light border-0' : '' }}">
                            <i class="fas fa-newspaper me-3"></i> Our Blog
                        </a>
                        <a href="{{ route('team') }}" class="list-group-item list-group-item-action border-0 py-2 {{ request()->routeIs('team') ? 'active bg-light border-0' : '' }}">
                            <i class="fas fa-users me-3"></i> Our Team
                        </a>
                        <a href="{{ route('testimonials') }}" class="list-group-item list-group-item-action border-0 py-2 {{ request()->routeIs('testimonials') ? 'active bg-light border-0' : '' }}">
                            <i class="fas fa-quote-right me-3"></i> Testimonial
                        </a>
                        <a href="{{ route('contact') }}" class="list-group-item list-group-item-action border-0 py-2 {{ request()->routeIs('contact') ? 'active bg-light border-0' : '' }}">
                            <i class="fas fa-envelope me-3"></i> Contact
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>