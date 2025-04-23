<div id="cart" class="content-section {{ request('section') === 'cart' ? '' : 'd-none' }}">
    <div class="text-center mb-4">
        <h3 class="fw-bold text-gold rounded-1 p-2 pd-sm-3 p-md-4" style="background: #1a1a2e; color: #b3a31c;">My Cart</h3>
    </div>

    @if ($cart->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-shopping-cart fa-3x text-muted"></i>
            <p class="text-muted mt-3">Your cart is empty.</p>
        </div>
    @else
        <div class="d-flex flex-wrap gap-3 justify-content-center">
            @foreach ($cart as $item)
                <div class="product-card p-3 text-center shadow-sm rounded border" style="width: 160px; background: #fff;">
                    @if($item->product && $item->product->images->isNotEmpty())
                        <img src="{{ asset($item->product->images->first()->ImageURL) }}"
                             class="rounded img-fluid mb-2"
                             alt="Product Image" style="height: 120px; object-fit: cover;">
                    @endif
                    <p class="mb-1 fw-bold text-dark">{{ $item->product->ProductName ?? 'Product' }}</p>
                    <p class="mb-1">Qty: <strong>{{ $item->Quantity }}</strong></p>
                    <p class="mb-1">Price: ₹{{ number_format($item->PricePerUnit, 2) }}</p>
                    <button class="btn btn-danger btn-sm">Remove</button>
                </div>
            @endforeach
        </div>
    @endif
</div>
