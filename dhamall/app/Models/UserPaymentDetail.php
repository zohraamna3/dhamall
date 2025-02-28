<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPaymentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_type',
        'account_number',
        'expiry_date',
        'cvv',
        'bank_name',
        'paypal_email',
        'is_default',
        'card_name', // Add this
        'country',   // Add this
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}