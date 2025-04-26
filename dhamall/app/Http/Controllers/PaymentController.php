<?php

namespace App\Http\Controllers;

use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        Log::info("Before Validation");
        $inputData = $request->all();
        $inputData['PaymentMethod'] = trim($inputData['PaymentMethod']);

// If the ExpiryDate is in ISO 8601 format, convert it
        if (isset($inputData['ExpiryDate'])) {
            $dateTime = new DateTime($inputData['ExpiryDate']);
            $inputData['ExpiryDate'] = $dateTime->format('Y-m-d'); // Convert to YYYY-MM-DD format
        }

        $validated = $request->validate([
            'PaymentMethod' => 'required|in:Credit Card,PayPal,Cash on Delivery',
            'CardNumber' => 'required_if:PaymentMethod,Credit Card|nullable|string|size:16', // Ensure CardNumber is a string and has 16 digits
            'ExpiryDate' => 'required_if:PaymentMethod,Credit Card|nullable|string|date_format:Y-m-d', // Ensure ExpiryDate is in Y-m-d format
            'NameOnCard' => 'required_if:PaymentMethod,Credit Card|nullable|string|max:100',
            'CVV' => 'required_if:PaymentMethod,Credit Card|nullable|string|size:3', // Ensure CVV is a string and has 3 digits
            'Zip' => 'nullable|string|size:5' // Ensure ZIP is a string and has exactly 5 characters
        ]);

        Log::info("Payment Details are below: ");
        Log::info(
            $paymentDetail
        );
        Log::info("\n\n\nValidated are below: ");
        Log::info(
            $validated
        );
        $paymentDetail->update($validated);

        return redirect()->route('profile.edit', ['section' => 'payment-details'])
            ->with('success', 'Payment details updated successfully');
    }
}
