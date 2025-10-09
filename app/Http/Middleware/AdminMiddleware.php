<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // 1. Check if the user is authenticated
        if (Auth::check()) {
            
            // 2. Check if the authenticated user is an admin
            // We assume the user model has an 'is_admin' column set to true for admins
            if (Auth::user()->role == 'admin') {
                return $next($request); // User is admin, proceed with the request
            }
        }
        
        // If not authenticated or not admin, redirect to a login page or home page
        // You can use a dedicated 403 Forbidden page here if you prefer
        return redirect('/')->with('error', 'Accès refusé. Vous n\'êtes pas autorisé à accéder à cette zone.');

    }
}
