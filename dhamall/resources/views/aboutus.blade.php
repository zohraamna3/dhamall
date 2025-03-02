@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1 class="fw-bold text-primary">About Dhamall</h1>
        <p class="lead text-muted">Your ultimate destination for premium audio products.</p>
        <hr class="w-25 mx-auto">
    </div>

    <div class="row align-items-center mt-5">
        <div class="col-md-6">
            <h2 class="fw-bold text-dark">Who We Are</h2>
            <p class="text-muted">
                At <strong>Dhamall</strong>, we provide high-quality **headphones, earbuds, and AirPods** for the best audio experience.
            </p>
            <a href="" class="btn btn-primary px-4 mt-3">Contact Us</a>
        </div>
        <div class="col-md-6 text-center">
            <img src="{{ asset('images/about-us.jpg') }}" class="img-fluid rounded shadow-lg" alt="Our Story">
        </div>
    </div>

    <div class="mt-5 text-center">
        <h2 class="fw-bold text-dark">Why Choose Dhamall?</h2>
        <p class="text-muted">Experience sound like never before.</p>
        <div class="row text-center mt-4">
            <div class="col-md-3">
                <img src="{{ asset('images/high-quality.jpg') }}" class="rounded-circle mb-3" width="120">
                <h4 class="mt-2">Premium Quality</h4>
                <p class="text-muted">High-end, durable, and stylish audio devices.</p>
            </div>
            <div class="col-md-3">
                <img src="{{ asset('images/fast-delivery.jpg') }}" class="rounded-circle mb-3" width="120">
                <h4 class="mt-2">Fast Delivery</h4>
                <p class="text-muted">Get your products delivered swiftly.</p>
            </div>
            <div class="col-md-3">
                <img src="{{ asset('images/customer-support.jpg') }}" class="rounded-circle mb-3" width="120">
                <h4 class="mt-2">24/7 Support</h4>
                <p class="text-muted">We’re here to assist you anytime.</p>
            </div>
            <div class="col-md-3">
                <img src="{{ asset('images/secure-payment.jpg') }}" class="rounded-circle mb-3" width="120">
                <h4 class="mt-2">Secure Payments</h4>
                <p class="text-muted">Your transactions are 100% safe.</p>
            </div>
        </div>
    </div>

    <div class="mt-5 text-center">
        <h2 class="fw-bold text-dark">Our Featured Collections</h2>
        <p class="text-muted">Find your perfect sound companion.</p>
        <div class="row mt-4">
            <div class="col-md-4">
                <img src="{{ asset('images/earbuds.jpg') }}" class="img-fluid rounded shadow">
                <h5 class="mt-3">Wireless Earbuds</h5>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/gaming-headphones.jpg') }}" class="img-fluid rounded shadow">
                <h5 class="mt-3">Gaming Headphones</h5>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/noise-cancelling.jpg') }}" class="img-fluid rounded shadow">
                <h5 class="mt-3">Noise Cancelling Headphones</h5>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <h3 class="fw-bold text-dark">Stay Connected</h3>
        <p class="text-muted">Follow us on social media or reach out via email.</p>
        <div class="d-flex justify-content-center gap-3 mt-3">
            <a href="#" class="text-primary"><i class="fab fa-facebook fa-2x"></i></a>
            <a href="#" class="text-info"><i class="fab fa-twitter fa-2x"></i></a>
            <a href="#" class="text-danger"><i class="fab fa-instagram fa-2x"></i></a>
        </div>
        <p class="mt-3 text-muted">Email: support@dhamall.com | Phone: +92 300 1234567</p>
    </div>
</div>
@endsection
