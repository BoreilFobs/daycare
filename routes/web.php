<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ProgramsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Language Switcher Route
|--------------------------------------------------------------------------
*/
Route::get('/language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fr'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('language.switch');

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home - primary route name is 'home', 'welcome' is an alias
Route::get('/', [HomeController::class, 'index'])->name('home');

// About
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Services
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/services/{id}', [ServicesController::class, 'show'])->name('services.show');

// Programs
Route::get('/programs', [ProgramsController::class, 'index'])->name('programs');
Route::get('/programs/{id}', [ProgramsController::class, 'show'])->name('programs.show');

// Events
Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/events/{id}', [EventsController::class, 'show'])->name('events.show');
Route::post('/events/{event}/register', [EventsController::class, 'register'])->name('events.register');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/blog/{post}/comment', [BlogController::class, 'storeComment'])->name('blog.comment');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Team
Route::get('/team', [TeamController::class, 'index'])->name('team');

// Testimonials
Route::get('/testimonials', [TestimonialsController::class, 'index'])->name('testimonials');

// Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// FAQ
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

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

require __DIR__.'/auth.php';
