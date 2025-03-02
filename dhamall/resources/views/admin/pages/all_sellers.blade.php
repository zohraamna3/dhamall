@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="text-center mb-4">
        <h3 class="fw-bold text-gold rounded-1" style="background: #1a1a2e; color: #b3a31c; padding:1.5rem;">
            All Sellers
        </h3>
    </div>
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
                    <a href="{{ route('admin.seller.statistics', ['id' => $seller['id']]) }}" class="view-stats">View Stats</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>


.view-stats {
        background: linear-gradient(45deg, #b3a31c, #ffcc00);
        border-radius: 9px;
        transition: all 0.25s ease-in-out;
        padding: 0.25rem 1rem;
        text-decoration: none;
        color:white;
    }

.view-stats:hover {
    background: linear-gradient(45deg, #ffcc00, #b3a31c);
    transform: scale(1.05);
    box-shadow: 0px 0px 15px rgba(255, 204, 0, 1);
    text-decoration: none;
    color:black;
}
</style>

@endsection
