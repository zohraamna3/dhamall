<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{
    protected $table = 'wishlist_items';
    protected $primaryKey = 'id';

    protected $fillable = [
        'ProductId',
        'WishlistId'
    ];

    // Relationships
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductId');
    }

    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class, 'WishlistId');
    }

    // Scopes
    public function scopeForProduct($query, $productId)
    {
        return $query->where('ProductId', $productId);
    }

    public function scopeForUser($query, $userId)
    {
        return $query->whereHas('wishlist', function($q) use ($userId) {
            $q->where('UserId', $userId);
        });
    }

    // Events
    protected static function booted()
    {
        static::created(function ($wishlistItem) {
            // You could add logic here to send notifications
            // or update product wishlist counts
        });

        static::deleted(function ($wishlistItem) {
            // Cleanup or logging when an item is removed
        });
    }
}
