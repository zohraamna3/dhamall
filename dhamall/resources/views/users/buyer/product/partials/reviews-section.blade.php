<div class="mt-5"
     style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); padding: 30px; border-radius: 15px;">
    <h3 class="text-warning">Customer Reviews</h3>
    <p class="text-light fs-5">
        ⭐ {{ number_format($averageRating, 1) }} / 5 ({{ $product->reviews->count() }} reviews)
    </p>

    <!-- Add Review Button -->
    <button class="btn btn-warning mb-4" data-bs-toggle="modal" data-bs-target="#addReviewModal">
        <i class="fas fa-plus me-2"></i> Add Review
    </button>

    <!-- Reviews List -->
    <div class="list-group overflow-auto" style="max-height: 400px;">
        @foreach($product->reviews as $review)
            <div class="list-group-item bg-dark text-light rounded mb-3 p-3">
                <div class="d-flex align-items-center mb-2">
                    <!-- <img src="{{ $review->user->profile_image ?? '/default-avatar.png' }}" class="rounded-circle me-2" width="40" height="40" alt="User Image"> -->
                    <strong class="text-warning">{{ $review->user->name }}</strong>
                    <span class="ms-auto text-muted">{{ $review->created_at->format('M d, Y') }}</span>
                </div>
                <div class="mb-2">
                    @for ($i = 1; $i <= $review->rating; $i++)
                        ⭐
                    @endfor
                    <span class="ms-2">({{ $review->rating }}/5)</span>
                </div>
                <p class="mb-0">{{ $review->comment }}</p>
            </div>
        @endforeach
    </div>
</div>

<!-- Add Review Modal -->
<div class="modal fade" id="addReviewModal" tabindex="-1" aria-labelledby="addReviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header border-bottom border-secondary">
                <h5 class="modal-title text-warning" id="addReviewModalLabel">Add Your Review</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Review Form -->
                <form action="{{ route('review.store', $product->id) }}" method="POST">
                    @csrf
                    <!-- Rating Input -->
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select class="form-select bg-secondary text-light" id="rating" name="rating" required>
                            <option value="1">1 Star</option>
                            <option value="2">2 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="5">5 Stars</option>
                        </select>
                    </div>
                    <!-- Comment Input -->
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea class="form-control bg-secondary text-light" id="comment" name="comment" rows="3" required></textarea>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-warning w-100">Submit Review</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Modal Styling */
    .modal-content {
        background: linear-gradient(135deg, #1a1a2e, #0d0d1a);
        border: 1px solid #444;
        border-radius: 10px;
    }

    .modal-header {
        border-bottom: 1px solid #444;
    }

    .modal-title {
        color: #ffc107;
    }

    .btn-close-white {
        filter: invert(1);
    }

    /* Form Styling */
    .form-select, .form-control {
        background-color: #2c3e50;
        color: white;
        border: 1px solid #444;
    }

    .form-select:focus, .form-control:focus {
        background-color: #34495e;
        color: white;
        border-color: #ffc107;
        box-shadow: 0 0 5px rgba(255, 193, 7, 0.5);
    }

    /* Submit Button */
    .btn-warning {
        background: linear-gradient(135deg, #ffc107, #ff9800);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-warning:hover {
        background: linear-gradient(135deg, #ff9800, #ffc107);
        transform: translateY(-2px);
    }
</style>
