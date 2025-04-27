<div id="address-details" class="content-section {{ request('section') === 'address-details' ? '' : 'd-none' }}" style="background-color: #ffffff; border-radius: 8px;">
    <div class="text-center mb-4">
        <h3 class="fw-bold text-gold rounded-1 p-2 pd-sm-3 p-md-4" style="background: #1a1a2e; color: #b3a31c;">
            <i class="fas fa-home me-2"></i> Address Details
        </h3>
    </div>
    <div style="padding: 20px; margin-top: 20px;">
        @if ($addressDetails && $addressDetails->count() > 0)
            @foreach ($addressDetails as $address)
                <div class="card shadow-lg rounded p-4 mb-4 border border-light-subtle">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark"><i class="fas fa-map-marker-alt me-2"></i> Address Information</h5>
                        <div>
                            <button class="btn btn-primary edit-address-btn" data-address-id="{{ $address->id }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        </div>
                    </div>
                    <hr>
                    <form id="addressForm-{{ $address->id }}" class="address-form" action="{{ route('address.update', $address->id) }}" method="POST" style="display: none;">
                        @csrf
                        <p class="mb-3"><strong><i class="fas fa-globe me-2"></i> Country:</strong>
                            <input type="text" name="Country" class="form-control" value="{{ $address->Country }}" required>
                        </p>

                        <p class="mb-3"><strong><i class="fas fa-city me-2"></i> City/State:</strong>
                            <input type="text" name="CityOrState" class="form-control" value="{{ $address->CityOrState }}" required>
                        </p>

                        <p class="mb-3"><strong><i class="fas fa-road me-2"></i> Street:</strong>
                            <input type="text" name="Street" class="form-control" value="{{ $address->Street }}" required>
                        </p>

                        <p class="mb-3"><strong><i class="fas fa-code me-2"></i> Postal Code:</strong>
                            <input type="text" name="PostalCode" class="form-control" value="{{ $address->PostalCode }}" required>
                        </p>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-success mb-2">
                                <i class="fas fa-save me-2"></i> Save Changes
                            </button>
                            <button type="button" class="btn btn-secondary cancel-edit-btn" data-address-id="{{ $address->id }}">
                                <i class="fas fa-times me-2"></i> Cancel
                            </button>
                        </div>
                    </form>

                    <div id="addressView-{{ $address->id }}" class="address-view">
                        <p class="mb-3"><strong><i class="fas fa-globe me-2"></i> Country:</strong>
                            {{ $address->Country ?? 'Not provided' }}
                        </p>

                        <p class="mb-3"><strong><i class="fas fa-city me-2"></i> City/State:</strong>
                            {{ $address->CityOrState ?? 'Not provided' }}
                        </p>

                        <p class="mb-3"><strong><i class="fas fa-road me-2"></i> Street:</strong>
                            {{ $address->Street ?? 'Not provided' }}
                        </p>

                        <p class="mb-3"><strong><i class="fas fa-code me-2"></i> Postal Code:</strong>
                            {{ $address->PostalCode ?? 'Not provided' }}
                        </p>
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center" id="noAddressDetails">
                <p class="text-muted">No address details available.</p>
                <button id="addAddressBtn" class="btn btn-primary" onclick="showAddressForm()">
                    <i class="fas fa-plus me-2"></i> Add Address
                </button>
            </div>
        @endif

        <!-- Address Form for New Address -->
        <div id="newAddressForm" class="card shadow-lg rounded p-4 border border-light-subtle mt-4 d-none">
            <h5 class="fw-bold text-dark"><i class="fas fa-map-marker-alt me-2"></i> New Address Information</h5>
            <form id="newAddressFormElement" action="{{ route('address.store') }}" method="POST">
                @csrf
                <p class="mb-3"><strong><i class="fas fa-globe me-2"></i> Country:</strong>
                    <input type="text" name="Country" class="form-control" required>
                </p>

                <p class="mb-3"><strong><i class="fas fa-city me-2"></i> City/State:</strong>
                    <input type="text" name="CityOrState" class="form-control" required>
                </p>

                <p class="mb-3"><strong><i class="fas fa-road me-2"></i> Street:</strong>
                    <input type="text" name="Street" class="form-control" required>
                </p>

                <p class="mb-3"><strong><i class="fas fa-code me-2"></i> Postal Code:</strong>
                    <input type="text" name="PostalCode" class="form-control" required>
                </p>

                <button type="submit" class="btn btn-success mt-3">
                    <i class="fas fa-save me-2"></i> Save Address
                </button>
                <button type="button" class="btn btn-secondary mt-3" onclick="hideAddressForm()">
                    <i class="fas fa-times me-2"></i> Cancel
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Handle edit address buttons
        document.querySelectorAll('.edit-address-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const addressId = this.getAttribute('data-address-id');
                document.getElementById(`addressView-${addressId}`).style.display = 'none';
                document.getElementById(`addressForm-${addressId}`).style.display = 'block';
            });
        });

        // Handle cancel edit buttons
        document.querySelectorAll('.cancel-edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const addressId = this.getAttribute('data-address-id');
                document.getElementById(`addressView-${addressId}`).style.display = 'block';
                document.getElementById(`addressForm-${addressId}`).style.display = 'none';
            });
        });
    });

    function showAddressForm() {
        const newAddressForm = document.getElementById("newAddressForm");
        const noAddressDetails = document.getElementById("noAddressDetails");

        // Hide the "No address details" section if it exists
        if (noAddressDetails) {
            noAddressDetails.classList.add("d-none");
        }
        // Show the new address form
        newAddressForm.classList.remove("d-none");
    }

    function hideAddressForm() {
        const newAddressForm = document.getElementById("newAddressForm");
        const noAddressDetails = document.getElementById("noAddressDetails");

        // Hide the address form
        newAddressForm.classList.add("d-none");
        // Show the "No address details" section if it exists
        if (noAddressDetails) {
            noAddressDetails.classList.remove("d-none");
        }
    }
</script>
