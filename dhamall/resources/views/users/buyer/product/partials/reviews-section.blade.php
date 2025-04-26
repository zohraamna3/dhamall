<div class="mt-5" id="reviews">
    <div class="card shadow-lg" style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a);">
        <div class="card-body p-4">
            <h3 class="text-warning mb-4">Customer Reviews</h3>

            <!-- Rating Summary -->
            <div class="row mb-4">
                <div class="col-md-4 text-center">
                    <h1 class="display-4 text-warning mb-0">{{ number_format($avgRating, 1) }}</h1>
                    <div class="rating-stars mb-2">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= floor($avgRating))
                                <i class="fas fa-star text-warning"></i>
                            @elseif($i == ceil($avgRating) && ($avgRating - floor($avgRating)) >= 0.5)
                                <i class="fas fa-star-half-alt text-warning"></i>
                            @else
                                <i class="far fa-star text-warning"></i>
                            @endif
                        @endfor
                    </div>
                    <p class="text-light">Based on {{ $reviewCount }} reviews</p>
                </div>

                <div class="col-md-8">
                    @for($i = 5; $i >= 1; $i--)
                        @php
                            $count = $product->reviews->where('Rating', $i)->count();
                            $percentage = $reviewCount > 0 ? ($count / $reviewCount) * 100 : 0;
                        @endphp
                        <div class="row align-items-center mb-2">
                            <div class="col-1">
                                <span class="text-light">{{ $i }} star</span>
                            </div>
                            <div class="col-8">
                                <div class="progress bg-dark" style="height: 10px;">
                                    <div class="progress-bar bg-warning" role="progressbar"
                                         style="width: {{ $percentage }}%"></div>
                                </div>
                            </div>
                            <div class="col-1">
                                <span class="text-light">({{ $count }})</span>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Add Review Button -->
            @auth
                <button class="btn btn-warning mb-4" data-bs-toggle="modal" data-bs-target="#addReviewModal">
                    <i class="fas fa-plus me-2"></i> Write a Review
                </button>
            @else
                <a href="{{ route('login') }}" class="btn btn-warning mb-4">
                    <i class="fas fa-sign-in-alt me-2"></i> Login to Review
                </a>
            @endauth

            <!-- Reviews List -->
            <div class="list-group overflow-auto" style="max-height: 500px;">
                @forelse($product->reviews as $review)
                    <div class="list-group-item bg-dark text-light rounded mb-3 p-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <img src="{{ $review->user->profile_image ?? asset('images/default-avatar.png') }}"
                                         class="rounded-circle" width="50" height="50" alt="User Avatar">
                                </div>
                                <div>
                                    <strong class="text-warning">{{ $review->user->name }}</strong>
                                    <div class="rating-stars small">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->Rating)
                                                <i class="fas fa-star text-warning"></i>
                                            @else
                                                <i class="far fa-star text-warning"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <span class="text-muted small">{{ $review->PostedOn->format('M d, Y') }}</span>
                        </div>
                        <div class="ps-5">
                            <p class="mb-2">{{ $review->Comment }}</p>

                            @if($review->Response)
                                <div class="bg-secondary p-3 rounded mt-2">
                                    <strong class="text-warning">Seller Response:</strong>
                                    <p class="mb-0">{{ $review->Response }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">
                        No reviews yet. Be the first to review this product!
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Add Review Modal -->
@auth
    <div class="modal fade" id="addReviewModal" tabindex="-1" aria-labelledby="addReviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-light">
                <div class="modal-header border-bottom border-secondary">
                    <h5 class="modal-title text-warning" id="addReviewModalLabel">Write a Review</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('reviews.store', $product->id) }}" method="POST">
                        @csrf

                        <!-- Rating -->
                        <div class="mb-4">
                            <label class="form-label">Your Rating</label>
                            <div class="rating-input">
                                @for($i = 1; $i <= 5; $i++)
                                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}"
                                        {{ $i == 5 ? 'checked' : '' }}>
                                    <label for="star{{ $i }}"><i class="far fa-star"></i></label>
                                @endfor
                            </div>
                        </div>

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="review-title" class="form-label">Review Title</label>
                            <input type="text" class="form-control bg-secondary text-light" id="review-title"
                                   name="title" placeholder="Summarize your experience">
                        </div>

                        <!-- Comment -->
                        <div class="mb-3">
                            <label for="comment" class="form-label">Your Review</label>
                            <textarea class="form-control bg-secondary text-light" id="comment"
                                      name="comment" rows="5" required
                                      placeholder="What did you like or dislike? What did you use this product for?"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-warning w-100 py-2">Submit Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .rating-input {
            display: flex;
            direction: rtl;
            justify-content: flex-end;
        }

        .rating-input input {
            display: none;
        }

        .rating-input label {
            font-size: 2rem;
            color: #444;
            cursor: pointer;
            transition: color 0.2s;
        }

        .rating-input input:checked ~ label,
        .rating-input input:hover ~ label,
        .rating-input label:hover,
        .rating-input label:hover ~ label {
            color: #ffc107;
        }

        .rating-input input:checked + label {
            color: #ffc107;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Rating stars interaction
            const stars = document.querySelectorAll('.rating-input input');
            stars.forEach(star => {
                star.addEventListener('change', function() {
                    const rating = this.value;
                    console.log('Selected rating:', rating);
                });
            });
        });
    </script>
@endauth
