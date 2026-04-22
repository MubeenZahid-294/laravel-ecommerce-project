<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category',
        'description',
        'price',
        'stock',
        'image',
    ];
    public function reviews()
{
    return $this->hasMany(Review::class);
}

public function averageRating()
{
    return $this->reviews()->avg('rating') ?? 0;
}
}