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

        if ($product->QuantityInStock <= 0) {
            return redirect()->back()->with('error', 'This product is out of stock');
        }

        if ($quantity > $product->QuantityInStock) {
            return redirect()->back()->with('error', 'Requested quantity exceeds available stock');
        }

        $cart = $this->getCart();

        // Check if product already in cart
        $existingItem = $cart->items()->where('ProductId', $product->id)->first();

        try {
            if ($existingItem) {
                $newQuantity = $existingItem->Quantity + $quantity;
                if ($newQuantity > $product->QuantityInStock) {
                    return redirect()->back()->with('error', 'Cannot add more than available stock');
                }

                $existingItem->update([
                    'Quantity' => $newQuantity,
                    'TotalPrice' => $newQuantity * $product->Price
                ]);
            } else {
                CartItem::create([
                    'CartId' => $cart->id,
                    'ProductId' => $product->id,
                    'Quantity' => $quantity,
                    'PricePerUnit' => $product->Price,
                    'TotalPrice' => $quantity * $product->Price
                ]);
            }

            return redirect()->route('cart.index')->with('success', 'Product added to cart!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add product to cart: ' . $e->getMessage());
        }
    }

    // View cart
    public function index()
    {
        $cart = $this->getCart();
        $items = $cart->items()->with('product.images')->get();
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
        return redirect()->back()->with('success', 'Item removed from cart');
    }
}
