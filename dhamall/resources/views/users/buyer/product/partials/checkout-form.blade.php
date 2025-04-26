<form id="checkoutForm" method="POST" action="{{ route('payment.update', $paymentMethod->id) }}">
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
            <input type="text" name="address_line1" class="form-control d-none"
                   value="{{ $shippingAddress->Street }}">
        </div>

        <!-- City -->
        <div class="mb-3">
            <h5 class="text-warning">City</h5>
            <p class="editable" data-field="city">{{ $shippingAddress->CityOrState }}</p>
            <input type="text" name="city" class="form-control d-none" value="{{ $shippingAddress->CityOrState }}">
        </div>

        <!-- State -->
        <div class="mb-3">
            <h5 class="text-warning">State</h5>
            <p class="editable" data-field="state">{{ $shippingAddress->CityOrState }}</p>
            <input type="text" name="state" class="form-control d-none"
                   value="{{ $shippingAddress->CityOrState }}">
        </div>

        <!-- Postal Code -->
        <div class="mb-3">
            <h5 class="text-warning">Postal Code</h5>
            <p class="editable" data-field="zip_code">{{ $shippingAddress->PostalCode }}</p>
            <input type="text" name="zip_code" class="form-control d-none"
                   value="{{ $shippingAddress->PostalCode }}">
        </div>

        <!-- Country -->
        <div class="mb-3">
            <h5 class="text-warning">Country</h5>
            <p class="editable" data-field="country">{{ $shippingAddress->Country }}</p>
            <input type="text" name="country" class="form-control d-none"
                   value="{{ $shippingAddress->Country }}">
        </div>
    </div>

    <!-- Payment Method -->
    <div class="mb-4">
        <h4 class="text-warning text-center rounded p-2 p-lg-5 bg-dark m-2 m-lg-5 border border-white">
            Payment Method
        </h4>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" id="credit_card"
                   value="Credit Card" {{ $paymentMethod->PaymentMethod == 'Credit Card' ? 'checked' : 'disabled' }}>
            <label class="form-check-label" for="credit_card">Credit Card</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" id="paypal"
                   value="PayPal" {{ $paymentMethod->PaymentMethod == 'PayPal' ? 'checked' : 'disabled' }}>
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
                <input type="number" name="card_number" class="form-control d-none"
                       value="{{ $paymentMethod->CardNumber }}">
            </div>

            <!-- Expiry Date -->
            <div class="mb-3">
                <h5 class="text-warning">Expiry Date</h5>
                <p class="editable" data-field="expiry_date">{{ $paymentMethod->ExpiryDate }}</p>
                <input type="date" name="expiry_date" class="form-control d-none"
                       value="{{ $paymentMethod->ExpiryDate }}">
            </div>

            <!-- CVV -->
            <div class="mb-3">
                <h5 class="text-warning">CVV</h5>
                <p class="editable" data-field="cvv">{{ $paymentMethod->CVV }}</p>
                <input type="number" name="cvv" class="form-control d-none"
                       value="{{ $paymentMethod->CVV }}">
            </div>

            <!-- Name on Card -->
            <div class="mb-3">
                <h5 class="text-warning">Name on Card</h5>
                <p class="editable" data-field="card_name">{{ $paymentMethod->NameOnCard }}</p>
                <input type="text" name="card_name" class="form-control d-none"
                       value="{{ $paymentMethod->NameOnCard }}">
            </div>
        </div>
    </div>

    <!-- Order Summary -->
    <div class="mb-4">
        <h4 class="text-warning text-center rounded p-2 p-lg-5 bg-dark m-2 m-lg-5 border border-white">
            Order Summary
        </h4>
        <ul class="list-group bg-transparent">
            @if($cart && $cart->items->isNotEmpty())
                @foreach($cart->items as $item)
                    <li class="list-group-item bg-transparent border-warning text-white d-flex justify-content-between align-items-center">
                        <span>{{ $item->product->name }}</span> - ${{ $item->PricePerUnit }} x {{ $item->Quantity }}
                        <span class="badge bg-warning text-dark">${{ $item->PricePerUnit * $item->Quantity }}</span>
                    </li>
                @endforeach
            @else
                <li class="list-group-item bg-transparent text-white">No items in your cart.</li>
            @endif
        </ul>
    </div>
    <!-- Edit Actions -->
    <div id="editActions" class="d-none my-3 row justify-content-center">
        <button type="submit" class="btn btn-success mb-2">
            <i class="fas fa-save me-2"></i> Save Changes
        </button>
        <button type="button" id="cancelEdit" class="btn btn-secondary">
            <i class="fas fa-times me-2"></i> Cancel
        </button>
    </div>

    <!-- Proceed to Checkout Button -->
    <div class="text-center">
        <a href="{{ route('checkout.process') }}" class="btn btn-success">Checkout</a>
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
