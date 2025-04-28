<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{

    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'BrandId',
        'SellerId',
        'CategoryId',
        'ShippingId',
        'ProductName',
        'Description',
        'Price',
        'CompareAtPrice',
        'QuantityInStock',
        'NumberOfOrders',
        'ProductStatus',
        'SKU',
        'Rating',
        'ReviewCount'
    ];

    protected $casts = [
        'Price' => 'decimal:2',
        'CompareAtPrice' => 'decimal:2',
        'QuantityInStock' => 'integer',
        'NumberOfOrders' => 'integer',
        'Rating' => 'decimal:2',
        'ReviewCount' => 'integer'
    ];

    // Relationships
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'BrandId');
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'SellerId');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'CategoryId');
    }

    public function shipping(): BelongsTo
    {
        return $this->belongsTo(Shipping::class, 'ShippingId');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'ProductId');
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'ProductId');
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class, 'ProductId');
    }

    public function wishlistItems(): HasMany
    {
        return $this->hasMany(WishlistItem::class, 'ProductId');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class, 'ProductId');
    }

    // Scopes
    public function scopeAvailable($query)
    {
        return $query->where('ProductStatus', 'Available');
    }

    public function scopePopular($query, $limit = 5)
    {
        return $query->orderBy('NumberOfOrders', 'desc')->take($limit);
    }


}
