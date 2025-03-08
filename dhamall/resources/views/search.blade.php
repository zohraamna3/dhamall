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
                                    <li><a href="#" class="text-dark">{{ $category->name }}</a></li>
                                    @if($category->subCategories->isNotEmpty())
                                        <ul>
                                            @foreach($category->subCategories as $child)
                                                <li><a href="#" class="text-dark">{{ $child->name }}</a></li>
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
                            <ul class="list-unstyled text-dark">
                                <li><a href="#" class="text-dark">Apple</a></li>
                                <li><a href="#" class="text-dark">Samsung</a></li>
                                <li><a href="#" class="text-dark">Sony</a></li>
                                <li><a href="#" class="text-dark">Nike</a></li>
                                <li><a href="#" class="text-dark">Adidas</a></li>
                                <li><a href="#" class="text-dark">Dell</a></li>
                                <li><a href="#" class="text-dark">HP</a></li>
                                <li><a href="#" class="text-dark">LG</a></li>
                                <li><a href="#" class="text-dark">Microsoft</a></li>
                                <li><a href="#" class="text-dark">Canon</a></li>
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
                                        <li><a href="#" class="text-dark">{{ $category->name }}</a></li>
                                        @if($category->subCategories->isNotEmpty())
                                            <ul>
                                                @foreach($category->subCategories as $child)
                                                    <li><a href="#" class="text-dark">{{ $child->name }}</a></li>
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
                                <ul class="list-unstyled text-dark">
                                    <li><a href="#" class="text-dark">Apple</a></li>
                                    <li><a href="#" class="text-dark">Samsung</a></li>
                                    <li><a href="#" class="text-dark">Sony</a></li>
                                    <li><a href="#" class="text-dark">Nike</a></li>
                                    <li><a href="#" class="text-dark">Adidas</a></li>
                                    <li><a href="#" class="text-dark">Dell</a></li>
                                    <li><a href="#" class="text-dark">HP</a></li>
                                    <li><a href="#" class="text-dark">LG</a></li>
                                    <li><a href="#" class="text-dark">Microsoft</a></li>
                                    <li><a href="#" class="text-dark">Canon</a></li>
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

    <!-- Results Column -->
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

        .accordion-body a,
        .accordion-body .form-check-label,
        .accordion-body .btn {
            transition: all 0.3s ease;
        }

        .accordion-body a:hover,
        .accordion-body .btn:hover {
            background-color: rgba(255, 255, 255, 0.1); /* Light background on hover */
            opacity: 0.8; /* Slightly reduce opacity on hover */
            border-radius: 5px; /* Optional: Add rounded corners */
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
