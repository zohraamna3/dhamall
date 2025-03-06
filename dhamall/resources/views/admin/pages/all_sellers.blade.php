@extends('admin.layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-current">All Sellers</li>
        </ol>
    </nav>
@endsection
@section('content')
<div class="container">
    <div class="text-center mb-4">
        <h3 class="fw-bold text-gold rounded-1" style="background: #1a1a2e; color: #b3a31c; padding:1.5rem;">
            All Sellers
        </h3>
    </div>
    <div class="table-responsive">
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Shop Name</th>
                <th>Overall Review</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sellers as $seller)
            <tr>
                <td>{{ $seller['id'] }}</td>
                <td>{{ $seller['name'] }}</td>
                <td>{{ $seller['email'] }}</td>
                <td>{{ $seller['shop_name'] }}</td>
                <td>
                    @php
                        $dummy_reviews = ['Positive', 'Negative', 'Neutral'];
                        $review = $seller['overall_review'] ?? $dummy_reviews[array_rand($dummy_reviews)];
                    @endphp
                    <span class="badge {{ $review == 'Positive' ? 'bg-success' : ($review == 'Negative' ? 'bg-danger' : 'bg-warning') }}">
                        {{ $review }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.seller.statistics', ['id' => $seller['id']]) }}" class="btn btn-info">View Stats</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

<style>




    </style>

@endsection
