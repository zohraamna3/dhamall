<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_items';
    protected $primaryKey = 'id';

    protected $fillable = [
        'ProductId',
        'Quantity',
        'PricePerUnit',
        'TotalPrice',
        'CartId'
    ];

    protected $casts = [
        'Quantity' => 'integer',
        'PricePerUnit' => 'decimal:2',
        'TotalPrice' => 'decimal:2'
    ];

    // Relationships
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductId');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'CartId');
    }

    // Calculate total price
    public static function calculateTotalPrice($quantity, $pricePerUnit)
    {
        return $quantity * $pricePerUnit;
    }

    // Events
    protected static function booted()
    {
        static::saving(function ($cartItem) {
            $cartItem->TotalPrice = $cartItem->Quantity * $cartItem->PricePerUnit;
        });
    }
}
