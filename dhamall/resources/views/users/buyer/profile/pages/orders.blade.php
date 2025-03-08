<div id="my-orders" class="content-section {{ request('section') === 'orders' ? '' : 'd-none' }}">
    <div class="text-center mb-4">
        <h3 class="fw-bold text-gold rounded-1 p-2 pd-sm-3 p-md-4" style="background: #1a1a2e; color: #b3a31c;">My Orders</h3>
    </div>

    @if ($orders->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-box-open fa-3x text-muted"></i>
            <p class="text-muted mt-3">No orders found.</p>
        </div>
    @else
        @foreach ($orders as $order)
            <div class="card shadow-lg rounded p-4 mb-4 border border-light-subtle">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold text-dark">Order #{{ $order->id }}</h5>
                    <span class="badge text-uppercase px-3 py-2 {{ $order->status == 'completed' ? 'bg-success text-white' : 'bg-warning text-dark' }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>

                <p class="mb-1"><strong>Order Date:</strong> {{ $order->order_date }}</p>
                <p class="mb-1"><strong>Total Amount:</strong> <span class="text-success">₹{{ number_format($order->total_amount, 2) }}</span></p>
                <p class="mb-1"><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
                <p class="mb-3"><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>

                <div class="order-items d-flex flex-wrap gap-3">
                    @foreach ($order->orderItems as $item)
                        <div class="product-card p-3 text-center shadow-sm rounded border" style="width: 160px; background: #fff;">
                            <img src="{{ asset('images/products/' . $item->product_id . '.jpg') }}"
                                 class="rounded img-fluid mb-2"
                                 alt="Product Image">
                            <p class="mb-1 fw-bold text-dark">ID: {{ $item->product_id }}</p>
                            <p class="mb-1">Qty: <strong>{{ $item->quantity }}</strong></p>
                            <p class="mb-0">Price: <span class="text-primary">₹{{ number_format($item->price_at_time_of_order, 2) }}</span></p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @endif
</div>

<style>
    .order-items .product-card img {
        height: 120px;
        object-fit: cover;
    }
</style>
