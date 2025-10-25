<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Setting;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share site settings with all views (no cache for real-time updates)
        View::composer('*', function ($view) {
            $settings = Setting::all()->pluck('value', 'key');
            $view->with('siteSettings', $settings);
        });
    }
}
