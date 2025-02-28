<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;



class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_url',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function uploadImage($image)
    {
        $uploadedImage = Cloudinary::upload($image->getRealPath());

        return $uploadedImage->getSecurePath();  // Returns the secure URL of the uploaded image
    }
}
