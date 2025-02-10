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
        $properties = Property::with('images')->get();
        $images = PropertyImg::all();
        $agents = User::where('role_id', 2)->get();

        return view('frontend.listing', compact( 'properties', 'images', 'agents'));
    }
    // public function searchProperties(Request $request)
    // {
    //     $query = Property::query();
    //     $query->where(function ($q) use ($request) {
    //         if ($request->filled('status')) {
    //             $q->orWhere('status', $request->status);
    //         }
    //         if ($request->filled('property_type')) {
    //             $q->orWhere('property_type', 'like', '%' . $request->property_type . '%');
    //         }
    //         if ($request->filled('address')) {
    //             $q->orWhere('address', 'like', '%' . $request->address . '%');
    //         }
    //         if ($request->filled('max_rooms')) {
    //             $q->orWhere('max_rooms', '<=', (int) $request->max_rooms);
    //         }
    //         if ($request->filled('beds')) {
    //             $q->orWhere('beds', (int) $request->beds);
    //         }
    //         if ($request->filled('baths')) {
    //             $q->orWhere('baths', (int) $request->baths);
    //         }
    //     });

    //     // dd($request->all());
    //     // Debug the SQL query:
    //     dd($query->toSql(), $query->getBindings());

    //     $query = Property::query();
    //     if ($request->filled('status')) {
    //         $query->where('status', $request->status);
    //     }

    //     if ($request->filled('property_type')) {
    //         $query->orWhere('property_type', 'like', '%' . $request->property_type . '%');
    //     }

    //     if ($request->filled('address')) {
    //         $query->orWhere('address', 'like', '%' . $request->address . '%');
    //     }

    //     if ($request->filled('max_rooms')) {
    //         $query->orWhere('max_rooms', '<=', (int) $request->max_rooms);
    //     }

    //     if ($request->filled('beds')) {
    //         $query->orWhere('beds', (int) $request->beds);
    //     }

    //     if ($request->filled('baths')) {
    //         $query->orWhere('baths', (int) $request->baths);
    //     }

    //     // Fetch the results
    //     $properties = $query->get();


    //     if ($request->has('price_range') && $request->price_range != '') {
    //         // Assuming price range is a string in format "min-max"
    //         $priceRange = explode('-', $request->price_range);
    //         $query->whereBetween('price', [trim($priceRange[0]), trim($priceRange[1])]);
    //     }
    //     if ($request->has('area_range') && $request->area_range != '') {
    //         // Assuming area range is a string in format "min-max"
    //         $areaRange = explode('-', $request->area_range);
    //         $query->whereBetween('area', [trim($areaRange[0]), trim($areaRange[1])]);
    //     }

    //         dd($properties);
    //     try {
    //         return response()->json($properties);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

      // Search properties
      public function searchProperties(Request $request)
      {

        $query = Property::with('images');

        // Apply filters based on user input
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('property_type')) {
            $query->orWhere('property_type', 'like', '%' . $request->property_type . '%');
        }

        if ($request->filled('address')) {
            $query->orWhere('address', 'like', '%' . $request->address . '%');
        }

        if ($request->filled('max_rooms')) {
            $query->orWhere('max_rooms', '<=', (int) $request->max_rooms);
        }

        if ($request->filled('beds')) {
            $query->orWhere('beds', (int) $request->beds);
        }

        if ($request->filled('baths')) {
            $query->orWhere('baths', (int) $request->baths);
        }

        if ($request->filled('price_min') && $request->filled('price_max')) {
            $query->whereBetween('price', [$request->price_min, $request->price_max]);
        }
        if ($request->filled('area_min') && $request->filled('area_max')) {
            $query->whereBetween('area', [$request->area_min, $request->area_max]);
        }

        // Fetch the filtered properties
        $filtered_properties = $query->get();

          return response()->json(['html' => $filtered_properties]);
      }

}
?>

