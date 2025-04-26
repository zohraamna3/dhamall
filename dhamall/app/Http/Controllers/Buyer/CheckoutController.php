<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\BuyerCheckoutDetail;
use App\Models\Cart;
use App\Models\PaymentDetail;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Retrieve the user's cart with its items
        $cart = Cart::with(['items.product'])->where('UserId', $user->id)->first();

        if ($cart->items->isEmpty()) {
            return redirect()->route('profile.edit')->with('error', 'Your cart is empty');
        }

        // Fetch the checkout details (shipping address and payment method)
        $checkoutDetail = $user->checkoutDetails; // Get the relationship defined in User model
        $shippingAddress = $checkoutDetail ? $checkoutDetail->address : null; // Get address through checkout detail
        $paymentMethod = $checkoutDetail ? $checkoutDetail->paymentDetail : null; // Get payment method through checkout detail


        Log::info($paymentMethod);
        Log::info($shippingAddress);
        Log::info($checkoutDetail);

        return view('users.buyer.product.checkout', compact('cart', 'shippingAddress', 'paymentMethod'));
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
        BuyerCheckoutDetail::create([
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
