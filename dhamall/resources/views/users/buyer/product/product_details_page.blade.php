@extends('users.buyer.layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index', ['category' => $product->category->id]) }}">{{ $product->category->CategoryName }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->ProductName }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row mx-2">
            <!-- Product Images -->
            @include('users.buyer.product.partials.image-carousel')

            <!-- Product Details -->
            @include('users.buyer.product.partials.product-details-section')
        </div>

        <!-- Additional Product Info Tabs -->
        <div class="row mt-4 mx-2">
            <div class="col-12">
                <div class="card shadow-lg" style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a);">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="productTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                        data-bs-target="#description" type="button" role="tab">
                                    Description
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="specifications-tab" data-bs-toggle="tab"
                                        data-bs-target="#specifications" type="button" role="tab">
                                    Specifications
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="features-tab" data-bs-toggle="tab"
                                        data-bs-target="#features" type="button" role="tab">
                                    Features
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="shipping-tab" data-bs-toggle="tab"
                                        data-bs-target="#shipping" type="button" role="tab">
                                    Shipping Info
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content p-3 text-light" id="productTabsContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel">
                                {!! $product->Description !!}
                            </div>
                            <div class="tab-pane fade" id="specifications" role="tabpanel">
                                {!! $product->Specifications !!}
                            </div>

                            <div class="tab-pane fade" id="features" role="tabpanel">
                                {!! $product->Features !!}
                            </div>
                            <div class="tab-pane fade" id="shipping" role="tabpanel">
                                @if($product->shipping)
                                    <p><strong>Delivery Time:</strong> {{ $product->shipping->EstimatedDeliveryTime }} days</p>
                                    <p><strong>Shipping Cost:</strong>
                                        @if($product->shipping->ShippingFee > 0)
                                            ${{ number_format($product->shipping->ShippingFee, 2) }}
                                        @else
                                            Free Shipping
                                        @endif
                                    </p>

                                @else
                                    <p>Shipping information not available</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        @include('users.buyer.product.partials.reviews-section')

        <!-- Related Products -->
        @include('users.buyer.product.partials.you-may-also-like-section')
    </div>

    <style>
        .nav-tabs .nav-link {
            color: #b3a31c;
            border-color: transparent;
        }

        .nav-tabs .nav-link.active {
            color: #ffcc00;
            background-color: transparent;
            border-bottom: 2px solid #ffcc00;
        }

        .product-image {
            max-height: 500px;
            object-fit: contain;
        }

        .thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .thumbnail.active {
            border-color: #ffcc00;
        }
    </style>

    <script>
        // Initialize image gallery functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Thumbnail click handler
            const thumbnails = document.querySelectorAll('.thumbnail');
            const mainImage = document.querySelector('#mainProductImage');

            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', function() {
                    // Remove active class from all thumbnails
                    thumbnails.forEach(t => t.classList.remove('active'));
                    // Add active class to clicked thumbnail
                    this.classList.add('active');
                    // Update main image
                    mainImage.src = this.dataset.fullImage;
                });
            });

            // Initialize first thumbnail as active
            if (thumbnails.length > 0) {
                thumbnails[0].classList.add('active');
            }
        });
    </script>
    <!-- In the "Buy Now" button JavaScript section, update to: -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ... existing quantity selector code ...

            // Buy now button functionality
            document.getElementById('buy-now-btn').addEventListener('click', function() {
                const form = this.closest('form');
                // Create a temporary form for direct checkout
                const tempForm = document.createElement('form');
                tempForm.method = 'POST';
                tempForm.action = "{{ route('cart.add') }}";

                // Add CSRF token
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = document.querySelector('input[name="_token"]').value;
                tempForm.appendChild(csrfInput);

                // Add product ID
                const productInput = document.createElement('input');
                productInput.type = 'hidden';
                productInput.name = 'product_id';
                productInput.value = "{{ $product->id }}";
                tempForm.appendChild(productInput);

                // Add quantity
                const quantityInput = document.createElement('input');
                quantityInput.type = 'hidden';
                quantityInput.name = 'quantity';
                quantityInput.value = document.getElementById('product-quantity').value;
                tempForm.appendChild(quantityInput);

                // Submit the form
                document.body.appendChild(tempForm);
                tempForm.submit();

                // After adding to cart, redirect to checkout
                setTimeout(() => {
                    window.location.href = "{{ route('checkout.index') }}";
                }, 500);
            });
        });
    </script>
@endsection
