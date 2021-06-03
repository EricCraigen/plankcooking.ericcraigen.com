<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'orderItemId', 'productId', 'orderCartId', 'qty'
    ];

    public $primaryKey = 'orderItemId';
    public $timestamps = false;
}
