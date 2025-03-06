@extends('users.buyer.layouts.app')


@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-current">Product Details</li>
        </ol>
    </nav>
@endsection


@section('content')

    <div class="container ">
        <div class="row">
            <!-- Product Images -->
            @include('users.buyer.product.partials.image-carousel')

            <!-- Product Details -->
            @include(('users.buyer.product.partials.product-details-section'))
        </div>

        <!-- Reviews Section -->
        @include('users.buyer.product.partials.reviews-section')

        <!-- You May Also Like -->
        @include('users.buyer.product.partials.you-may-also-like-section')
    </div>
    <style>

        .shop-btn, .shop-now-btn, .view-details-btn {
            background: linear-gradient(45deg, #b3a31c, #ffcc00);
            border-radius: 25px;
            transition: all 0.25s ease-in-out;
        }

        .shop-btn:hover, .shop-now-btn:hover, .view-details-btn:hover {
            background: linear-gradient(45deg, #ffcc00, #b3a31c);
            transform: scale(1.05);
            box-shadow: 0px 0px 15px rgba(255, 204, 0, 1);
        }

        /* Custom Scrollbar Styling */
        .list-group::-webkit-scrollbar {
            width: 8px; /* Width of the scrollbar */
        }

        .list-group::-webkit-scrollbar-track {
            background: #1a1a2e; /* Background color of the track */
            border-radius: 10px; /* Rounded corners for the track */
        }

        .list-group::-webkit-scrollbar-thumb {
            background: #b3a31c; /* Color of the scrollbar thumb */
            border-radius: 10px; /* Rounded corners for the thumb */
        }

        .list-group::-webkit-scrollbar-thumb:hover {
            background: #ffcc00; /* Color of the scrollbar thumb on hover */
        }

    </style>
@endsection
