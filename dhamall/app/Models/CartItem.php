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
        'CartId'
    ];

    protected $casts = [
        'Quantity' => 'integer',
        'PricePerUnit' => 'decimal:2',
        // No need to cast or fill for TotalPrice since it's auto-computed
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

    protected static function booted()
    {
        // You can remove the TotalPrice computation here, as it is handled in the DB
    }
}
