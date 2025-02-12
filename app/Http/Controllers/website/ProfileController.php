<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function myProfile()
    {
        $user = Auth::user(); // Get the logged-in user
        return view('frontend.myprofile', compact('user'));
    }

    public function logoutUser(Request $request)
    {
        Auth::guard('web')->logout(); // Log out from frontend
    return redirect()->route('login-user')->with('success', 'Logged out successfully.');
    }


}
