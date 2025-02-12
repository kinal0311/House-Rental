<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// use App\Http\Requests\AdminStoreRequest;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.login-user');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();

            // Check if the user has access to the frontend (role_id 3)
            if ($user->role_id == 3) {
                return redirect()->route('home')->with('success', 'Successfully logged in!');
                // After successful login
// return redirect()->intended('/dashboard');

            }

            // If the user has role_id 1 or 2, log them in for the admin panel as well
            if (in_array($user->role_id, [1, 2])) {
                Auth::guard('admin')->login($user);  // Log them into the admin guard
            }

            return redirect()->route('home')->with('success', 'Successfully logged in!');
        }

        return redirect('login-user')->withErrors(['credentials' => 'Invalid email or password.']);
    }




}
