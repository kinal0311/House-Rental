<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyStoreRequest;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.properties.index');
    }

    public function create()
    {
        $agents = User::all();
        return view('admin.properties.create', compact('agents'));
    }

    public function getData(Request $request)
    {
        // Define columns that match the property table fields
        $columns = array(
            0 => 'id',
            1 => 'property_type',
            2 => 'max_rooms',
            3 => 'beds',
            4 => 'baths',
            5 => 'price',
            6 => 'status',
            7 => 'area',
            8 => 'zip_code',
            9 => 'address',
            10 => 'city',
            11 => 'agent',
            12 => 'description',
            // 12 => 'media',
            13 => 'additional_features',
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        // Get the query builder for properties
        $query = Property::with('agent')->orderBy($order, $dir);

        // Count total records
        $totalData = $query->count();
        $totalFiltered = $totalData;

        // Apply search functionality
        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');

            $query->where('property_type', 'LIKE', "%{$search}%")
                ->orWhere('max_rooms', 'LIKE', "%{$search}%")
                ->orWhere('beds', 'LIKE', "%{$search}%")
                ->orWhere('baths', 'LIKE', "%{$search}%")
                ->orWhere('price', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->orWhere('area', 'LIKE', "%{$search}%")
                ->orWhere('zip_code', 'LIKE', "%{$search}%")
                ->orWhere('address', 'LIKE', "%{$search}%")
                ->orWhere('city', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->orWhere('additional_features', 'LIKE', "%{$search}%")
                ->orWhereHas('agent', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });

            $totalFiltered = $query->count(); // Update totalFiltered after search
        }

        // Apply pagination
        $allData = $query->offset($start)
                         ->limit($limit)
                         ->get();

        // Prepare data for DataTables
        $dataArray = [];
        if (!empty($allData)) {
            foreach ($allData as $data) {
                $nestedData['id'] = $data->id;
                $nestedData['property_type'] = Str::title($data->property_type) ?? '';
                $nestedData['max_rooms'] = $data->max_rooms ?? '';
                $nestedData['beds'] = $data->beds ?? '';
                $nestedData['baths'] = $data->baths ?? '';
                $nestedData['price'] = $data->price ?? '';
                $nestedData['status'] = Str::title($data->status) ?? '';
                $nestedData['area'] = $data->area ?? '';
                $nestedData['zip_code'] = $data->zip_code ?? '';
                $nestedData['address'] = $data->address ?? '';
                $nestedData['city'] = $data->city ?? '';
                $nestedData['agent'] = $data->agent ? $data->agent->name : 'No Agent';
                $nestedData['description'] = Str::limit($data->description, 50) ?? ''; // Limit description to 50 characters
                $nestedData['additional_features'] = $data->additional_features ?? '';
                $nestedData['edit_url'] = route('admin.properties.edit', $data->id);
                $nestedData['view_url'] = route('admin.properties.view',$data->id);
                $nestedData['actions'] = $data->id;

                $dataArray[] = $nestedData;
            }
        }

        // Return the JSON response for DataTables
        $json_data = [
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $dataArray
        ];

        return response()->json($json_data);
    }


    /**
    * Store a newly created resource in storage.
    */
    public function store(PropertyStoreRequest $request)
    {
        // dd($request->all());
        // Handle media file upload
        $requestData = $request->safe()->all();
    // Convert the additional features array to a comma-separated string
    // if ($request->has('additional_features')) {
    //     $requestData['additional_features'] = implode(', ', $request->input('additional_features'));
    // }
        // Store the property in the database
        Property::create($requestData);

        // Redirect with success message
        return redirect()->route('admin.properties.index')
                         ->with('success', 'Property created successfully.');
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the user by ID
        $property = Property::findOrFail($id);

        // Delete the user
        $property->delete();

        // Return a JSON response indicating success
        return response()->json(['success' => 'Property deleted successfully.']);
    }

    public function restore($id)
    {
        // Find the soft-deleted user
        $property = Property::withTrashed()->findOrFail($id);

        // Restore the soft-deleted user
        $property->restore();

        return response()->json(['success' => 'Property restored successfully.']);
    }

    public function propertyEdit($id)
    {
        // $user = User::withTrashed()->findOrFail($id);
        $property = Property::find($id);
        $agents = User::all();

        return view('admin.properties.edit', compact('property','agents'));
    }

    public function update(PropertyStoreRequest $request, $id)
    {
        // dd('Update function called');
        $validatedData = $request->safe()->all();

        // Fetch the user by ID
        $property = Property::findOrFail($id); // Ensure $user is defined

        // Update the user record
        $property->update($validatedData);

        return redirect()->route('admin.properties.index')->with('success', 'User updated successfully.');
    }

    public function show($id)
    {
        // Find the user by ID
        $property = Property::with('agent')->findOrFail($id);

        // Return the view with the user data
        return view('admin.properties.view', compact('property'));
    }

}
?>
