<div id="payment" class="content-section {{ request('section') === 'payment-details' ? '' : 'd-none' }}">
    <div class="text-center mb-4">
        <h3 class="fw-bold text-gold rounded-1" style="background: #1a1a2e; color: #b3a31c; padding:1.5rem;">
            <i class="fas fa-credit-card me-2"></i> User Payment Details
        </h3>
    </div>

    @if ($paymentDetails)
        <div class="card shadow-lg rounded p-4 mb-4 border border-light-subtle">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="fw-bold text-dark"><i class="fas fa-wallet me-2"></i> Payment Information</h5>
                <button id="editBtn" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Edit
                </button>
            </div>
            <hr>

            <form id="paymentForm" action="{{ route('payment.update', $paymentDetails->id) }}" method="POST">
                @csrf
                @method('POST')

                <p><strong><i class="fas fa-credit-card me-2"></i> Payment Type:</strong>
                    <span class="editable" data-field="payment_type">{{ ucfirst($paymentDetails->payment_type) }}</span>
                    <select name="payment_type" class="form-control d-none">
                        <option value="credit_card" {{ $paymentDetails->payment_type == 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                        <option value="paypal" {{ $paymentDetails->payment_type == 'paypal' ? 'selected' : '' }}>PayPal</option>
                        <option value="bank_transfer" {{ $paymentDetails->payment_type == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                    </select>
                </p>

                @if ($paymentDetails->account_number)
                    <p><strong><i class="fas fa-lock me-2"></i> Account Number:</strong>
                        <span class="editable" data-field="account_number">**** **** **** {{ substr($paymentDetails->account_number, -4) }}</span>
                        <input type="text" name="account_number" class="form-control d-none" value="{{ $paymentDetails->account_number }}">
                    </p>
                @endif

                @if ($paymentDetails->expiry_date)
                    <p><strong><i class="far fa-calendar-alt me-2"></i> Expiry Date:</strong>
                        <span class="editable" data-field="expiry_date">{{ $paymentDetails->expiry_date }}</span>
                        <input type="date" name="expiry_date" class="form-control d-none" value="{{ $paymentDetails->expiry_date }}">
                    </p>
                @endif

                @if ($paymentDetails->paypal_email)
                    <p><strong><i class="fas fa-envelope me-2"></i> PayPal Email:</strong>
                        <span class="editable" data-field="paypal_email">{{ $paymentDetails->paypal_email }}</span>
                        <input type="email" name="paypal_email" class="form-control d-none" value="{{ $paymentDetails->paypal_email }}">
                    </p>
                @endif

                @if ($paymentDetails->bank_name)
                    <p><strong><i class="fas fa-university me-2"></i> Bank Name:</strong>
                        <span class="editable" data-field="bank_name">{{ $paymentDetails->bank_name }}</span>
                        <input type="text" name="bank_name" class="form-control d-none" value="{{ $paymentDetails->bank_name }}">
                    </p>
                @endif

                <p><strong><i class="fas fa-check-circle me-2"></i> Default Payment Method:</strong>
                    <span class="editable" data-field="is_default">
                        <span class="{{ $paymentDetails->is_default ? 'text-success' : 'text-danger' }}">
                            {{ $paymentDetails->is_default ? 'Yes' : 'No' }}
                        </span>
                    </span>
                    <select name="is_default" class="form-control d-none">
                        <option value="1" {{ $paymentDetails->is_default ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ !$paymentDetails->is_default ? 'selected' : '' }}>No</option>
                    </select>
                </p>

                <!-- Save & Cancel Buttons -->
                <div id="editActions" class="d-none mt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-2"></i> Save Changes
                    </button>
                    <button type="button" id="cancelEdit" class="btn btn-secondary">
                        <i class="fas fa-times me-2"></i> Cancel
                    </button>
                </div>
            </form>
        </div>
    @else
        <p class="text-center text-muted">No payment details available.</p>
    @endif
</div>

<style>
    .content-section { padding: 20px; }
    .editable:hover { cursor: pointer; text-decoration: underline; }
</style>

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
