<?php

use App\Http\Controllers\Admin\BlogCommentController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\EventRegistrationController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PageSectionController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| These routes are protected by auth and admin middleware
|
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/stats', [DashboardController::class, 'stats'])->name('stats');

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    Route::get('/settings/{key}', [SettingController::class, 'show'])->name('settings.show');
    Route::delete('/settings/{key}', [SettingController::class, 'destroy'])->name('settings.destroy');

    // Services
    Route::resource('services', ServiceController::class);
    Route::post('/services/reorder', [ServiceController::class, 'reorder'])->name('services.reorder');

    // Programs
    Route::resource('programs', ProgramController::class);
    Route::post('/programs/{program}/toggle-featured', [ProgramController::class, 'toggleFeatured'])
        ->name('programs.toggle-featured');

    // Events
    Route::resource('events', EventController::class);

    // Blog Posts
    Route::resource('blog', BlogPostController::class);
    Route::post('/blog/{blogPost}/toggle-publish', [BlogPostController::class, 'togglePublish'])
        ->name('blog.toggle-publish');

    // Team Members
    Route::resource('team', TeamMemberController::class);

    // Testimonials
    Route::get('/testimonials/pending', [TestimonialController::class, 'pending'])
        ->name('testimonials.pending');
    Route::post('/testimonials/{testimonial}/approve', [TestimonialController::class, 'approve'])
        ->name('testimonials.approve');
    Route::post('/testimonials/{testimonial}/reject', [TestimonialController::class, 'reject'])
        ->name('testimonials.reject');
    Route::post('/testimonials/{testimonial}/toggle-featured', [TestimonialController::class, 'toggleFeatured'])
        ->name('testimonials.toggle-featured');
    Route::resource('testimonials', TestimonialController::class)->except(['create', 'store']);

    // Gallery
    Route::resource('gallery', GalleryController::class)->except(['create', 'edit']);
    Route::post('/gallery/bulk-upload', [GalleryController::class, 'bulkUpload'])
        ->name('gallery.bulk-upload');

    // Blog Comments
    Route::get('/comments/pending', [BlogCommentController::class, 'pending'])
        ->name('comments.pending');
    Route::post('/comments/{comment}/approve', [BlogCommentController::class, 'approve'])
        ->name('comments.approve');
    Route::post('/comments/{comment}/reject', [BlogCommentController::class, 'reject'])
        ->name('comments.reject');
    Route::post('/comments/bulk-approve', [BlogCommentController::class, 'bulkApprove'])
        ->name('comments.bulk-approve');
    Route::post('/comments/bulk-delete', [BlogCommentController::class, 'bulkDelete'])
        ->name('comments.bulk-delete');
    Route::resource('comments', BlogCommentController::class)->only(['index', 'destroy']);

    // Contact Messages
    Route::get('/messages/unread', [ContactMessageController::class, 'unread'])
        ->name('messages.unread');
    Route::post('/messages/{message}/mark-as-read', [ContactMessageController::class, 'markAsRead'])
        ->name('messages.mark-as-read');
    Route::post('/messages/{message}/mark-as-replied', [ContactMessageController::class, 'markAsReplied'])
        ->name('messages.mark-as-replied');
    Route::post('/messages/{message}/archive', [ContactMessageController::class, 'archive'])
        ->name('messages.archive');
    Route::put('/messages/{message}/notes', [ContactMessageController::class, 'updateNotes'])
        ->name('messages.update-notes');
    Route::resource('messages', ContactMessageController::class)->only(['index', 'show', 'destroy']);

    // Event Registrations
    Route::get('/registrations/pending', [EventRegistrationController::class, 'pending'])
        ->name('registrations.pending');
    Route::post('/registrations/{registration}/confirm', [EventRegistrationController::class, 'confirm'])
        ->name('registrations.confirm');
    Route::post('/registrations/{registration}/cancel', [EventRegistrationController::class, 'cancel'])
        ->name('registrations.cancel');
    Route::put('/registrations/{registration}/notes', [EventRegistrationController::class, 'updateNotes'])
        ->name('registrations.update-notes');
    Route::resource('registrations', EventRegistrationController::class)->only(['index', 'show', 'destroy']);

    // Page Sections (Dynamic Content)
    Route::get('/pages', [PageSectionController::class, 'index'])->name('pages.index');
    Route::get('/pages/{page}/edit', [PageSectionController::class, 'edit'])->name('pages.edit');
    Route::put('/pages/{page}', [PageSectionController::class, 'update'])->name('pages.update');
    Route::post('/pages/sections', [PageSectionController::class, 'store'])->name('pages.sections.store');
    Route::delete('/pages/sections/{pageSection}', [PageSectionController::class, 'destroy'])
        ->name('pages.sections.destroy');
});
