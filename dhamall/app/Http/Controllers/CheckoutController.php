<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\UserPaymentDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $cart = session()->get('cart', []);
    $shippingAddress = $user->shippingAddresses()->where('is_default', true)->first();
    $paymentMethod = $user->userPaymentDetails()->where('is_default', true)->first();

    return view('users.buyer.product.checkout', compact('cart', 'shippingAddress', 'paymentMethod'));
}



    public function process(Request $request)
    {
        $request->validate([
            'shipping_address_id' => 'required|exists:shipping_addresses,id',
            'payment_method_id' => 'required|exists:user_payment_details,id', // Changed
        ]);

        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => Auth::id(),
                'shipping_address_id' => $request->shipping_address_id,
                'total_amount' => array_sum(array_column(session('cart'), 'price')),
                'status' => 'pending',
            ]);

            foreach (session('cart', []) as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            // Fetch selected payment method
            $paymentDetail = UserPaymentDetail::find($request->payment_method_id);

            // Store payment details
            DB::table('user_payment_transactions')->insert([
                'order_id' => $order->id,
                'user_id' => Auth::id(),
                'payment_type' => $paymentDetail->payment_type,
                'account_number' => $paymentDetail->account_number,
                'paypal_email' => $paymentDetail->paypal_email,
                'bank_name' => $paymentDetail->bank_name,
                'status' => 'pending',
                'amount_paid' => $order->total_amount,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();
            session()->forget('cart');
            return redirect()->route('checkout.index')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
