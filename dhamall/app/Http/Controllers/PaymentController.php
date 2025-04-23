<?php

namespace App\Http\Controllers;

use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function create()
    {
        return view('users.buyer.profile.pages.payment_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'PaymentMethod' => 'required|in:Credit Card,PayPal,Cash on Delivery',
            'CardNumber' => 'required_if:PaymentMethod,Credit Card|nullable|digits:16',
            'ExpiryDate' => 'required_if:PaymentMethod,Credit Card|nullable|date_format:Y-m',
            'CVV' => 'required_if:PaymentMethod,Credit Card|nullable|digits:3,4',
            'NameOnCard' => 'required_if:PaymentMethod,Credit Card|nullable|string|max:100',
            'Zip' => 'nullable|string|max:10'
        ]);

        // Create payment details
        $payment = PaymentDetail::create($validated);

        // Associate with user through checkout details
        Auth::user()->checkoutDetails()->create([
            'PaymentId' => $payment->id
        ]);

        return redirect()->route('profile.edit', ['section' => 'payment-details'])
            ->with('success', 'Payment method added successfully');
    }

    public function update(Request $request, PaymentDetail $paymentDetail)
    {
        $validated = $request->validate([
            'PaymentMethod' => 'required|in:Credit Card,PayPal,Cash on Delivery',
            'CardNumber' => 'required_if:PaymentMethod,Credit Card|nullable|digits:16',
            'ExpiryDate' => 'required_if:PaymentMethod,Credit Card|nullable|date_format:Y-m',
            'NameOnCard' => 'required_if:PaymentMethod,Credit Card|nullable|string|max:100',
            'Zip' => 'nullable|string|max:10'
        ]);

        $paymentDetail->update($validated);

        return redirect()->route('profile.edit', ['section' => 'payment-details'])
            ->with('success', 'Payment details updated successfully');
    }
}
