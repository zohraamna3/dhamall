@extends('users.seller.layouts.app')

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
    <div class="card shadow-lg border-0 rounded-lg"
         style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">
        <h1 class="text-center text-warning mb-4">Privacy Policy</h1>
        <p class="text-center">Your privacy is important to us. Here's how we handle your data.</p>
        <div class="mt-4">
            <h3 class="text-warning">Data Collection</h3>
            <ul>
                <li>We collect personal information to provide better services.</li>
                <li>We do not share your data with third parties without your consent.</li>
            </ul>
        </div>
    </div>
@endsection
