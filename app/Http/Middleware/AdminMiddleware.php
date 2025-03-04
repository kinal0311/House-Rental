<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has role_id 1 or 2
        if (Auth::guard('admin')->check() && in_array(Auth::guard('admin')->user()->role_id, [1, 2])) {
            return $next($request); // Allow access to the admin panel
        }

        // Redirect non-admins to the frontend home page
        return redirect()->route('login')->with('error', 'Access Denied!');
    }

}

?>
