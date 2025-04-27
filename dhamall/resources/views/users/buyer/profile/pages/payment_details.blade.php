<div id="payment" class="content-section {{ request('section') === 'payment-details' ? '' : 'd-none' }}" style="background-color: #ffffff; border-radius: 8px;">
    <div class="text-center mb-4">
        <h3 class="fw-bold text-gold rounded-1 p-2 pd-sm-3 p-md-4" style="background: #1a1a2e; color: #b3a31c;">
            <i class="fas fa-credit-card me-2"></i> Payment Details
        </h3>
    </div>
    <div style="padding: 20px; margin-top: 20px;">
        @if ($paymentDetails)
            <div class="card shadow-lg rounded p-4 mb-4 border border-light-subtle">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold text-dark"><i class="fas fa-wallet me-2"></i> Payment Information</h5>
                    <button id="editBtn" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                </div>
                <hr>
                <form id="paymentForm" action="{{ route('payment.update', $paymentDetails->id) }}" method="POST">
                    @csrf
                    <p class="mb-3"><strong><i class="fas fa-credit-card me-2"></i> Payment Method:</strong><br/><br/>
                        <span class="editable" data-field="PaymentMethod">
                            {{ $paymentDetails->PaymentMethod ?? 'No payment method selected' }}
                        </span>
                        <select name="PaymentMethod" class="form-control d-none payment-method-select" style="margin-top: 5px;">
                            <option value="">No Payment Method</option>
                            <option value="Credit Card" {{ $paymentDetails->PaymentMethod == 'Credit Card' ? 'selected' : '' }}>Credit Card</option>
                            <option value="PayPal" {{ $paymentDetails->PaymentMethod == 'PayPal' ? 'selected' : '' }}>PayPal</option>
                            <option value="Cash on Delivery" {{ $paymentDetails->PaymentMethod == 'Cash on Delivery' ? 'selected' : '' }}>Cash on Delivery</option>
                        </select>
                    </p>

                    <div class="credit-card-fields" style="{{ $paymentDetails->PaymentMethod != 'Credit Card' ? 'display: none;' : '' }}">
                        <p class="mb-3"><strong><i class="fas fa-lock me-2"></i> Card Number:</strong>
                            <span class="editable" data-field="CardNumber">
                                @if($paymentDetails->CardNumber)
                                    **** **** **** {{ substr($paymentDetails->CardNumber, -4) }}
                                @else
                                    Not provided
                                @endif
                            </span>
                            <input type="text" name="CardNumber" class="form-control d-none" placeholder="Enter Card Number" value="{{ $paymentDetails->CardNumber }}" style="margin-top: 5px;">
                        </p>

                        <p class="mb-3"><strong><i class="far fa-calendar-alt me-2"></i> Expiry Date:</strong>
                            <span class="editable" data-field="ExpiryDate">
                                @if($paymentDetails->ExpiryDate)
                                    {{ $paymentDetails->ExpiryDate->format('m/Y') }}
                                @else
                                    Not provided
                                @endif
                            </span>
                            <input type="month" name="ExpiryDate" class="form-control d-none" value="{{ $paymentDetails->ExpiryDate ? $paymentDetails->ExpiryDate->format('Y-m') : '' }}" style="margin-top: 5px;">
                        </p>

                        <p class="mb-3"><strong><i class="fas fa-lock me-2"></i> CVV:</strong>
                            <span class="editable" data-field="CVV">
                                @if($paymentDetails->CVV)
                                    ***
                                @else
                                    Not provided
                                @endif
                            </span>
                            <input type="text" name="CVV" class="form-control d-none" placeholder="Enter CVV" value="{{ $paymentDetails->CVV }}" maxlength="4" style="margin-top: 5px;">
                        </p>

                        <p class="mb-3"><strong><i class="fas fa-user me-2"></i> Name on Card:</strong>
                            <span class="editable" data-field="NameOnCard">
                                {{ $paymentDetails->NameOnCard ?? 'Not provided' }}
                            </span>
                            <input type="text" name="NameOnCard" class="form-control d-none" placeholder="Enter Name on Card" value="{{ $paymentDetails->NameOnCard }}" style="margin-top: 5px;">
                        </p>

                        <p class="mb-3"><strong><i class="fas fa-map-marker-alt me-2"></i> Zip Code:</strong>
                            <span class="editable" data-field="Zip">
                                {{ $paymentDetails->Zip ?? 'Not provided' }}
                            </span>
                            <input type="text" name="Zip" class="form-control d-none" placeholder="Enter Zip Code" value="{{ $paymentDetails->Zip }}" maxlength="10" style="margin-top: 5px;">
                        </p>
                    </div>

                    <div id="editActions" class="d-none mt-3">
                        <button type="submit" class="btn btn-success mb-2">
                            <i class="fas fa-save me-2"></i> Save Changes
                        </button>
                        <button type="button" id="cancelEdit" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i> Cancel
                        </button>
                    </div>
                </form>
            </div>
        @else
            <div class="text-center" id="noPaymentDetails">
                <p class="text-muted">No payment details available.</p>
                <button id="addPaymentBtn" class="btn btn-primary" onclick="showPaymentForm()">
                    <i class="fas fa-plus me-2"></i> Add Payment Method
                </button>
            </div>

            <!-- Payment Form for New Payment Method -->
            <div id="newPaymentForm" class="card shadow-lg rounded p-4 border border-light-subtle mt-4 d-none">
                <h5 class="fw-bold text-dark"><i class="fas fa-wallet me-2"></i> New Payment Information</h5>
                <form id="newPaymentFormElement" action="{{ route('payment.store') }}" method="POST">
                    @csrf
                    <p class="mb-3"><strong><i class="fas fa-credit-card me-2"></i> Payment Method:</strong>
                        <select name="PaymentMethod" class="form-control payment-method-select">
                            <option value="">No Payment Method</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="PayPal">PayPal</option>
                            <option value="Cash on Delivery">Cash on Delivery</option>
                        </select>
                    </p>

                    <div class="credit-card-fields" style="display: none;">
                        <p class="mb-3"><strong><i class="fas fa-lock me-2"></i> Card Number:</strong>
                            <input type="text" name="CardNumber" class="form-control" placeholder="Enter Card Number" maxlength="16">
                        </p>

                        <p class="mb-3"><strong><i class="far fa-calendar-alt me-2"></i> Expiry Date:</strong>
                            <input type="month" name="ExpiryDate" class="form-control">
                        </p>

                        <p class="mb-3"><strong><i class="fas fa-lock me-2"></i> CVV:</strong>
                            <input type="text" name="CVV" class="form-control" placeholder="Enter CVV" maxlength="4">
                        </p>

                        <p class="mb-3"><strong><i class="fas fa-user me-2"></i> Name on Card:</strong>
                            <input type="text" name="NameOnCard" class="form-control" placeholder="Enter Name on Card" maxlength="100">
                        </p>

                        <p class="mb-3"><strong><i class="fas fa-map-marker-alt me-2"></i> Zip Code:</strong>
                            <input type="text" name="Zip" class="form-control" placeholder="Enter Zip Code" maxlength="10">
                        </p>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">
                        <i class="fas fa-save me-2"></i> Save Payment Method
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editBtn = document.getElementById("editBtn");
        const cancelEditBtn = document.getElementById("cancelEdit");
        const editActions = document.getElementById("editActions");
        const editableElements = document.querySelectorAll(".editable");
        const newPaymentForm = document.getElementById("newPaymentForm");
        const noPaymentDetails = document.getElementById("noPaymentDetails");

        // Handle payment method selection change
        const paymentMethodSelects = document.querySelectorAll('.payment-method-select');
        paymentMethodSelects.forEach(select => {
            select.addEventListener('change', function() {
                const creditCardFields = this.closest('form').querySelector('.credit-card-fields');
                if (this.value === 'Credit Card') {
                    creditCardFields.style.display = 'block';
                    // Make credit card fields required when shown
                    creditCardFields.querySelectorAll('input').forEach(input => {
                        input.required = true;
                    });
                } else {
                    creditCardFields.style.display = 'none';
                    // Remove required attribute when hidden
                    creditCardFields.querySelectorAll('input').forEach(input => {
                        input.required = false;
                    });
                }
            });

            // Trigger change event on load if there's a selected value
            if (select.value) {
                select.dispatchEvent(new Event('change'));
            }
        });

        let originalValues = {};

        editBtn?.addEventListener("click", function() {
            originalValues = {};
            editableElements.forEach(el => {
                const fieldName = el.getAttribute("data-field");
                const inputField = el.nextElementSibling;

                if (inputField) {
                    originalValues[fieldName] = el.textContent.trim();
                    el.classList.add("d-none");
                    inputField.classList.remove("d-none");
                }
            });

            editActions.classList.remove("d-none");
            editBtn.classList.add("d-none");
        });

        cancelEditBtn?.addEventListener("click", function() {
            editableElements.forEach(el => {
                const fieldName = el.getAttribute("data-field");
                const inputField = el.nextElementSibling;

                if (inputField) {
                    el.textContent = originalValues[fieldName];
                    el.classList.remove("d-none");
                    inputField.classList.add("d-none");
                }
            });

            editActions.classList.add("d-none");
            editBtn.classList.remove("d-none");
        });

        // Handle form submission before sending
        const paymentForm = document.getElementById("paymentForm");
        paymentForm.addEventListener("submit", function(event) {
            const paymentMethodSelect = paymentForm.querySelector('select[name="PaymentMethod"]');
            if (paymentMethodSelect.value === 'PayPal' || paymentMethodSelect.value === 'Cash on Delivery') {
                paymentForm.querySelector('input[name="CardNumber"]').value = '';  // Card Number
                paymentForm.querySelector('input[name="CVV"]').value = '';         // CVV
                paymentForm.querySelector('input[name="ExpiryDate"]').value = '';  // Expiry Date
                paymentForm.querySelector('input[name="NameOnCard"]').value = '';  // Name on Card
                paymentForm.querySelector('input[name="Zip"]').value = '';         // Zip Code
            }
        });
    });

    function showPaymentForm() {
        const newPaymentForm = document.getElementById("newPaymentForm");
        const noPaymentDetails = document.getElementById("noPaymentDetails");

        // Hide the "No payment details" section
        noPaymentDetails.classList.add("d-none");
        // Show the new payment form
        newPaymentForm.classList.remove("d-none");
    }
</script>
