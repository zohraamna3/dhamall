@extends('users.seller.layouts.app')

@section('title', 'Seller Guidelines - Dhamall')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Seller Guidelines</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-lg"
         style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">
        <h1 class="text-center text-warning mb-4">Seller Guidelines</h1>
        <p class="text-center">Follow these guidelines to ensure a smooth selling experience on Dhamall.</p>
        <div class="mt-4">
            <h3 class="text-warning">Product Listing</h3>
            <ul>
                <li>Accurate product descriptions</li>
                <li>High-quality images</li>
                <li>Proper categorization</li>
            </ul>
        </div>
        <div class="mt-4">
            <h3 class="text-warning">Order Fulfillment</h3>
            <ul>
                <li>Ship orders on time</li>
                <li>Provide tracking information</li>
                <li>Handle returns professionally</li>
            </ul>
        </div>
    </div>
@endsection
