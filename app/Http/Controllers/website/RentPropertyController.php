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
        $properties = Property::where('status', 'Rent')->paginate(10); // Fetch only properties for Sale
        $images = PropertyImg::all();
        $agents = User::where('role_id', 2)->get();

        return view('frontend.rent-property', compact('properties', 'images', 'agents'));
    }
}
