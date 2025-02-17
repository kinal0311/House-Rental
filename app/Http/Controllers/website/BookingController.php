<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyImg;
use App\Models\User;

class BookingController extends Controller
{
    public function show($id)
    {
        $property = Property::findOrFail($id);
        $agent = User::where('role_id', 2)->where('id', $property->agent_id)->first();

        return view('frontend.booking', compact('property', 'agent'));
    }


}
