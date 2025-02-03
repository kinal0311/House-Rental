<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyImg;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AgentGridController extends Controller
{
    public function index(Request $request)
    {
        $agents = User::where('role_id', 2)->get();

        return view('frontend.agent-grid', compact('agents'));
    }
}
