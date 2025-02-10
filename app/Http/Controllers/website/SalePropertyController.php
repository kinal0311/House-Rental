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

    public function searchProperties(Request $request)
    {
            $query = Property::with('images')->where('status', 'Sale');
            if ($request->filled('property_type')) {
                $query->where('property_type', 'like', '%' . $request->property_type . '%');
            }

            if ($request->filled('address')) {
                $query->Where('address', 'like', '%' . $request->address . '%');
            }

            if ($request->filled('max_rooms')) {
                $query->Where('max_rooms', '<=', (int) $request->max_rooms);
            }

            if ($request->filled('beds')) {
                $query->Where('beds', (int) $request->beds);
            }

            if ($request->filled('baths')) {
                $query->Where('baths', (int) $request->baths);
            }

            if ($request->filled('price_min') && $request->filled('price_max')) {
                $query->whereBetween('price', [(int)$request->price_min, (int)$request->price_max]);
            }

            if ($request->filled('area_min') && $request->filled('area_max')) {
                $query->whereBetween('area', [(int)$request->area_min, (int)$request->area_max]);
            }

            // Fetch filtered properties
            $filtered_properties = $query->get();

            return response()->json(['html' => $filtered_properties]);
    }

}


