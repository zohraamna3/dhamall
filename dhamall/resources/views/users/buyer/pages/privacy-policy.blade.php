@extends('users.buyer.layouts.app')

@section('title', 'Privacy Policy - Dhamall')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-lg mb-3"
         style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">
        <h1 class="text-center text-warning mb-4">Privacy Policy</h1>
        <p class="text-center">Your privacy is important to us. This policy outlines how we collect, use, and protect your information.</p>
        <div class="mt-4">
            <h3 class="text-warning">Information We Collect</h3>
            <ul>
                <li>Personal information (name, email, address)</li>
                <li>Payment details (securely processed)</li>
                <li>Browsing behavior (cookies)</li>
            </ul>
        </div>
        <div class="mt-4">
            <h3 class="text-warning">How We Use Your Information</h3>
            <ul>
                <li>To process orders and provide services</li>
                <li>To improve our website and services</li>
                <li>To communicate with you</li>
            </ul>
        </div>
    </div>
@endsection
