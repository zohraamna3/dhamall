<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\PaymentDetail;
use DateTime;
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
        // Validate and sanitize input data
        $inputData = $request->all();
        $inputData['PaymentMethod'] = trim($inputData['PaymentMethod'] ?? '');

        // Nullify appropriate fields based on the payment method selection
        if (empty($inputData['PaymentMethod'])) {
            $inputData['CardNumber'] = null;
            $inputData['ExpiryDate'] = null;
            $inputData['CVV'] = null;
            $inputData['NameOnCard'] = null;
            $inputData['Zip'] = null;
        } elseif ($inputData['PaymentMethod'] !== 'Credit Card') {
            $inputData['CardNumber'] = null;
            $inputData['ExpiryDate'] = null;
            $inputData['CVV'] = null;
            $inputData['NameOnCard'] = null;
        }

        if (isset($inputData['ExpiryDate']) && $inputData['ExpiryDate']) {
            try {
                $dateTime = new DateTime($inputData['ExpiryDate']);
                $inputData['ExpiryDate'] = $dateTime->format('Y-m-d');
            } catch (\Exception $e) {
                $inputData['ExpiryDate'] = null;
            }
        }

        $validated = $request->validate([
            'PaymentMethod' => 'nullable|in:Credit Card,PayPal,Cash on Delivery',
            'CardNumber' => 'required_if:PaymentMethod,Credit Card|nullable|string|size:16',
            'ExpiryDate' => 'required_if:PaymentMethod,Credit Card|nullable|date_format:Y-m-d',
            'NameOnCard' => 'required_if:PaymentMethod,Credit Card|nullable|string|max:100',
            'CVV' => 'required_if:PaymentMethod,Credit Card|nullable|string|size:3',
            'Zip' => 'nullable|string|max:10'
        ]);

        // Create payment details
        $payment = Auth::user()->paymentDetails()->create($validated);

        // Update the checkout details
        $checkoutDetail = Auth::user()->checkoutDetails;
        if ($checkoutDetail) {
            $checkoutDetail->update(['PaymentId' => $payment->id]);
        }

        return redirect()->route('profile.edit')
            ->with('success', 'Payment method saved successfully');
    }
    public function update(Request $request, PaymentDetail $paymentDetail)
    {
        // Get all input data
        $inputData = $request->all();
        $inputData['PaymentMethod'] = trim($inputData['PaymentMethod'] ?? '');

        // Log the selected payment method
        Log::info($inputData['PaymentMethod']);

        // Nullify all card-related fields unless the payment method is Credit Card
        if ($inputData['PaymentMethod'] !== 'Credit Card') {
            Log::info('not a credit card');
            $inputData['CardNumber'] = null;
            $inputData['ExpiryDate'] = null;
            $inputData['CVV'] = null;
            $inputData['NameOnCard'] = null;
            $inputData['Zip'] = null;
        } else {
            // If it's Credit Card, ensure date is formatted
            if (isset($inputData['ExpiryDate']) && !empty($inputData['ExpiryDate'])) {
                try {
                    $dateTime = new DateTime($inputData['ExpiryDate']);
                    $inputData['ExpiryDate'] = $dateTime->format('Y-m-d');
                } catch (\Exception $e) {
                    $inputData['ExpiryDate'] = null; // Handle exception if needed
                }
            }
        }

        // Validate input data
        $validated = $request->validate([
            'PaymentMethod' => 'nullable|in:Credit Card,PayPal,Cash on Delivery',
            'CardNumber' => 'required_if:PaymentMethod,Credit Card|nullable|string|size:16',
            'ExpiryDate' => 'required_if:PaymentMethod,Credit Card|nullable|date_format:Y-m-d',
            'NameOnCard' => 'required_if:PaymentMethod,Credit Card|nullable|string|max:100',
            'CVV' => 'required_if:PaymentMethod,Credit Card|nullable|string|size:3',
            'Zip' => 'nullable|string|max:10'
        ]);

        // Update payment details in the database
        Log::info($paymentDetail);
        $paymentDetail->update($validated);
        Log::info($paymentDetail);
        // Update the corresponding checkout detail record
        $checkoutDetail = Auth::user()->checkoutDetails;
        if ($checkoutDetail) {
            $checkoutDetail->update(['PaymentId' => $paymentDetail->id]);
        }

        return redirect()->route('profile.edit')
            ->with('success', 'Payment details updated successfully');
    }
}
