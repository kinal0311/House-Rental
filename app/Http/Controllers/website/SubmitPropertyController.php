<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyImg;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SubmitPropertyController extends Controller
{

    public function index(Request $request)
    {
        return view('frontend.submit-property');
    }

    public function store(Request $request)
    {

        $requestData = $request->safe()->all();
        Property::create($requestData);

        return redirect()->route('admin.properties.index')
                         ->with('success', 'Property created successfully.');
    }
}

