<div class="my-5">
    <div class="card shadow-lg" style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a);">
        <div class="card-body p-4">
            <h3 class="text-warning mb-4">You May Also Like</h3>

            @if($relatedProducts->count() > 0)
                <div class="row">
                    @foreach($relatedProducts as $product)
                        <div class="col-md-3 mb-4">
                            <div class="card h-100 border-0 shadow-sm product-card">
                                <!-- Product Image -->
                                <div class="position-relative overflow-hidden" style="height: 200px;">
                                    <img src="{{ $product->images->first()->image_url ?? asset('images/placeholder.jpg') }}"
                                         class="card-img-top h-100 object-fit-cover"
                                         alt="{{ $product->ProductName }}">

                                    <!-- Quick View Button -->
                                    <div class="position-absolute bottom-0 start-0 end-0 text-center p-2">
                                        <a href="{{ route('products.show', $product->id) }}"
                                           class="btn btn-sm btn-warning w-75 opacity-0 product-quick-view">
                                            Quick View
                                        </a>
                                    </div>
                                </div>

                                <!-- Product Details -->
                                <div class="card-body">
                                    <h5 class="card-title text-light mb-1">
                                        <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-light">
                                            {{ Str::limit($product->ProductName, 40) }}
                                        </a>
                                    </h5>
                                    <div class="rating-stars small mb-2">
                                        @php $rating = $product->reviews->avg('Rating') ?? 0; @endphp
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= floor($rating))
                                                <i class="fas fa-star text-warning"></i>
                                            @elseif($i == ceil($rating) && ($rating - floor($rating)) >= 0.5)
                                                <i class="fas fa-star-half-alt text-warning"></i>
                                            @else
                                                <i class="far fa-star text-warning"></i>
                                            @endif
                                        @endfor
                                        <small class="text-muted ms-1">({{ $product->reviews->count() }})</small>
                                    </div>
                                    <h5 class="text-warning mb-0">
                                        ${{ number_format($product->Price, 2) }}
                                        @if($product->CompareAtPrice > $product->Price)
                                            <small class="text-light text-decoration-line-through ms-1">
                                                ${{ number_format($product->CompareAtPrice, 2) }}
                                            </small>
                                        @endif
                                    </h5>
                                </div>

                                <!-- Add to Cart Button -->
                                <div class="card-footer bg-transparent border-top-0">
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-outline-warning w-100">
                                            <i class="fas fa-shopping-cart me-1"></i> Add to Cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info">
                    No related products found.
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .product-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .product-card:hover .product-quick-view {
        opacity: 1 !important;
    }

    .object-fit-cover {
        object-fit: cover;
    }
</style>
