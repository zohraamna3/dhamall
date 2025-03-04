<div class="col-md-6 mb-3">
    <div id="product-carousel" class="carousel slide shadow-lg rounded" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($product->images as $key => $image)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ $image->image_url }}" class="d-block w-100 rounded" alt="Product Image">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#product-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#product-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
    </div>
</div>
