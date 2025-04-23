<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnsAndRefunds extends Model
{
    use HasFactory;

    protected $fillable = ['PolicyType', 'Description', 'AdminId'];
}
