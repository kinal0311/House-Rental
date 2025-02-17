<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {

        // $response = $client->request('POST', 'https://api.tap.company/v2/charges/', [
        //     'body' => '{"amount":1,"currency":"KWD","customer_initiated":true,"threeDSecure":true,"save_card":false,"payment_agreement":{"id":"payment_agreement_TS07A4620230032t4K21406294"},"description":"Test Description","metadata":{"udf1":"Metadata 1"},"receipt":{"email":true,"sms":true},"reference":{"transaction":"txn_01","order":"ord_01"},"customer":{"first_name":"test","middle_name":"test","last_name":"test","email":"test@test.com","phone":{"country_code":965,"number":51234567},"id":"cus_TS01A4620230032p4KP1406279"},"merchant":{"id":"1234"},"source":{"id":"tok_2uKe58232153ZmxV138r5c637"},"post":{"url":"http://your_website.com/post_url"},"redirect":{"url":"http://your_website.com/redirect_url"}}',
        //     'headers' => [
        //       'Authorization' => 'Bearer sk_test_XKokBfNWv6FIYuTMg5sLPjhJ',
        //       'accept' => 'application/json',
        //       'content-type' => 'application/json',
        //     ],
        //   ]);

        // Prepare data
        $paymentData = [
            'amount' => 1,  // Amount in KWD (e.g., 1 KWD)
            'currency' => 'KWD',
            'customer_initiated' => true,
            'threeDSecure' => true,
            'save_card' => false,
            'payment_agreement' => [
                'id' => 'payment_agreement_TS07A4620230032t4K21406294',
            ],
            'description' => 'Test Description',
            'metadata' => [
                'udf1' => 'Metadata 1',
            ],
            'receipt' => [
                'email' => true,
                'sms' => true,
            ],
            'reference' => [
                'transaction' => 'txn_01',
                'order' => 'ord_01',
            ],
            'customer' => [
                'name' => 'test',
                'email' => 'test@test.com',
                'phone' => [
                    'country_code' => 965,
                    'number' => 51234567,
                ],
                'id' => 'cus_TS01A4620230032p4KP1406279',
            ],
            'merchant' => [
                'id' => '1234',
            ],
            'source' => [
                'id' => 'NEW_GENERATED_TOKEN',
            ],
            'post' => [
                'url' => 'http://house_rental.com/post_url',
            ],
            'redirect' => [
                'url' => 'http://house_rental.com/redirect_url',
            ]
        ];
        // dd(env('TAP_API_URL'));

        // Send the request to Tap API using Guzzle (via Laravel's HTTP client)
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('TAP_API_KEY'),
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post(env('TAP_API_URL'), $paymentData);

        dd($response);

        // Handle response
        if ($response->successful()) {
            return response()->json([
                'message' => 'Payment processed successfully.',
                'data' => $response->json(),
            ]);
        } else {
            return response()->json([
                'message' => 'Payment failed.',
                'error' => $response->json(),
            ], 400);
        }
    }
}
