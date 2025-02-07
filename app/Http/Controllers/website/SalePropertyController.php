<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyImg;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SalePropertyController extends Controller
{

    public function index(Request $request)
    {
        $properties = Property::where('status', 'Sale')->get(); // Fetch only properties for Sale
        $images = PropertyImg::all();
        $agents = User::where('role_id', 2)->get();

        return view('frontend.sale-property', compact('properties', 'images', 'agents'));
    }

    // public function show($id)
    // {
    //     $property = Property::with('agent')->findOrFail($id);
    //     $images = PropertyImg::where('property_id', $id)->get();

    //     return view('frontend.sale-property', compact('property', 'images'));
    // }

}


