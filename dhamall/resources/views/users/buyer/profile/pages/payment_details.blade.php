<div id="payment" class="content-section {{ request('section') === 'payment-details' ? '' : 'd-none' }}">
    <div class="text-center mb-4">
        <h3 class="fw-bold text-gold rounded-1 p-2 pd-sm-3 p-md-4" style="background: #1a1a2e; color: #b3a31c;">
            <i class="fas fa-credit-card me-2"></i> Payment Details
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
                @method('PUT')

                <p><strong><i class="fas fa-credit-card me-2"></i> Payment Method:</strong>
                    <span class="editable" data-field="PaymentMethod">{{ $paymentDetails->PaymentMethod }}</span>
                    <select name="PaymentMethod" class="form-control d-none">
                        <option value="Credit Card" {{ $paymentDetails->PaymentMethod == 'Credit Card' ? 'selected' : '' }}>Credit Card</option>
                        <option value="PayPal" {{ $paymentDetails->PaymentMethod == 'PayPal' ? 'selected' : '' }}>PayPal</option>
                        <option value="Cash on Delivery" {{ $paymentDetails->PaymentMethod == 'Cash on Delivery' ? 'selected' : '' }}>Cash on Delivery</option>
                    </select>
                </p>

                @if ($paymentDetails->CardNumber)
                    <p><strong><i class="fas fa-lock me-2"></i> Card Number:</strong>
                        <span class="editable" data-field="CardNumber">**** **** **** {{ substr($paymentDetails->CardNumber, -4) }}</span>
                        <input type="text" name="CardNumber" class="form-control d-none" value="{{ $paymentDetails->CardNumber }}">
                    </p>
                @endif

                @if ($paymentDetails->ExpiryDate)
                    <p><strong><i class="far fa-calendar-alt me-2"></i> Expiry Date:</strong>
                        <span class="editable" data-field="ExpiryDate">{{ $paymentDetails->ExpiryDate->format('m/Y') }}</span>
                        <input type="month" name="ExpiryDate" class="form-control d-none" value="{{ $paymentDetails->ExpiryDate->format('Y-m') }}">
                    </p>
                @endif

                @if ($paymentDetails->NameOnCard)
                    <p><strong><i class="fas fa-user me-2"></i> Name on Card:</strong>
                        <span class="editable" data-field="NameOnCard">{{ $paymentDetails->NameOnCard }}</span>
                        <input type="text" name="NameOnCard" class="form-control d-none" value="{{ $paymentDetails->NameOnCard }}">
                    </p>
                @endif

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
        <div class="text-center">
            <p class="text-muted">No payment details available.</p>
            <a href="{{ route('payment.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> Add Payment Method
            </a>
        </div>
    @endif
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editBtn = document.getElementById("editBtn");
        const cancelEditBtn = document.getElementById("cancelEdit");
        const editActions = document.getElementById("editActions");
        const editableElements = document.querySelectorAll(".editable");

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
    });
</script>
