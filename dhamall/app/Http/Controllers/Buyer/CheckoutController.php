<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\BuyerCheckoutDetail;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\PaymentDetail;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cart = Cart::with(['items.product'])->where('UserId', $user->id)->firstOrFail();

        if ($cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        $total = $cart->items->sum('TotalPrice');

        // Get addresses through BuyerCheckoutDetail
        $addresses = $user->addresses;

        $paymentMethods = $user->paymentDetails;

        return view('users.buyer.product.checkout', compact('cart', 'total', 'addresses', 'paymentMethods'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'address_id' => 'required|exists:addresses,id',
            'payment_id' => 'required|exists:payment_details,id',
            'notes' => 'nullable|string|max:500'
        ]);

        $user = Auth::user();
        $cart = Cart::with('items')->where('UserId', $user->id)->firstOrFail();

        // Create checkout details
        $checkout = BuyerCheckoutDetail::create([
            'UserId' => $user->id,
            'AddressId' => $request->address_id,
            'PaymentId' => $request->payment_id,
            'Notes' => $request->notes,
            'TotalAmount' => $cart->items->sum('TotalPrice')
        ]);

        // Clear the cart
        $cart->items()->delete();

        return redirect()->route('users.buyer.success')->with('success', 'Order placed successfully!');
    }

    public function success()
    {
        return view('users.buyer.success');
    }
}
