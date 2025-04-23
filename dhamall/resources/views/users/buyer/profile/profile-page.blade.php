@extends('users.buyer.profile.layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-current">Personal Information</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="row justify-content-center">
        <!-- Main Content -->
        <div class="col-md-10">
            <div class="card shadow-sm rounded" id="content-area">
                @include('users.buyer.profile.pages.profile_information', ['user' => $user])
                @include('users.buyer.profile.pages.orders', ['orders' => $orders])
                @include('users.buyer.profile.pages.wishlist', ['wishlist' => $wishlist])
                @include('users.buyer.profile.pages.cart', ['cart' => $cart])
                @include('users.buyer.profile.pages.payment_details', ['paymentDetails' => $paymentDetails])
                @include('users.buyer.profile.pages.notifications', ['notifications' => $user->notifications])
            </div>
        </div>
    </div>

    @include('users.buyer.profile.pages.profile_scripts')
@endsection
