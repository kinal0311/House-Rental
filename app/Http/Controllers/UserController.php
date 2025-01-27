<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
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
            // 3 => 'password',
            3 => 'gender',
            4 => 'phone_number',
            5 => 'dob',
            6 => 'status',
            7 => 'description',
            8 => 'address',
            9 => 'zip_code',
            10 => 'img',
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

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
                      ->orWhere('address', 'LIKE', "%{$search}%")
                      ->orWhere('zip_code', 'LIKE', "%{$search}%");
            });
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
                $nestedData['gender'] = Str::title($data->gender) ?? '';
                $nestedData['phone_number'] = $data->phone_number ?? '';
                $nestedData['dob'] = $data->dob ?? '';
                $nestedData['status'] = Str::title($data->status) ?? '';
                $nestedData['description'] = $data->description ?? '';
                $nestedData['address'] = $data->address ?? '';
                $nestedData['zip_code'] = $data->zip_code ?? '';
                $nestedData['img'] = $data->img
                    ? asset($data->img)
                    : asset('images/default.png');
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
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json(['success' => 'User deleted successfully.']);
    }

    public function userEdit($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        return view('admin.user.edit', compact('user','roles'));
    }

    public function update(Request $request, $id)
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
        $upadeData['email'] = $request['email'];
        $upadeData['phone_number'] = $request['phone_number'];
        $upadeData['dob'] = $request['dob'];
        $upadeData['address'] = $request['address'];
        $upadeData['zip_code'] = $request['zip_code'];
        $upadeData['gender'] = $request['gender'];
        $upadeData['description'] = $request['description'];
        $upadeData['status'] = $request['status'];

        $user->update($upadeData);

        return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.user.view', compact('user','roles'));
    }

    public function userChangeStatus($id, Request $request)
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
