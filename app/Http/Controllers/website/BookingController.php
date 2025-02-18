<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyImg;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Support\Facades\Http;

class BookingController extends Controller
{
    public function show($id)
    {
        $property = Property::findOrFail($id);
        $agent = User::where('role_id', 2)->where('id', $property->agent_id)->first();
        $user = auth()->user();

        return view('frontend.booking', compact('property', 'agent','user'));
    }

    public function processPayment(Request $request)
    {
        $property = Property::findOrFail($request->property_id);
        $paymentOption = $property->payment_type;

        $deposit = ($paymentOption == 2) ? ($property->price * 0.1) : 0;
        $totalAmount = $property->price + $deposit;

        $agent = User::where('role_id', 2)->where('id', $property->agent_id)->first();

        $booking = Booking::where('property_id', $property->id)
            ->where('user_id', auth()->id())
            ->where('payment_status', 1)
            ->first();

        if (!$booking) {
            $booking = Booking::create([
                'property_id' => $property->id,
                'user_id' => auth()->id(),
                'agent_id' => $property->agent_id,
                'payment_option' => $paymentOption,
                'payment_status' => 1,
                'deposit' => $deposit,
                'amount' => $totalAmount,
            ]);
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('TAP_SECRET_KEY'),
            'Content-Type' => 'application/json'
        ])->post('https://api.tap.company/v2/charges', [
            "amount" => $totalAmount,
            "currency" => "KWD",
            "threeDSecure" => true,
            "save_card" => false,
            "description" => "Property Booking Payment",
            "metadata" => [
                "property_id" => $property->id,
                "user_id" => auth()->id(),
                "agent_id" => $property->agent_id,
                "booking_id" => $booking->id,
            ],
            "receipt" => ["email" => true, "sms" => true],
            "customer" => [
                "name" => auth()->user()->name,
                "email" => auth()->user()->email,
            ],
            "source" => ["id" => "src_all"],
            "redirect" => ["url" => route('payment.callback')],
        ]);

        $tapResponse = $response->json();

        if (isset($tapResponse['transaction']['url'])) {
            return redirect()->to($tapResponse['transaction']['url']);
        } else {
            return back()->with('status', 'error')->with('message', 'Payment initiation failed.');
        }
    }

    public function paymentCallback(Request $request)
    {
        $paymentId = $request->tap_id;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('TAP_SECRET_KEY'),
            'Content-Type' => 'application/json'
        ])->get("https://api.tap.company/v2/charges/$paymentId");

        $paymentDetails = $response->json();

        $booking = Booking::find($paymentDetails['metadata']['booking_id']);

        if (!$booking) {
            return redirect()->route('listing')->with('status', 'error')->with('message', 'Booking record not found.');
        }

        if ($paymentDetails['status'] == 'CAPTURED') {

            $booking->payment_status = 2;
            $booking->save();

            $property = Property::find($booking->property_id);
            if ($property) {
                $property->status = 'Sold';
                $property->save();
            }

            return redirect()->route('booking', ['id' => $booking->property_id])
                ->with('status', 'success')
                ->with('message', 'Payment successful, booking confirmed!');
        } else {

            $booking->payment_status = 3;
            $booking->save();

            return redirect()->route('listing')->with('status', 'error')->with('message', 'Payment failed.');
        }
    }





}
