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
        // Fetch all agents
        $agents = User::where('role_id', 2)->get();

        return view('frontend.agent-profile', compact('agents'));
    }

    public function show($id)
    {
        $agent = User::findOrFail($id); // Get the agent
        $properties = Property::where('agent_id', $id)->get(); // Get properties uploaded by this agent

        return view('frontend.agent-profile', compact('agent', 'properties'));
    }
}

