<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingPolicy extends Model
{
    use HasFactory;

    protected $table = 'shipping_policy';

    protected $fillable = [
        'Title',
        'Description',
        'AdminId'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'AdminId');
    }
}
