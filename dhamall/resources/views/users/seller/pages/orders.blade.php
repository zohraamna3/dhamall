@extends('users.seller.layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-current">Orders</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row">
            <!-- Orders Content -->
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-gold rounded-1" style="background: #1a1a2e; color: #b3a31c; padding:1.5rem;">
                        Order Management
                    </h3>
                </div>
                <div class="card shadow-sm border-0 p-4" style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a);">
                    <div class="table-responsive">
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
                                <tr data-order-id="{{ $order['id'] }}">
                                    <td>#{{ $order['id'] }}</td>
                                    <td class="d-flex align-items-center">
                                        <img src="https://res.cloudinary.com/ddoeppfx0/image/upload/e_background_removal,f_png/cld-sample-5" alt="{{ $order['product'] }}" class="product-img me-2">
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
                                        <div class="btn-icon" data-order-id="{{ $order['id'] }}">
                                            <i class="bi bi-gear"></i>
                                        </div>
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
        /* General Table Styling */
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
            white-space: nowrap; /* Prevents text wrapping */
        }

        /* Responsive Table */
        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto; /* Enable horizontal scrolling */
                -webkit-overflow-scrolling: touch; /* Smooth scrolling on touch devices */
            }

            .table {
                width: 100%; /* Ensure the table takes full width */
                min-width: 600px; /* Minimum width to ensure all columns are visible */
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

    <script>
        // Function to handle the gear icon click
        function handleAction(orderId) {
            // Example: Show a modal or dropdown to update the order status
            const newStatus = prompt(`Update status for Order #${orderId}:\nEnter "Pending", "Shipped", "Completed", or "Cancelled"`);

            if (newStatus) {
                // Validate the input
                const validStatuses = ["Pending", "Shipped", "Completed", "Cancelled"];
                if (validStatuses.includes(newStatus)) {
                    // Update the status in the UI
                    const statusBadge = document.querySelector(`tr[data-order-id="${orderId}"] .badge`);
                    if (statusBadge) {
                        statusBadge.textContent = newStatus;
                        statusBadge.className = `badge bg-${getStatusColor(newStatus)}`;
                    }

                    // Here, you can also send an AJAX request to update the status on the server
                    console.log(`Order #${orderId} status updated to: ${newStatus}`);
                } else {
                    alert("Invalid status. Please enter one of: Pending, Shipped, Completed, Cancelled.");
                }
            }
        }

        // Helper function to get the badge color based on status
        function getStatusColor(status) {
            switch (status) {
                case "Completed":
                    return "success";
                case "Pending":
                    return "warning";
                case "Shipped":
                    return "primary";
                case "Cancelled":
                    return "danger";
                default:
                    return "secondary";
            }
        }

        // Add event listeners to all gear icons
        document.addEventListener("DOMContentLoaded", function () {
            const gearIcons = document.querySelectorAll(".btn-icon");
            gearIcons.forEach((icon) => {
                icon.addEventListener("click", function () {
                    const orderId = this.closest("tr").getAttribute("data-order-id");
                    handleAction(orderId);
                });
            });
        });
    </script>

@endsection
