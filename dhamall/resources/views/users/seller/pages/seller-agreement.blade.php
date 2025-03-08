@extends('users.seller.layouts.app')

@section('title', 'Seller Agreement - Dhamall')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Seller Agreement</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-lg"
         style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">
        <h1 class="text-center text-warning mb-4">Seller Agreement</h1>
        <p class="text-center">By becoming a seller, you agree to the following terms.</p>
        <div class="mt-4">
            <h3 class="text-warning">Responsibilities</h3>
            <ul>
                <li>Provide accurate product information.</li>
                <li>Fulfill orders on time.</li>
                <li>Handle customer complaints professionally.</li>
            </ul>
        </div>
    </div>
@endsection
