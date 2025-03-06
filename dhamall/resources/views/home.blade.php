@extends('users.buyer.layouts.app')

@section('hero')

    <div class="position-relative text-white text-center py-5 w-100"
         style="background: linear-gradient(135deg, #0d0d1a, #1a1a2e); overflow: hidden;">
        <!-- Soft Gradient Overlay -->
        <div class="position-absolute top-0 start-0 w-100"
             style="background: linear-gradient(to bottom, rgba(26, 26, 46, 0.4), rgba(26, 26, 46, 0.9));"></div>

        <!-- Text Content with Glow Effect -->
        <div class="position-relative z-index-2 p-5 mx-auto rounded-lg"
             style="max-width: 700px; background: linear-gradient(135deg, #1a1a2e, #24243e); backdrop-filter: blur(8px); border-radius: 15px; padding: 30px;">
            <h1 class="display-4 fw-bold text-warning animate__animated animate__fadeIn"
                style="text-shadow: 0 0 15px rgba(179, 163, 28, 0.6);">
                Experience True Wireless Freedom
            </h1>
            <p class="lead text-light animate__animated animate__fadeIn animate__delay-1s">
                Crystal clear sound, powerful bass, and all-day battery life.
            </p>
            <a href="#shop"
               class="btn text-dark px-4 py-2 mt-4 fw-bold animate__animated animate__fadeIn animate__delay-2s shop-btn">
                Shop Now <i class="fas fa-shopping-cart ms-2"></i>
            </a>

        </div>

        <!-- Floating Earbud Image with Animation -->
        <div class="position-absolute floating" style="top: 50%; right: 5%; transform: translateY(-50%); z-index: 3;">
            <img src="https://res.cloudinary.com/ddoeppfx0/image/upload/e_background_removal,f_png/cld-sample-5"
                 alt="Earbuds" class="img-fluid" style="max-width: 280px; width: 100%;">
        </div>
    </div>

@endsection


