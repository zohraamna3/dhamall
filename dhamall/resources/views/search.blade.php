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
        <div class="card shadow-lg border-0 rounded-lg fixed-filter"
             style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); padding: 20px;">
            <h4 class="text-warning mb-4">Filters</h4>
            <!-- Accordion for Filters -->
            <div class="accordion" id="filterAccordion">
                <!-- Category Filter -->
                <div class="accordion-item text-warning">
                    <h2 class="accordion-header" id="headingCategory">
                        <button class="accordion-button text-warning bg-dark" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseCategory"
                                aria-expanded="true" aria-controls="collapseCategory">
                            <i class="fas fa-list me-2"></i>Category
                        </button>
                    </h2>
                    <div id="collapseCategory" class="accordion-collapse collapse show"
                         aria-labelledby="headingCategory" data-bs-parent="#filterAccordion">
                        <div class="accordion-body ">
                            <ul class="list-unstyled text-dark">
                                @foreach($categories as $category)
                                    <li><a href="#" class="text-dark">{{ $category->CategoryName }}</a></li>
                                    @if($category->children->isNotEmpty())
                                        <ul>
                                            @foreach($category->children as $child)
                                                <li><a href="#" class="text-dark">{{ $child->CategoryName }}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Price Filter -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingPrice">
                        <button class="accordion-button text-warning bg-dark" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapsePrice" aria-expanded="true"
                                aria-controls="collapsePrice">
                            Price
                        </button>
                    </h2>
                    <div id="collapsePrice" class="accordion-collapse collapse show"
                         aria-labelledby="headingPrice" data-bs-parent="#filterAccordion">
                        <div class="accordion-body">
                            <div class="form-check">
                                <input style="border:solid 3px black; margin-left:0px;" type="checkbox"
                                       id="free">
                                <label class="form-check-label " for="$0">$0</label>
                            </div>
                            <div class="form-check">
                                <input style="border:solid 3px black; margin-left:0px;" type="checkbox"
                                       id="paid">
                                <label class="form-check-label " for="$500">$500</label>
                            </div>
                            <div class="range-slider mt-2">
                                <input type="range" min="0" max="1000" value="0" class="slider" id="priceRange">
                                <span class="" id="priceRangeValue">$0 - $1000</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rating Filter -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingRating">
                        <button class="accordion-button text-warning bg-dark" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseRating" aria-expanded="true"
                                aria-controls="collapseRating">
                            Rating
                        </button>
                    </h2>
                    <div id="collapseRating" class="accordion-collapse collapse show"
                         aria-labelledby="headingRating" data-bs-parent="#filterAccordion">
                        <div class="accordion-body">
                            <div class="form-check">
                                <input style="border:solid 3px black; margin-left:0px;" type="checkbox"
                                       id="4.5">
                                <label class="form-check-label " for="4.5">4.5 & above</label>
                            </div>
                            <div class="form-check">
                                <input style="border:solid 3px black; margin-left:0px;" type="checkbox"
                                       id="4.0">
                                <label class="form-check-label " for="4.0">4.0 & above</label>
                            </div>
                            <div class="form-check">
                                <input style="border:solid 3px black; margin-left:0px;" type="checkbox"
                                       id="3.5">
                                <label class="form-check-label " for="3.5">3.5 & above</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Other filter sections remain the same -->
                <!-- ... -->
            </div>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="row mb-4">
        <div class="col-12">
            <form action="{{ route('search') }}" method="GET" class="d-flex">
                <input type="text" name="query" class="form-control me-2"
                       placeholder="Search for products or categories..." value="{{ $query }}">
                <button type="submit" class="btn btn-warning">Search</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 d-none d-lg-block mb-3">
            <div class="card shadow-lg border-0 rounded-lg fixed-filter"
                 style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 20px;">
                <h4 class="text-warning mb-4">Filters</h4>
                <!-- Accordion for Filters -->
                <div class="accordion" id="filterAccordion">
                    <!-- Category Filter -->
                    <div class="accordion-item text-warning">
                        <h2 class="accordion-header" id="headingCategory">
                            <button class="accordion-button text-warning bg-dark" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseCategory"
                                    aria-expanded="true" aria-controls="collapseCategory">
                                Category
                            </button>
                        </h2>
                        <div id="collapseCategory" class="accordion-collapse collapse show"
                             aria-labelledby="headingCategory" data-bs-parent="#filterAccordion">
                            <div class="accordion-body">
                                <ul class="list-unstyled text-dark">
                                    @foreach($categories as $category)
                                        <li><a href="#" class="text-dark">{{ $category->CategoryName }}</a></li>
                                        @if($category->children->isNotEmpty())
                                            <ul>
                                                @foreach($category->children as $child)
                                                    <li><a href="#" class="text-dark">{{ $child->CategoryName }}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Other filter sections remain the same -->
                    <!-- ... -->
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-9">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-sm-6 col-md-4 mb-4">
                        <div class="card shadow-lg border-0 rounded-lg overflow-hidden transition-transform transform hover:scale-105"
                             style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white;">
                            <!-- Product Image -->
                            <div class="position-relative">
                                @if($product->images->isNotEmpty())
                                    <img
                                        src="https://res.cloudinary.com/ddoeppfx0/image/upload/e_background_removal,f_png/cld-sample-5"
                                        class="card-img-top img-fluid" style="height: 250px; object-fit: cover;" alt="{{ $product->name }}">
                                @else
                                    <img
                                        src="https://res.cloudinary.com/ddoeppfx0/image/upload/e_background_removal,f_png/cld-sample-5"
                                        class="card-img-top img-fluid" style="height: 250px; object-fit: cover;" alt="{{ $product->name }}">
                                @endif
                                <!-- Badge for "New" -->
                                <span class="badge badge-warning position-absolute top-0 end-0 m-2 px-3 py-2 rounded-pill">New</span>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body text-center"
                                 style="background: linear-gradient(135deg, #1a1a2e, #24243e); color: #b3a31c;">
                                <!-- Product Name -->
                                <h5 class="card-title fw-bold">{{ $product->name }}</h5>

                                <!-- Product Description -->
                                <p class="card-text text-truncate"
                                   style="max-height: 60px; overflow: hidden;">{{ $product->description }}</p>

                                <!-- Price and Rating -->
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="fw-bold fs-5 text-warning">${{ number_format($product->price, 2) }}</span>
                                    <span class="text-white">
                                        <i class="fas fa-star text-warning"></i>
                                        {{ number_format($product->reviews->avg('rating'), 1) }}
                                    </span>
                                </div>

                                <!-- View Details Button -->
                                <a href="{{ route('product.show', $product->id) }}"
                                   class="btn w-100 text-white fw-bold py-2 view-details-btn">
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
            left: -300px;
            top: 0;
            width: 300px;
            height: 100%;
            z-index: 1000;
            transition: left 0.3s ease-in-out;
            overflow-y: auto;
            background: linear-gradient(135deg, #1a1a2e, #0d0d1a);
            padding: 20px;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.3);
        }

        .sidebar.active {
            left: 0;
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

        .list-unstyled li a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .list-unstyled li a:hover {
            color: #ffc107;
        }

        /* Icons */
        .fas {
            color: #ffc107;
        }

        /* Toggle Button */
        .toggle-btn {
            display: none;
            position: fixed;
            left: 0;
            top: 50%;
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
                display: block;
            }
        }

        /* Rotate the arrow icon when sidebar is active */
        .sidebar.active + .toggle-btn i {
            transform: rotate(180deg);
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

        .accordion-body a,
        .accordion-body .form-check-label,
        .accordion-body .btn {
            transition: all 0.3s ease;
        }

        .accordion-body a:hover,
        .accordion-body .btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
            opacity: 0.8;
            border-radius: 5px;
            padding:1rem;
        }
    </style>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }
    </script>
@endsection
