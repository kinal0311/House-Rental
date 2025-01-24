<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
// use Illuminate\Http\Request;
use App\Http\Requests\AdminStoreRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.user.index');
    }

    public function getData(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'email',
            3 => 'password',
            4 => 'gender',
            5 => 'phone_number',
            6 => 'dob',
            7 => 'status',
            8 => 'description',
            9 => 'address',
            10 => 'zip_code',
            11 => 'img'
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        // Eager load the role relationship and filter by role_id = 3
        $allData = User::with('role:id,name')
            ->where('role_id', 3)
            ->orderBy($order, $dir);

        $totalData = $allData->count();
        $totalFiltered = $totalData;

        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $allData->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                      ->orWhere('email', 'LIKE', "%{$search}%")
                      ->orWhere('gender', 'LIKE', "%{$search}%")
                      ->orWhere('phone_number', 'LIKE', "%{$search}%")
                      ->orWhere('dob', 'LIKE', "%{$search}%")
                      ->orWhere('description', 'LIKE', "%{$search}%")
                      ->orWhere('address', 'LIKE', "%{$search}%")
                      ->orWhere('zip_code', 'LIKE', "%{$search}%")
                      ->orWhere('img', 'LIKE', "%{$search}%");
            });
            $totalFiltered = $allData->count();
        }

        // Apply pagination
        $allData = $allData->offset($start)
                           ->limit($limit)
                           ->get();

        $dataArray = array();
        if (!empty($allData)) {
            foreach ($allData as $data) {
                $nestedData['id'] = $data->id;
                $nestedData['name'] = Str::title($data->name) ?? '';
                $nestedData['email'] = $data->email ?? '';
                $nestedData['gender'] = Str::title($data->gender) ?? '';
                $nestedData['phone_number'] = $data->phone_number ?? '';
                $nestedData['dob'] = $data->dob ?? '';
                $nestedData['status'] = Str::title($data->status) ?? '';
                $nestedData['description'] = $data->description ?? '';
                $nestedData['address'] = $data->address ?? '';
                $nestedData['zip_code'] = $data->zip_code ?? '';
                $nestedData['img'] = $data->img
                    ? asset($data->img)
                    : asset('images/default.png'); // Default image path
                $nestedData['role'] = $data->role ? $data->role->name : 'No Role';
                $nestedData['edit_url'] = route('admin.user.edit',$data->id);
                $nestedData['view_url'] = route('admin.user.view',$data->id);
                $nestedData['actions'] = $data->id;

                $dataArray[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $dataArray
        );

        return response()->json($json_data);
    }

    public function destroy($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();

        // Return a JSON response indicating success
        return response()->json(['success' => 'User deleted successfully.']);
    }

    public function restore($id)
    {
        // Find the soft-deleted user
        $user = User::withTrashed()->findOrFail($id);

        // Restore the soft-deleted user
        $user->restore();

        return response()->json(['success' => 'User restored successfully.']);
    }

    public function userEdit($id)
    {
        // $user = User::withTrashed()->findOrFail($id);
        $user = User::find($id);
        $roles = Role::all();

        return view('admin.user.edit', compact('user','roles'));
    }

    public function update(Request $request, $id)
    {
        // Fetch the user by ID
        $user = User::findOrFail($id);

        // Get validated data
        $validatedData = $request->all();

        // Check if a new image is uploaded
        if ($request->hasFile('img')) {
            $image = $request->file('img');

            // Generate a new file name
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Move the file to the public directory
            $image->move(public_path('assets/images/users/'), $imageName);

            // Delete the old image if it exists
            // if ($user->img && file_exists(public_path($user->img))) {
            //     unlink(public_path($user->img));
            // }

            // Save the new image path
            $upadeData['img'] = 'assets/images/users/' . $imageName;
        }
        $upadeData['name'] = $request['name'];
        $upadeData['email'] = $request['email'];
        $upadeData['phone_number'] = $request['phone_number'];
        $upadeData['dob'] = $request['dob'];
        $upadeData['address'] = $request['address'];
        $upadeData['zip_code'] = $request['zip_code'];
        $upadeData['gender'] = $request['gender'];
        $upadeData['description'] = $request['description'];
        $upadeData['status'] = $request['status'];

        // Update user data
        $user->update($upadeData);

        return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
    }

    public function show($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);
        $roles = Role::all();

        // Return the view with the user data
        return view('admin.user.view', compact('user','roles'));
    }

}
