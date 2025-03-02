@extends('layouts.app')

@section('title', 'Create New Password - Dhamall')

@section('content')
    <!-- Navbar -->
    
    <div class="container-fluid d-flex">
        <!-- Left Side Image -->
        <div class="col-md-6 d-none d-md-block">
            <img src="/images/reset-password.png" class="img-fluid h-100 w-100 object-fit-cover" alt="Reset Password">
        </div>

        <!-- Right Side - Password Reset Form -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="password-container w-75">
                <h2 class="mb-3">Create New Password</h2>
                <p class="text-muted">Your new password must be different from previously used passwords.</p>

                <form method="POST" action="#" onsubmit="return validatePassword()">
                    <input type="hidden" name="token" value="static_token">

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="user@example.com" required autofocus>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password" required>
                            <span class="input-group-text" onclick="togglePassword('password')">
                                <i class="bi bi-eye"></i>
                            </span>
                        </div>
                        <small class="text-muted">Must be at least 8 characters.</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" id="confirm-password" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
                            <span class="input-group-text" onclick="togglePassword('confirm-password')">
                                <i class="bi bi-eye"></i>
                            </span>
                        </div>
                        <small id="error-message" class="error-message d-none">New password and confirm new password do not match</small>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(id) {
            let input = document.getElementById(id);
            let icon = input.nextElementSibling.querySelector("i");
            if (input.type === "password") {
                input.type = "text";
                icon.classList.replace("bi-eye", "bi-eye-slash");
            } else {
                input.type = "password";
                icon.classList.replace("bi-eye-slash", "bi-eye");
            }
        }

        function validatePassword() {
            let password = document.getElementById("password").value;
            let confirmPassword = document.getElementById("confirm-password").value;
            let errorMessage = document.getElementById("error-message");

            if (password !== confirmPassword) {
                errorMessage.classList.remove("d-none");
                return false;
            } else {
                errorMessage.classList.add("d-none");
                return true;
            }
        }
    </script>
@endsection
