<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if locale is set in session
        if (Session::has('locale')) {
            $locale = Session::get('locale');
        } 
        // Check if locale is set in URL parameter
        elseif ($request->has('lang')) {
            $locale = $request->get('lang');
            Session::put('locale', $locale);
        }
        // Check browser language
        elseif ($request->hasHeader('Accept-Language')) {
            $browserLocale = substr($request->header('Accept-Language'), 0, 2);
            $locale = in_array($browserLocale, ['en', 'fr']) ? $browserLocale : 'en';
        }
        // Default to English
        else {
            $locale = 'en';
        }

        // Validate locale
        if (!in_array($locale, ['en', 'fr'])) {
            $locale = 'en';
        }

        App::setLocale($locale);
        Session::put('locale', $locale);

        return $next($request);
    }
}
