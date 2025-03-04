<div class="mt-5"
     style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); padding: 30px; border-radius: 15px;">
    <h3 class="text-warning">Customer Reviews</h3>
    <p class="text-light fs-5">
        ⭐ {{ number_format($averageRating, 1) }} / 5 ({{ $product->reviews->count() }} reviews)
    </p>

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
                        <!-- <i class="fas fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-secondary' }}"></i> -->
                        ⭐
                    @endfor
                    <span class="ms-2">({{ $review->rating }}/5)</span>
                </div>
                <p class="mb-0">{{ $review->comment }}</p>
            </div>
        @endforeach
    </div>
</div>
