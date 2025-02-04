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


class SignUpController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.signup');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'role_id' => 'required',
            'email'=> 'required',
            'gender'=> 'required',
            'phone_number'=> 'required',
            'dob'=> 'required',
            'password' => 'required|string|min:6',
            'status' => 'required',
            'description'=> 'required',
            'address'=> 'required',
            'zip_code'=> 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('img')) {

            $imageName = $request->img->getClientOriginalName();

            $request->img->move(public_path('assets/images/users'), $imageName);

            $requestData['img'] = 'assets/images/users/' . $imageName;
        }

        User::create($validatedData);

        return redirect()->route('home')
                         ->with('success', 'Admin created successfully.');
    }
}
