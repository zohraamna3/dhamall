@extends('users.buyer.layouts.app')

@section('title', 'About Us - Dhamall')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-lg mb-3"
         style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">
        <h1 class="text-center text-warning mb-4">About Us</h1>
        <p class="text-center">Welcome to Dhamall, your one-stop destination for all your shopping needs.</p>
        <p class="text-center">We are committed to providing high-quality products and excellent customer service.</p>
        <div class="row mt-5">
            <div class="col-md-6">
                <h3 class="text-warning">Our Mission</h3>
                <p>To deliver exceptional value and an unparalleled shopping experience to our customers.</p>
            </div>
            <div class="col-md-6">
                <h3 class="text-warning">Our Vision</h3>
                <p>To become the most trusted and innovative e-commerce platform globally.</p>
            </div>
        </div>
    </div>
@endsection
