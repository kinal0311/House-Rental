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

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role_id == 3) {
                return redirect()->route('home')->with('success', 'Successfully logged in!');
            }

            Auth::logout();
            return redirect('login-user')->withErrors(['access' => 'Only users are allowed to log in.']);
        }

        return redirect('login-user')->withErrors(['credentials' => 'Invalid email or password.']);
    }




}
