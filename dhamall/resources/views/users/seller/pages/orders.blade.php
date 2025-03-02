@extends('users.seller.layouts.app')

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

<style>/* General Table Styling */
.table th, .table td {
    text-align: center;
    vertical-align: middle;
    white-space: nowrap; /* Prevents text wrapping */
}

/* Responsive Table */
@media (max-width: 768px) {
    .table-responsive {
        overflow-x: auto;
    }

    .table th, .table td {
        min-width: 120px; /* Adjust as needed */
    }

    .product-img {
        width: 40px; /* Smaller image size on mobile */
        height: 40px;
    }

    .product-name {
        font-size: 14px;
    }

    /* Hide less important columns on small screens */
    .table th:nth-child(4), .table td:nth-child(4), /* Customer */
    .table th:nth-child(5), .table td:nth-child(5) /* Total Amount */ {
        display: none;
    }
}
@media (max-width: 580px) {
    .table, .table thead, .table tbody, .table th, .table td, .table tr {
        display: block; /* Convert table to block layout */
        width: 100%;
    }

    .table thead {
        display: none; /* Hide the table header */
    }

    .table tr {
        margin-bottom: 1rem; /* Add space between rows */
        border: 1px solid #ddd; /* Add border to separate rows */
        border-radius: 5px;
        padding: 10px;
        background: #2a2a40; /* Match the card background */
    }

    .table td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-align: right;
        padding: 8px;
        border: none;
    }

    .table td::before {
        content: attr(data-label); /* Add labels for each cell */
        font-weight: bold;
        text-align: left;
        margin-right: 10px;
    }

    /* Add data-label attributes to each cell */
    .table td:nth-child(1)::before { content: "Order ID: "; }
    .table td:nth-child(2)::before { content: "Product: "; }
    .table td:nth-child(3)::before { content: "Quantity: "; }
    .table td:nth-child(4)::before { content: "Customer: "; }
    .table td:nth-child(5)::before { content: "Total Amount: "; }
    .table td:nth-child(6)::before { content: "Status: "; }
    .table td:nth-child(7)::before { content: "Action: "; }

    /* Adjust product image and name */
    .table td:nth-child(2) {
        display: flex;
        align-items: center;
    }

    .product-img {
        width: 30px;
        height: 30px;
    }

    .product-name {
        font-size: 12px;
    }

    /* Adjust badges and buttons */
    .badge {
        font-size: 12px;
        padding: 4px 8px;
    }

    .btn-primary {
        font-size: 12px;
        padding: 6px 10px;
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

/* Adjustments for screens below 452px */
@media (max-width: 452px) {
    .table td {
        padding: 6px; /* Reduce padding */
        font-size: 12px; /* Reduce font size */
    }

    .table td::before {
        font-size: 12px; /* Reduce label font size */
    }

    /* Stack the dropdown and button vertically in the "Action" column */
    .table td:nth-child(7) {
        display: flex;
        flex-direction: column;
        gap: 5px; /* Add space between dropdown and button */
    }

    .table td:nth-child(7) .form-select,
    .table td:nth-child(7) .btn {
        width: 100%; /* Make dropdown and button full width */
    }

    /* Hide less important columns */
    .table td:nth-child(4), /* Customer */
    .table td:nth-child(5) /* Total Amount */ {
        display: none;
    }

    /* Further reduce product image size */
    .product-img {
        width: 25px;
        height: 25px;
    }

    .product-name {
        font-size: 11px; /* Reduce product name font size */
    }

    /* Adjust badges */
    .badge {
        font-size: 11px;
        padding: 3px 6px;
    }

    /* Adjust buttons */
    .btn-primary {
        font-size: 11px;
        padding: 5px 8px;
    }
}

/* Adjustments for screens below 410px */
@media (max-width: 410px) {
    
    .table, .table thead, .table tbody, .table th, .table td, .table tr {
        display: block; /* Convert table to block layout */
        width: 100%;
    }

    .table thead {
        display: none; /* Hide the table header */
    }

    .table tr {
        margin-bottom: 1rem; /* Add space between rows */
        border: 1px solid #ddd; /* Add border to separate rows */
        border-radius: 5px;
        padding: 10px;
        background: #2a2a40; /* Match the card background */
    }

    .table td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-align: right;
        padding: 8px;
        border: none;
        font-size: 12px; /* Small font size */
    }

    .table td::before {
        content: attr(data-label); /* Add labels for each cell */
        font-weight: bold;
        text-align: left;
        margin-right: 10px;
        font-size: 12px; /* Small label font size */
    }

    /* Add data-label attributes to each cell */
    .table td:nth-child(1)::before { content: "Order ID: "; }
    .table td:nth-child(2)::before { content: "Product: "; }
    .table td:nth-child(3)::before { content: "Quantity: "; }
    .table td:nth-child(4)::before { content: "Customer: "; }
    .table td:nth-child(5)::before { content: "Total Amount: "; }
    .table td:nth-child(6)::before { content: "Status: "; }
    .table td:nth-child(7)::before { content: "Action: "; }

    /* Hide less important columns */
    .table td:nth-child(4), /* Customer */
    .table td:nth-child(5) /* Total Amount */ {
        display: none;
    }

    /* Adjust product image and name */
    .table td:nth-child(2) {
        display: flex;
        align-items: center;
        gap: 5px; /* Space between image and text */
    }

    .product-img {
        width: 25px; /* Tiny image size */
        height: 25px;
    }

    .product-name {
        font-size: 12px; /* Small font size */
    }

    /* Adjust status badge */
    .badge {
        font-size: 12px;
        padding: 4px 8px;
    }

    /* Simplify actions */
    .table td:nth-child(7) {
        display: block;
        text-align: center;
    }

    .table td:nth-child(7) .form-select,
    .table td:nth-child(7) .btn {
        display: none; /* Hide dropdown and button */
    }

    .table td:nth-child(7) .btn-icon {
        display: inline-block; /* Show a small icon button */
        font-size: 14px;
        padding: 4px 8px;
        background: #007bff;
        color: white;
        border-radius: 3px;
        cursor: pointer;
    }
}

