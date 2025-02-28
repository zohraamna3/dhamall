<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with(['images', 'reviews'])->findOrFail($id);
        $averageRating = $product->reviews->avg('rating');
        $relatedProducts = Product::where('category_id', $product->category_id)
                                  ->where('id', '!=', $product->id)
                                  ->with('images')
                                  ->limit(4)
                                  ->get();

        return view('product.product_details_page', compact('product', 'averageRating', 'relatedProducts'));
    }
}

