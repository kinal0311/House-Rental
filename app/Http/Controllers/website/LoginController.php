<?php
namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('home'); // Redirect to home if already logged in
        }

        return view('frontend.login-user'); // Show login page only if not logged in
    }

    public function postLogin(Request $request)
    {
        // Validate the login inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user
        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();

            // Check if the user is inactive
            if ($user->status == 0) {
                Auth::guard('web')->logout(); // Logout the user
                return redirect()->back()->with('error', 'Your account is inactive. Please contact the admin.');
            }

            // Check if the user is a frontend user (role_id = 3)
            if ($user->role_id == 3) {
                return redirect()->route('home')->with('success', 'Successfully logged in!');
            }

            // If the user is an admin (role_id = 1 or 2)
            if (in_array($user->role_id, [1, 2])) {
                Auth::guard('admin')->login($user); // Log in as admin
            }

            // Redirect to the home page
            return redirect()->route('home')->with('success', 'Successfully logged in!');
        }

        // If credentials are invalid
        return redirect()->back()->with('error', 'Invalid email or password.');
    }
}
?>
