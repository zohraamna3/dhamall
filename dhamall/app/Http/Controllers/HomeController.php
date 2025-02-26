<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch top-selling earbuds (assuming sorting by sales or popularity)
        $earbudsCategory = Category::where('name', 'like', '%earbuds%')->first();
        
        $earbuds = $earbudsCategory ? Product::where('category_id', $earbudsCategory->id)->take(6)->get() : collect();

        // Fetch latest reviews with user and product details
        $reviews = Review::with(['user', 'product'])->latest()->take(6)->get();

        return view('home', compact('earbuds', 'reviews'));
    }
}
