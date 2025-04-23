<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlists';
    protected $primaryKey = 'id';

    protected $fillable = ['UserId'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }

    public function items()
    {
        return $this->hasMany(WishlistItem::class, 'WishlistId');
    }

    public function products()
    {
        return $this->hasManyThrough(
            Product::class,
            WishlistItem::class,
            'WishlistId',
            'id',
            'id',
            'ProductId'
        );
    }
}
