@extends('users.buyer.layouts.app')

@section('title', 'Returns and Refunds - Dhamall')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Returns and Refunds</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-lg mb-3"
         style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">
        <h1 class="text-center text-warning mb-4">Returns and Refunds</h1>
        <p class="text-center">We want you to be completely satisfied with your purchase. If you’re not, here’s our return and refund policy:</p>
        <div class="mt-4">
            <h3 class="text-warning">Return Policy</h3>
            <ul>
                @foreach ($returns as $return)
                    <li>{{ $return->Description }}</li>
                @endforeach
            </ul>
        </div>
        <div class="mt-4">
            <h3 class="text-warning">Refund Policy</h3>
            <ul>
                @foreach ($refunds as $refund)
                    <li>{{ $refund->Description }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
