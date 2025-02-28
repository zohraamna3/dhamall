@extends('layouts.app')

@section('hero')
<div class="position-relative text-white text-center py-5 w-100" style="background: linear-gradient(135deg, #0d0d1a, #1a1a2e); overflow: hidden;">
    <div class="position-absolute top-0 start-0 w-100" style="background: linear-gradient(to bottom, rgba(26, 26, 46, 0.4), rgba(26, 26, 46, 0.9));"></div>
    <div class="position-relative z-index-2 p-5 mx-auto rounded-lg" style="max-width: 700px; background: linear-gradient(135deg, #1a1a2e, #24243e); backdrop-filter: blur(8px); border-radius: 15px; padding: 30px;">
        <h1 class="display-4 fw-bold text-warning animate__animated animate__fadeIn" style="text-shadow: 0 0 15px rgba(179, 163, 28, 0.6);">
            Secure & Hassle-Free Checkout
        </h1>
        <p class="lead text-light animate__animated animate__fadeIn animate__delay-1s">
            Complete your purchase with confidence and ease.
        </p>
    </div>
</div>
@endsection

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-lg position-relative" style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">
        
        <button type="button" id="editBtn" class="btn btn-primary position-absolute top-0 end-0 m-3">Edit</button>
        
        <h2 class="text-center text-warning">Checkout</h2>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        
        <form id="checkoutForm" method="POST" action="{{ route('payment.update', $paymentMethod->id) }}">
            @csrf


            <!-- <button type="button" id="editBtn" class="btn btn-primary position-absolute top- end-0 m-3">Edit</button> -->
        
            <!-- Shipping Address -->
            <div class="mb-4">
                <h4 class="text-warning text-center rounded p-5 bg-dark m-5 border-start border-end border-bottom border-white border-1">Shipping Details</h4>
                
                <!-- Address -->
                <div class="mb-3">
                    <h5 class="text-warning">Address Line 1</h5>
                    <p class="editable" data-field="address_line1">{{ $shippingAddress->address_line1 }}</p>
                    <input type="text" name="address_line1" class="form-control d-none" value="{{ $shippingAddress->address }}">

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
                    <input type="text" name="state" class="form-control d-none" value="{{ $shippingAddress->state }}">
                </div>
                
                <!-- Postal Code -->
                <div class="mb-3">
                    <h5 class="text-warning">Postal Code</h5>
                    <p class="editable" data-field="zip_code">{{ $shippingAddress->zip_code }}</p>
                    <input type="text" name="zip_code" class="form-control d-none" value="{{ $shippingAddress->zip_code }}">
                </div>
                
                <!-- Country -->
                <div class="mb-3">
                    <h5 class="text-warning">Country</h5>
                    <p class="editable" data-field="country">{{ $shippingAddress->country }}</p>
                    <input type="text" name="country" class="form-control d-none" value="{{ $shippingAddress->country }}">
                </div>
            </div>
            
            <!-- Payment Method -->
            <div class="mb-4">
                <h4 class="text-warning">Payment Method</h4>
                <p class="editable" data-field="payment_method">{{ $paymentMethod->payment_type }}</p>
                <select name="payment_method" class="form-control d-none">
                    <option value="credit_card" {{ $paymentMethod->payment_type == 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                    <option value="paypal" {{ $paymentMethod->payment_type == 'paypal' ? 'selected' : '' }}>PayPal</option>
                    <option value="bank_transfer" {{ $paymentMethod->payment_type == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                </select>
            </div>
            
            <!-- Payment Details -->
            <div class="mb-4">
                <h4 class="text-warning text-center rounded p-5 bg-dark m-5 border-start border-end border-bottom border-white border-1">Payment Details</h4>
                

                <h5 class="text-warning">Payment Id</h5>
                <p class="editable" data-field="payment_id">{{ $paymentMethod->id }}</p>
                
                <!-- Card Number -->
                <div class="mb-3">
                    <h5 class="text-warning">Card Number</h5>
                    <p class="editable" data-field="card_number">{{ $paymentMethod->account_number }}</p>
                    <input type="number" name="card_number" class="form-control d-none" value="{{ $paymentMethod->account_number }}">
                </div>
                
                <!-- Expiry Date -->
                <div class="mb-3">
                    <h5 class="text-warning">Expiry Date</h5>
                    <p class="editable" data-field="expiry_date">{{ $paymentMethod->expiry_date }}</p>
                    <input type="date" name="expiry_date" class="form-control d-none" value="{{ $paymentMethod->expiry_date }}">
                </div>
                
                <!-- CVV -->
                <div class="mb-3">
                    <h5 class="text-warning">CVV</h5>
                    <p class="editable" data-field="cvv">{{ $paymentMethod->cvv }}</p>
                    <input type="number" name="cvv" class="form-control d-none" value="{{ $paymentMethod->cvv }}">
                </div>
                
                <!-- Name on Card -->
                <div class="mb-3">
                    <h5 class="text-warning">Name on Card</h5>
                    <p class="editable" data-field="card_name">{{ $paymentMethod->card_name }}</p>
                    <input type="text" name="card_name" class="form-control d-none" value="{{ $paymentMethod->card_name }}">
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="mb-4">
                <h4 class="text-warning">Order Summary</h4>
                <ul class="list-group bg-transparent">
                    @foreach($cart as $item)
                        <li class="list-group-item bg-transparent border-warning text-white d-flex justify-content-between align-items-center">
                            <span>{{ $item['name'] }}</span> - ${{ $item['price'] }} x {{ $item['quantity'] }}
                            <span class="badge bg-warning text-dark">${{ $item['price'] * $item['quantity'] }}</span>
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
    </div>
</div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editBtn = document.getElementById("editBtn");
        const cancelEditBtn = document.getElementById("cancelEdit");
        const editActions = document.getElementById("editActions");
        const editableElements = document.querySelectorAll(".editable");

        let originalValues = {};

        // Enable Editing
        editBtn.addEventListener("click", function() {
            originalValues = {}; // Reset stored values
            editableElements.forEach(el => {
                const fieldName = el.getAttribute("data-field");
                const inputField = el.nextElementSibling;

                if (inputField) {
                    originalValues[fieldName] = el.textContent.trim(); // Store original values
                    el.classList.add("d-none"); // Hide text
                    inputField.classList.remove("d-none"); // Show input
                }
            });

            editActions.classList.remove("d-none"); // Show Save/Cancel buttons
            editBtn.classList.add("d-none"); // Hide Edit button
        });

        // Cancel Editing
        cancelEditBtn.addEventListener("click", function() {
            editableElements.forEach(el => {
                const fieldName = el.getAttribute("data-field");
                const inputField = el.nextElementSibling;

                if (inputField) {
                    el.textContent = originalValues[fieldName]; // Restore original value
                    el.classList.remove("d-none"); // Show text
                    inputField.classList.add("d-none"); // Hide input
                }
            });

            editActions.classList.add("d-none"); // Hide Save/Cancel buttons
            editBtn.classList.remove("d-none"); // Show Edit button
        });
    });
</script>