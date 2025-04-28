<?php
namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\BuyerCheckoutDetail; // Make sure to import the BuyerCheckoutDetail model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{


    public function store(Request $request)
    {
        // Validate and sanitize input data
        $validated = $request->validate([
            'Country' => 'required|string|max:100',
            'CityOrState' => 'required|string|max:100',
            'Street' => 'required|string|max:255',
            'PostalCode' => 'required|string|max:20',
            'Map' => 'required|string|max:500',
        ]);

        $user = Auth::user();

        // Create the address and associate it with the user
        $address = Address::create($validated); // Save the new address

        // Find or create the checkout detail for the user
        $checkoutDetail = $user->checkoutDetails()->first();

        if ($checkoutDetail) {
            // Update the AddressId in the checkout detail if the record exists
            $checkoutDetail->update(['AddressId' => $address->id]);
        } else {
            // If it doesn't exist, create a new checkout detail
            BuyerCheckoutDetail::create([
                'UserId' => $user->id,
                'AddressId' => $address->id,
                'PaymentId' => null // Set this or handle appropriately
            ]);
        }

        return redirect()->route('profile.edit')
            ->with('success', 'Address added successfully');
    }

    public function update(Request $request, Address $address)
    {
        // Validate and sanitize input data
        $validated = $request->validate([
            'Country' => 'required|string|max:100',
            'CityOrState' => 'required|string|max:100',
            'Street' => 'required|string|max:255',
            'PostalCode' => 'required|string|max:20',
            'Map' => 'required|string|max:500',
        ]);

        // Update the address
        $address->update($validated);

        // Find the user's checkout detail
        $checkoutDetail = Auth::user()->checkoutDetails()->first();

        if ($checkoutDetail) {
            // Update the AddressId in case the user's address was changed
            $checkoutDetail->update(['AddressId' => $address->id]);
        }

        return redirect()->route('profile.edit')
            ->with('success', 'Address updated successfully');
    }
}
