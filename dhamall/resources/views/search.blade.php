@extends('layouts.app')

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
            <form action="#" method="GET" class="d-flex">
                <input type="text" name="query" class="form-control me-2" placeholder="Search for courses, products, or categories..." value="{{ request('query') }}">
                <button type="submit" class="btn btn-warning">Search</button>
            </form>
        </div>
    </div>

    <!-- Filters and Results Section -->
    <div class="row">
        <!-- Filters Column -->
        <div class="col-md-3">
            <div class="card shadow-lg border-0 rounded-lg" style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 20px;">
                <h4 class="text-warning mb-4">Filters</h4>

                <!-- Category Filter -->
                <div class="mb-4">
                    <h5 class="text-warning">Category</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Web Development</a></li>
                        <li><a href="#" class="text-white">Mobile Development</a></li>
                        <li><a href="#" class="text-white">Data Science</a></li>
                        <li><a href="#" class="text-white">Business</a></li>
                    </ul>
                </div>

                <!-- Price Filter -->
                <div class="mb-4">
                    <h5 class="text-warning">Price</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="free">
                        <label class="form-check-label text-white" for="free">Free</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="paid">
                        <label class="form-check-label text-white" for="paid">Paid</label>
                    </div>
                </div>

                <!-- Rating Filter -->
                <div class="mb-4">
                    <h5 class="text-warning">Rating</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="4.5">
                        <label class="form-check-label text-white" for="4.5">4.5 & above</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="4.0">
                        <label class="form-check-label text-white" for="4.0">4.0 & above</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Results Column -->
        <div class="col-md-9">
            <div class="row">
                <!-- Result Item -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg border-0 rounded-lg" style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white;">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Course Image">
                        <div class="card-body">
                            <h5 class="card-title text-warning">Web Development Bootcamp</h5>
                            <p class="card-text">Learn web development from scratch with HTML, CSS, JavaScript, and more.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-warning">$49.99</span>
                                <span class="text-white"><i class="fas fa-star text-warning"></i> 4.5</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Result Item -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg border-0 rounded-lg" style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white;">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Course Image">
                        <div class="card-body">
                            <h5 class="card-title text-warning">Data Science Masterclass</h5>
                            <p class="card-text">Master data science with Python, Machine Learning, and Data Visualization.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-warning">$99.99</span>
                                <span class="text-white"><i class="fas fa-star text-warning"></i> 4.7</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Result Item -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg border-0 rounded-lg" style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white;">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Course Image">
                        <div class="card-body">
                            <h5 class="card-title text-warning">Mobile App Development</h5>
                            <p class="card-text">Build mobile apps for Android and iOS using Flutter and Dart.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-warning">$79.99</span>
                                <span class="text-white"><i class="fas fa-star text-warning"></i> 4.6</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link text-warning" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link text-warning" href="#">1</a></li>
                    <li class="page-item"><a class="page-link text-warning" href="#">2</a></li>
                    <li class="page-item"><a class="page-link text-warning" href="#">3</a></li>
                    <li class="page-item"><a class="page-link text-warning" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection