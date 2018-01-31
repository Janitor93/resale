<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'product_name',
        'price',
        'quantity',
        'description',
        'image',
        'category_id',
    ];
}
