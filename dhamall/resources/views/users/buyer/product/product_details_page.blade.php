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
    <link rel="stylesheet" href="./styles/product-details.css">
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
@endsection
