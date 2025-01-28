<?php

namespace App\Http\Controllers;

use App\Models\PropertyImg; // Ensure this is correct
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyImgController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.property_image.index');
    }

    public function create()
    {
        // Fetch all properties from the database
        $properties = Property::all();
        return view('admin.property_image.create', compact('properties'));
    }

    public function store(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'property_id' => 'required|exists:properties,id', // Ensure the property exists
            'image_url' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048', // Validate the uploaded image
            'alt_text' => 'nullable|string|max:255', // Alt text is optional but should be a string
        ]);

        // Handle the uploaded image
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = time() . '_' . uniqid() . '.' . $image->extension();
            $image->move(public_path('assets/images/property_images/'), $imageName);

            // Save the data in the database
            PropertyImg::create([
                'property_id' => $validatedData['property_id'],
                'image_url' => 'assets/images/property_images/' . $imageName,
                'alt_text' => $validatedData['alt_text'],
            ]);

            return redirect()->route('admin.property_image.index')
                             ->with('success', 'Image stored successfully.');
        }

        return back()->with('error', 'Failed to upload the image.');
    }

    public function getData(Request $request)
{

    $columns = [
        0 => 'id',
        1 => 'property_id',
        2 => 'image_url',
        3 => 'alt_text',
    ];

    $limit = $request->input('length');
    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    $query = PropertyImg::with('property')->orderBy($order, $dir);

    $totalData = $query->count();
    $totalFiltered = $totalData;

    if (!empty($request->input('search.value'))) {
        $search = $request->input('search.value');

        $query->where('alt_text', 'LIKE', "%{$search}%")
              ->orWhereHas('property', function ($query) use ($search) {
                  $query->where('property_type', 'LIKE', "%{$search}%");
              });

        $totalFiltered = $query->count();
    }

    $images = $query->offset($start)
                    ->limit($limit)
                    ->get();

    $data = [];
    foreach ($images as $image) {
        $nestedData['id'] = $image->id;
        $nestedData['property_type'] = $image->property ? $image->property->property_type : 'N/A'; // Assumes Property model has a `name` field
        $nestedData['image_url'] = $image->image_url;
        $nestedData['alt_text'] = $image->alt_text ?? '';
        // $nestedData['edit_url'] = route('admin.property_images.edit', $image->id);
        // $nestedData['view_url'] = route('admin.property_images.view', $image->id);
        $data[] = $nestedData;
    }

    $json_data = [
        "draw" => intval($request->input('draw')),
        "recordsTotal" => intval($totalData),
        "recordsFiltered" => intval($totalFiltered),
        "data" => $data,
    ];

    return response()->json($json_data);
    dd($request->all());
}

public function destroy($id)
{
    $propertyImage = PropertyImg::findOrFail($id);

    // Soft delete the record
    $propertyImage->delete();
// dd($id);
    return response()->json(['success' => 'Property image soft-deleted successfully.']);
}

public function imageEdit($id)
{
    $propertyImage = PropertyImg::find($id);
    $property = Property::all();

    return view('admin.property_image.edit', compact('propertyImage','property'));
}

public function update(Request $request, $id)
{
    // Validate the input data
    $validatedData = $request->validate([
        'property_id' => 'required|exists:properties,id', // Ensure the property exists
        'image_url' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048', // Validate the uploaded image
        'alt_text' => 'nullable|string|max:255', // Alt text is optional but should be a string
    ]);

    $propertyImage = PropertyImg::findOrFail($id);

    $propertyImage->update($validatedData);

    return redirect()->route('admin.property_image.index')->with('success', 'User updated successfully.');
}

}

