<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
use App\Models\Role;
use App\Http\Requests\AdminStoreRequest;

class AuthController extends Controller
{
    /**
     * Show login form.
     */
    public function index()
    {
        if (Auth::check()) {
            // Redirect logged-in users to the master page
            return redirect('master')->with('success', 'You are already logged in!');
        }

        return view('auth.login');
    }

//     public function index()
// {
//     if (Auth::guard('admin')->check()) {
//         return redirect()->route('admin.master'); // Redirect to master page if logged in
//     }

//     return view('auth.login');
// }

    /**
     * Handle login request.
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $user = Auth::guard('admin')->user();

            // Check if user is inactive
            if ($user->status == 0) {
                // Log out the user if inactive
                Auth::guard('admin')->logout();
                return response()->json(['success' => false, 'message' => 'Your account is inactive. Please contact the admin.'], 403);
            }

            if (in_array($user->role_id, [1, 2])) {
                // If login successful and user has proper role
                return response()->json(['success' => true, 'redirect' => route('admin.master')]);
            }

            // If user role is not authorized
            Auth::guard('admin')->logout();
            return response()->json(['success' => false, 'message' => 'You do not have access to the master.'], 403);
        }

        // If credentials are invalid
        return response()->json(['success' => false, 'message' => 'Invalid email or password.'], 401);
    }

    public function registration()
    {
        $roles = Role::where('id', '!=', 3)->get(); // Exclude role_id 3
        return view('auth.register', compact('roles'));
    }

    public function postRegistration(AdminStoreRequest $request)
    {
        // dd($request->all());
        try {
            $requestData = $request->safe()->all();

            // Check if there's an image in the request
            if ($request->hasFile('img')) {
                $imageName = time() . '_' . $request->img->getClientOriginalName(); // Prevent duplicate names
                $request->img->move(public_path('assets/images/users'), $imageName);
                $requestData['img'] = 'assets/images/users/' . $imageName;
            }

            // Create a new admin user
            User::create($requestData);
            // dd($user);
            // Redirect to login page with success message
            return redirect()->route('login')->with('success', 'Admin created successfully.');

        } catch (\Exception $e) {
            // Redirect back to registration page with error message & old input
            return redirect()->route('register')->with('error', $e->getMessage())->withInput();
        }
    }


    public function master()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();

            if (in_array($user->role_id, [1, 2])) {
                return view('layout.partials.master');
            }

            return redirect('login')->withErrors(['access' => 'You do not have access to the master.']);
        }

        return redirect('login')->withErrors(['auth' => 'Please log in first.']);
    }

    /**
     * Logout user.
     */
    public function logout(Request $request)
    {
        // Clear session and logout
        Session::flush();
        Auth::guard('admin')->logout();

        // Redirect to login page
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }


    public function myAccount()
    {
        $user = Auth::guard('admin')->user(); // Get logged-in user details
        // dd($user->img);
        return view('auth.account', compact('user')); // Pass user data to the view
    }

    public function updateAccount(Request $request)
    {
        // dd($request->all());
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role_id' => 'required|integer|in:1,2,3',
            'email' => 'required|email|unique:users,email,' . Auth::guard('admin')->id(),
            'gender' => 'required|in:male,female,other',
            'phone_number' => 'required|string|max:20',
            'dob' => 'required|date',
            'password' => 'nullable|min:6',
            'status' => 'required|in:1,0',
            'description' => 'nullable|string|max:1000',
            'address' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the authenticated user
        $user = User::find(Auth::guard('admin')->user()->id);
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Unauthorized access.'], 403);
        }

        // Update user information
        $user->name = $validated['name'];
        $user->role_id = $validated['role_id'];
        $user->email = $validated['email'];
        $user->gender = $validated['gender'];
        $user->phone_number = $validated['phone_number'];
        $user->dob = $validated['dob'];
        $user->status = $validated['status'];
        $user->description = $validated['description'] ?? $user->description; // Default to existing description if null
        $user->address = $validated['address'];
        $user->zip_code = $validated['zip_code'];

        // If password is provided, update it
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Handle image upload if present
        if ($request->hasFile('img')) {
            // Delete the old image if it exists
            if ($user->img && file_exists(public_path($user->img))) {
                unlink(public_path($user->img));
            }

            // Handle the new image upload
            $image = $request->file('img');
            if ($image->isValid()) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/images/users/'), $imageName);
                $user->img = 'assets/images/users/' . $imageName; // Store the image path
            } else {
                return response()->json(['success' => false, 'message' => 'Invalid image file.'], 400);
            }
        }

        // Save the updated user data
        $user->save();

        // Respond based on whether the request is AJAX or not
        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Account updated successfully!']);
        }

        // Redirect to the admin master page
        return redirect()->route('admin.master')->with('success', 'Account updated successfully!');
    }



}
?>
