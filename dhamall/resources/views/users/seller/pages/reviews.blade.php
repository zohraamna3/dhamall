@extends('users.seller.layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-current">Reviews</li>
        </ol>
    </nav>
@endsection
@section('content')
<div class="container mt-5 px-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-gold rounded-1" style="background: #1a1a2e; color: #b3a31c; padding:1.5rem;">
                Recent Reviews
            </h3>
        </div>

            <div class="card shadow-sm p-4 border-0 mb-5" style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a);">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Product</th>
                                <th>Customer</th>
                                <th>Rating</th>
                                <th>Review</th>
                                <th>Sentiment</th>
                                <th>Posted On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $recentReviews = [
                                    ['product' => 'Wireless Earbuds', 'customer' => 'Ali Khan', 'rating' => 4, 'review' => 'Amazing sound quality!', 'sentiment' => 'Positive', 'date' => '01 Mar 2025'],
                                    ['product' => 'Gaming Headphones', 'customer' => 'Fatima Noor', 'rating' => 3, 'review' => 'Comfortable but average sound.', 'sentiment' => 'Neutral', 'date' => '02 Mar 2025'],
                                    ['product' => 'Bluetooth Speaker', 'customer' => 'Ahmed Raza', 'rating' => 2, 'review' => 'Not worth the price.', 'sentiment' => 'Negative', 'date' => '03 Mar 2025'],
                                ];
                            @endphp

                            @foreach($recentReviews as $review)
                            <tr>
                                <td>{{ $review['product'] }}</td>
                                <td>{{ $review['customer'] }}</td>
                                <td>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $review['rating'] ? 'text-warning' : 'text-muted' }}"></i>
                                    @endfor
                                </td>
                                <td>{{ $review['review'] }}</td>
                                <td>
                                    <span class="badge {{ $review['sentiment'] == 'Positive' ? 'bg-success' : ($review['sentiment'] == 'Negative' ? 'bg-danger' : 'bg-warning') }}">
                                        {{ $review['sentiment'] }}
                                    </span>
                                </td>
                                <td>{{ $review['date'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="text-center mb-4">
                <h3 class="fw-bold text-gold rounded-1" style="background: #1a1a2e; color: #b3a31c; padding:1.5rem;">
                    Product Wise Reviews
                </h3>
            </div>
            <div class="card shadow-sm p-4 border-0" style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a);">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $products = [
                                    ['id' => 1, 'name' => 'Wireless Earbuds', 'price' => 5000],
                                    ['id' => 2, 'name' => 'Gaming Headset', 'price' => 7000],
                                    ['id' => 3, 'name' => 'Bluetooth Speaker', 'price' => 3500],
                                ];
                            @endphp

                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product['name'] }}</td>
                                <td>Rs. {{ $product['price'] }}</td>
                                <td>
                                    <a href="{{ route('seller.product.reviews', ['id' => $product['id']]) }}" class="btn btn-primary">
                                        Show Reviews
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Table Styling */
.table th, .table td {
    padding: 15px !important;
    text-align: center;
}

/* Badges */
.badge {
    font-size: 14px;
    padding: 6px 12px;
}

/* Card Styling */
.card {
    background: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
</style>

@endsection
