@extends('users.buyer.layouts.app')

@section('title', 'Check Email - Dhamall')

@section('content')
    <div class="container-fluid d-flex">
        <!-- Left Side Image -->
        <div class="col-md-6 d-none d-md-block">
            <img src="{{ asset('images/email-check.png') }}" class="img-fluid h-100 w-100 object-fit-cover"
                 alt="Check Email">
        </div>

        <!-- Right Side - Check Email Message -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="email-container w-75">
                <h2 class="mb-3">Check Email</h2>
                <p class="text-muted">
                    Please check your email inbox and click on the provided link to reset your password.
                    If you don’t receive an email, <a href="#" class="text-decoration-none custom-link">Click here to
                        resend</a>.
                </p>
                <p class="mt-3"><a href="{{ route('login') }}" class="custom-link text-decoration-none">&larr; Back to
                        Login</a></p>
            </div>
        </div>
    </div>
@endsection
