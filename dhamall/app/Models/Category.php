<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Add this line

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_category_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }


}