@section('content')
    <div class="container">
        <!-- Featured Products -->
        <section id="shop" class="my-5"
                 style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); padding: 30px; border-radius: 15px;">
            <h2 style="color: #b3a31c;" class="text-center font-weight-bold mb-5">Top Selling Earbuds</h2>
            <div class="row">
                @foreach($earbuds as $earbud)
                    <div class="col-12 col-sm-6 col-md-4 mb-4 mb-lg-0 p-3">
                        <div
                            class="card shadow-lg border-0 rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                            <div class="position-relative">
                                <img
                                    src="https://res.cloudinary.com/ddoeppfx0/image/upload/e_background_removal,f_png/cld-sample-5"
                                    class="card-img-top img-fluid" style="height: 250px; object-fit: cover;">
                                <span
                                    class="badge badge-warning position-absolute top-0 end-0 m-2 px-3 py-2 rounded-pill">New</span>
                            </div>
                            <div class="card-body text-center"
                                 style="background: linear-gradient(135deg, #1a1a2e, #24243e); color: #b3a31c;">
                                <h5 class="card-title fw-bold">{{ $earbud->name }}</h5>
                                <p class="card-text text-truncate"
                                   style="max-height: 60px; overflow: hidden;">{{ $earbud->description }}</p>
                                <p class="fw-bold fs-5 text-warning">${{ $earbud->price }}</p>
                                <a href="{{ route('product.show', $earbud->id) }}"
                                   class="btn w-100 text-white fw-bold py-2 view-details-btn">
                                    View Details <i class="fas fa-arrow-right ms-2"></i>
                                </a>

                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </section>

        <!-- Categories -->
        <section class="my-5"
                 style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); padding: 30px; border-radius: 15px;">
            <h2 class="text-center font-weight-bold mb-5" style="color: #b3a31c;">Shop by Category</h2>
            <div class="row">
                <div class="col-12 col-md-6 mb-4">
                    <div
                        class="card text-white shadow-lg border-0 rounded-lg overflow-hidden transition-transform transform hover:scale-105"
                        style="background: linear-gradient(135deg, #1a1a2e, #24243e);">
                        <div class="card-body text-center p-5">
                            <i class="fas fa-headphones-alt fa-3x text-warning mb-3"></i>
                            <h5 class="card-title fw-bold">Noise Cancelling</h5>
                            <p class="card-text text-muted">Block out distractions and immerse in pure sound.</p>
                            <a href="#" class="btn w-100 text-white fw-bold py-2 shop-now-btn">
                                Shop Now <i class="fas fa-shopping-cart ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div
                        class="card text-white shadow-lg border-0 rounded-lg overflow-hidden transition-transform transform hover:scale-105"
                        style="background: linear-gradient(135deg, #1a1a2e, #24243e);">
                        <div class="card-body text-center p-5">
                            <i class="fas fa-battery-full fa-3x text-warning mb-3"></i>
                            <h5 class="card-title fw-bold">Long Battery Life</h5>
                            <p class="card-text text-muted">Stay connected all day with extended battery power.</p>
                            <a href="#" class="btn w-100 text-white fw-bold py-2 shop-now-btn">
                                Shop Now <i class="fas fa-shopping-cart ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Customer Reviews -->
        <section class="my-5"
                 style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); padding: 30px; border-radius: 15px;">
            <h2 class="text-center font-weight-bold mb-5" style="color: #b3a31c;">What Our Customers Say</h2>
            <div class="row">
                @foreach($reviews as $review)
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card shadow-lg border-0 position-relative overflow-hidden"
                             style="background: linear-gradient(135deg, #1a1a2e, #24243e); height:30vh; border-radius: 15px;">
                            <div class="card-body p-4">
                                <!-- Quote Icon -->
                                <i class="fas fa-quote-left text-warning" style="font-size: 24px;"></i>

                                <!-- Review Text -->
                                <p class="italic text-light mt-2"
                                   style="font-size: 1.1rem; line-height: 1.6; text-shadow: 0 0 8px rgba(255, 255, 255, 0.2);">
                                    "{{ $review->comment }}"
                                </p>

                                <!-- User Name -->
                                <p class="fw-bold mt-3 text-warning" style="font-size: 1rem;">
                                    — {{ $review->user->name }}
                                </p>
                            </div>

                            <!-- Hover Effect -->
                            <div
                                class="position-absolute top-0 start-0 w-100 h-100 bg-gradient opacity-0 transition-opacity"
                                style="background: rgba(255, 255, 255, 0.05);"></div>
                        </div>
                    </div>

                @endforeach
            </div>
        </section>
    </div>
    </div>
@endsection

@section('scripts')
    <!-- Bootstrap JS, Popper.js and jQuery (optional, but helpful for Bootstrap components) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection


<!-- Floating Animation -->
<style>
    .floating {
        animation: floatUpDown 3s infinite ease-in-out;
    }

    @keyframes floatUpDown {
        0%, 100% {
            transform: translateY(-50%) translateY(0);
        }
        50% {
            transform: translateY(-50%) translateY(-10px);
        }
    }

    .card:hover .bg-gradient {
        opacity: 0.2;
    }

    .shop-btn {
        background: linear-gradient(45deg, #b3a31c, #ffcc00);
        border-radius: 25px;
        box-shadow: 0px 0px 10px rgba(255, 204, 0, 0.8);
        transition: all 0.3s ease-in-out;
    }

    .shop-btn:hover {
        background: linear-gradient(45deg, #ffcc00, #b3a31c);
        transform: scale(1.05);
        box-shadow: 0px 0px 15px rgba(255, 204, 0, 1);
    }

    .view-details-btn {
        background: linear-gradient(45deg, #b3a31c, #ffcc00);
        border-radius: 25px;
        transition: all 0.25s ease-in-out;
    }

    .view-details-btn:hover {
        background: linear-gradient(45deg, #ffcc00, #b3a31c);
        transform: scale(1.03);
        box-shadow: 0px 0px 10px rgba(255, 204, 0, 0.8);
    }

    .shop-now-btn {
        background: linear-gradient(45deg, #b3a31c, #ffcc00);
        border-radius: 25px;
        transition: all 0.25s ease-in-out;
    }

    .shop-now-btn:hover {
        background: linear-gradient(45deg, #ffcc00, #b3a31c);
        transform: scale(1.02);
        box-shadow: 0px 0px 8px rgba(255, 204, 0, 0.7);
    }

</style>

