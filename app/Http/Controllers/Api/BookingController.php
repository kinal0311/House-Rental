<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\Booking;
use App\Http\Resources\BookingResource;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function bookProperty(Request $request)
    {
        $user = Auth::guard('api')->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        // dd($user);

        // Load property without images
        $property = Property::findOrFail($request->property_id);

        $paymentOption = $property->payment_type;
        $deposit = ($paymentOption == 2) ? ($property->price * 0.1) : 0;
        $totalAmount = $property->price + $deposit;

        $agent = User::where('role_id', 2)->where('id', $property->agent_id)->first();
        if (!$agent) {
            return response()->json(['message' => 'Agent not found.'], 404);
        }

        $booking = Booking::updateOrCreate(
            [
                'property_id' => $property->id,
                'user_id' => $user->id,
                'payment_status' => 1,
            ],
            [
                'agent_id' => $property->agent_id,
                'payment_option' => $paymentOption,
                'deposit' => $deposit,
                'amount' => $totalAmount,
            ]
        );

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('TAP_SECRET_KEY'),
            'Content-Type' => 'application/json'
        ])->post('https://api.tap.company/v2/charges', [
            "amount" => $totalAmount,
            "currency" => "KWD",
            "threeDSecure" => true,
            "description" => "Property Booking Payment",
            "metadata" => [
                "property_id" => $property->id,
                "user_id" => $user->id,
                "agent_id" => $property->agent_id,
                "booking_id" => $booking->id,
            ],
            "customer" => [
                "name" => $user->name,
                "email" => $user->email,
            ],
            "source" => ["id" => "src_all"],
            "redirect" => [
                "url" => route('api.payment.callback', ['token' => $request->bearerToken()])
            ],

        ]);

        $tapResponse = $response->json();

        // Constructing response data without images
        return response()->json([
            'message' => 'Booking initiated successfully.',
            'payment_url' => $tapResponse['transaction']['url'] ?? null, // Pass payment_url separately
            'booking' => new BookingResource($booking),
        ]);


        return new BookingResource($booking);

    }

    public function paymentCallback(Request $request)
    {
        // Authenticate user using token from query parameters
        $token = $request->query('token');
        // dd($token);
        if ($token) {
            Auth::guard('api')->setToken($token);
            $user = Auth::guard('api')->user();
            if (!$user) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }
        } else {
            return response()->json(['message' => 'Token is missing.'], 400);
        }

        // Get Payment ID from request
        $paymentId = $request->tap_id;
        if (!$paymentId) {
            return response()->json(['message' => 'Payment ID is missing.'], 400);
        }

        // Fetch payment details from Tap API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('TAP_SECRET_KEY'),
            'Content-Type' => 'application/json'
        ])->get("https://api.tap.company/v2/charges/$paymentId");

        $paymentDetails = $response->json();

        // Check if API response contains valid metadata
        if (!isset($paymentDetails['metadata']['booking_id'])) {
            return response()->json(['message' => 'Invalid payment details received.'], 400);
        }

        // Find the booking record
        $booking = Booking::find($paymentDetails['metadata']['booking_id']);
        if (!$booking) {
            return response()->json(['message' => 'Booking record not found.'], 404);
        }

        if ($paymentDetails['status'] == 'CAPTURED') {
            // Update booking payment status
            $booking->payment_status = 2;
            $booking->save();

            // Mark property as Sold
            $property = Property::find($booking->property_id);
            if ($property) {
                $property->status = 'Sold';
                $property->save();
            }

            return new BookingResource($booking);

        } else {
            $booking->payment_status = 3;
            $booking->save();

            return response()->json(['message' => 'Payment failed.'], 400);
        }
    }


}
