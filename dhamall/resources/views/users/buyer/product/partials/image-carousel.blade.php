<div class="col-md-6 mb-4">
    <div class="row">
        <!-- Main Image -->
        <div class="col-12 mb-3">
            <div class="ratio ratio-1x1 bg-dark rounded">
                <img id="mainProductImage"
                     src="{{ $product->images->first()->image_url ?? '/images/placeholder.jpg' }}"
                     class="product-image w-100 rounded"
                     alt="{{ $product->ProductName }}">
            </div>
        </div>

        <!-- Thumbnails -->
        <div class="col-12">
            <div class="d-flex flex-wrap gap-2">
                @foreach($product->images as $image)
                    <div>
                        <img src="{{ $image->image_url }}"
                             data-full-image="{{ $image->image_url }}"
                             class="thumbnail rounded"
                             alt="Thumbnail {{ $loop->index + 1 }}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
