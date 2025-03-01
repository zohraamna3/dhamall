@extends('layouts.seller')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Orders Content -->
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h2 class="mb-4">Order Management</h2>
            <div class="card shadow-sm border-0 p-4">
                <div class="table-responsive"> <!-- Makes table scrollable on small screens -->
                    <table class="table table-bordered align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Order ID</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Customer</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach([ 
                                ['id' => 101, 'product' => 'Wireless Earbuds', 'image' => 'earbuds.jpg', 'quantity' => 2, 'customer' => 'Ali Khan', 'total' => 4500, 'status' => 'Pending'], 
                                ['id' => 102, 'product' => 'Gaming Headset', 'image' => 'headset.jpg', 'quantity' => 1, 'customer' => 'Ayesha Ahmed', 'total' => 3200, 'status' => 'Shipped'], 
                                ['id' => 103, 'product' => 'Noise Cancelling Headphones', 'image' => 'headphones.jpg', 'quantity' => 1, 'customer' => 'Zain Raza', 'total' => 5400, 'status' => 'Completed'] 
                            ] as $order)
                            <tr>
                                <td>#{{ $order['id'] }}</td>
                                <td class="d-flex align-items-center">
                                    <img src="{{ asset('images/' . $order['image']) }}" alt="{{ $order['product'] }}" class="product-img me-2">
                                    <span class="product-name">{{ $order['product'] }}</span>
                                </td>
                                <td>{{ $order['quantity'] }}</td>
                                <td>{{ $order['customer'] }}</td>
                                <td>Rs. {{ number_format($order['total'], 2) }}</td>
                                <td>
                                    <span class="badge bg-{{ 
                                        $order['status'] == 'Completed' ? 'success' : 
                                        ($order['status'] == 'Pending' ? 'warning' : 'primary') }}">
                                        {{ $order['status'] }}
                                    </span>
                                </td>
                                <td>
                                    <select class="form-select w-100">
                                        <option>Pending</option>
                                        <option>Shipped</option>
                                        <option>Completed</option>
                                        <option>Cancelled</option>
                                    </select>
                                    <button class="btn btn-primary w-100 mt-2">Update</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- End of table-responsive -->
            </div>
        </div>
    </div>
</div>

<style>
.card {
    background: #fff;
    border-radius: 10px;
    padding: 15px;
}

/* Responsive Table */
.table th, .table td {
    text-align: center;
    vertical-align: middle;
    white-space: nowrap; /* Prevents text wrapping */
}

@media (max-width: 768px) {
    .table-responsive {
        overflow-x: auto;
    }
    
    .product-img {
        width: 40px; /* Smaller image size on mobile */
        height: 40px;
    }
    
    .product-name {
        font-size: 14px;
    }
}

/* Badges */
.badge {
    font-size: 14px;
    padding: 6px 10px;
}

/* Buttons */
.btn-primary {
    width: 100%;
    font-size: 14px;
    padding: 8px 12px;
}

/* Product Images */
.product-img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 5px;
}
</style>

@endsection
