<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\GalleryImageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PageSectionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/services', [App\Http\Controllers\ServicesController::class, 'index'])->name('services');
Route::get('/programs', [App\Http\Controllers\ProgramsController::class, 'index'])->name('programs');
Route::get('/events', [App\Http\Controllers\EventsController::class, 'index'])->name('events');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/team', [App\Http\Controllers\TeamController::class, 'index'])->name('team');
Route::get('/testimonials', [App\Http\Controllers\TestimonialsController::class, 'index'])->name('testimonials');

/*
|--------------------------------------------------------------------------
| User Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/stats', [DashboardController::class, 'stats'])->name('stats');
    
    // Services Management
    Route::resource('services', ServiceController::class);
    Route::post('services/reorder', [ServiceController::class, 'reorder'])->name('services.reorder');
    
    // Programs Management
    Route::resource('programs', ProgramController::class);
    Route::post('programs/reorder', [ProgramController::class, 'reorder'])->name('programs.reorder');
    Route::patch('programs/{program}/toggle-featured', [ProgramController::class, 'toggleFeatured'])->name('programs.toggle-featured');
    
    // Events Management
    Route::resource('events', EventController::class);
    Route::post('events/reorder', [EventController::class, 'reorder'])->name('events.reorder');
    Route::patch('events/{event}/toggle-published', [EventController::class, 'togglePublished'])->name('events.toggle-published');
    
    // Blog Posts Management
    Route::resource('blog-posts', BlogPostController::class);
    Route::patch('blog-posts/{blog_post}/toggle-published', [BlogPostController::class, 'togglePublished'])->name('blog-posts.toggle-published');
    
    // Comments Management
    Route::resource('comments', CommentController::class)->except(['show', 'create', 'store', 'edit', 'update']);
    Route::post('comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
    Route::post('comments/{comment}/spam', [CommentController::class, 'markAsSpam'])->name('comments.spam');
    Route::post('comments/bulk-approve', [CommentController::class, 'bulkApprove'])->name('comments.bulk-approve');
    Route::post('comments/bulk-delete', [CommentController::class, 'bulkDelete'])->name('comments.bulk-delete');
    
    // Testimonials Management
    Route::resource('testimonials', TestimonialController::class)->except(['show']);
    Route::post('testimonials/reorder', [TestimonialController::class, 'reorder'])->name('testimonials.reorder');
    Route::patch('testimonials/{testimonial}/toggle-featured', [TestimonialController::class, 'toggleFeatured'])->name('testimonials.toggle-featured');
    
    // Contact Messages Management
    Route::resource('messages', MessageController::class)->except(['create', 'store', 'edit', 'update']);
    Route::post('messages/{message}/mark-read', [MessageController::class, 'markRead'])->name('messages.mark-read');
    Route::post('messages/{message}/mark-unread', [MessageController::class, 'markUnread'])->name('messages.mark-unread');
    
    // Event Registrations Management
    Route::resource('registrations', RegistrationController::class)->except(['create', 'store', 'edit', 'update', 'show']);
    Route::post('registrations/{registration}/confirm', [RegistrationController::class, 'confirm'])->name('registrations.confirm');
    Route::post('registrations/{registration}/cancel', [RegistrationController::class, 'cancel'])->name('registrations.cancel');
    Route::post('registrations/bulk-confirm', [RegistrationController::class, 'bulkConfirm'])->name('registrations.bulk-confirm');
    Route::post('registrations/bulk-cancel', [RegistrationController::class, 'bulkCancel'])->name('registrations.bulk-cancel');
    
    // Team Members Management
    Route::resource('team', TeamMemberController::class);
    Route::post('team/reorder', [TeamMemberController::class, 'reorder'])->name('team.reorder');
    
    // Gallery Management
    Route::resource('gallery', GalleryImageController::class);
    Route::post('gallery/reorder', [GalleryImageController::class, 'reorder'])->name('gallery.reorder');
    Route::post('gallery/bulk-delete', [GalleryImageController::class, 'bulkDelete'])->name('gallery.bulk-delete');
    
    // Settings Management
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
    
    // Page Sections Management
    Route::get('page-sections', [PageSectionController::class, 'index'])->name('page-sections.index');
    Route::post('page-sections', [PageSectionController::class, 'store'])->name('page-sections.store');
    Route::get('page-sections/{page}/edit', [PageSectionController::class, 'edit'])->name('page-sections.edit');
    Route::get('page-sections/{pageSection}/show', [PageSectionController::class, 'show'])->name('page-sections.show');
    Route::put('page-sections/{pageSection}', [PageSectionController::class, 'updateSection'])->name('page-sections.update-section');
    Route::delete('page-sections/{pageSection}', [PageSectionController::class, 'destroy'])->name('page-sections.destroy');
    Route::put('page-sections/page/{page}', [PageSectionController::class, 'update'])->name('page-sections.update');
});

require __DIR__.'/auth.php';
