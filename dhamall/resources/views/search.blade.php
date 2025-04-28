@extends('users.buyer.layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Search Results</li>
        </ol>
    </nav>
@endsection

@section('content')
    <!-- Toggle Button for Sidebar -->
    <button class="toggle-btn" onclick="toggleSidebar()">
        <i class="bi bi-chevron-right"></i> <!-- Bootstrap Icons "chevron-right" icon -->
    </button>

    <!-- Sidebar (Filter Section) -->
    <div class="sidebar" id="sidebar">
        <div class="card shadow-lg border-0 rounded-lg fixed-filter" style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); padding: 20px;">
            <h4 class="text-warning mb-4">Filters</h4>
            <form action="{{ route('search') }}" method="GET">
                <div class="accordion" id="filterAccordion">

                    <!-- Category Filter -->
                    <div class="accordion-item text-warning">
                        <h2 class="accordion-header" id="headingCategory">
                            <button class="accordion-button text-warning bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
                                <i class="fas fa-list me-2"></i>Category
                            </button>
                        </h2>
                        <div id="collapseCategory" class="accordion-collapse collapse show" aria-labelledby="headingCategory" data-bs-parent="#filterAccordion">
                            <div class="accordion-body">
                                <ul class="list-unstyled text-dark">
                                    @foreach($categories as $category)
                                        <li>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="category[]" id="category_{{ $category->id }}" value="{{ $category->id }}" {{ in_array($category->id, request('category', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="category_{{ $category->id }}">{{ $category->CategoryName }}</label> <!-- Corrected to CategoryName -->
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Price Filter -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingPrice">
                            <button class="accordion-button text-warning bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePrice" aria-expanded="true" aria-controls="collapsePrice">
                                Price
                            </button>
                        </h2>
                        <div id="collapsePrice" class="accordion-collapse collapse show" aria-labelledby="headingPrice" data-bs-parent="#filterAccordion">
                            <div class="accordion-body">
                                <input type="number" class="form-control mb-2" name="min_price" placeholder="Min Price" value="{{ request('min_price') }}">
                                <input type="number" class="form-control mb-2" name="max_price" placeholder="Max Price" value="{{ request('max_price') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Rating Filter -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingRating">
                            <button class="accordion-button text-warning bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRating" aria-expanded="true" aria-controls="collapseRating">
                                Rating
                            </button>
                        </h2>
                        <div id="collapseRating" class="accordion-collapse collapse show" aria-labelledby="headingRating" data-bs-parent="#filterAccordion">
                            <div class="accordion-body">
                                @for ($i = 5; $i >= 1; $i--)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="rating[]" id="rating_{{ $i }}" value="{{ $i }}" {{ in_array($i, request('rating', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="rating_{{ $i }}">{{ $i }} & above</label>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <!-- Availability Filter -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingAvailability">
                            <button class="accordion-button text-warning bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAvailability" aria-expanded="true" aria-controls="collapseAvailability">
                                Availability
                            </button>
                        </h2>
                        <div id="collapseAvailability" class="accordion-collapse collapse show" aria-labelledby="headingAvailability" data-bs-parent="#filterAccordion">
                            <div class="accordion-body">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="availability[]" id="inStock" value="in_stock" {{ in_array('in_stock', request('availability', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inStock">In Stock</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="availability[]" id="outOfStock" value="out_of_stock" {{ in_array('out_ofStock', request('availability', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="outOfStock">Out of Stock</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Brand Filter -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingBrand">
                            <button class="accordion-button text-warning bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBrand" aria-expanded="true" aria-controls="collapseBrand">
                                Brand
                            </button>
                        </h2>
                        <div id="collapseBrand" class="accordion-collapse collapse show" aria-labelledby="headingBrand" data-bs-parent="#filterAccordion">
                            <div class="accordion-body">
                                <ul class="list-unstyled text-dark">
                                    @foreach($brands as $brand)
                                        <li>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="brand[]" id="brand_{{ $brand->id }}" value="{{ $brand->id }}" {{ in_array($brand->id, request('brand', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="brand_{{ $brand->id }}">{{ $brand->Name }}</label> <!-- Corrected to Name -->
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Filter -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingShipping">
                            <button class="accordion-button text-warning bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseShipping" aria-expanded="true" aria-controls="collapseShipping">
                                Shipping
                            </button>
                        </h2>
                        <div id="collapseShipping" class="accordion-collapse collapse show" aria-labelledby="headingShipping" data-bs-parent="#filterAccordion">
                            <div class="accordion-body">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="shipping[]" id="freeShipping" value="free" {{ in_array('free', request('shipping', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="freeShipping">Free Shipping</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="shipping[]" id="fastShipping" value="fast" {{ in_array('fast', request('shipping', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="fastShipping">Fast Shipping</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Seller Filter -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeller">
                            <button class="accordion-button text-warning bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeller" aria-expanded="true" aria-controls="collapseSeller">
                                Seller
                            </button>
                        </h2>
                        <div id="collapseSeller" class="accordion-collapse collapse show" aria-labelledby="headingSeller" data-bs-parent="#filterAccordion">
                            <div class="accordion-body">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="seller[]" id="topRatedSeller" value="top_rated" {{ in_array('top_rated', request('seller', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="topRatedSeller">Top Rated Seller</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="seller[]" id="verifiedSeller" value="verified" {{ in_array('verified', request('seller', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="verifiedSeller">Verified Seller</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-warning w-100">Apply Filters</button>
            </form>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="row mb-4">
        <div class="col-12">
            <form action="{{ route('search') }}" method="GET" class="d-flex">
                <input type="text" name="query" class="form-control me-2" placeholder="Search for products or categories..." value="{{ $query }}">
                <button type="submit" class="btn btn-warning">Search</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 d-none d-lg-block mb-3">
            <!-- Filters duplicated for larger screens -->
            <div class="card shadow-lg border-0 rounded-lg fixed-filter" style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 20px;">
                <h4 class="text-warning mb-4">Filters</h4>
                <form action="{{ route('search') }}" method="GET">
                    <div class="accordion" id="filterAccordion">
                        <!-- Repeat the filter structure as above here for larger screens. -->
                    </div>
                    <button type="submit" class="btn btn-warning w-100">Apply Filters</button>
                </form>
            </div>
        </div>

        <div class="col-12 col-lg-9">
            <div class="col-12 col-lg-9">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-sm-6 col-md-4 mb-4">
                            <div class="card shadow-lg border-0 rounded-lg overflow-hidden transition-transform transform hover:scale-105" style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white;">
                                <!-- Product Image -->
                                <div class="position-relative">
                                    <img src="{{ $product->images->first()->ImageURL ?? 'https://via.placeholder.com/300x300' }}" class="card-img-top img-fluid" style="height: 250px; object-fit: cover;" alt="{{ $product->ProductName }}">
                                </div>

                                <!-- Card Body -->
                                <div class="card-body text-center" style="background: linear-gradient(135deg, #1a1a2e, #24243e); color: #b3a31c;">
                                    <h5 class="card-title fw-bold">{{ $product->ProductName }}</h5>
                                    <p class="card-text text-truncate" style="max-height: 60px; overflow: hidden;">{{ $product->Description }}</p>
                                    <p class="fw-bold fs-5 text-warning">${{ number_format($product->Price, 2) }}</p>
                                    <a href="{{ route('product.show', $product->id) }}" class="btn w-100 text-white fw-bold py-2 view-details-btn">
                                        View Details <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>



                <!-- Pagination -->
            <nav aria-label="Page navigation">
                {{ $products->links() }}
            </nav>
        </div>
    </div>

    <style>
        /* Sidebar (Filter Section) */
        .sidebar {
            position: fixed;
            left: -300px; /* Hide sidebar off-screen */
            top: 0;
            width: 300px; /* Slightly wider for better spacing */
            height: 100%;
            z-index: 1000;
            transition: left 0.3s ease-in-out;
            overflow-y: auto; /* Scrollable if content overflows */
            background: linear-gradient(135deg, #1a1a2e, #0d0d1a);
            padding: 20px;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.3); /* Add shadow for depth */
        }

        .sidebar.active {
            left: 0; /* Show sidebar when active */
        }

        /* Card Styling */
        .fixed-filter {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            border: none;
            border-radius: 15px;
            padding: 20px;
            color: white;
        }

        /* Accordion Header */
        .accordion-button {
            background: linear-gradient(135deg, #34495e, #2c3e50);
            color: #ffc107;
            border: none;
            border-radius: 10px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .accordion-button:not(.collapsed) {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            color: #ffc107;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .accordion-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        /* Accordion Body */
        .accordion-body {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 10px;
        }

        /* List Items */
        .list-unstyled li {
            margin-bottom: 10px;
        }

        /* Toggle Button */
        .toggle-btn {
            display: none; /* Hide by default */
            position: fixed;
            left: 0; /* Stick to the left edge */
            top: 50%; /* Center vertically */
            transform: translateY(-50%);
            background: #34495e;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 0 10px 10px 0;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .toggle-btn:hover {
            background: #2c3e50;
            transform: translateY(-50%) scale(1.1);
        }

        /* Show toggle button on smaller screens */
        @media (max-width: 992px) {
            .toggle-btn {
                display: block; /* Show toggle button */
            }
        }

        /* Rotate the arrow icon when sidebar is active */
        .sidebar.active + .toggle-btn i {
            transform: rotate(180deg); /* Rotate the arrow */
        }

        /* Smooth rotation transition */
        .toggle-btn i {
            transition: transform 0.3s ease;
        }

        .view-details-btn {
            background: linear-gradient(135deg, #ffc107, #ff9800);
            border: none;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .view-details-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
    </style>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }
    </script>
@endsection
