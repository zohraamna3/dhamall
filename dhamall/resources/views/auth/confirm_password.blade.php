@extends('users.buyer.layouts.app')

@section('title', 'Confirm Password - Dhamall')

@section('content')
    <div class="container-fluid d-flex">
        <!-- Left Side Image -->
        <div class="col-md-6 d-none d-md-block">
            <img src="/images/verification.png" class="img-fluid h-100 w-100 object-fit-cover" alt="Confirm Password">
        </div>

        <!-- Right Side - Confirm Password Form -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="verification-container w-75">
                <h2 class="mb-3">Confirm Password</h2>
                <p class="text-muted">This is a secure area of the application. Please confirm your password before continuing.</p>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Password Field -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" name="password" class="form-control" placeholder="Enter your password" required autocomplete="current-password">
                        @error('password')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100">Confirm Password</button>
                </form>

                <!-- Back to Login Link -->
                <p class="text-center mt-3">
                    <a href="{{ route('login') }}" class="text-decoration-none custom-link">Back to Login</a>
                </p>
            </div>
        </div>
    </div>
@endsection
