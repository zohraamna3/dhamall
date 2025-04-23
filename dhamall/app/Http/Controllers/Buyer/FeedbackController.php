<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        // Check if user is logged in
        $userId = Auth::check() ? Auth::id() : null;

        Feedback::create([
            'UserId' => $userId,
            'Rating' => $validatedData['rating'],
            'Comment' => $validatedData['comment'],
        ]);

        return redirect()->route('feedback')->with('success', 'Thank you for your feedback!');
    }
}
