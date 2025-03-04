<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        if (!auth('web')->check()) {
            return redirect()->route('login-user')->with('error', 'You must be logged in to submit feedback.');
        }
        // dd($request->all());

        // Get authenticated user
        $user = auth('web')->user();
// dd($user);
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Debugging: Check if request data is correct

        // Store feedback
        Feedback::create([
            'user_id' => $user->id, // Use correct variable
            'property_id' => $request->property_id,
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }


    public function index($property_id)
    {
        $feedback = Feedback::where('property_id', $property_id)->with('user')->get();
        return response()->json($feedback);
    }
}
