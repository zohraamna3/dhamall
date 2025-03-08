<div id="wishlist" class="content-section {{ request('section') === 'wishlist' ? '' : 'd-none' }}">
    <div class="text-center mb-4">
        <h3 class="fw-bold text-gold rounded-1 p-2 pd-sm-3 p-md-4" style="background: #1a1a2e; color: #b3a31c;">My Wishlist</h3>
    </div>

    @if ($wishlist->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-heart fa-3x text-muted"></i>
            <p class="text-muted mt-3">No wishlist items found.</p>
        </div>
    @else
        <div class="d-flex flex-wrap gap-3 justify-content-center">
            @foreach ($wishlist as $item)
                <div class="product-card p-3 text-center shadow-sm rounded border" style="width: 160px; background: #fff;">
                    <img src="{{ asset('images/products/' . $item->product_id . '.jpg') }}"
                         class="rounded img-fluid mb-2"
                         alt="Product Image">
                    <p class="mb-1 fw-bold text-dark">Product ID: {{ $item->product_id }}</p>
                    <button class="btn btn-danger btn-sm">Remove</button>
                </div>
            @endforeach
        </div>
    @endif
</div>
<style>
    .product-card img {
        height: 120px;
        object-fit: cover;
    }
</style>
