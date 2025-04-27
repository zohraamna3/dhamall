<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Get or create cart for authenticated user
    private function getCart()
    {
        $user = Auth::user();
        return Cart::firstOrCreate(['UserId' => $user->id]);
    }

    // Add item to cart
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        $quantity = $request->quantity ?? 1;

        if ($product->StockQuantity <= 0) {
            return redirect()->back()->with('error', 'This product is out of stock');
        }

        if ($quantity > $product->StockQuantity) {
            return redirect()->back()->with('error', 'Requested quantity exceeds available stock');
        }

        $cart = $this->getCart();

        // Check if product already in cart
        $existingItem = $cart->items()->where('ProductId', $product->id)->first();

        try {
            if ($existingItem) {
                $newQuantity = $existingItem->Quantity + $quantity;
                if ($newQuantity > $product->StockQuantity) {
                    return redirect()->back()->with('error', 'Cannot add more than available stock');
                }

                $existingItem->update([
                    'Quantity' => $newQuantity,
                    // No TotalPrice update
                ]);
            } else {
                CartItem::create([
                    'CartId' => $cart->id,
                    'ProductId' => $product->id,
                    'Quantity' => $quantity,
                    'PricePerUnit' => $product->Price,
                    // No TotalPrice here as well
                ]);
            }

            return redirect()->route('products.show', ['product' => $request->product_id])->with('success', 'Product added to cart!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add product to cart: ' . $e->getMessage());
        }
    }    public function getCartItems()
    {
        $cart = $this->getCart();
        return $cart->items()->with('product.images')->get();
    }

    public static function getCartDetails(){
        $user = Auth::user();
        $cart = Cart::firstOrCreate(['UserId' => $user->id]);
        return $cart->items()->with('product.images')->get();
    }




    // View cart
    public function index()
    {

        $items = $this->getCartItems();
        $total = $items->sum('TotalPrice');

        return view('users.buyer.cart.index', compact('items', 'total'));
    }

    // Update cart item quantity
    public function update(Request $request, CartItem $item)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $product = $item->product;

        if ($request->quantity > $product->QuantityInStock) {
            return redirect()->back()->with('error', 'Requested quantity exceeds available stock');
        }

        $item->update([
            'Quantity' => $request->quantity,
            'TotalPrice' => $request->quantity * $item->PricePerUnit
        ]);

        return redirect()->back()->with('success', 'Cart updated!');
    }

    // Remove item from cart
    public function remove(CartItem $item)
    {
        $item->delete();
        return response()->json(['success' => true, 'message' => 'Item removed from cart']);
    }
}
