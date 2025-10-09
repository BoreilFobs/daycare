@extends('layouts.dashboard')

@section('sidebar')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<div class="sidebar-heading py-4 px-3 border-bottom">
    <a href="{{ route('home') }}" class="text-decoration-none">
        <h3 class="text-primary mb-0">Baby<span class="text-secondary">Care</span></h3>
    </a>
</div>
<div class="px-3 py-2">
    @include('sections.sidebar')
</div>
@endsection

@section('content')
<div class="container-fluid px-4">
    <!-- Top Navigation Bar -->
    <nav class="navbar navbar-expand navbar-light bg-white shadow-sm rounded-3 mb-4 mt-4">
        <div class="container-fluid px-3">
            <h4 class="navbar-brand mb-0">Welcome back, {{ Auth::user()?->name ?? 'Admin' }}</h4>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary rounded-pill btn-sm">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

                <!-- Stats Cards -->
                <div class="row g-4 mb-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-white rounded-3 p-4 shadow-sm h-100">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="bg-primary bg-opacity-10 p-2 rounded">
                                    <i class="fas fa-users fa-lg text-primary"></i>
                                </div>
                                <span class="badge bg-success">+3.5%</span>
                            </div>
                            <h3 class="mb-1">1,458</h3>
                            <p class="text-muted mb-0">Total Visitors</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-white rounded-3 p-4 shadow-sm h-100">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="bg-primary bg-opacity-10 p-2 rounded">
                                    <i class="fas fa-blog fa-lg text-primary"></i>
                                </div>
                                <span class="badge bg-info">New</span>
                            </div>
                            <h3 class="mb-1">24</h3>
                            <p class="text-muted mb-0">Blog Posts</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-white rounded-3 p-4 shadow-sm h-100">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="bg-primary bg-opacity-10 p-2 rounded">
                                    <i class="fas fa-comment fa-lg text-primary"></i>
                                </div>
                                <span class="badge bg-warning">5 Pending</span>
                            </div>
                            <h3 class="mb-1">98</h3>
                            <p class="text-muted mb-0">Comments</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-white rounded-3 p-4 shadow-sm h-100">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="bg-primary bg-opacity-10 p-2 rounded">
                                    <i class="fas fa-star fa-lg text-primary"></i>
                                </div>
                                <span class="badge bg-info">4.8/5</span>
                            </div>
                            <h3 class="mb-1">45</h3>
                            <p class="text-muted mb-0">Testimonials</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions & Recent Activity Grid -->
                <div class="row g-4">
                    <!-- Quick Actions -->
                    <div class="col-12 col-xl-5">
                        <div class="bg-white rounded-3 p-4 shadow-sm h-100">
                            <h5 class="mb-4">Quick Actions</h5>
                            <div class="row g-3">
                                <div class="col-6">
                                    <a href="#" class="d-flex align-items-center p-3 rounded border border-primary text-decoration-none">
                                        <div class="bg-primary bg-opacity-10 p-2 rounded">
                                            <i class="fas fa-plus-circle text-primary"></i>
                                        </div>
                                        <span class="ms-3 text-dark">New Post</span>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="#" class="d-flex align-items-center p-3 rounded border border-primary text-decoration-none">
                                        <div class="bg-primary bg-opacity-10 p-2 rounded">
                                            <i class="fas fa-comment text-primary"></i>
                                        </div>
                                        <span class="ms-3 text-dark">Comments</span>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="#" class="d-flex align-items-center p-3 rounded border border-primary text-decoration-none">
                                        <div class="bg-primary bg-opacity-10 p-2 rounded">
                                            <i class="fas fa-star text-primary"></i>
                                        </div>
                                        <span class="ms-3 text-dark">Reviews</span>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="#" class="d-flex align-items-center p-3 rounded border border-primary text-decoration-none">
                                        <div class="bg-primary bg-opacity-10 p-2 rounded">
                                            <i class="fas fa-cog text-primary"></i>
                                        </div>
                                        <span class="ms-3 text-dark">Settings</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="col-12 col-xl-7">
                        <div class="bg-white rounded-3 p-4 shadow-sm h-100">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="mb-0">Recent Activity</h5>
                                <a href="#" class="btn btn-sm btn-primary rounded-pill px-3">View All</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-0">Type</th>
                                            <th class="border-0">Description</th>
                                            <th class="border-0">Status</th>
                                            <th class="border-0">Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="bg-primary bg-opacity-10 p-2 rounded d-inline-block">
                                                    <i class="fas fa-comment text-primary"></i>
                                                </div>
                                            </td>
                                            <td>New comment on "Welcome to BabyCare"</td>
                                            <td><span class="badge bg-warning">Pending</span></td>
                                            <td><small class="text-muted">2h ago</small></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="bg-primary bg-opacity-10 p-2 rounded d-inline-block">
                                                    <i class="fas fa-star text-primary"></i>
                                                </div>
                                            </td>
                                            <td>New testimonial submitted</td>
                                            <td><span class="badge bg-info">New</span></td>
                                            <td><small class="text-muted">5h ago</small></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="bg-primary bg-opacity-10 p-2 rounded d-inline-block">
                                                    <i class="fas fa-blog text-primary"></i>
                                                </div>
                                            </td>
                                            <td>Blog post "Summer Activities" published</td>
                                            <td><span class="badge bg-success">Published</span></td>
                                            <td><small class="text-muted">1d ago</small></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashboard Content End -->
@endsection
