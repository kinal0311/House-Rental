<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyImg;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Session;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        try {
            $propertyId = $request->input('property.id');
            $userId = Auth::id(); // Get the authenticated user ID
            if (!$userId) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User must be logged in to add to cart.'
                ], 401);
            }

            // Retrieve the property along with its images
            $property = Property::with('images')->findOrFail($propertyId);
                 // Check if the property status is "Sold"
        if ($property->status === 'Sold') {
            return response()->json([
                'status' => 'error',
                'message' => 'This property is sold and cannot be added to the cart.'
            ], 400); // Bad request
        }
            // Check if the property already exists in the cart for the user
            $existingCartItem = Cart::where('user_id', $userId)
                                    ->where('property_id', $propertyId)
                                    ->first();

            // Retrieve updated cart data
            $cart = Cart::with('property.images')->where('user_id', $userId)->get();
            // After checking for an existing cart item and adding it if necessary
            if (!$existingCartItem) {
                // If it doesn't exist, add it to the cart
                Cart::create([
                    'user_id' => $userId,
                    'property_id' => $propertyId,
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Property added to cart successfully!',
                    'cart' => $cart,
                    'cartHTML' => view('frontend.cart', compact('cart'))->render(),
                    'added_to_cart' => true // Indicate that the item was added
                ]);
            } else {
                return response()->json([
                    'status' => 'success',
                    'message' => 'This property is already in the cart.',
                    'cart' => $cart,
                    'cartHTML' => view('frontend.cart', compact('cart'))->render(),
                    'added_to_cart' => false // Indicate that the item was already in the cart
                ]);
            }

            return response()->json([
                'status' => 'success',
                'cart' => $cart,
                'cartHTML' => view('frontend.cart', compact('cart'))->render()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }

    }


    public function showCart()
    {
        $userId = Auth::id();
        $cart = Cart::with('property.images')->where('user_id', $userId)->get();

        return view('frontend.cart', compact('cart'));
    }

    public function removeFromCart(Request $request)
    {
        try {
            // Find the cart item and soft delete it
            $cartItem = Cart::findOrFail($request->cart_item_id);
            $cartItem->delete();  // This will soft delete (set the deleted_at column)

            // Get the updated cart items for the current user
            $cart = Cart::where('user_id', auth()->id())->get();

            // Return the updated cart HTML and count
            return response()->json([
                'status' => 'success',
                'cartHTML' => view('frontend.cart', compact('cart'))->render(), // Render updated cart items
                'cartCount' => $cart->count()  // Updated cart item count
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

}

// try {
//     // Retrieve property details from the request
//     $propertyId = $request->property_id;
//     $propertyType = $request->property_type;
//     $propertyPrice = $request->property_price;

//     // Retrieve the cart from the session, or initialize it as an empty array
//     $cart = session()->get('cart', []);

//     // Check if the property is already in the cart
//     if (isset($cart[$propertyId])) {
//         // If it exists, increase the quantity
//         $cart[$propertyId]['quantity']++;
//     } else {
//         // Otherwise, add the property to the cart with an initial quantity of 1
//         $cart[$propertyId] = [
//             'id' => $propertyId,
//             'property_type' => $propertyType,
//             'price' => $propertyPrice,
//             'quantity' => 1,
//         ];
//     }

//     // Save the cart back to the session
//     session()->put('cart', $cart);

//     return response()->json([
//         'status' => 'success',
//         'cart' => $cart,
//         'cartHTML' => view('frontend.cart', compact('cart'))->render()
//     ]);
// } catch (\Exception $e) {
//     return response()->json([
//         'status' => 'error',
//         'message' => $e->getMessage()
//     ], 500);
// }
