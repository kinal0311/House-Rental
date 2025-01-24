<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\AdminStoreRequest;
// use Illuminate\Http\RedirectResponse;


class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.index');
    }

    public function getData(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'email',
            3 => 'role', // This will be the role name
            4 => 'status',
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        // Eager load the role relationship
        $allData = User::with('role')->orderBy($order, $dir);
        $totalData = $allData->count();
        $totalFiltered = $totalData;

        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $allData->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('status', 'LIKE', "%{$search}%");
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
                $nestedData['role'] = $data->role ? $data->role->name : 'No Role'; // Access the role name
                $nestedData['status'] = Str::title($data->status) ?? '';
                $nestedData['edit_url'] = route('admin.edit',$data->id);
                $nestedData['view_url'] = route('admin.view',$data->id);
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

        echo json_encode($json_data);
    }


    public function create(): View
    {
        // Get all roles from the roles table
        $roles = Role::all();

        // dd($roles);
        // Pass the roles to the view
        return view('admin.create', compact('roles'));
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStoreRequest $request)
    {

        $requestData = $request->safe()->all();

        // Check if the image is uploaded
        if ($request->hasFile('img')) {

            $imageName = $request->img->getClientOriginalName();

            // Store the image in the public/images directory
            $request->img->move(public_path('assets/images/users'), $imageName);

            // Store the relative path in the database (e.g., images/filename.jpg)
            $requestData['img'] = 'assets/images/users/' . $imageName;
        }

        // Create the user with the validated data
        User::create($requestData);

        // Redirect with success message
        return redirect()->route('admin.admin.index')
                         ->with('success', 'Admin created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
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

    public function adminEdit($id)
    {
        // $user = User::withTrashed()->findOrFail($id);
        $user = User::find($id);
        $roles = Role::all();

        return view('admin.edit', compact('user','roles'));
    }

    public function update(AdminStoreRequest $request, $id)
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
        $upadeData['role_id'] = $request['role_id'];
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

        return redirect()->route('admin.admin.index')->with('success', 'User updated successfully.');
    }




    public function show($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);
        $roles = Role::all();

        // Return the view with the user data
        return view('admin.view', compact('user','roles'));
    }

}

