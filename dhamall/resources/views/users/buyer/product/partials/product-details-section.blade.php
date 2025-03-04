<div class="col-md-6 text-white"
     style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); padding: 30px; border-radius: 15px;">
    <h2 class="text-warning">{{ $product->name }}</h2>
    <p><strong>Price:</strong> <span
            class="fs-4 text-warning">${{ number_format($product->price, 2) }}</span></p>
    <p><strong>Features:</strong> {{ $product->features }}</p>
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <p><strong>Stock:</strong> {{ $product->quantity_in_stock }}</p>
    <button class="btn shop-btn text-dark px-4 py-2 fw-bold mt-2">Add to Cart</button>
    <a href="{{ route('checkout.index') }}" class="btn shop-now-btn text-dark px-4 py-2 fw-bold mt-2">Checkout</a>
</div>
