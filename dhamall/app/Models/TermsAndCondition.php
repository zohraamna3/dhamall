<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsAndCondition extends Model
{
    use HasFactory;

    protected $table = 'terms_and_conditions';

    protected $fillable = [
        'Title',
        'Description',
        'AdminId'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'AdminId');
    }
}
