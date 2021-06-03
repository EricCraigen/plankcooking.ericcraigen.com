<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'productId', 'categoryId', 'name', 'description', 'price', 'priceDescription', 'sortOrder', 'active', 'ounces', 'imagePath', 'handlingCost', 'taxExempt', 'sku'
    ];

    public $timestamps = false;
}
