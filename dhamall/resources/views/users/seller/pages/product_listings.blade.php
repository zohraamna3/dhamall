@extends('users.seller.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 p-3">
                <ul class="list-unstyled mt-3">
                    <li class="mb-2">
                        <a href="{{ route('seller.dashboard') }}" class="sidebar-link">
                            <i class="fas fa-chart-line me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('seller.products') }}" class="sidebar-link">
                            <i class="fas fa-box me-2"></i> My Products
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('seller.product_listings') }}" class="sidebar-link active">
                            <i class="fas fa-list me-2"></i> Product Listings
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('seller.orders') }}" class="sidebar-link">
                            <i class="fas fa-shopping-cart me-2"></i> Orders
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('seller.profile') }}" class="sidebar-link">
                            <i class="fas fa-user me-2"></i> My Profile
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('logout') }}" class="sidebar-link">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Product Listings Section -->
        <div class="col-md-9">
            <h2>Product Listings</h2>
            <div class="card shadow-sm p-4 border-0">
                <!-- Filters & Search -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <select id="filterStatus" class="form-select">
                            <option value="">Filter by Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="sortPrice" class="form-select">
                            <option value="">Sort by Price</option>
                            <option value="asc">Low to High</option>
                            <option value="desc">High to Low</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" id="searchProduct" class="form-control" placeholder="Search by Name">
                    </div>
                </div>

                <!-- Product Table -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="productTable">
                        @foreach ($products as $product)
                        <tr data-name="{{ strtolower($product->name) }}" data-status="{{ $product->status }}" data-price="{{ $product->price }}">
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>
                                <span class="badge bg-{{ $product->status == 'active' ? 'success' : 'danger' }}">
                                    {{ ucfirst($product->status) }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-warning toggle-status" data-id="{{ $product->id }}" data-status="{{ $product->status }}">
                                    {{ $product->status == 'active' ? 'Deactivate' : 'Activate' }}
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($products->isEmpty())
                    <p class="text-center text-muted">No products found.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
/* Sidebar Links */
.sidebar-link {
    display: block;
    font-size: 16px;
    font-weight: 500;
    padding: 10px 15px;
    text-decoration: none;
    color: #333;
    border-radius: 5px;
    transition: background 0.3s ease-in-out;
}

.sidebar-link:hover,
.sidebar-link.active {
    background-color: #f8f9fa !important;
}

/* Table Styling */
.table th, .table td {
    text-align: center;
    vertical-align: middle;
}

.badge {
    padding: 5px 10px;
    font-size: 14px;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .form-select, .form-control {
        margin-bottom: 10px;
    }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const filterStatus = document.getElementById("filterStatus");
    const sortPrice = document.getElementById("sortPrice");
    const searchProduct = document.getElementById("searchProduct");
    const productTable = document.getElementById("productTable");

    function filterProducts() {
        let status = filterStatus.value;
        let sort = sortPrice.value;
        let search = searchProduct.value.toLowerCase();
        let rows = Array.from(productTable.getElementsByTagName("tr"));

        rows.forEach(row => {
            let name = row.dataset.name;
            let rowStatus = row.dataset.status;
            let showRow = true;

            if (status && rowStatus !== status) showRow = false;
            if (search && !name.includes(search)) showRow = false;

            row.style.display = showRow ? "" : "none";
        });

        if (sort) {
            rows.sort((a, b) => {
                let priceA = parseFloat(a.dataset.price);
                let priceB = parseFloat(b.dataset.price);
                return sort === "asc" ? priceA - priceB : priceB - priceA;
            });

            rows.forEach(row => productTable.appendChild(row));
        }
    }

    filterStatus.addEventListener("change", filterProducts);
    sortPrice.addEventListener("change", filterProducts);
    searchProduct.addEventListener("keyup", filterProducts);

    // Status Toggle Feature
    document.querySelectorAll(".toggle-status").forEach(button => {
        button.addEventListener("click", function() {
            let productId = this.getAttribute("data-id");
            let currentStatus = this.getAttribute("data-status");
            let newStatus = currentStatus === "active" ? "inactive" : "active";

            fetch(`/seller/toggle-status/${productId}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ status: newStatus })
            }).then(response => response.json())
              .then(data => {
                  this.setAttribute("data-status", newStatus);
                  this.innerText = newStatus === "active" ? "Deactivate" : "Activate";
                  this.closest("tr").querySelector(".badge").classList.toggle("bg-success");
                  this.closest("tr").querySelector(".badge").classList.toggle("bg-danger");
                  this.closest("tr").querySelector(".badge").innerText = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
              }).catch(error => console.error("Error:", error));
        });
    });
});
</script>

@endsection
