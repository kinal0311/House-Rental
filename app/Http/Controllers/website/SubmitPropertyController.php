<?php
namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyImg;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SubmitPropertyController extends Controller
{
    public function index(Request $request)
    {
        $agents = User::where('role_id', 2)->get();
        //return view('frontend.submit-property', compact('agents'));
        return view('frontend.wizard', compact('agents'));
    }

    public function store(Request $request)
    {
        // Validate the data based on the form fields
        $validatedData = $request->validate([
            'property_type' => 'required',
            'max_rooms' => 'required',
            'beds' => 'required',
            'baths' => 'required',
            'price' => 'required',
            'status' => 'required|in:Sale,Sold,Rent',
            'area' => 'required',
            'zip_code' => 'required',
            'address' => 'required',
            'city' => 'required',
            'agent_id' => 'required|exists:users,id',
            'description' => 'required',
            'additional_features' => 'required|array|min:1', // Ensure it's an array with at least one feature selected
        ]);

        // Create the Property record
        $property = Property::create([
            'property_type' => $validatedData['property_type'],
            'max_rooms' => $validatedData['max_rooms'],
            'beds' => $validatedData['beds'],
            'baths' => $validatedData['baths'],
            'price' => $validatedData['price'],
            'status' => $validatedData['status'],
            'area' => $validatedData['area'],
            'zip_code' => $validatedData['zip_code'],
            'address' => $validatedData['address'],
            'city' => $validatedData['city'],
            'agent_id' => $validatedData['agent_id'],
            'description' => $validatedData['description'],
            'additional_features' => json_encode($validatedData['additional_features']), // Save additional features as JSON
        ]);

        // // Handle any file uploads (if necessary)
        // if ($request->hasFile('media')) {
        //     $media = $request->file('media');
        //     $mediaPath = $media->store('property_media', 'public'); // Store the file in the public disk
        //     PropertyImg::create([
        //         'property_id' => $property->id,
        //         'image_path' => $mediaPath,
        //     ]);
        // }

        // Return a JSON response to indicate success
        return response()->json([
            'message' => 'Property created successfully.',
            'property_id' => $property->id,
        ]);
    }
}
?>
