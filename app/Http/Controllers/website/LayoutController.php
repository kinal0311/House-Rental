<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyImg;
use App\Models\User;


class LayoutController extends Controller
{
    public function index(Request $request)
    {
        $properties = Property::all();
        $images = PropertyImg::all();
        $agents = User::where('role_id', 2)->get();
        return view('frontend.layout', compact('properties','images', 'agents'));
    }
}
