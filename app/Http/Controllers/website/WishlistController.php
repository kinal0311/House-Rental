<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Session;

class WishlistController extends Controller
{
    // Add property to the wishlist
    public function add(Request $request)
    {
        try {
            $propertyId = $request->input('property.id');
            $userId = Auth::id(); // Get the authenticated user ID
            if (!$userId) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User must be logged in to add to wishlist.'
                ], 401);
            }

            // Retrieve the property along with its images
            $property = Property::with('images')->findOrFail($propertyId);

            // Check if the property is already in the wishlist for the user
            $existingWishlistItem = Wishlist::where('user_id', $userId)
                                            ->where('property_id', $propertyId)
                                            ->first();

            // Retrieve updated wishlist data
            $wishlist = Wishlist::with('property.images')->where('user_id', $userId)->get();

            // If the property is not in the wishlist, add it
            if (!$existingWishlistItem) {
                Wishlist::create([
                    'user_id' => $userId,
                    'property_id' => $propertyId,
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Property added to wishlist successfully!',
                    'wishlist' => $wishlist,
                    'wishlistHTML' => view('frontend.wishlist', compact('wishlist'))->render(),
                    'added_to_wishlist' => true // Indicate that the item was added
                ]);
            } else {
                return response()->json([
                    'status' => 'success',
                    'message' => 'This property is already in the wishlist.',
                    'wishlist' => $wishlist,
                    'wishlistHTML' => view('frontend.wishlist', compact('wishlist'))->render(),
                    'added_to_wishlist' => false // Indicate that the item was already in the wishlist
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
        $userId = Auth::id();
        $wishlist = Wishlist::with('property.images')->where('user_id', $userId)->get();

        return view('frontend.wishlist', compact('wishlist'));
    }

    // Remove property from wishlist
    public function remove(Request $request)
    {
        try {
            $wishlistItemId = $request->wishlist_item_id;

            // Find and remove the wishlist item
            $wishlistItem = Wishlist::findOrFail($wishlistItemId);
            $wishlistItem->delete();

            // Get updated wishlist count
            $wishlistCount = Wishlist::where('user_id', Auth::id())->count();

            return response()->json([
                'status' => 'success',
                'wishlistCount' => $wishlistCount,
                'redirect' => route('listing') // ✅ Redirect URL after removing item
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error removing property from wishlist'
            ], 500);
        }
    }

}
