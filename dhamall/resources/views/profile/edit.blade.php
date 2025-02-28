@extends('layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/profile') }}">My Account</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-current">Personal Information</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container my-4">
        <div class="row">
            <!-- Sidebar Section -->
            <div class="col-md-3" style="height:45vh; background: linear-gradient(135deg, #1a1a2e, #0d0d1a); padding: 30px; border-radius: 15px;">
                <div class="list-group shadow-sm rounded" id="profile-menu">
                    <a href="#" class="list-group-item list-group-item-action active" data-section="personal-details" data-title="Personal Information">
                        <i class="bi bi-person-circle me-2"></i> Personal Information
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" data-section="my-orders" data-title="My Orders" >
                        <i class="bi bi-bag-check me-2"></i> My Orders
                    </a>


                    <a href="#" class="list-group-item list-group-item-action" data-section="wishlist" data-title="My Wishlist">
                        <i class="bi bi-heart me-2"></i> My WishList
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" data-section="cart" data-title="My Cart">
                        <i class="bi bi-cart me-2"></i> My Cart
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" data-section="payment" data-title="Payment Details">
                        <i class="bi bi-credit-card me-2"></i> Payment Details
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" data-section="notifications" data-title="Notifications">
                        <i class="bi bi-bell me-2"></i> Notifications
                    </a>
                </div>
            </div>

            <!-- Right Content Section -->
            <div class="col-md-9">
                <div class="card shadow-sm rounded p-4" id="content-area">
                @include('profile.partials.profile_information')
                @include('profile.partials.orders', ['orders' => $orders])
                @include('profile.partials.wishlist', ['wishlist' => $wishlist])
                @include('profile.partials.cart', ['cart' => $shoppingCart])
                @include('profile.partials.payment_details', ['paymentDetails' => $paymentDetails])
                @include('profile.partials.notifications')
                </div>
            </div>
        </div>
    </div>

    @include('profile.partials.profile_scripts') 


<!-- Custom CSS for Breadcrumb -->
    <style>


        /* Sidebar Selected Item */
        #profile-menu .selected {
            background-color: #1a1a2e !important;
            color: white !important;
            font-weight: bold;
        }

        /* Ensure the default selected (first) option has correct color */
        #profile-menu .list-group-item.active,
        #profile-menu .list-group-item.selected {
            background-color: #1a1a2e !important;
            color: #b3a31c !important;
            font-weight: bold;
        }

        /* Ensure non-selected items are transparent */
        #profile-menu .list-group-item {
            background-color: transparent;
            color: white;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .text-muted {
            font-weight: 500;
            color: #6c757d;
        }

        .btn-outline-primary:hover {
            background-color: #1a1a2e;
            color: white;
        }



    </style>
@endsection
