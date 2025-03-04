<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyImg;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyStoreRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class PropertyController extends Controller
{
    public function index()
    {
        // $user = auth()->user();
        $user = Auth::guard('admin')->user();

        if (!$user) {
            abort(403, 'Unauthorized access');
        }

        if ($user->role_id == 1) {
            // Admin sees all properties
            $properties = Property::with('images')->get();
        } elseif ($user->role_id == 2) {
            // Agent sees only their uploaded properties
            $properties = Property::with('images')->where('agent_id', $user->id)->get();
        } else {
            abort(403, 'Unauthorized access');
        }
// dd($user->id);
        return view('admin.properties.index', compact('properties'));
    }



    public function create()
    {
        $agents = User::where('role_id', 2)->get();
        return view('admin.properties.create', compact('agents'));
    }

    public function store(PropertyStoreRequest $request)
    {
        $requestData = $request->validated();

        // Handle the 'payment_type' and 'token_amount' explicitly if needed
        $paymentType = $request->input('payment_type', 1); // Default to 1 (Full Payment)
        $tokenAmount = $request->input('token_amount'); // Nullable field

        // If payment type is 1 (Full Payment), set token_amount to null
        if ($paymentType == 1) {
            $tokenAmount = null;
        }

        $property = Property::create(array_merge($requestData, [
            'payment_type' => $paymentType,
            'token_amount' => $tokenAmount
        ]));

        // Handle Image Upload
        if ($request->hasFile('image_url')) {
            foreach ($request->file('image_url') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                $image->move(public_path('assets/images/property_images/'), $imageName);

                PropertyImg::create([
                    'property_id' => $property->id,
                    'image_url' => 'assets/images/property_images/' . $imageName,
                    'alt_text' => '', // Optional alt text field
                ]);
            }
        }

        return redirect()->route('admin.properties.index')->with('sweet_success', 'Property created successfully with images.');
    }



    public function getData(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'property_type',
            2 => 'image_url',
            3 => 'status',
            4 => 'address',
            5 => 'property_status',
        ];

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $user = Auth::guard('admin')->user();

        $query = Property::with(['agent', 'images']);

        if ($user->role_id == 2) {
            // Show only properties where the agent is the logged-in user
            $query->where('agent_id', $user->id);
        }

        $query->orderBy($order, $dir);

        $totalData = $query->count();
        $totalFiltered = $totalData;

        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $query->where(function ($query) use ($search) {
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
                    ->orWhere('payment_type', 'LIKE', "%{$search}%")
                    ->orWhere('token_amount', 'LIKE', "%{$search}%")
                    ->orWhere('property_status', 'LIKE', "%{$search}%")
                    ->orWhereHas('agent', function ($query) use ($search) {
                        $query->where('name', 'LIKE', "%{$search}%");
                    });
            });

            $totalFiltered = $query->count();
        }

        $allData = $query->offset($start)->limit($limit)->get();
        $dataArray = [];

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
            $nestedData['description'] = Str::limit($data->description, 50) ?? '';
            $nestedData['additional_features'] = $data->additional_features ?? '';
            $nestedData['payment_type'] = $data->payment_type == 1 ? '1' : '2';  // Display human-readable payment type
            $nestedData['token_amount'] = $data->token_amount ?? 'N/A';  // Show token amount if available
            $nestedData['property_status'] = $data->property_status == 1 ? 'Active' : 'Inactive'; // Show property status

            $nestedData['edit_url'] = route('admin.properties.edit', $data->id);
            $nestedData['view_url'] = route('admin.properties.view', $data->id);
            $nestedData['actions'] = $data->id;

            // Fetch property images (Show only the first image for listing)
            if ($data->images->isNotEmpty()) {
                $nestedData['image_url'] = asset($data->images->first()->image_url);
                $nestedData['alt_text'] = $data->images->first()->alt_text ?? '';
            } else {
                $nestedData['image_url'] = asset('assets/images/no-image.png'); // Default image
                $nestedData['alt_text'] = 'No Image Available';
            }

            $dataArray[] = $nestedData;
        }

        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $dataArray
        ]);
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);

        // Delete property images
        foreach ($property->images as $image) {
            $imagePath = public_path($image->image_url);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }

        $property->delete();

        return response()->json(['sweet_success' => 'Property and its images deleted successfully.']);
    }

    public function propertyEdit($id)
    {
        try {
            $property = Property::findOrFail($id);
            // dd($property);
            $agents = User::where('role_id', 2)->get();

            return view('admin.properties.edit', compact('property', 'agents'));
        } catch (\Exception $e) {
            return redirect()->back()->with('sweet_error', 'Failed to load property details.');
        }
    }

    public function update(PropertyStoreRequest $request, $id)
    {
        $validatedData = $request->validated();
        $property = Property::findOrFail($id);

        // Handle the 'payment_type' and 'token_amount' explicitly if needed
        $paymentType = $request->input('payment_type', 1); // Default to 1 (Full Payment)
        $tokenAmount = $request->input('token_amount'); // Nullable field

        // If payment type is 1 (Full Payment), set token_amount to null
        if ($paymentType == 1) {
            $tokenAmount = null;
        }

        $property->update(array_merge($validatedData, [
            'payment_type' => $paymentType,
            'token_amount' => $tokenAmount
        ]));

        // Handle New Image Upload
        if ($request->hasFile('image_url')) {
            foreach ($request->file('image_url') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                $image->move(public_path('assets/images/property_images/'), $imageName);

                PropertyImg::create([
                    'property_id' => $property->id,
                    'image_url' => 'assets/images/property_images/' . $imageName,
                    'alt_text' => '',
                ]);
            }
        }

        return redirect()->route('admin.properties.index')->with('sweet_success', 'Property updated successfully.');
    }

    public function show($id)
    {
        try {
            $property = Property::with('agent', 'images')->findOrFail($id);
            return view('admin.properties.view', compact('property'));
        } catch (\Exception $e) {
            return redirect()->back()->with('sweet_error', 'Property not found.');
        }
    }

    public function propertyChangeData($id, Request $request)
    {
        $property = Property::findOrFail($id);
        $property->property_status = $request->property_status;
        $property->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Status updated successfully.',
        ]);
    }

}
