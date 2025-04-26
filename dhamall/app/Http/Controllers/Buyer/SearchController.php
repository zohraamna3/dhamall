<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query
        $query = $request->input('query', '');

        // Get all categories for the filter sidebar
        $categories = Category::with('children')->get();

        // Start building the product query
        $productsQuery = Product::query()
            ->with(['images', 'reviews'])
            ->where(function($q) use ($query) {
                $q->where('ProductName', 'like', "%{$query}%") // Corrected column name
                ->orWhere('Description', 'like', "%{$query}%"); // Corrected column name
            });

        // Apply filters if they exist in the request
        $this->applyFilters($productsQuery, $request);

        // Get paginated results
        $products = $productsQuery->paginate(12);

        return view('search', compact('products', 'categories', 'query'));
    }

    protected function applyFilters($query, $request)
    {
        // Price filter
        if ($request->has('min_price') || $request->has('max_price')) {
            $minPrice = $request->input('min_price', 0);
            $maxPrice = $request->input('max_price', 10000);
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }

        // Category filter
        if ($request->has('category')) {
            $categoryIds = is_array($request->category) ? $request->category : [$request->category];
            $query->whereIn('CategoryId', $categoryIds);
        }

        // Rating filter
        if ($request->has('min_rating')) {
            $query->whereHas('reviews', function($q) use ($request) {
                $q->havingRaw('AVG(rating) >= ?', [$request->min_rating]);
            });
        }

        // Availability filter
        if ($request->has('availability')) {
            if ($request->availability === 'in_stock') {
                $query->where('stock_quantity', '>', 0);
            } elseif ($request->availability === 'out_of_stock') {
                $query->where('stock_quantity', '<=', 0);
            }
        }

        // Brand filter
        if ($request->has('brand')) {
            $query->whereIn('brand', $request->brand);
        }

        // Add more filters as needed...
    }

    public function search(Request $request)
    {
        return $this->index($request);
    }
}
