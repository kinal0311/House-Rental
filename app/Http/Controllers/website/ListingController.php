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
          $query = Property::query();

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

          // Fetch the filtered properties
          $filtered_properties = $query->get();

          // Return the filtered properties HTML directly
          $html = '';
          if ($filtered_properties->isEmpty()) {
              $html = '<p>No properties found.</p>';
          } else {
              foreach ($filtered_properties as $property) {
                  $html .= '<div class="property-item">
                              <h5>' . $property->status . '</h5>
                              <p>' . $property->property_type . '</p>
                              <p>' . $property->address . '</p>
                              <p>' . $property->max_rooms . '</p>
                              <span>' . $property->beds . '</span>
                              <span>' . $property->baths . '</span>
                          </div>';
              }
          }
// dd($html);
          return response()->json(['html' => $html]);  // Return HTML content as JSON response
      }

}
?>
<!-- <div class="property-2 column-sm zoom-gallery property-label property-grid row grid" id="property-item"> -->
                            @if($properties->isEmpty())
                                <p>No properties found.</p>
                            @else
                            @foreach($properties as $property)
                            <div class="col-xl-4 col-md-6 grid-item wow fadeInUp {{ $property->status }}">
                                <div class="property-box">
                                    <div class="property-image">
                                        <div class="property-slider">
                                            @foreach($property->images as $image)
                                            <a href="javascript:void(0)">
                                                <img src="{{ URL::asset($image->image_url) }}" class="bg-img" alt="">
                                            </a>
                                            @endforeach
                                        </div>
                                        <div class="labels-left">
                                            <div>
                                                <span class="label label-shadow
                                                    @if($property->status == 'Sale') bg-info
                                                    @elseif($property->status == 'Sold') bg-danger
                                                    @elseif($property->status == 'Rent') bg-success
                                                    @endif
                                                ">{{ $property->status }}</span>
                                            </div>
                                        </div>
                                        <div class="seen-data">
                                            <i data-feather="camera"></i>
                                            <span>{{ $property->images->count() }}</span>
                                        </div>
                                    </div>

                                    <div class="property-details">
                                        <span class="font-roboto">{{ $property->city }}</span>
                                        <a href="single-property-8.html">
                                            <h3>{{ $property->address }}</h3>
                                        </a>
                                        <h6>${{ $property->price }}*</h6>
                                        <p class="font-roboto">{{ $property->description }}</p>
                                        <ul>
                                            <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/double-bed.svg" class="img-fluid" alt="">Bed : {{ $property->beds }}</li>
                                            <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/bathroom.svg" class="img-fluid" alt="">Baths : {{ $property->baths }}</li>
                                            <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="">Sq Ft : {{ $property->area }}</li>
                                        </ul>
                                        <div class="property-btn d-flex">
                                            <button type="button" onclick="document.location='single-property-8.html'" class="btn btn-dashed btn-pill color-2">Details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
