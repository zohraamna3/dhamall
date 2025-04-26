<div class="col-md-6">
    <div class="card shadow-lg h-100" style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a);">
        <div class="card-body p-4">
            <h1 class="text-warning mb-3">{{ $product->ProductName }}</h1>

            <!-- Rating -->
            <div class="d-flex align-items-center mb-3">
                <div class="rating-stars me-2">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= floor($avgRating))
                            <i class="fas fa-star text-warning"></i>
                        @elseif($i == ceil($avgRating) && ($avgRating - floor($avgRating)) >= 0.5)
                            <i class="fas fa-star-half-alt text-warning"></i>
                        @else
                            <i class="far fa-star text-warning"></i>
                        @endif
                    @endfor
                </div>
                <span class="text-light">
                    {{ number_format($avgRating, 1) }} ({{ $reviewCount }} reviews)
                </span>
                <a href="#reviews" class="ms-3 text-warning">See all reviews</a>
            </div>

            <!-- Price -->
            <div class="mb-4">
                <h3 class="text-warning">
                    ${{ number_format($product->Price, 2) }}

                </h3>
                @if($product->StockQuantity > 0)
                    <span class="badge bg-success">In Stock ({{ $product->StockQuantity }} available)</span>
                @else
                    <span class="badge bg-danger">Out of Stock</span>
                @endif
            </div>



            <!-- Brand & Category -->
            <div class="mb-4">
                <p class="mb-1"><strong class="text-light">Brand:</strong>
                    <a href="{{ route('products.index', ['brand' => $product->brand->id]) }}" class="text-warning">
                        {{ $product->brand->Name }}
                    </a>
                </p>
                <p class="mb-1"><strong class="text-light">Category:</strong>
                    <a href="{{ route('products.index', ['category' => $product->category->id]) }}" class="text-warning">
                        {{ $product->category->CategoryName }}
                    </a>
                </p>
                <p class="mb-1"><strong class="text-light">Number of Orders:</strong> <span class="text-light">{{ $product->NumberOfOrders }}</span></p>
            </div>

            <!-- Add to Cart Form -->
            <form action="{{ route('cart.add') }}" method="POST" class="mb-4">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <!-- Quantity Selector -->
                <div class="mb-4">
                    <label class="form-label text-light">Quantity</label>
                    <div class="input-group" style="max-width: 150px;">
                        <button class="btn btn-outline-warning" type="button" id="decrement-qty">-</button>
                        <input type="number" name="quantity" value="1" min="1" max="{{ $product->StockQuantity }}"
                               class="form-control bg-dark text-light text-center" id="product-quantity">
                        <button class="btn btn-outline-warning" type="button" id="increment-qty">+</button>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex flex-wrap gap-3">
                    <button type="submit" class="btn btn-warning flex-grow-1 py-3"
                        {{ $product->StockQuantity <= 0 ? 'disabled' : '' }}>
                        <i class="fas fa-shopping-cart me-2"></i> Add to Cart
                    </button>

                    <button type="button" class="btn btn-outline-warning flex-grow-1 py-3" id="buy-now-btn"
                        {{ $product->StockQuantity <= 0 ? 'disabled' : '' }}>
                        <i class="fas fa-bolt me-2"></i> Buy Now
                    </button>
                </div>
            </form>

            <!-- Wishlist & Share -->
            <div class="d-flex justify-content-between align-items-center border-top border-secondary pt-3">
                <button class="btn btn-outline-light btn-sm" id="add-to-wishlist">
                    <i class="far fa-heart me-1"></i> Add to Wishlist
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Quantity selector functionality
        const quantityInput = document.getElementById('product-quantity');
        document.getElementById('decrement-qty').addEventListener('click', function() {
            let value = parseInt(quantityInput.value);
            if (value > 1) {
                quantityInput.value = value - 1;
            }
        });

        document.getElementById('increment-qty').addEventListener('click', function() {
            let value = parseInt(quantityInput.value);
            let max = parseInt(quantityInput.max);
            if (value < max) {
                quantityInput.value = value + 1;
            }
        });

        // Buy now button functionality
        document.getElementById('buy-now-btn').addEventListener('click', function() {
            const form = this.closest('form');
            form.action = "{{ route('checkout.index') }}";
            form.submit();
        });
    });
</script>
