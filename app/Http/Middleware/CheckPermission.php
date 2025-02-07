<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

            // Example condition: if user is not logged in, redirect to login page
            if (!Auth::check()) {
                return redirect('login');
            }

            // Add any other custom checks here
            $user = Auth::user();
            // If the user doesn't have a valid role or permission, redirect them
            if ($user->role_id != 1 && $user->role_id != 2) {
                return redirect('master')->withErrors(['permission' => 'You do not have access to this page.']);
            }

            return $next($request);

    }
}
