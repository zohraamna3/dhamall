<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Models\ProductImage;
use App\Models\Category;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity_in_stock',
        'category_id',
        'features',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class); // Assuming a Product has many Reviews
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
