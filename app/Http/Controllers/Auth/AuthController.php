<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
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

    /**
     * Show registration form.
     */
    // public function registration()
    // {
    //     return view('auth.registration');
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

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if (in_array($user->role_id, [1, 2])) {
            // If login successful and user has proper role
            return response()->json(['success' => true, 'redirect' => route('master')]);
        }

        // If user role is not authorized
        Auth::logout();
        return response()->json(['success' => false, 'message' => 'You do not have access to the master.'], 403);
    }

    // If credentials are invalid
    return response()->json(['success' => false, 'message' => 'Invalid email or password.'], 401);
}


    /**
     * Handle registration request.
     */
    // public function postRegistration(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|min:6',
    //         'role_id' => 'required|integer|in:1,2,3',
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'role_id' => $request->role_id,
    //     ]);

    //     Auth::login($user);

    //     return redirect('master')->with('success', 'Registration successful!');
    // }

    public function master()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if (in_array($user->role_id, [1, 2])) {
                return view('master');
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
        Auth::logout();

        // Redirect to login page
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }


    public function myAccount()
    {
        $user = Auth::user(); // Get logged-in user details
        return view('auth.account', compact('user')); // Pass user data to the view
    }

    public function updateAccount(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role_id' => 'required|integer|in:1,2,3',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'gender' => 'required|in:male,female,other',
            'phone_number' => 'required|string|max:15',
            'dob' => 'required|date',
            'password' => 'nullable|min:6',
            'status' => 'required|in:active,inactive',
            'description' => 'nullable|string|max:1000',
            'address' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->phone_number = $request->phone_number;
        $user->dob = $request->dob;
        $user->status = $request->status;
        $user->description = $request->description;
        $user->address = $request->address;
        $user->zip_code = $request->zip_code;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('account')->with('success', 'Account updated successfully!');
    }

}
?>
