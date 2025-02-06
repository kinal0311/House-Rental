<?php
namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyImg;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        // Paginate properties (10 properties per page)
        $properties = Property::all();

        // Fetch images and agents (no pagination needed here, unless you want to paginate them as well)
        $images = PropertyImg::all();
        $agents = User::where('role_id', 2)->get();

        return view('frontend.listing', compact('properties', 'images', 'agents'));
    }
    public function searchProperties(Request $request)
    {
        // Filter based on request
        $properties = Property::query();

        if ($request->status) $properties->where('status', $request->status);
        if ($request->property_type) $properties->where('property_type', 'like', "%{$request->property_type}%");
        if ($request->address) $properties->where('address', 'like', "%{$request->address}%");
        if ($request->max_rooms) $properties->where('rooms', '<=', $request->max_rooms);
        if ($request->bed) $properties->where('bedrooms', $request->bed);
        if ($request->bath) $properties->where('bathrooms', $request->bath);
        if ($request->price) $properties->where('price', '<=', $request->price);
        if ($request->area) $properties->where('area', '<=', $request->area);

        $properties = $properties->get();

        // Return a view or JSON response
        return response()->json([
            'html' => view('property.search_results', compact('properties'))->render()
        ]);
    }

}
?>