/* Adjustments for screens below 270px */
@media (max-width: 270px) {
    .table td {
        display: block; /* Stack all cells vertically */
        text-align: left; /* Align text to the left */
        padding: 4px; /* Reduce padding */
        font-size: 10px; /* Extremely small font size */
    }

    .table td::before {
        content: attr(data-label); /* Add labels for each cell */
        font-weight: bold;
        display: inline-block;
        width: 80px; /* Fixed width for labels */
        font-size: 10px; /* Small label font size */
    }

    /* Hide non-essential columns */
    .table td:nth-child(1), /* Order ID */
    .table td:nth-child(3), /* Quantity */
    .table td:nth-child(4), /* Customer */
    .table td:nth-child(5), /* Total Amount */
    .table td:nth-child(7) /* Action */ {
        display: none;
    }

    /* Adjust product image and name */
    .table td:nth-child(2) {
        display: flex;
        align-items: center;
        gap: 5px; /* Space between image and text */
    }

    .product-img {
        width: 20px; /* Tiny image size */
        height: 20px;
    }

    .product-name {
        font-size: 10px; /* Very small font size */
    }

    /* Adjust status badge */
    .badge {
        font-size: 10px;
        padding: 2px 4px;
    }

    /* Simplify actions */
    .table td:nth-child(7) {
        display: block;
        text-align: center;
    }

    .table td:nth-child(7) .form-select,
    .table td:nth-child(7) .btn {
        display: none; /* Hide dropdown and button */
    }

    .table td:nth-child(7)::before {
        content: "Action: "; /* Add label for actions */
    }

    .table td:nth-child(7) .btn-icon {
        display: inline-block; /* Show a small icon button */
        font-size: 12px;
        padding: 2px 6px;
        background: #007bff;
        color: white;
        border-radius: 3px;
        cursor: pointer;
    }
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
