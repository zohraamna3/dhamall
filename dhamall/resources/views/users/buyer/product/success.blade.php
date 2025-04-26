@extends('users.buyer.layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order Confirmation</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container text-center py-5">
        <div class="card shadow-lg mx-auto" style="max-width: 600px; background: linear-gradient(135deg, #1a1a2e, #0d0d1a);">
            <div class="card-body p-5">
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#28a745" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                </div>
                <h2 class="text-warning mb-3">Order Confirmed!</h2>
                <p class="text-light mb-4">Thank you for your purchase. Your order has been received and is being processed.</p>
                <p class="text-light mb-4">A confirmation email has been sent to your registered email address.</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-warning">Continue Shopping</a>
                    <a href="{{ route('orders.index') }}" class="btn btn-warning">View Orders</a>
                </div>
            </div>
        </div>
    </div>
@endsection
