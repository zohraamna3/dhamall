<div class="my-5"
     style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); padding: 30px; border-radius: 15px;">
    <h3 class="text-warning">You May Also Like</h3>
    <div class="row">
        @foreach($relatedProducts as $related)
            <div class="col-md-3 mb-3">
                <div
                    class="card shadow-lg border-0 rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                    <!-- Check if the product has images -->
                    @if($related->images->isNotEmpty())
                        <img src="{{ $related->images->first()->image_url }}" class="card-img-top"
                             alt="Product Image">
                    @else
                        <!-- Fallback image if no images are available -->
                        <img src="{{ asset('images/placeholder.jpg') }}" class="card-img-top"
                             alt="Placeholder Image">
                    @endif
                    <div class="card-body text-center"
                         style="background: linear-gradient(135deg, #1a1a2e, #24243e); color: #b3a31c;">
                        <h5 class="card-title fw-bold">{{ $related->name }}</h5>
                        <p class="fw-bold fs-5 text-warning">${{ number_format($related->price, 2) }}</p>
                        <a href="{{ route('product.show', $related->id) }}"
                           class="btn view-details-btn w-100 text-white fw-bold py-2">
                            View Details <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
