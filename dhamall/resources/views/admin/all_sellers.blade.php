@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mt-4">All Sellers</h2>

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
@endsection
