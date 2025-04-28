<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{


    public function index(Request $request)
    {
        $query = $request->input('query');

        // Fetch categories with the correct relationship
        $categories = Category::with('children')->get();

        // Fetch products based on the search query
// Fetch products based on the search query along with their images
        $products = Product::with('images')->where('ProductName', 'like', '%' . $query . '%')
            ->orWhere('Description', 'like', '%' . $query . '%')
            ->paginate(12);

        // Fetch brands from the database
        $brands = Brand::all(); // This will fetch all brands

        Log::info("Brand:".$brands." products: ".$products." Categories:".$categories);

        return view('search', compact('categories', 'products', 'query', 'brands'));
    }
    protected function applyFilters($query, $request)
    {
        // Price filter
        if ($request->has('min_price') || $request->has('max_price')) {
            $minPrice = $request->input('min_price', 0);
            $maxPrice = $request->input('max_price', 10000);
            $query->whereBetween('Price', [$minPrice, $maxPrice]);
        }

        // Category filter
        if ($request->has('category')) {
            $categoryIds = is_array($request->category) ? $request->category : [$request->category];
            $query->whereIn('CategoryId', $categoryIds);
        }

        // Rating filter
        if ($request->has('rating')) {
            $query->whereHas('reviews', function($q) use ($request) {
                $q->havingRaw('AVG(Rating) >= ?', [$request->rating]);
            });
        }

        // Availability filter
        if ($request->has('availability')) {
            if ($request->availability === 'in_stock') {
                $query->where('QuantityInStock', '>', 0);
            } elseif ($request->availability === 'out_of_stock') {
                $query->where('QuantityInStock', '<=', 0);
            }
        }

        // Brand filter
        if ($request->has('brand')) {
            $brandIds = is_array($request->brand) ? $request->brand : [$request->brand];
            $query->whereIn('BrandId', $brandIds);
        }

        // Add more filters as needed...

        // Color filter
        // Example: $query->where('color', $request->input('color'));

        // Size filter
        // Example: $query->where('size', $request->input('size'));

        // Discount filter
        // Example: if ($request->has('discount')) { /* logic based on discount ranges */ }

        // Shipping method filter
        // Example: if ($request->has('shipping')) { /* logic based on shipping options */ }

        // Condition filter
        // Example: if ($request->has('condition')) { /* logic based on new/used/refurbished etc. */ }

        // Seller filter (if applicable)
        // Example: if ($request->has('seller')) { /* filter logic by seller */ }
    }
    public function search(Request $request)
    {
        return $this->index($request);
    }
}
