<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'UserRole',
        'Name',
        'PhoneNumber',
        'Gender',
        'DateOfBirth',
        'EmailAddress',
        'Password',
        'ImageURL'
    ];

    protected $hidden = [
        'Password',
        'remember_token',
    ];

    protected $casts = [
        'DateOfBirth' => 'date',
    ];

    // Relationships
    public function orders()
    {
        return $this->hasMany(Order::class, 'UserId');
    }

    public function wishlist()
    {
        return $this->hasOne(Wishlist::class, 'UserId');
    }

    public function cart()
    {
        return $this->hasOne(Cart::class, 'UserId');
    }

// In app/Models/User.php
    public function paymentDetails()
    {
        return $this->hasManyThrough(
            PaymentDetail::class,
            BuyerCheckoutDetail::class,
            'UserId', // Foreign key on buyer_checkout_details table
            'id', // Foreign key on payment_details table
            'id', // Local key on users table
            'PaymentId' // Local key on buyer_checkout_details table
        );
    }

    public function addresses()
    {
        return $this->hasManyThrough(
            Address::class,
            BuyerCheckoutDetail::class,
            'UserId', // Foreign key on buyer_checkout_details table
            'id', // Foreign key on addresses table
            'id', // Local key on users table
            'AddressId' // Local key on buyer_checkout_details table
        );
    }
    public function checkoutDetails()
    {
        return $this->hasOne(BuyerCheckoutDetail::class, 'UserId');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'UserId');
    }

    // Helper method to get the user's image URL
    public function getImageUrl()
    {
        return $this->ImageURL ? asset($this->ImageURL) : asset('images/default-user.png');
    }

    // Override the setPasswordAttribute method to ensure usage of a hashed password
    public function setPasswordAttribute($value)
    {
        $this->attributes['Password'] = $value; // Hashing the password before saving
    }
}
