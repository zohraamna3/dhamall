<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of products
     */
    public function index(Request $request)
    {
        $query = Product::with(['images', 'brand', 'category'])
            ->available();

        // Filter by category if provided
        if ($request->has('category') && $request->category) {
            $categoryId = $request->category;

            // Get all subcategories of the selected category
            $categoryIds = Category::where('id', $categoryId)
                ->orWhere('ParentCategoryId', $categoryId)
                ->pluck('id')
                ->toArray();

            $query->whereIn('CategoryId', $categoryIds);
        }

        // Filter by brand if provided
        if ($request->has('brand') && $request->brand) {
            $query->where('BrandId', $request->brand);
        }

        // Filter by price range
        if ($request->has('min_price')) {
            $query->where('Price', '>=', $request->min_price);
        }

        if ($request->has('max_price')) {
            $query->where('Price', '<=', $request->max_price);
        }

        // Search by keyword
        if ($request->has('keyword') && $request->keyword) {
            $keyword = $request->keyword;
            $query->where(function($q) use ($keyword) {
                $q->where('ProductName', 'like', "%{$keyword}%")
                    ->orWhere('Description', 'like', "%{$keyword}%");
            });
        }

        // Sort products
        $sortBy = $request->get('sort_by', 'newest');
        switch ($sortBy) {
            case 'price_low':
                $query->orderBy('Price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('Price', 'desc');
                break;
            case 'popular':
                $query->orderBy('NumberOfOrders', 'desc');
                break;
            case 'newest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        $products = $query->paginate(12);

        // Get all categories and brands for filters
        $categories = Category::whereNull('ParentCategoryId')->orWhere('ParentCategoryId', 0)->get();
        $brands = \App\Models\Brand::orderBy('Name')->get();

        return view('users.buyer.products.index', compact('products', 'categories', 'brands'));
    }

    /**
     * Display the specified product.
     */
    public function show($id)
    {
        // Attempt to find the product by ID
        $product = Product::with([
            'images',
            'brand',
            'category',
            'seller',
            'shipping',
            'reviews.user' // Eager load reviews with their users
        ])->find($id); // Fetch the product using the provided ID

        // Check if the product exists
        if (!$product) {
            Log::error("Product not found with ID: " . $id);
            return redirect()->back()->withErrors(['error' => 'Product not found.']);
        }

        Log::info( $product); // Log loaded product for debugging

        // Get related products (4 random products from the same category)
        $relatedProducts = Product::with('images')
            ->where('CategoryId', $product->CategoryId)
            ->where('id', '!=', $product->id)
            ->available()
            ->inRandomOrder()
            ->take(4)
            ->get();

//        Log::info($relatedProducts);
//        Log::info($product->reviews);
        $avgRating = $this->calculateRating($product);
        $reviewCount =  count(json_decode($product->reviews, true)); // From cached value

        return view('users.buyer.product.product_details_page', compact(
            'product',
            'relatedProducts',
            'avgRating',
            'reviewCount'
        ));
    }

    private function calculateRating($product){


        $reviews = json_decode($product->reviews, true);

// Initialize variables for calculating average
        $totalRating = 0;
        $numberOfReviews = count($reviews);

// Sum all the ratings
        foreach ($reviews as $review) {
            $totalRating += $review['Rating'];
        }

// Calculate average
        $avgRating = $numberOfReviews > 0 ? $totalRating / $numberOfReviews : 0;


        return $avgRating;
        // Calculate average rating

    }

    /**
     * Search products based on query
     */
    public function search(Request $request)
    {
        return $this->index($request);
    }

    /**
     * Store a newly created review
     */
    public function storeReview(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'nullable|string|max:100',
            'comment' => 'required|string|min:10|max:1000',
        ]);

        // Check if user already reviewed this product
        $existingReview = ProductReview::where('UserId', Auth::id())
            ->where('ProductId', $product->id)
            ->first();

        if ($existingReview) {
            return redirect()->back()
                ->with('error', 'You have already reviewed this product!');
        }

        // Create the review
        ProductReview::create([
            'UserId' => Auth::id(),
            'ProductId' => $product->id,
            'Rating' => $request->rating,
            'Title' => $request->title,
            'Comment' => $request->comment,
            'Sentiment' => $request->rating >= 4 ? 'positive' :
                ($request->rating <= 2 ? 'negative' : 'neutral'),
            'PostedOn' => now(),
        ]);

        // Update product rating stats
        $product->updateRatingStats();

        return redirect()->back()
            ->with('success', 'Thank you for your review!');
    }
}
