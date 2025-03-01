<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->paginate(9);

        $categories = Category::whereNull('parent_category_id')->with('subCategories')->get();

        return view('search', compact('products', 'categories', 'query'));
    }
}