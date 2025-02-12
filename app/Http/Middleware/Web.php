<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Web
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && in_array(Auth::user()->role_id == 3)) {
            dd('web');
            return $next($request); // Allow access to the admin panel
        }

        // Redirect non-admins to the frontend home page
        return redirect()->route('frontend.registration')->with('error', 'Access Denied!');

    }
}
