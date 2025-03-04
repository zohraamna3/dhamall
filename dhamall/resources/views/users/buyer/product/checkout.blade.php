@extends('users.buyer.layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-current">Checkout</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container">
        <div class="card shadow-lg border-0 rounded-lg position-relative"
             style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">

            <button type="button" id="editBtn" class="btn btn-primary position-absolute top-0 end-0 m-3">Edit</button>

            <h2 class="text-center text-warning">Checkout</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @include('users.buyer.product.partials.checkout-form')
        </div>
    </div>
@endsection

<script src="./scripts/checkout.js"></script>
