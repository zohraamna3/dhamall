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
                            <select name="CityOrState" class="form-control" required>
                                <option value="">Select a city</option>
                                <option value="Karachi" {{ $address->CityOrState == 'Karachi' ? 'selected' : '' }}>Karachi</option>
                                <option value="Lahore" {{ $address->CityOrState == 'Lahore' ? 'selected' : '' }}>Lahore</option>
                                <option value="Islamabad" {{ $address->CityOrState == 'Islamabad' ? 'selected' : '' }}>Islamabad</option>
                                <option value="Faisalabad" {{ $address->CityOrState == 'Faisalabad' ? 'selected' : '' }}>Faisalabad</option>
                                <option value="Rawalpindi" {{ $address->CityOrState == 'Rawalpindi' ? 'selected' : '' }}>Rawalpindi</option>
                                <option value="Multan" {{ $address->CityOrState == 'Multan' ? 'selected' : '' }}>Multan</option>
                                <option value="Peshawar" {{ $address->CityOrState == 'Peshawar' ? 'selected' : '' }}>Peshawar</option>
                                <option value="Quetta" {{ $address->CityOrState == 'Quetta' ? 'selected' : '' }}>Quetta</option>
                                <option value="Gujranwala" {{ $address->CityOrState == 'Gujranwala' ? 'selected' : '' }}>Gujranwala</option>
                                <option value="Hyderabad" {{ $address->CityOrState == 'Hyderabad' ? 'selected' : '' }}>Hyderabad</option>
                                <option value="Sialkot" {{ $address->CityOrState == 'Sialkot' ? 'selected' : '' }}>Sialkot</option>
                                <option value="Sheikhupura" {{ $address->CityOrState == 'Sheikhupura' ? 'selected' : '' }}>Sheikhupura</option>
                                <option value="Mardan" {{ $address->CityOrState == 'Mardan' ? 'selected' : '' }}>Mardan</option>
                                <option value="Larkana" {{ $address->CityOrState == 'Larkana' ? 'selected' : '' }}>Larkana</option>
                                <option value="Jhang" {{ $address->CityOrState == 'Jhang' ? 'selected' : '' }}>Jhang</option>
                                <option value="Bahawalpur" {{ $address->CityOrState == 'Bahawalpur' ? 'selected' : '' }}>Bahawalpur</option>
                                <option value="Sukkur" {{ $address->CityOrState == 'Sukkur' ? 'selected' : '' }}>Sukkur</option>
                                <option value="Bannu" {{ $address->CityOrState == 'Bannu' ? 'selected' : '' }}>Bannu</option>
                                <option value="Dera Ismail Khan" {{ $address->CityOrState == 'Dera Ismail Khan' ? 'selected' : '' }}>Dera Ismail Khan</option>
                                <option value="Kotli" {{ $address->CityOrState == 'Kotli' ? 'selected' : '' }}>Kotli</option>
                                <option value="Abbottabad" {{ $address->CityOrState == 'Abbottabad' ? 'selected' : '' }}>Abbottabad</option>
                            </select>
                        </p>

                        <p class="mb-3"><strong><i class="fas fa-road me-2"></i> Street:</strong>
                            <input type="text" name="Street" class="form-control" value="{{ $address->Street }}" required>
                        </p>

                        <p class="mb-3"><strong><i class="fas fa-code me-2"></i> Postal Code:</strong>
                            <input type="text" name="PostalCode" class="form-control" value="{{ $address->PostalCode }}" required>
                        </p>

                        <p class="mb-3"><strong><i class="fas fa-map-marker me-2"></i> Google Map Location Link:</strong>
                            <input type="url" name="Map" class="form-control" value="{{ $address->Map }}" placeholder="Enter Google Map link">
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

                        @if ($address->Map)
                            <p class="mb-3"><strong><i class="fas fa-map-marker me-2"></i> Google Map Link:</strong>
                                <a href="{{ $address->Map }}" target="_blank" class="text-primary">{{ $address->Map }}</a>
                            </p>
                        @else
                            <p class="mb-3"><strong><i class="fas fa-map-marker me-2"></i> Google Map Link:</strong> Not provided</p>
                        @endif
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
                    <select name="CityOrState" class="form-control" required>
                        <option value="">Select a city</option>
                        <option value="Karachi">Karachi</option>
                        <option value="Lahore">Lahore</option>
                        <option value="Islamabad">Islamabad</option>
                        <option value="Faisalabad">Faisalabad</option>
                        <option value="Rawalpindi">Rawalpindi</option>
                        <option value="Multan">Multan</option>
                        <option value="Peshawar">Peshawar</option>
                        <option value="Quetta">Quetta</option>
                        <option value="Gujranwala">Gujranwala</option>
                        <option value="Hyderabad">Hyderabad</option>
                        <option value="Sialkot">Sialkot</option>
                        <option value="Sheikhupura">Sheikhupura</option>
                        <option value="Mardan">Mardan</option>
                        <option value="Larkana">Larkana</option>
                        <option value="Jhang">Jhang</option>
                        <option value="Bahawalpur">Bahawalpur</option>
                        <option value="Sukkur">Sukkur</option>
                        <option value="Bannu">Bannu</option>
                        <option value="Dera Ismail Khan">Dera Ismail Khan</option>
                        <option value="Kotli">Kotli</option>
                        <option value="Abbottabad">Abbottabad</option>
                    </select>
                </p>

                <p class="mb-3"><strong><i class="fas fa-road me-2"></i> Street:</strong>
                    <input type="text" name="Street" class="form-control" required>
                </p>

                <p class="mb-3"><strong><i class="fas fa-code me-2"></i> Postal Code:</strong>
                    <input type="text" name="PostalCode" class="form-control" required>
                </p>

                <p class="mb-3"><strong><i class="fas fa-map-marker me-2"></i> Google Map Location Link:</strong>
                    <input type="url" name="Map" class="form-control" placeholder="Enter Google Map link">
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
