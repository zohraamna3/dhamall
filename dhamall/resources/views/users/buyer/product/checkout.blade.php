@extends('users.buyer.layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-current">Checkout</li>
        </ol>
    </nav>
@endsection






@section('content')
    <div class="card shadow-lg border-0 rounded-lg position-relative mb-2"
         style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">
        <h2 class="text-center text-warning">Checkout</h2>
        <button type="button" id="editBtn" class="btn btn-primary">Edit Details</button>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @include('users.buyer.product.partials.checkout-form')
    </div>
    <style>
        /* Default styles for the Edit button */
        #editBtn {
            position: absolute;
            top: 0;
            right: 0;
            margin: 12px;
        }

        /* Media query for screens 485px or smaller */
        @media (max-width: 485px) {
            #editBtn {
                position: static; /* Remove absolute positioning */
                width: 100%; /* Full width */
                margin: 10px 0; /* Add some margin for spacing */
                text-align: center; /* Center the text */
            }
        }

        @media (max-width: 350px) {
            h2{
                font-size: 1.25rem;
            }
        }
    </style>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const editBtn = document.getElementById("editBtn");
        const cancelEditBtn = document.getElementById("cancelEdit");
        const editActions = document.getElementById("editActions");
        const editableElements = document.querySelectorAll(".editable");
        const paymentMethodRadios = document.querySelectorAll("input[name='payment_method']");
        const cardDetails = document.getElementById("cardDetails");

        let originalValues = {};

        // Enable Editing
        editBtn.addEventListener("click", function () {
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

            // Enable radio buttons for editing
            paymentMethodRadios.forEach(radio => {
                radio.removeAttribute("disabled");
            });

            editActions.classList.remove("d-none"); // Show Save/Cancel buttons
            editBtn.classList.add("d-none"); // Hide Edit button
        });

        // Cancel Editing
        cancelEditBtn.addEventListener("click", function () {
            editableElements.forEach(el => {
                const fieldName = el.getAttribute("data-field");
                const inputField = el.nextElementSibling;

                if (inputField) {
                    el.textContent = originalValues[fieldName]; // Restore original value
                    el.classList.remove("d-none"); // Show text
                    inputField.classList.add("d-none"); // Hide input
                }
            });

            // Disable radio buttons
            paymentMethodRadios.forEach(radio => {
                if (!radio.checked) {
                    radio.setAttribute("disabled", true);
                }
            });

            editActions.classList.add("d-none"); // Hide Save/Cancel buttons
            editBtn.classList.remove("d-none"); // Show Edit button
        });

        // Handle Payment Method Change
        paymentMethodRadios.forEach(radio => {
            radio.addEventListener("change", function () {
                if (this.value === "paypal") {
                    cardDetails.classList.add("d-none"); // Hide card details
                } else {
                    cardDetails.classList.remove("d-none"); // Show card details
                }
            });
        });
    });

</script>

@section('content')
    <div class="container">
        <div class="card shadow-lg border-0 rounded-lg mb-4"
             style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white;">
            <div class="card-body p-4">
                <h2 class="text-center text-warning mb-4">Checkout</h2>

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf

                    <!-- Shipping Address -->
                    <div class="mb-4">
                        <h4 class="text-warning mb-3">Shipping Address</h4>
                        @foreach($addresses as $address)
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="address_id"
                                       id="address{{ $address->id }}" value="{{ $address->id }}" required>
                                <label class="form-check-label" for="address{{ $address->id }}">
                                    {{ $address->Street }}, {{ $address->CityOrState }},
                                    {{ $address->Country }} {{ $address->PostalCode }}
                                </label>
                            </div>
                        @endforeach
{{--                        <a href="{{ route('address.create') }}" class="btn btn-sm btn-outline-warning">--}}
{{--                            Add New Address--}}
{{--                        </a>--}}
                    </div>

                    <!-- Payment Method -->
                    <div class="mb-4">
                        <h4 class="text-warning mb-3">Payment Method</h4>
                        @foreach($paymentMethods as $payment)
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_id"
                                       id="payment{{ $payment->id }}" value="{{ $payment->id }}" required>
                                <label class="form-check-label" for="payment{{ $payment->id }}">
                                    {{ $payment->PaymentMethod }} - **** **** **** {{ substr($payment->CardNumber, -4) }}
                                    (Exp: {{ $payment->ExpiryDate->format('m/y') }})
                                </label>
                            </div>
                        @endforeach
                        <a href="{{ route('payment.create') }}" class="btn btn-sm btn-outline-warning">
                            Add New Payment Method
                        </a>
                    </div>

                    <!-- Order Notes -->
                    <div class="mb-4">
                        <h4 class="text-warning mb-3">Order Notes</h4>
                        <textarea name="notes" class="form-control bg-dark text-light" rows="3"
                                  placeholder="Special instructions..."></textarea>
                    </div>

                    <!-- Order Summary -->
                    <div class="mb-4">
                        <h4 class="text-warning mb-3">Order Summary</h4>
                        <div class="table-responsive">
                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart->items as $item)
                                    <tr>
                                        <td>{{ $item->product->ProductName }}</td>
                                        <td>${{ number_format($item->PricePerUnit, 2) }}</td>
                                        <td>{{ $item->Quantity }}</td>
                                        <td>${{ number_format($item->TotalPrice, 2) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="3">Subtotal</th>
                                    <th>${{ number_format($cart->items->sum('TotalPrice'), 2) }}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning btn-lg">
                            <i class="fas fa-check-circle me-2"></i> Place Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
