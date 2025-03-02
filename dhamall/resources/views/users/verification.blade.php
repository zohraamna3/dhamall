@extends('layouts.app')

@section('title', 'Verification - Dhamall')

@section('content')
    <div class="container-fluid d-flex">
        <!-- Left Side Image -->
        <div class="col-md-6 d-none d-md-block">
            <img src="/images/verification.png" class="img-fluid h-100 w-100 object-fit-cover" alt="Verification">
        </div>

        <!-- Right Side - Verification Form -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="verification-container w-75">
                <h2 class="mb-3">Verification</h2>
                <p class="text-muted">Verify your code.</p>

                <form method="POST" action="#">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Verification Code</label>
                        <input type="text" name="code" class="form-control" placeholder="Enter code" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Verify Code</button>
                </form>

                <p class="text-center mt-3"><a href="/signin" class="text-decoration-none custom-link">Back to Login</a></p>
            </div>
        </div>
    </div>
@endsection