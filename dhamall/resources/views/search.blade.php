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
    <div class="container">
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

        <!-- Filters and Results Section -->
        <div class="row">
            <!-- Filters Column (Fixed) -->
            <div class="col-md-3" style="position:static;">
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
                                    <ul class="list-unstyled">
                                        @foreach($categories as $category)
                                            <li><a href="#">{{ $category->name }}</a></li>
                                            @if($category->subCategories->isNotEmpty())
                                                <ul>
                                                    @foreach($category->subCategories as $child)
                                                        <li><a href="#">{{ $child->name }}</a></li>
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

                        <!-- Availability Filter -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingAvailability">
                                <button class="accordion-button text-warning bg-dark" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseAvailability"
                                        aria-expanded="true" aria-controls="collapseAvailability">
                                    Availability
                                </button>
                            </h2>
                            <div id="collapseAvailability" class="accordion-collapse collapse show"
                                 aria-labelledby="headingAvailability" data-bs-parent="#filterAccordion">
                                <div class="accordion-body">
                                    <div class="form-check">
                                        <input style="border:solid 3px black; margin-left:0px;" type="checkbox"
                                               id="inStock">
                                        <label class="form-check-label " for="inStock">In Stock</label>
                                    </div>
                                    <div class="form-check">
                                        <input style="border:solid 3px black; margin-left:0px;" type="checkbox"
                                               id="outOfStock">
                                        <label class="form-check-label " for="outOfStock">Out of Stock</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Brand Filter -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingBrand">
                                <button class="accordion-button text-warning bg-dark" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseBrand" aria-expanded="true"
                                        aria-controls="collapseBrand">
                                    Brand
                                </button>
                            </h2>
                            <div id="collapseBrand" class="accordion-collapse collapse show"
                                 aria-labelledby="headingBrand" data-bs-parent="#filterAccordion">
                                <div class="accordion-body">
                                    <ul class="list-unstyled">
                                        <li><a href="#" class="">Apple</a></li>
                                        <li><a href="#" class="">Samsung</a></li>
                                        <li><a href="#" class="">Sony</a></li>
                                        <li><a href="#" class="">Nike</a></li>
                                        <li><a href="#" class="">Adidas</a></li>
                                        <li><a href="#" class="">Dell</a></li>
                                        <li><a href="#" class="">HP</a></li>
                                        <li><a href="#" class="">LG</a></li>
                                        <li><a href="#" class="">Microsoft</a></li>
                                        <li><a href="#" class="">Canon</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Color Filter -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingColor">
                                <button class="accordion-button text-warning bg-dark" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseColor" aria-expanded="true"
                                        aria-controls="collapseColor">
                                    Color
                                </button>
                            </h2>
                            <div id="collapseColor" class="accordion-collapse collapse show"
                                 aria-labelledby="headingColor" data-bs-parent="#filterAccordion">
                                <div class="accordion-body">
                                    <div class="color-options">
                                        <button class="btn btn-sm btn-outline-light m-1"
                                                style="background-color: #ff0000;"></button>
                                        <button class="btn btn-sm btn-outline-light m-1"
                                                style="background-color: #00ff00;"></button>
                                        <button class="btn btn-sm btn-outline-light m-1"
                                                style="background-color: #0000ff;"></button>
                                        <button class="btn btn-sm btn-outline-light m-1"
                                                style="background-color: #ffff00;"></button>
                                        <button class="btn btn-sm btn-outline-light m-1"
                                                style="background-color: #000000;"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Size Filter -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSize">
                                <button class="accordion-button text-warning bg-dark" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseSize" aria-expanded="true"
                                        aria-controls="collapseSize">
                                    Size
                                </button>
                            </h2>
                            <div id="collapseSize" class="accordion-collapse collapse show"
                                 aria-labelledby="headingSize" data-bs-parent="#filterAccordion">
                                <div class="accordion-body">
                                    <div class="size-options">
                                        <button class="btn btn-sm btn-outline-dark m-1">S</button>
                                        <button class="btn btn-sm btn-outline-dark m-1">M</button>
                                        <button class="btn btn-sm btn-outline-dark m-1">L</button>
                                        <button class="btn btn-sm btn-outline-dark m-1">XL</button>
                                        <button class="btn btn-sm btn-outline-dark m-1">XXL</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Discount Filter -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingDiscount">
                                <button class="accordion-button text-warning bg-dark" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseDiscount"
                                        aria-expanded="true" aria-controls="collapseDiscount">
                                    Discount
                                </button>
                            </h2>
                            <div id="collapseDiscount" class="accordion-collapse collapse show"
                                 aria-labelledby="headingDiscount" data-bs-parent="#filterAccordion">
                                <div class="accordion-body">
                                    <div class="form-check">
                                        <input style="border:solid 3px black; margin-left:0px;" type="checkbox"
                                               id="10off">
                                        <label class="form-check-label " for="10off">10% off or more</label>
                                    </div>
                                    <div class="form-check">
                                        <input style="border:solid 3px black; margin-left:0px;" type="checkbox"
                                               id="20off">
                                        <label class="form-check-label " for="20off">20% off or more</label>
                                    </div>
                                    <div class="form-check">
                                        <input style="border:solid 3px black; margin-left:0px;" type="checkbox"
                                               id="30off">
                                        <label class="form-check-label " for="30off">30% off or more</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Shipping Filter -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingShipping">
                                <button class="accordion-button text-warning bg-dark" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseShipping"
                                        aria-expanded="true" aria-controls="collapseShipping">
                                    Shipping
                                </button>
                            </h2>
                            <div id="collapseShipping" class="accordion-collapse collapse show"
                                 aria-labelledby="headingShipping" data-bs-parent="#filterAccordion">
                                <div class="accordion-body">
                                    <div class="form-check">
                                        <input style="border:solid 3px black; margin-left:0px;" type="checkbox"
                                               id="freeShipping">
                                        <label class="form-check-label " for="freeShipping">Free Shipping</label>
                                    </div>
                                    <div class="form-check">
                                        <input style="border:solid 3px black; margin-left:0px;" type="checkbox"
                                               id="fastShipping">
                                        <label class="form-check-label " for="fastShipping">Fast Shipping</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Condition Filter -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingCondition">
                                <button class="accordion-button text-warning bg-dark" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseCondition"
                                        aria-expanded="true" aria-controls="collapseCondition">
                                    Condition
                                </button>
                            </h2>
                            <div id="collapseCondition" class="accordion-collapse collapse show"
                                 aria-labelledby="headingCondition" data-bs-parent="#filterAccordion">
                                <div class="accordion-body">
                                    <div class="form-check">
                                        <input style="border:solid 3px black; margin-left:0px;" type="checkbox"
                                               id="new">
                                        <label class="form-check-label " for="new">New</label>
                                    </div>
                                    <div class="form-check">
                                        <input style="border:solid 3px black; margin-left:0px;" type="checkbox"
                                               id="used">
                                        <label class="form-check-label " for="used">Used</label>
                                    </div>
                                    <div class="form-check">
                                        <input style="border:solid 3px black; margin-left:0px;" type="checkbox"
                                               id="refurbished">
                                        <label class="form-check-label " for="refurbished">Refurbished</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Seller Filter -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeller">
                                <button class="accordion-button text-warning bg-dark" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseSeller" aria-expanded="true"
                                        aria-controls="collapseSeller">
                                    Seller
                                </button>
                            </h2>
                            <div id="collapseSeller" class="accordion-collapse collapse show"
                                 aria-labelledby="headingSeller" data-bs-parent="#filterAccordion">
                                <div class="accordion-body">
                                    <div class="form-check">
                                        <input style="border:solid 3px black; margin-left:0px;" type="checkbox"
                                               id="topRatedSeller">
                                        <label class="form-check-label " for="topRatedSeller">Top Rated Seller</label>
                                    </div>
                                    <div class="form-check">
                                        <input style="border:solid 3px black; margin-left:0px;" type="checkbox"
                                               id="verifiedSeller">
                                        <label class="form-check-label " for="verifiedSeller">Verified Seller</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Results Column (No Scroll) -->
            <div class="col-md-9 mt-4">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-sm-6 col-md-4 mb-4">
                            <div class="card shadow-lg border-0 rounded-lg"
                                 style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white;">
                                @if($product->images->isNotEmpty())
                                    <img
                                        src="https://res.cloudinary.com/ddoeppfx0/image/upload/e_background_removal,f_png/cld-sample-5"
                                        class="card-img-top" alt="{{ $product->name }}">
                                @else
                                    <img
                                        src="https://res.cloudinary.com/ddoeppfx0/image/upload/e_background_removal,f_png/cld-sample-5"
                                        class="card-img-top" alt="{{ $product->name }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title text-warning">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-warning">${{ number_format($product->price, 2) }}</span>
                                        <span class="text-white">
                                        <i class="fas fa-star text-warning"></i>
                                        {{ number_format($product->reviews->avg('rating'), 1) }}
                                    </span>
                                    </div>
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
    </div>
@endsection


<style>


    /* Accordion Button Styling */
    .accordion-button {
        background-color: #1a1a2e;
        color: #ffc107; /* Yellow color for text */
        border: none;
    }

    .accordion-button:not(.collapsed) {
        background-color: #0d0d1a;
        color: #ffc107;
    }

    .accordion-button:focus {
        box-shadow: none;
        color: #ffc107; /* Yellow color for text */
    }

    .accordion-body {
        padding: 10px;
        background: white;
        color: black;
    }

    .accordion-item {
        border: none;
        color: black;
    }

    /* Remove underlines and default link styling */
    .accordion-body a {
        text-decoration: none; /* Remove underline */
        color: inherit; /* Inherit the color from parent */
    }

    .accordion-body a:hover {
        color: #ffc107; /* Change color on hover if needed */
    }

    .form-check {
        padding-left: 0;
    }

</style>
