<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id';

    protected $fillable = [
        'OrderId',
        'ProductId',
        'OrderDate',
        'Status',
        'Quantity',
        'PricePerUnit',
        'TotalPrice'
    ];

    protected $casts = [
        'OrderDate' => 'datetime',
        'PricePerUnit' => 'decimal:2',
        'TotalPrice' => 'decimal:2'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'OrderId');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductId');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'OrderItemId');
    }
}
