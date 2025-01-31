<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyImg;
use App\Models\User;

class SinglePropertyController extends Controller
{
    public function index(Request $request)
    {
        $properties = Property::all();
        $images = PropertyImg::all();
        $agents = User::where('role_id', 2)->get();
        return view('frontend.single-property-8', compact('properties','images', 'agents'));
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);

        $images = PropertyImg::where('property_id', $id)->get();

        return view('frontend.single-property-8', compact('property', 'images'));
    }

}
