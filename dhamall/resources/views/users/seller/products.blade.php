@extends('layouts.seller')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <!-- Product Management Section -->
        <div class="col-md-10">
            <h2 class="text-center">Product Management</h2>
            <div class="card shadow-sm p-4 border-0">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>My Products</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                        <i class="fas fa-plus"></i> Add Product
                    </button>
                </div>

                <!-- Search Bar -->
                <form method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search products...">
                        <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>

                <!-- Product Table -->
                @php
                    // Dummy product data for frontend testing
                    $products = [
                        ['id' => 1, 'name' => 'Wireless Earbuds', 'price' => 49.99, 'stock' => 20, 'status' => 'active', 'image' => 'images/earbuds.jpg'],
                        ['id' => 2, 'name' => 'Gaming Headset', 'price' => 79.99, 'stock' => 15, 'status' => 'inactive', 'image' => 'images/headset.jpg'],
                        ['id' => 3, 'name' => 'Bluetooth Speaker', 'price' => 59.99, 'stock' => 30, 'status' => 'active', 'image' => 'images/speaker.jpg']
                    ];
                @endphp

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product['id'] }}</td>
                            <td>
                                <img src="{{ asset($product['image']) }}" 
                                     alt="Product Image" 
                                     class="img-thumbnail" 
                                     width="50">
                            </td>
                            <td>{{ $product['name'] }}</td>
                            <td>${{ number_format($product['price'], 2) }}</td>
                            <td>{{ $product['stock'] }}</td>
                            <td>
                                <span class="badge bg-{{ $product['status'] == 'active' ? 'success' : 'danger' }}">
                                    {{ ucfirst($product['status']) }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price ($)</label>
                        <input type="number" class="form-control" id="price" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock Quantity</label>
                        <input type="number" class="form-control" id="stock" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="models" name="models[]" multiple accept=".gltf,.glb,.obj,.stl" required>
                        </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Save Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    background: #fff;
    border-radius: 10px;
    padding: 15px;
    text-align: center;
}

.table th, .table td {
    text-align: center;
    vertical-align: middle;
}

.badge {
    padding: 5px 10px;
    font-size: 14px;
}

@media (max-width: 768px) {
    .d-flex {
        flex-direction: column;
        align-items: center;
    }

    .btn {
        width: 100%;
        margin-top: 10px;
    }

    .table thead {
        display: none;
    }

    .table tbody tr {
        display: flex;
        flex-direction: column;
        border: 1px solid #ddd;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 10px;
    }

    .table td {
        display: flex;
        justify-content: space-between;
        padding: 5px;
    }

    .table td::before {
        font-weight: bold;
        text-transform: uppercase;
    }
}
</style>

<script>
    $(document).ready(function() {
        $('.modal').on('hidden.bs.modal', function () {
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        });
    });
</script>

@endsection
