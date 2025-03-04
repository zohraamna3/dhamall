<form id="checkoutForm" method="POST" action="{{ route('payment.update', $paymentMethod->id) }}">
    @csrf

    <!-- Shipping Address -->
    <div class="mb-4">
        <h4 class="text-warning text-center rounded p-5 bg-dark m-5 border-start border-end border-bottom border-white border-1">
            Shipping Details</h4>

        <!-- Address -->
        <div class="mb-3">
            <h5 class="text-warning">Address Line 1</h5>
            <p class="editable" data-field="address_line1">{{ $shippingAddress->address_line1 }}</p>
            <input type="text" name="address_line1" class="form-control d-none"
                   value="{{ $shippingAddress->address }}">
        </div>

        <!-- City -->
        <div class="mb-3">
            <h5 class="text-warning">City</h5>
            <p class="editable" data-field="city">{{ $shippingAddress->city }}</p>
            <input type="text" name="city" class="form-control d-none" value="{{ $shippingAddress->city }}">
        </div>

        <!-- State -->
        <div class="mb-3">
            <h5 class="text-warning">State</h5>
            <p class="editable" data-field="state">{{ $shippingAddress->state }}</p>
            <input type="text" name="state" class="form-control d-none"
                   value="{{ $shippingAddress->state }}">
        </div>

        <!-- Postal Code -->
        <div class="mb-3">
            <h5 class="text-warning">Postal Code</h5>
            <p class="editable" data-field="zip_code">{{ $shippingAddress->zip_code }}</p>
            <input type="text" name="zip_code" class="form-control d-none"
                   value="{{ $shippingAddress->zip_code }}">
        </div>

        <!-- Country -->
        <div class="mb-3">
            <h5 class="text-warning">Country</h5>
            <p class="editable" data-field="country">{{ $shippingAddress->country }}</p>
            <input type="text" name="country" class="form-control d-none"
                   value="{{ $shippingAddress->country }}">
        </div>
    </div>

    <!-- Payment Method -->
    <div class="mb-4">
        <h4 class="text-warning">Payment Method</h4>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" id="credit_card"
                   value="credit_card" {{ $paymentMethod->payment_type == 'credit_card' ? 'checked' : 'disabled' }}>
            <label class="form-check-label" for="credit_card">Credit Card</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" id="paypal"
                   value="paypal" {{ $paymentMethod->payment_type == 'paypal' ? 'checked' : 'disabled' }}>
            <label class="form-check-label" for="paypal">PayPal</label>
        </div>
    </div>

    <!-- Payment Details -->
    <div class="mb-4">
        <h4 class="text-warning text-center rounded p-5 bg-dark m-5 border-start border-end border-bottom border-white border-1">
            Payment Details</h4>

        <h5 class="text-warning">Payment Id</h5>
        <p class="editable" data-field="payment_id">{{ $paymentMethod->id }}</p>

        <!-- Card Details (Visible only if Credit Card is selected) -->
        <div id="cardDetails" class="{{ $paymentMethod->payment_type == 'paypal' ? 'd-none' : '' }}">
            <!-- Card Number -->
            <div class="mb-3">
                <h5 class="text-warning">Card Number</h5>
                <p class="editable" data-field="card_number">{{ $paymentMethod->account_number }}</p>
                <input type="number" name="card_number" class="form-control d-none"
                       value="{{ $paymentMethod->account_number }}">
            </div>

            <!-- Expiry Date -->
            <div class="mb-3">
                <h5 class="text-warning">Expiry Date</h5>
                <p class="editable" data-field="expiry_date">{{ $paymentMethod->expiry_date }}</p>
                <input type="date" name="expiry_date" class="form-control d-none"
                       value="{{ $paymentMethod->expiry_date }}">
            </div>

            <!-- CVV -->
            <div class="mb-3">
                <h5 class="text-warning">CVV</h5>
                <p class="editable" data-field="cvv">{{ $paymentMethod->cvv }}</p>
                <input type="number" name="cvv" class="form-control d-none"
                       value="{{ $paymentMethod->cvv }}">
            </div>

            <!-- Name on Card -->
            <div class="mb-3">
                <h5 class="text-warning">Name on Card</h5>
                <p class="editable" data-field="card_name">{{ $paymentMethod->card_name }}</p>
                <input type="text" name="card_name" class="form-control d-none"
                       value="{{ $paymentMethod->card_name }}">
            </div>
        </div>
    </div>

    <!-- Order Summary -->
    <div class="mb-4">
        <h4 class="text-warning">Order Summary</h4>
        <ul class="list-group bg-transparent">
            @foreach($cart as $item)
                <li class="list-group-item bg-transparent border-warning text-white d-flex justify-content-between align-items-center">
                    <span>{{ $item['name'] }}</span> - ${{ $item['price'] }} x {{ $item['quantity'] }}
                    <span
                        class="badge bg-warning text-dark">${{ $item['price'] * $item['quantity'] }}</span>
                </li>
            @endforeach
        </ul>
    </div>
    <div id="editActions" class="d-none mt-3">
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save me-2"></i> Save Changes
        </button>
        <button type="button" id="cancelEdit" class="btn btn-secondary">
            <i class="fas fa-times me-2"></i> Cancel
        </button>
    </div>

    <!-- Proceed to Checkout Button -->
    <div class="text-center">
        <a href="{{ route('checkout.process') }}" class="btn btn-success">Proceed to Checkout</a>
    </div>
</form>
