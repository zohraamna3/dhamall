<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Feedback;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Get top selling earbuds
        $earbuds = Product::with('images')
            ->available()
            ->where('CategoryId', function($query) {
                $query->select('id')
                    ->from('categories')
                    ->where('CategoryName', 'like', '%Earbuds%')
                    ->orWhere('CategoryName', 'like', '%earbuds%')
                    ->first();
            })
            ->popular(6)
            ->get();

        // Get featured categories
        $categories = Category::whereNull('ParentCategoryId')
            ->orWhere('ParentCategoryId', 0)
            ->take(2)
            ->get();

        // Get top feedback with high ratings
        $reviews = Feedback::with('user')
            ->where('Rating', '>=', 4)
            ->orderBy('Rating', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('home', compact('earbuds', 'categories', 'reviews'));
    }
}
