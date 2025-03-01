@extends('layouts.seller')

@section('content')
<div class="container mt-4">
    <h2 class="text-center">My Profile</h2>
    <div class="card shadow-sm p-4 border-0">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('seller.profile.update') }}" method="POST" id="profileForm">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="first_name" class="form-label">First Name*</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $seller->first_name ?? '') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="last_name" class="form-label">Last Name*</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $seller->last_name ?? '') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="store_name" class="form-label">Store Name*</label>
                    <input type="text" name="store_name" id="store_name" class="form-control" value="{{ old('store_name', $seller->store_name ?? '') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Phone*</label>
                    <input type="tel" name="phone" id="phone" class="form-control" value="{{ old('phone', $seller->phone ?? '') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="country" class="form-label">Country*</label>
                    <input type="text" name="country" id="country" class="form-control" value="{{ old('country', $seller->country ?? '') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="city" class="form-label">City*</label>
                    <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $seller->city ?? '') }}" required>
                </div>

                <!-- Save & Cancel Buttons -->
                <div class="col-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary me-2">Save</button>
                    <a href="{{ route('seller.profile') }}" class="btn btn-light">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
.card {
    background: #fff;
    border-radius: 10px;
    padding: 15px;
}

.form-label {
    font-weight: bold;
}

.form-control {
    border-radius: 5px;
    padding: 10px;
    border: 1px solid #ddd;
}

.btn-primary {
    background-color: #6c5ce7;
    border-color: #6c5ce7;
    padding: 10px 20px;
}

.btn-primary:hover {
    background-color: #5a4bcf;
    border-color: #5a4bcf;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 15px;
    }
    .btn {
        width: 100%;
    }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("profileForm");

    form.addEventListener("submit", function (event) {
        let isValid = true;
        const requiredFields = form.querySelectorAll("input[required]");

        requiredFields.forEach((field) => {
            if (!field.value.trim()) {
                isValid = false;
                field.style.border = "1px solid red";
            } else {
                field.style.border = "1px solid #ddd";
            }
        });

        if (!isValid) {
            event.preventDefault();
            alert("Please fill all required fields.");
        }
    });
});
</script>
@endsection
