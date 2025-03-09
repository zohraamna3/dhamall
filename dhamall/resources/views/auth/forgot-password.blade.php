@extends('users.buyer.layouts.app')

@section('title', 'Forgot Password - Dhamall')

@section('content')
    <div class="container-fluid d-flex mb-3">
        <!-- Left Side Image -->
        <div class="col-md-6 d-none d-md-block">
            <div class="shadow-lg rounded-4 overflow-hidden">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhCiNguJGF2T1ur2TGW4HPvyRT3mazCOxg-XAnIuHN6Yb7J0RC5JKyPOUUFKZRJ6VmcIcQBfrXRU22QvFkWtI6ir8pIN7Jk3OiVB_RY1BLhPhgnbJgppSwQHg-MWHTlD0GX3TglnFQoPF0/s728-rw-e365/Password-post-it.jpg"
                     class="img-fluid h-100 w-100 object-fit-cover"
                     alt="Forgot Password">
            </div>
        </div>

        <!-- Right Side - Forgot Password Form -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="verification-container w-75">
                <h2 class="mb-3">Forgot Password</h2>
                <p class="text-muted">Forgot your password? No problem. Just let us know your email address, and we will email you a password reset link.</p>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Field -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" name="email" class="form-control" placeholder="Enter your email" required autofocus autocomplete="email">
                        @error('email')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100">Email Password Reset Link</button>
                </form>

                <!-- Back to Login Link -->
                <p class="text-center mt-3">
                    <a href="{{ route('login') }}" class="text-decoration-none custom-link">Back to Login</a>
                </p>
            </div>
        </div>
    </div>
@endsection
