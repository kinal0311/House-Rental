<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyImg;
use App\Models\User;

class AgentProfileController extends Controller
{
    public function index(Request $request)
    {
        $properties = Property::all();
        $images = PropertyImg::all();
        $agents = User::where('role_id', 2)->get();
        return view('frontend.agent-profile', compact('properties','images','agents'));
    }

    public function show($id)
    {
        $agent = User::findOrFail($id);  // Get the agent by ID
        return view('frontend.agent-profile', compact('agent'));  // Pass the agent to the view
    }
}
