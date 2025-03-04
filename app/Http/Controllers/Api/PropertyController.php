<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyImg;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\PropertyResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with('images')->get()->map(function ($property) {
            $property->agent_name = $property->agent_id; // Replace this with the actual agent name if needed
            unset($property->agent_id); // Remove agent_id from response
            return $property;
        });

        return PropertyResource::collection($properties);
    }


    public function store(Request $request)
    {

        // Validate request
        $request->validate([
            'property_type' => 'required',
            'max_rooms' => 'required|integer',
            'beds' => 'required|integer',
            'baths' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required',
            'area' => 'required',
            'zip_code' => 'required',
            'address' => 'required',
            'city' => 'required',
            'description' => 'nullable',
            'additional_features' => 'nullable|array',
            'payment_type' => 'nullable',
            'token_amount' => 'nullable|numeric',
            'property_status' => 'nullable',
            'image_url' => 'nullable|array',
            'image_url.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get authenticated user
        $user = Auth::user();

        if (!in_array($user->role_id, [1, 2])) {
            return response()->json(['error' => 'Unauthorized: Only admins or agents can add properties'], 403);
        }

        // Prepare property data
        $propertyData = $request->except(['image_url']);
        $propertyData['agent_id'] = $user->id;

        // Create property record
        $property = Property::create($propertyData);

        // Check and save images
        foreach ($request->file('image_url') as $image) {
            if ($image->isValid()) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = 'assets/images/property_images/' . $imageName;

                // Ensure directory exists
                $destinationPath = public_path('assets/images/property_images/');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                // Move image
                $image->move($destinationPath, $imageName);

                // Store in database
                PropertyImg::create([
                    'property_id' => $property->id,
                    'image_url' => $imagePath,
                    'alt_text' => '',
                ]);
            }
        }

        return new PropertyResource($property->load('images'));
    }



    public function show($id)
    {
        $property = Property::with('images')->findOrFail($id);
        $property->agent_name = $property->agent_id; // Use stored name
        unset($property->agent_id); // Remove agent_id from response

        return new PropertyResource($property);
    }


    public function searchProperties(Request $request)
    {
        $query = Property::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('property_type')) {
            $query->where('property_type', 'like', '%' . $request->property_type . '%');
        }

        if ($request->filled('address')) {
            $query->where('address', 'like', '%' . $request->address . '%');
        }

        if ($request->filled('max_rooms')) {
            $query->where('max_rooms', '<=', (int) $request->max_rooms);
        }

        if ($request->filled('beds')) {
            $query->where('beds', (int) $request->beds);
        }

        if ($request->filled('baths')) {
            $query->where('baths', (int) $request->baths);
        }

        if ($request->filled('price_min') && $request->filled('price_max')) {
            $query->whereBetween('price', [(int) $request->price_min, (int) $request->price_max]);
        }

        if ($request->filled('area_min') && $request->filled('area_max')) {
            $query->whereBetween('area', [(int) $request->area_min, (int) $request->area_max]);
        }

        $filtered_properties = $query->get();

        return response()->json([
            'status' => 'success',
            'properties' => $filtered_properties
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'property_type' => 'required',
            'max_rooms' => 'required|integer',
            'beds' => 'required|integer',
            'baths' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required',
            'area' => 'required',
            'zip_code' => 'required',
            'address' => 'required',
            'city' => 'required',
            'description' => 'nullable',
            'additional_features' => 'nullable|array',
            'payment_type' => 'nullable',
            'token_amount' => 'nullable|numeric',
            'property_status' => 'nullable',
            'image_url' => 'nullable|array',
        ]);

        $user = Auth::user();

        // Only allow Admin (role_id 1) or Agent (role_id 2) to update properties
        if (!in_array($user->role_id, [1, 2])) {
            return response()->json(['error' => 'Unauthorized: Only admins or agents can update properties'], 403);
        }

        // Find the property and ensure the agent can only update their own listings
        $property = Property::findOrFail($id);

        if ($user->role_id == 2 && $property->agent_id !== $user->id) {
            return response()->json(['error' => 'Unauthorized: Agents can only update their own properties'], 403);
        }

        // Assign the authenticated user's ID as the agent_id
        $propertyData = $request->all();
        $propertyData['agent_id'] = $user->id;

        $property->update($propertyData);

        // Handle new image uploads
        if ($request->hasFile('image_url')) {
            foreach ($request->file('image_url') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                $destinationPath = public_path('assets/images/property_images/');

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                $image->move($destinationPath, $imageName);

                PropertyImg::create([
                    'property_id' => $property->id,
                    'image_url' => 'assets/images/property_images/' . $imageName,
                    'alt_text' => '',
                ]);
            }
        }

        return new PropertyResource($property->load('images'));
    }


    public function destroy($id)
    {
        $property = Property::findOrFail($id);

        // Delete images from storage
        $images = PropertyImg::where('property_id', $id)->get();
        foreach ($images as $image) {
            Storage::disk('public')->delete($image->image_url);
        }

        // Delete images from database
        PropertyImg::where('property_id', $id)->delete();

        $property->delete();

        return response()->json(['message' => 'Property and its images deleted successfully']);
    }
}
