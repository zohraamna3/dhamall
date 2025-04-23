<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    protected $table = 'payment_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'PaymentMethod',
        'CardNumber',
        'ExpiryDate',
        'CVV',
        'NameOnCard',
        'Zip'
    ];

    protected $casts = [
        'ExpiryDate' => 'date'
    ];

    public function checkoutDetails()
    {
        return $this->hasMany(BuyerCheckoutDetail::class, 'PaymentId');
    }
}
