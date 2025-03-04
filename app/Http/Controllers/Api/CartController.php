<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Cart;
use App\Models\User;
use App\Http\Resources\CartResource;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        try {
            $user = auth()->user(); // Get authenticated user
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User must be logged in to add to cart.'
                ], 401);
            }

            $propertyId = $request->property_id;

            // Check if property exists
            $property = Property::find($propertyId);
            if (!$property) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Property not found.'
                ], 404);
            }

            // Check if property is already sold
            if ($property->status === 'Sold') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'This property is sold and cannot be added to the cart.'
                ], 400);
            }

            // Check if property is already in cart
            $existingCartItem = Cart::where('user_id', $user->id)
                                    ->where('property_id', $propertyId)
                                    ->first();

            if (!$existingCartItem) {
                // Add to cart
                Cart::create([
                    'user_id' => $user->id,
                    'property_id' => $propertyId,
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Property added to cart successfully!',
                    'cart' => CartResource::collection(Cart::with('property')->where('user_id', $user->id)->get())

                ]);
            } else {
                return response()->json([
                    'status' => 'info',
                    'message' => 'This property is already in your cart.',
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function showCart()
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User must be logged in to view the cart.'
            ], 401);
        }

        $cart = Cart::with('property')->where('user_id', $user->id)->get();

        return response()->json([
            'status' => 'success',
            'cart' => CartResource::collection($cart)
        ]);
    }

    public function removeFromCart(Request $request)
    {
        try {
            $user = auth()->user();
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User must be logged in to remove items from cart.'
                ], 401);
            }

            $cartItem = Cart::where('user_id', $user->id)
                            ->where('id', $request->cart_item_id)
                            ->first();
            // dd($request->cart_item_id);
            if (!$cartItem) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Cart item not found.'
                ], 404);
            }

            $cartItem->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Item removed from cart successfully!',
                'cart' => CartResource::collection(Cart::with('property')->where('user_id', $user->id)->get())
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
