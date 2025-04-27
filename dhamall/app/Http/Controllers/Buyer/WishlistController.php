<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\WishlistItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Get or create wishlist for the authenticated user
    private function getWishlist()
    {
        $user = Auth::user();
        return Wishlist::firstOrCreate(['UserId' => $user->id]);
    }

    // Add an item to the wishlist
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $product = Product::findOrFail($request->product_id);

        $wishlist = $this->getWishlist();

        // Check if product is already in the wishlist
        $existingItem = $wishlist->items()->where('ProductId', $product->id)->first();

        if ($existingItem) {
            return redirect()->back()->with('info', 'Product is already in your wishlist.');
        }

        try {
            WishlistItem::create([
                'WishlistId' => $wishlist->id,
                'ProductId' => $product->id,
            ]);

            return redirect()->route('products.show', ['product' => $request->product_id])->with('success', 'Product added to wishlist!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add product to wishlist: ' . $e->getMessage());
        }
    }

    // Get items in the wishlist
    public function getWishlistItems()
    {
        $wishlist = $this->getWishlist();
        return $wishlist->items()->with('product.images')->get(); // Assuming product.images relation exists
    }

    public static function getWishlistDetails(){
        $user = Auth::user();
        $wishlist = Wishlist::firstOrCreate(['UserId' => $user->id]);
        return $wishlist->items()->with('product.images')->get();
    }

    // View the wishlist
    public function index()
    {
        $items = $this->getWishlistItems();

        return view('users.buyer.wishlist.index', compact('items'));
    }

    // Remove item from wishlist


    public function remove(WishlistItem $item)
    {
        $item->delete();
        return response()->json(['success' => true, 'message' => 'Item removed from wishlist']);
    }
}
