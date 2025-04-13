<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'Name',
        'PhoneNumber',
        'Gender',
        'DateOfBirth',
        'EmailAddress',
        'Password',
        'UserRole',
        'ImageURL',
    ];

    protected $hidden = [
        'Password',
        'remember_token',
    ];

    protected $casts = [
        'DateOfBirth' => 'date',
        'Password' => 'hashed',
    ];

    /**
     * Define a one-to-one relationship with BuyerCheckoutDetail.
     */
    public function checkoutDetail(): HasOne
    {
        return $this->hasOne(BuyerCheckoutDetail::class, 'UserId', 'UserId');
    }
}
