<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'PaymentMethod',
        'CardNumber',
        'ExpiryDate',
        'CVV',
        'NameOnCard',
        'Zip',
    ];
}
