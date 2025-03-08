@extends('users.buyer.layouts.app')

@section('title', 'Shipping Policy - Dhamall')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shipping Policy</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-lg mb-3"
         style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">
        <h1 class="text-center text-warning mb-4">Shipping Policy</h1>
        <p class="text-center">We strive to deliver your orders as quickly and efficiently as possible. Here’s how we handle shipping:</p>
        <div class="mt-4">
            <h3 class="text-warning">Shipping Options</h3>
            <ul>
                <li>Standard Shipping: 3-5 business days</li>
                <li>Express Shipping: 1-2 business days (additional fee)</li>
            </ul>
        </div>
        <div class="mt-4">
            <h3 class="text-warning">International Shipping</h3>
            <ul>
                <li>Available to most countries</li>
                <li>Customs and import duties may apply</li>
            </ul>
        </div>
    </div>
@endsection
