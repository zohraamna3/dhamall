@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Product Images -->
        <div class="col-md-6">
            <div id="product-carousel" class="carousel slide shadow-lg rounded" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($product->images as $key => $image)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ $image->image_url }}" class="d-block w-100 rounded" alt="Product Image">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#product-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#product-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6 text-white" style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); padding: 30px; border-radius: 15px;">
            <h2 class="text-warning">{{ $product->name }}</h2>
            <p><strong>Price:</strong> <span class="fs-4 text-warning">${{ number_format($product->price, 2) }}</span></p>
            <p><strong>Features:</strong> {{ $product->features }}</p>
            <p><strong>Description:</strong> {{ $product->description }}</p>
            <p><strong>Stock:</strong> {{ $product->quantity_in_stock }}</p>
            <button class="btn shop-btn text-dark px-4 py-2 fw-bold mt-2">Add to Cart</button>
            <button class="btn shop-now-btn text-dark px-4 py-2 fw-bold mt-2">Checkout</button>
        </div>
    </div>

    <!-- Reviews Section -->
    <div class="mt-5" style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); padding: 30px; border-radius: 15px;">
        <h3 class="text-warning">Customer Reviews</h3>
        <p class="text-light fs-5">
            ⭐ {{ number_format($averageRating, 1) }} / 5 ({{ $product->reviews->count() }} reviews)
        </p>

        <div class="list-group overflow-auto" style="max-height: 400px;">
            @foreach($product->reviews as $review)
                <div class="list-group-item bg-dark text-light rounded mb-3 p-3">
                    <div class="d-flex align-items-center mb-2">
                        <!-- <img src="{{ $review->user->profile_image ?? '/default-avatar.png' }}" class="rounded-circle me-2" width="40" height="40" alt="User Image"> -->
                        <strong class="text-warning">{{ $review->user->name }}</strong>
                        <span class="ms-auto text-muted">{{ $review->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="mb-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-secondary' }}"></i>
                        @endfor
                        <span class="ms-2">({{ $review->rating }}/5)</span>
                    </div>
                    <p class="mb-0">{{ $review->comment }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- You May Also Like -->
    <div class="mt-5">
        <h3 class="text-warning">You May Also Like</h3>
        <div class="row">
            @foreach($relatedProducts as $related)
                <div class="col-md-3">
                    <div class="card shadow-lg border-0 rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                        <img src="{{ $related->images->first()->image_url }}" class="card-img-top" alt="Product Image">
                        <div class="card-body text-center" style="background: #1a1a2e; color: #b3a31c;">
                            <h5 class="card-title fw-bold">{{ $related->name }}</h5>
                            <p class="fw-bold fs-5 text-warning">${{ number_format($related->price, 2) }}</p>
                            <a href="{{ route('product.show', $related->id) }}" class="btn view-details-btn w-100 text-white fw-bold py-2">
                                View Details <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
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
</style>
@endsection
