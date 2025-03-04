<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\User;
use Validator;
use App\Http\Resources\AuthResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
     /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'role_id' => 'required|integer',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required|string|in:Male,Female,Other',
            'phone_number' => 'required|string|max:15',
            'dob' => 'required|date',
            'password' => 'required|string|min:6',
            'status' => 'required|boolean',
            'description' => 'required|string',
            'address' => 'required|string',
            'zip_code' => 'required|string|max:10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error.',
                'errors' => $validator->errors()
            ], 422);
        }

        $input = $request->only([
            'name', 'role_id', 'email', 'gender', 'phone_number',
            'dob', 'status', 'description', 'address', 'zip_code'
        ]);

        // Hash password before storing
        $input['password'] = Hash::make($request->password);

        if ($request->hasFile('img')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->img->extension();
            $request->img->move(public_path('assets/images/users'), $imageName);
            $input['img'] = 'assets/images/users/' . $imageName;
        }

        $user = User::create($input);

        return response()->json([
            'success' => true,
            'message' => 'User registered successfully.',
            'user' => new AuthResource($user)
        ], 201);
    }




    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = Auth::guard('api')->attempt($credentials);
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $success = $this->respondWithToken($token);
        return $this->sendResponse($success, 'User login successfully.');
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        return $this->sendResponse(new AuthResource(auth()->user()), 'User profile retrieved successfully.');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        try {


            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'role_id' => 'required|integer', // Ensure role_id is valid
                'email' => 'required|email|unique:users,email,' . $user->id,
                'gender' => 'required|string|in:Male,Female,Other',
                'phone_number' => 'required|string|max:15',
                'dob' => 'required|date',
                'password' => 'nullable|string|min:6', // Password should be nullable
                'status' => 'required|boolean',
                'description' => 'required|string',
                'address' => 'required|string',
                'zip_code' => 'required|string|max:10'
                // 'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation errors',
                    'errors' => $validator->errors(),
                ], 422);
            }

            // Prepare update data
            $updateData = $request->only([
                'name', 'role_id', 'email', 'gender', 'phone_number',
                'dob', 'status', 'description', 'address', 'zip_code'
            ]);

            // Hash password if provided
            if ($request->filled('password')) {
                $updateData['password'] = Hash::make($request->password);
            }

            if ($request->hasFile('img')) {
                $imageName = time() . '_' . uniqid() . '.' . $request->img->extension();
                $request->img->move(public_path('assets/images/users'), $imageName);
                $updateData['img'] = 'assets/images/users/' . $imageName;
            }

            $user->update($updateData);
            dd($updateData);

            return response()->json([
                'success' => true,
                'message' => 'Profile updated successfully',
                'user' => new AuthResource($user->fresh()),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Could not update profile',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return $this->sendResponse([], 'Successfully logged out.');
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        $success = $this->respondWithToken(auth()->refresh());

        return $this->sendResponse($success, 'Refresh token return successfully.');
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ];
    }
}
