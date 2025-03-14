<?php
namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyImg;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LayoutController extends Controller
{
    public function index(Request $request)
    {

        $cities = Property::select('city', DB::raw('count(*) as property_count'))
                          ->groupBy('city')
                          ->get();
        $properties = Property::all();
        $images = PropertyImg::all();
        $agents = User::where('role_id', 2)->get();


        return view('frontend.layout', compact('properties','cities', 'images', 'agents'));
    }
}
?>
