<form id="checkoutForm" action="{{ route('checkout.process') }}" method="post">
    @csrf

    <!-- Shipping Address -->
    <div class="mb-4">
        <h4 class="text-warning text-center rounded p-2 p-lg-5 bg-dark m-2 m-lg-5 border border-white">
            Shipping Details
        </h4>

        <!-- Address -->
        <div class="mb-3">
            <h5 class="text-warning">Address Line 1</h5>
            <p class="editable" data-field="address_line1">{{ $shippingAddress->Street }}</p>
            <input type="hidden" name="address_id" value="{{ $shippingAddress->id }}"> <!-- Address ID -->
            <input type="text" name="address_line1" class="form-control d-none" value="{{ $shippingAddress->Street }}">
        </div>

        <!-- City -->
        <div class="mb-3">
            <h5 class="text-warning">City</h5>
            <p class="editable" data-field="city">{{ $shippingAddress->CityOrState }}</p>
            <input type="text" name="city" class="form-control d-none" value="{{ $shippingAddress->CityOrState }}">
        </div>

        <!-- Postal Code -->
        <div class="mb-3">
            <h5 class="text-warning">Postal Code</h5>
            <p class="editable" data-field="zip_code">{{ $shippingAddress->PostalCode }}</p>
            <input type="text" name="zip_code" class="form-control d-none" value="{{ $shippingAddress->PostalCode }}">
        </div>

        <!-- Country -->
        <div class="mb-3">
            <h5 class="text-warning">Country</h5>
            <p class="editable" data-field="country">{{ $shippingAddress->Country }}</p>
            <input type="text" name="country" class="form-control d-none" value="{{ $shippingAddress->Country }}">
        </div>

        <!-- Google Map Link -->
        <div class="mb-3">
            <h5 class="text-warning">Google Map Location Link</h5>
            <p class="editable" data-field="map">{{ $shippingAddress->Map ?? 'Not provided' }}</p>
            <input type="url" name="map" class="form-control d-none" value="{{ $shippingAddress->Map }}" placeholder="Enter Google Map link">
        </div>
    </div>

    <!-- Payment Method -->
    <div class="mb-4">
        <h4 class="text-warning text-center rounded p-2 p-lg-5 bg-dark m-2 m-lg-5 border border-white">
            Payment Method
        </h4>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_id" id="credit_card"
                   value="{{ $paymentMethod->id }}" {{ $paymentMethod->PaymentMethod == 'Credit Card' ? 'checked' : 'disabled' }}>
            <label class="form-check-label" for="credit_card">Credit Card</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_id" id="paypal"
                   value="{{ $paymentMethod->id }}" {{ $paymentMethod->PaymentMethod == 'PayPal' ? 'checked' : 'disabled' }}>
            <label class="form-check-label" for="paypal">PayPal</label>
        </div>
    </div>

    <!-- Payment Details -->
    <div class="mb-4">
        <h4 class="text-warning text-center rounded p-2 p-lg-5 bg-dark m-2 m-lg-5 border border-white">
            Payment Details
        </h4>

        <!-- Card Details (Visible only if Credit Card is selected) -->
        <div id="cardDetails" class="{{ $paymentMethod->PaymentMethod == 'paypal' ? 'd-none' : '' }}">
            <!-- Card Number -->
            <div class="mb-3">
                <h5 class="text-warning">Card Number</h5>
                <p class="editable" data-field="card_number">{{ $paymentMethod->CardNumber }}</p>
                <input type="number" name="card_number" class="form-control d-none" value="{{ $paymentMethod->CardNumber }}">
            </div>

            <!-- Expiry Date -->
            <div class="mb-3">
                <h5 class="text-warning">Expiry Date</h5>
                <p class="editable" data-field="expiry_date">{{ $paymentMethod->ExpiryDate }}</p>
                <input type="date" name="expiry_date" class="form-control d-none" value="{{ $paymentMethod->ExpiryDate }}">
            </div>

            <!-- CVV -->
            <div class="mb-3">
                <h5 class="text-warning">CVV</h5>
                <p class="editable" data-field="cvv">{{ $paymentMethod->CVV }}</p>
                <input type="number" name="cvv" class="form-control d-none" value="{{ $paymentMethod->CVV }}">
            </div>

            <!-- Name on Card -->
            <div class="mb-3">
                <h5 class="text-warning">Name on Card</h5>
                <p class="editable" data-field="card_name">{{ $paymentMethod->NameOnCard }}</p>
                <input type="text" name="card_name" class="form-control d-none" value="{{ $paymentMethod->NameOnCard }}">
            </div>
        </div>
    </div>

    <!-- Order Summary -->
    <div class="mb-4">
        <h4 class="text-warning text-center rounded p-2 p-lg-5 bg-dark m-2 m-lg-5 border border-white">
            Order Summary
        </h4>
        <div class="table-responsive">
            <table class="table table-dark" style="background-color: rgba(0, 0, 0, 0.5);">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price Per Unit</th>
                    <th>Total</th>
                    <th>Shipping Method</th>
                    <th>Available for City</th>
                    <th>Shipping Fee</th>
                </tr>
                </thead>
                <tbody>
                @if($cart && $cart->items->isNotEmpty())
                    @php $totalAmount = 0; $totalShippingFee = 0; @endphp
                    @foreach($cart->items as $item)
                        @php
                            $itemTotal = $item->PricePerUnit * $item->Quantity;
                            $totalAmount += $itemTotal;
                            $productShippingMethod = $item->product->shipping; // Get shipping method for the product
                            $shippingFee = $productShippingMethod ? $productShippingMethod->ShippingFee : 0; // Get shipping fee
                            $totalShippingFee += $shippingFee; // Accumulate total shipping fee

                            $isShippingAvailable = ''; // Initialize shipping availability message

                            if ($productShippingMethod) {
                                // Check if shipping is available for the user's city with 'like'
                                $isAvailable = \App\Models\Shipping::where('id', $productShippingMethod->id)
                                    ->where('City', 'like', '%' . $shippingAddress->CityOrState . '%')
                                    ->exists();

                                $isShippingAvailable = $isAvailable ? $shippingAddress->CityOrState : 'Not Available'; // Show availability
                            }
                        @endphp
                        <tr>
                            <td class="text-center">
                                <img src="{{ $item->product->images->first()->ImageURL ?? asset('images/default.png') }}" alt="{{ $item->product->ProductName }}" class="img-thumbnail" style="width: 80px; height: 80px;">
                                <div>{{ $item->product->ProductName }}</div>
                            </td>
                            <td class="text-center">{{ $item->Quantity }}</td>
                            <td class="text-center">${{ number_format($item->PricePerUnit, 2) }}</td>
                            <td class="text-center">${{ number_format($itemTotal, 2) }}</td>
                            <td class="text-center">{{ $productShippingMethod->Method ?? 'N/A' }}</td>
                            <td class="text-center">{{ $productShippingMethod->City ?? 'N/A' }}</td>
                            <td class="text-center">${{ number_format($shippingFee, 2) }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center">No items in your cart.</td>
                    </tr>
                @endif
                </tbody>
                <tfoot>
                @if($cart && $cart->items->isNotEmpty())
                    <tr>
                        <td colspan="3" class="text-end"><strong>Subtotal</strong></td>
                        <td class="text-center"><strong>${{ number_format($totalAmount, 2) }}</strong></td>
                        <td colspan="3" class="text-end"><strong>Total Shipping Fee: </strong>${{ number_format($totalShippingFee, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-end"><strong>Grand Total</strong></td>
                        <td class="text-center" colspan="4"><strong>${{ number_format($totalAmount + $totalShippingFee, 2) }}</strong></td>
                    </tr>
                @endif
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Proceed to Checkout Button -->
    <div class="text-center">
        <button type="submit" class="btn btn-success">Checkout</button>
    </div>
</form>

<!-- Responsive CSS -->
<style>
    /* Adjust padding and margins for small screens */
    @media (max-width: 767.98px) {
        h4 {
            font-size: 1rem; /* Smaller font size for headings */
            padding: 1rem !important; /* Reduce padding */
            margin: 1rem !important; /* Reduce margin */
        }

        h5 {
            font-size: 0.85rem; /* Smaller font size for subheadings */
        }

        .form-control {
            font-size: 0.9rem; /* Smaller font size for inputs */
        }

        .btn {
            font-size: 0.9rem; /* Smaller font size for buttons */
            padding: 0.5rem 1rem; /* Adjust button padding */
        }

        .list-group-item {
            font-size: 0.9rem; /* Smaller font size for list items */
        }

        .badge {
            font-size: 0.8rem; /* Smaller font size for badges */
        }
    }

    /* Adjustments for very small screens (below 400px) */
    @media (max-width: 399.98px) {
        h4 {
            font-size: 0.9rem; /* Further reduce heading size */
            padding: 0.75rem !important; /* Further reduce padding */
            margin: 0.75rem !important; /* Further reduce margin */
        }

        h5 {
            font-size: 0.75rem; /* Further reduce subheading size */
        }

        .form-control {
            font-size: 0.8rem; /* Further reduce input font size */
        }

        .btn {
            font-size: 0.8rem; /* Further reduce button font size */
            padding: 0.4rem 0.8rem; /* Further adjust button padding */
        }

        .list-group-item {
            font-size: 0.8rem; /* Further reduce list item font size */
        }

        .badge {
            font-size: 0.7rem; /* Further reduce badge font size */
        }
    }
</style>
