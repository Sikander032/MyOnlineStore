<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'rating',
        'review'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
