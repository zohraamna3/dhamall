@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row w-100 shadow-lg rounded-3 overflow-hidden" style="max-width: 900px; background-color: #f8f9fa;">

            <!-- Left Section (Branding) -->
            <div class="col-md-5 text-white d-flex flex-column justify-content-between p-4" style="background-color: #1a1a2e;">
                <h2 class="fw-bold text-gold">Dhamall</h2>
                <div class="flex-grow-1 d-flex align-items-center">
                    <h4 class="text-center text-light">Premium Sound, Ultimate Comfort</h4>
                </div>
                <a href="/" class="btn btn-outline-light fw-bold">← Back to Store</a>
            </div>

            <!-- Right Section (Registration Form) -->
            <div class="col-md-7 bg-white p-5">
                <h3 class="fw-bold mb-3 text-dark">Create an Account</h3>
                <p class="text-muted">Already have an account?
                    <a href="{{ route('login') }}" class="text-primary fw-bold">Log in</a>
                </p>

                <!-- Registration Form -->
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Full Name</label>
                        <input type="text" name="name" class="form-control p-2" placeholder="Enter your name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email Address</label>
                        <input type="email" name="email" class="form-control p-2" placeholder="Enter your email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" name="password" class="form-control p-2" placeholder="Enter a strong password" required>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-bold">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control p-2" placeholder="Re-enter your password" required>
                    </div>

                    <button type="submit" class="btn btn-dark w-100 py-2 fw-bold text-gold">Register</button>
                </form>

                <!-- Social Login -->
                <div class="text-center my-4 text-muted">Or sign up with</div>
                <div class="d-flex justify-content-between">
                    <a href="{{ url('/login/google') }}" class="btn google-btn w-50 me-2 p-2">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" width="20" class="me-2"> Sign up with Google
                    </a>
                    <a href="{{ url('/login/facebook') }}" class="btn btn-primary w-50 p-2">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/Facebook_Logo_%282019%29.png" width="20" class="me-2"> Sign up with Facebook
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        .text-gold { color: #d4af37; } /* Gold accent */
        .btn-dark { background-color: #1a1a2e; border: none; }
        .btn-dark:hover { background-color: #111122; }

        /* Google Button Styling */
        .google-btn {
            background-color: #DB4437; /* Google Red */
            color: white;
            border: none;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .google-btn:hover {
            background-color: #C1351D; /* Darker Red */
        }
    </style>
@endsection
