<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BuyerCheckoutDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'UserId',
        'AddressId',
        'PaymentId',
    ];

    /**
     * Define the relationship with the User model.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'UserId', 'UserId');
    }

    /**
     * Define the relationship with the Address model.
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'AddressId', 'AddressId');
    }

    /**
     * Define the relationship with the PaymentDetail model.
     */
    public function paymentDetail(): BelongsTo
    {
        return $this->belongsTo(PaymentDetail::class, 'PaymentId', 'PaymentId');
    }
}
