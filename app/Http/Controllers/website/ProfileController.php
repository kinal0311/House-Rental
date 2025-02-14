<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;


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
    public function update(Request $request)
    {
        try {
            $user = Auth::user(); // Get logged-in user

            // Validate the incoming request data
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone_number' => 'required|string|max:20',
                'dob' => 'required',
                'address' => 'required|string',
                'zip_code' => 'required|string|max:10',
                'gender' => 'required|string',
                'description' => 'nullable|string',
                // 'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
            ]);

            // Prepare the data to be updated (excluding the image)
            $updateData = $request->only([
                'name', 'email', 'phone_number', 'dob', 'address',
                'zip_code', 'gender', 'description'
            ]);

            // Handle image upload if exists
            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/images/users/'), $imageName);
                $updateData['img'] = 'assets/images/users/' . $imageName;
            }

            // Handle the date format for 'dob'
            if ($request->has('dob')) {
                $updateData['dob'] = Carbon::createFromFormat('d M Y', $request->dob)->format('Y-m-d');
            }

            // Update user data
            $user->update($updateData);

            // Redirect back to profile page with a success message
            return redirect()->route('myprofile')->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            // Log the error details for debugging
            Log::error('Error updating user', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            // Redirect back with error message
            return redirect()->route('myprofile')->with('error', 'Error updating profile.');
        }
    }







}
