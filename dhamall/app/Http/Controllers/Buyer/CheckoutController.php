<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\BuyerCheckoutDetail;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\PaymentDetail;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Retrieve the user's cart with its items
        $cart = Cart::with(['items.product.images'])->where('UserId', $user->id)->first();
        Log::info('cart = '.$cart);
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
        // Validate the incoming request
        $request->validate([
            'address_id' => 'required|exists:addresses,id',
            'payment_id' => 'required|exists:payment_details,id'
        ]);

        $user = Auth::user();
        $cart = Cart::with(['items.product'])->where('UserId', $user->id)->firstOrFail();

        // Find or update the checkout detail for the user
        $checkoutDetail = BuyerCheckoutDetail::where('UserId', $user->id)->first();

        if ($checkoutDetail) {
            $checkoutDetail->update([
                'AddressId' => $request->address_id,
                'PaymentId' => $request->payment_id,
                'updated_at' => now()
            ]);
        } else {
            $checkoutDetail = BuyerCheckoutDetail::create([
                'UserId' => $user->id,
                'AddressId' => $request->address_id,
                'PaymentId' => $request->payment_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Create a new order

        // Get the user's city from the address
        $totalBill = 0; // Initialize total bill amount
        $totalShippingFee = 0; // Initialize total shipping fee
        $userCity = $checkoutDetail->address->CityOrState;

        // Create order items from the cart items
        foreach ($cart->items as $cartItem) {
            $product = $cartItem->product;
            $shippingMethod = $product->shipping; // Get the shipping method for this product

            // Check if the shipping is available for the user's city
            if ($shippingMethod) {
                // Perform 'like' check for city
                $isShippingAvailable = \App\Models\Shipping::where('id', $product->ShippingId)
                    ->where('City', 'like', '%'.$userCity.'%')
                    ->exists();

                if (!$isShippingAvailable) {
                    // If shipping is not allowed for user's city, throw an error
                    return redirect()->route('checkout.index')->withErrors(['error' => "Shipping is not available for '{$product->ProductName}' in your city."]);
                }

                // Add the shipping fee to total shipping fees
                $totalShippingFee += $shippingMethod->ShippingFee;
            } else {
                return redirect()->route('checkout.index')->withErrors(['error' => "Shipping method not found for '{$product->ProductName}'"]);
            }

            // Calculate total price for the item
            $totalBill += $cartItem->PricePerUnit * $cartItem->Quantity; // Calculate total items bill
        }

        // Update total bill with shipping fee
        $totalBill += $totalShippingFee; // Add total shipping fee to total bill
        $order = Order::create([
            'UserId' => $user->id,
            'OrderDate' => now(),
            'Status' => 'Pending', // or other default status
            'TotalBill' => 0 // Placeholder; will update after calculating
        ]);

        // Create Order Items
        foreach ($cart->items as $cartItem) {
            $product = $cartItem->product;
            OrderItem::create([
                'OrderId' => $order->id,
                'ProductId' => $product->id,
                'OrderDate' => now(),
                'Status' => 'Pending', // Default status based on your logic
                'Quantity' => $cartItem->Quantity,
                'PricePerUnit' => $cartItem->PricePerUnit,
                // Do not include TotalPrice here
            ]);
        }

        // Update total bill in order with shipping fee
        $order->update(['TotalBill' => $totalBill]);

        // Clear the user's cart
        $cart->items()->delete();

        // Redirect with success message and pass order details
        return redirect()->route('checkout.success', ['order' => $order->id])
            ->with('success', 'Order placed successfully!');
    }
    public function success(Request $request)
    {
        // Retrieve the order using the ID passed in the route
        $orderId = $request->route('order'); // Get the order ID from the route parameters
        $order = Order::with(['items.product.shipping'])->findOrFail($orderId); // Fetch order with related items, products, and shipping

        // Fetch the checkout details for the authenticated user
        $checkoutDetail = BuyerCheckoutDetail::with('paymentDetail') // Use eager loading to get payment details
        ->where('UserId', Auth::id())
            ->first();

        // Retrieve shipping fee
        $shippingFee = \App\Models\Shipping::where('City', 'like', '%'.$checkoutDetail->address->CityOrState.'%')->first();
        $shippingFeeAmount = $shippingFee ? $shippingFee->ShippingFee : 0;

        return view('users.buyer.product.success', compact('order', 'checkoutDetail', 'shippingFeeAmount'));
    }
}
