@extends('users.seller.layouts.app')

@section('title', 'Terms of Service - Dhamall')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Terms of Service</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-lg"
         style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">
        <h1 class="text-center text-warning mb-4">Terms of Service</h1>
        <p class="text-center">By using our platform, you agree to the following terms and conditions.</p>
        <div class="mt-4">
            <h3 class="text-warning">General Terms</h3>
            <ul>
                <li>You must be at least 18 years old to use our platform.</li>
                <li>You are responsible for maintaining the security of your account.</li>
                <li>We reserve the right to terminate accounts for violations.</li>
            </ul>
        </div>
    </div>
@endsection
