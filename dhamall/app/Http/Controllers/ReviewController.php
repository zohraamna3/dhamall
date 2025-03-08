<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function showReviews($id)
    {
        // Dummy reviews data for each product
        $reviews = [
            1 => [
                ['customer' => 'Ali Khan', 'rating' => 4, 'review' => 'Amazing sound quality!', 'sentiment' => 'Positive', 'date' => '01 Mar 2025'],
                ['customer' => 'Hassan Raza', 'rating' => 5, 'review' => 'Absolutely worth it!', 'sentiment' => 'Positive', 'date' => '04 Mar 2025'],
            ],
            2 => [
                ['customer' => 'Fatima Noor', 'rating' => 3, 'review' => 'Comfortable but average sound.', 'sentiment' => 'Neutral', 'date' => '02 Mar 2025'],
                ['customer' => 'Sami Ullah', 'rating' => 2, 'review' => 'Build quality is poor.', 'sentiment' => 'Negative', 'date' => '05 Mar 2025'],
            ],
            3 => [
                ['customer' => 'Ahmed Raza', 'rating' => 2, 'review' => 'Not worth the price.', 'sentiment' => 'Negative', 'date' => '03 Mar 2025'],
                ['customer' => 'Ayesha Khan', 'rating' => 4, 'review' => 'Good for casual use.', 'sentiment' => 'Positive', 'date' => '06 Mar 2025'],
            ]
        ];

        $productReviews = $reviews[$id] ?? [];

        return view('users.seller.pages.comments', compact('productReviews', 'id'));
    }

    public function showReview($id)
    {
        // Dummy reviews data for each product
        $reviews = [
            1 => [
                ['customer' => 'Ali Khan', 'rating' => 4, 'review' => 'Amazing sound quality!', 'sentiment' => 'Positive', 'date' => '01 Mar 2025'],
                ['customer' => 'Hassan Raza', 'rating' => 5, 'review' => 'Absolutely worth it!', 'sentiment' => 'Positive', 'date' => '04 Mar 2025'],
            ],
            2 => [
                ['customer' => 'Fatima Noor', 'rating' => 3, 'review' => 'Comfortable but average sound.', 'sentiment' => 'Neutral', 'date' => '02 Mar 2025'],
                ['customer' => 'Sami Ullah', 'rating' => 2, 'review' => 'Build quality is poor.', 'sentiment' => 'Negative', 'date' => '05 Mar 2025'],
            ],
            3 => [
                ['customer' => 'Ahmed Raza', 'rating' => 2, 'review' => 'Not worth the price.', 'sentiment' => 'Negative', 'date' => '03 Mar 2025'],
                ['customer' => 'Ayesha Khan', 'rating' => 4, 'review' => 'Good for casual use.', 'sentiment' => 'Positive', 'date' => '06 Mar 2025'],
            ]
        ];

        $productReviews = $reviews[$id] ?? [];

        return view('admin.comments', compact('productReviews', 'id'));
    }

    public function store(Request $request, Product $product)
    {
        // Validate the request
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:500',
        ]);

        // Create a new review
        $review = new Review([
            'rating' => $request->rating,
            'comment' => $request->comment,
            'user_id' => auth()->id(), // Ensure the user is authenticated
        ]);

        // Save the review for the product
        $product->reviews()->save($review);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
}
