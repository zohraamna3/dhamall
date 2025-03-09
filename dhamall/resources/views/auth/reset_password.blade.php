@extends('users.buyer.layouts.app')

@section('title', 'Reset Password - Dhamall')

@section('content')
    <div class="container-fluid d-flex">
        <!-- Left Side Image -->
        <div class="col-md-6 d-none d-md-block">
            <div class="shadow-lg rounded-4 overflow-hidden">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhCiNguJGF2T1ur2TGW4HPvyRT3mazCOxg-XAnIuHN6Yb7J0RC5JKyPOUUFKZRJ6VmcIcQBfrXRU22QvFkWtI6ir8pIN7Jk3OiVB_RY1BLhPhgnbJgppSwQHg-MWHTlD0GX3TglnFQoPF0/s728-rw-e365/Password-post-it.jpg"
                     class="img-fluid h-100 w-100 object-fit-cover"
                     alt="Reset Password">
            </div>
        </div>

        <!-- Right Side - Reset Password Form -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="verification-container w-75">
                <h2 class="mb-3">Reset Password</h2>
                <p class="text-muted">Enter your email and a new password to reset your password.</p>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <x-primary-button class="btn btn-primary w-100">
                            {{ __('Reset Password') }}
                        </x-primary-button>
                    </div>
                </form>

                <!-- Back to Login Link -->
                <p class="text-center mt-3">
                    <a href="{{ route('login') }}" class="text-decoration-none custom-link">Back to Login</a>
                </p>
            </div>
        </div>
    </div>
@endsection

<style>
    .verification-container {
        max-width: 400px;
        padding: 2rem;
        border-radius: 10px;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .custom-link {
        color: #6f42c1; /* Purple color */
        transition: color 0.3s ease;
    }

    .custom-link:hover {
        color: #4a2d7a; /* Darker purple on hover */
    }

    .shadow-lg {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .rounded-4 {
        border-radius: 20px;
    }

    .overflow-hidden {
        overflow: hidden;
    }
</style>
