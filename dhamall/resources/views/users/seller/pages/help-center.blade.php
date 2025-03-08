@extends('users.seller.layouts.app')

@section('title', 'Help Center - Dhamall')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Help Center</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-lg"
         style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">
        <h1 class="text-center text-warning mb-4">Help Center</h1>
        <p class="text-center">We're here to help! Find answers to common questions and get support.</p>
        <div class="row mt-5">
            <div class="col-md-6">
                <h3 class="text-warning">Getting Started</h3>
                <ul>
                    <li>How to create a seller account</li>
                    <li>Setting up your store</li>
                    <li>Adding your first product</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h3 class="text-warning">Support</h3>
                <ul>
                    <li>Contact our support team</li>
                    <li>Live chat assistance</li>
                    <li>Email support</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
