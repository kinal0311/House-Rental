<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyImg;
use App\Models\User;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;

class SinglePropertyController extends Controller
{
    public function index(Request $request)
    {
        $properties = Property::all();
        $images = PropertyImg::all();
        $agents = User::where('role_id', 2)->get();
        return view('frontend.single-property', compact('properties','images', 'agents'));
    }

    public function show($id)
    {
        $property = Property::with(['agent', 'feedbacks.user'])->findOrFail($id);
        $images = PropertyImg::where('property_id', $id)->get();

        return view('frontend.single-property', compact('property', 'images'));
    }


}
