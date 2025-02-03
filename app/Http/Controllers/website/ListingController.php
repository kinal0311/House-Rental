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
}
?>
