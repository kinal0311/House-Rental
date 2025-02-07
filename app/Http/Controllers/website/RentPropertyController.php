<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyImg;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RentPropertyController extends Controller
{

    public function index(Request $request)
    {
        $properties = Property::where('status', 'Rent')->get(); // Ensure this is returning a paginated result
        $images = PropertyImg::all();
        $agents = User::where('role_id', 2)->get();


        // if ($request->ajax()) {
        //     return view('frontend.rent-property', compact('properties')); // Create this partial view
        // }

        return view('frontend.rent-property', compact('properties', 'images', 'agents'));
    }

}
