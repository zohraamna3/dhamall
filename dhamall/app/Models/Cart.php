<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'id';

    protected $fillable = ['UserId'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }

    public function items()
    {
        return $this->hasMany(CartItem::class, 'CartId');
    }

    public function products()
    {
        return $this->hasManyThrough(
            Product::class,
            CartItem::class,
            'CartId',
            'id',
            'id',
            'ProductId'
        );
    }
}
