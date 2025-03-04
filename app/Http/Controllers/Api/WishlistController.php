<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Wishlist;
use App\Http\Resources\WishlistResource;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Add property to the wishlist
    public function add(Request $request)
    {
        try {
            $user = Auth::guard('api')->user(); // Authenticate using JWT
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User must be logged in to add to wishlist.'
                ], 401);
            }

            $propertyId = $request->input('property_id');
            $property = Property::findOrFail($propertyId); // Ensure property exists

            // Check if the property is already in the wishlist
            $existingWishlistItem = Wishlist::where('user_id', $user->id)
                                            ->where('property_id', $propertyId)
                                            ->first();

            if (!$existingWishlistItem) {
                Wishlist::create([
                    'user_id' => $user->id,
                    'property_id' => $propertyId,
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Property added to wishlist successfully!',
                    'wishlist' => WishlistResource::collection(Wishlist::where('user_id', $user->id)->get())
                ]);
            } else {
                return response()->json([
                    'status' => 'success',
                    'message' => 'This property is already in the wishlist.',
                    'wishlist' => Wishlist::where('user_id', $user->id)->get()
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Show the user's wishlist
    public function showWishlist()
    {
        try {
            $user = Auth::guard('api')->user();
            if (!$user) {
                return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 401);
            }

            $wishlist = Wishlist::with('property')->where('user_id', $user->id)->get();

            return response()->json([
                'status' => 'success',
                'wishlist' =>  WishlistResource::collection($wishlist)
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to fetch wishlist.'], 500);
        }
    }

    // Remove property from wishlist
    public function remove(Request $request)
    {
        try {
            $user = Auth::guard('api')->user();
            if (!$user) {
                return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 401);
            }

            $wishlistItem = Wishlist::where('id', $request->wishlist_item_id)
                                    ->where('user_id', $user->id)
                                    ->first();

            if (!$wishlistItem) {
                return response()->json(['status' => 'error', 'message' => 'Wishlist item not found.'], 404);
            }

            $wishlistItem->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Property removed from wishlist.',
                'wishlist' => WishlistResource::collection(Wishlist::where('user_id', $user->id)->get())
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Error removing property from wishlist.'], 500);
        }
    }
}
