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

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.properties.index');
    }

    public function create()
    {
        $agents = User::where('role_id', 2)->get();
        return view('admin.properties.create', compact('agents'));
    }

    public function store(PropertyStoreRequest $request)
    {
        $requestData = $request->validated();

        $property = Property::create($requestData);

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

        return redirect()->route('admin.properties.index')
                         ->with('success', 'Property created successfully with images.');
    }

    public function getData(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'property_type',
            2 => 'image_url',
            3 => 'alt_text',
            4 => 'max_rooms',
            5 => 'beds',
            6 => 'baths',
            7 => 'price',
            8 => 'status',
            9 => 'area',
            10 => 'zip_code',
            11 => 'address',
            12 => 'city',
            13 => 'agent',
            14 => 'description',
            15 => 'additional_features',
        ];

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $query = Property::with(['agent', 'images'])->orderBy($order, $dir);
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

        return response()->json(['success' => 'Property and its images deleted successfully.']);
    }

    public function propertyEdit($id)
    {
        try {
            $property = Property::findOrFail($id);
            $agents = User::where('role_id', 2)->get();

            return view('admin.properties.edit', compact('property', 'agents'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to load property details.');
        }
    }

    public function update(PropertyStoreRequest $request, $id)
    {
        $validatedData = $request->validated();
        $property = Property::findOrFail($id);
        $property->update($validatedData);

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

        return redirect()->route('admin.properties.index')->with('success', 'Property updated successfully.');
    }

    public function show($id)
    {
        try {
            $property = Property::with('agent', 'images')->findOrFail($id);
            return view('admin.properties.view', compact('property'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Property not found.');
        }
    }
}
