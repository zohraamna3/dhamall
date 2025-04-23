<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $table = 'product_reviews';
    protected $primaryKey = 'id';

    protected $fillable = [
        'UserId',
        'ProductId',
        'Rating',
        'Comment',
        'Sentiment',
        'PostedOn'
    ];

    protected $casts = [
        'PostedOn' => 'date',
        'Rating' => 'integer'
    ];

    // Relationship to Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductId');
    }

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }
}
