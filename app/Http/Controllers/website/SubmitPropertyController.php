<?php
namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyImg;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SubmitPropertyController extends Controller
{
    public function index(Request $request)
    {
        $agents = User::where('role_id', 2)->get();
        //return view('frontend.submit-property', compact('agents'));
        return view('frontend.submit-property', compact('agents'));
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
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Validate images
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
            'additional_features' => $validatedData['additional_features'],
        ]);

        // print_r($request->file('image_url'));die;

        // // Handle Dropzone image uploads if present
        // if ($request->hasFile('image_url')) {
        //     foreach ($request->file('image_url') as $image) {
        //         // Generate unique name for the image
        //         $imageName = time() . '_' . uniqid() . '.' . $image->extension();

        //         // Move image to the public directory
        //         $image->move(public_path('assets/images/property_images/'), $imageName);

        //         // Save each image in the database
        //         PropertyImg::create([
        //             'property_id' => $property->id, // Use the created property ID
        //             'image_url' => 'assets/images/property_images/' . $imageName, // Save relative path to image
        //             'alt_text' => $request->input('alt_text', ''), // Default empty alt text
        //         ]);
        //     }
        // }

       // Handle the file upload
        if ($request->hasFile('image_url')) {
            $images = $request->file('image_url');  // Handle the array of files if multiple

            foreach ($images as $image) {
                if ($image->isValid()) {
                    // Generate a unique name for the image
                    $imageName = time() . '_' . uniqid() . '.' . $image->extension();

                    // Move the image to the public directory (or any other directory you prefer)
                    $image->move(public_path('assets/images/property_images'), $imageName);

                    // Save the image path in the database
                    PropertyImg::create([
                        'property_id' => $property->id, // Use the created property ID
                        'image_url' => 'assets/images/property_images/' . $imageName, // Relative path to image
                        'alt_text' => $request->input('alt_text', ''), // Default empty alt text
                    ]);
                } else {
                    return response()->json(['error' => 'One of the uploaded files is invalid.'], 400);
                }
            }

            return response()->json(['success' => 'Images uploaded successfully.']);
        } else {
            return response()->json(['error' => 'No images uploaded.'], 400);
        }



        // Check if it's an Ajax request and return JSON
        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Property and images uploaded successfully!',
                'redirect' => route('home')
            ]);
        }

        // If not Ajax, return a redirect response
        return response()->json([
            'success' => true,
            'message' => 'Property added successfully!',
            'redirect' => route('home') // Send redirect URL in response
        ]);
    }

}
?>
