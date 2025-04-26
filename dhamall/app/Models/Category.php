<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'CategoryName',
        'ParentCategoryId',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'ParentCategoryId');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'ParentCategoryId');
    }
}
