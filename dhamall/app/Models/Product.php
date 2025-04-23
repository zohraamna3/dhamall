<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'StockQuantity',
        'NumberOfOrders',
        'ProductStatus'
    ];

    protected $casts = [
        'Price' => 'decimal:2',
        'StockQuantity' => 'integer',
        'NumberOfOrders' => 'integer'
    ];

    // Relationships
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'BrandId');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'SellerId');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryId');
    }

    public function shipping()
    {
        return $this->belongsTo(Shipping::class, 'ShippingId');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'ProductId');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'ProductId');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'ProductId');
    }

    public function wishlistItems()
    {
        return $this->hasMany(WishlistItem::class, 'ProductId');
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
