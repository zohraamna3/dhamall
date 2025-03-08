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
                    @include('users.buyer.profile.pages.profile_information')
                    @include('users.buyer.profile.pages.orders', ['orders' => $orders])
                    @include('users.buyer.profile.pages.wishlist', ['wishlist' => $wishlist])
                    @include('users.buyer.profile.pages.cart', ['cart' => $shoppingCart])
                    @include('users.buyer.profile.pages.payment_details', ['paymentDetails' => $paymentDetails])
                    @include('users.buyer.profile.pages.notifications')
                </div>
            </div>
        </div>


    @include('users.buyer.profile.pages.profile_scripts')


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

        @media(max-width:300px){
            .main-content{
                padding: 2px 0;
                margin: 2px;
            }
            .row{
               --bs-gutter-x: 0rem;
            }
        }


    </style>
@endsection
