<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Retrieve property details from the request
        $propertyId = $request->property_id;
        $propertyType = $request->property_type;
        $propertyPrice = $request->property_price;

        // Retrieve the cart from the session, or initialize it as an empty array
        $cart = session()->get('cart', []);

        // Check if the property is already in the cart
        if (isset($cart[$propertyId])) {
            // If it exists, increase the quantity
            $cart[$propertyId]['quantity']++;
        } else {
            // Otherwise, add the property to the cart with an initial quantity of 1
            $cart[$propertyId] = [
                'id' => $propertyId,
                'property_type' => $propertyType,
                'price' => $propertyPrice,
                'quantity' => 1,
            ];
        }

        // Save the cart back to the session
        session()->put('cart', $cart);
dd($cart);
        return response()->json([
            'status' => 'success',
            'cart' => $cart,
            'cartHTML' => view('partials.cart_dropdown', compact('cart'))->render()
        ]);
    }
}
