@extends('users.buyer.layouts.app')

@section('title', 'Terms and Conditions - Dhamall')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Terms and Conditions</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-lg mb-3"
         style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">
        <h1 class="text-center text-warning mb-4">Terms and Conditions</h1>
        <p class="text-center">By using our website, you agree to the following terms and conditions:</p>
        <div class="mt-4">
            <h3 class="text-warning">General Terms</h3>
            <ul>
                <li>All products are subject to availability</li>
                <li>Prices are subject to change without notice</li>
                <li>We reserve the right to refuse service</li>
            </ul>
        </div>
        <div class="mt-4">
            <h3 class="text-warning">User Responsibilities</h3>
            <ul>
                <li>Maintain the confidentiality of your account</li>
                <li>Do not misuse the website</li>
            </ul>
        </div>
    </div>
@endsection
