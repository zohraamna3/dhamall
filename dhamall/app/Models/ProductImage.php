<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';
    protected $primaryKey = 'id';

    protected $fillable = [
        'ProductId',
        'ImageURL'
    ];

    // Relationship to Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductId');
    }
}
