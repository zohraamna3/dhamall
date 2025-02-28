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
        $earbudsCategories = Category::whereIn('name', ['Wireless Earpods', 'Wired Earpods'])->pluck('id');
        $earbuds = Product::whereIn('category_id', $earbudsCategories)->take(6)->get();

        // Fetch latest reviews with user and product details
        $reviews = Review::with(['user', 'product'])->latest()->take(6)->get();

        return view('home', compact('earbuds', 'reviews'));
    }
}
