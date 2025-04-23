<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'UserId',
        'OrderDate',
        'Status',
        'TotalBill'
    ];

    protected $casts = [
        'OrderDate' => 'datetime',
        'TotalBill' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'OrderId');
    }

    public function products()
    {
        return $this->hasManyThrough(
            Product::class,
            OrderItem::class,
            'OrderId',
            'id',
            'id',
            'ProductId'
        );
    }
}
