<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\AdminStoreRequest;

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
            3 => 'role',
            4 => 'status',
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

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

        $allData = $allData->offset($start)
                           ->limit($limit)
                           ->get();

        $dataArray = array();
        if (!empty($allData)) {

            foreach ($allData as $data) {
                $nestedData['id'] = $data->id;
                $nestedData['name'] = Str::title($data->name) ?? '';
                $nestedData['email'] = $data->email ?? '';
                $nestedData['role'] = $data->role ? $data->role->name : 'No Role';
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

        $roles = Role::all();

        return view('admin.create', compact('roles'));
    }

    public function store(AdminStoreRequest $request)
    {

        $requestData = $request->safe()->all();

        if ($request->hasFile('img')) {

            $imageName = $request->img->getClientOriginalName();

            $request->img->move(public_path('assets/images/users'), $imageName);

            $requestData['img'] = 'assets/images/users/' . $imageName;
        }

        User::create($requestData);

        return redirect()->route('admin.admin.index')
                         ->with('success', 'Admin created successfully.');
    }

    public function destroy($id)
    {

        $user = User::findOrFail($id);

        $user->delete();

        return response()->json(['success' => 'User deleted successfully.']);
    }

    public function adminEdit($id)
    {

        $user = User::find($id);
        $roles = Role::all();

        return view('admin.edit', compact('user','roles'));
    }

    public function update(AdminStoreRequest $request, $id)
    {

        $user = User::findOrFail($id);

        $validatedData = $request->all();

        if ($request->hasFile('img')) {
            $image = $request->file('img');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('assets/images/users/'), $imageName);

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

        $user->update($upadeData);

        return redirect()->route('admin.admin.index')->with('success', 'User updated successfully.');
    }

    public function show($id)
    {

        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.view', compact('user','roles'));
    }

    public function adminChangeStatus($id, Request $request)
    {
        \Log::info($request->all());

        $validated = $request->validate([
            'status' => 'required|in:0,1',
        ]);

        $user = User::findOrFail($id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => true]);
    }


}

