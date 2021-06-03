<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'categoryId', 'websiteId', 'name', 'sortOrder', 'websitePath', 'description', 'imagePath'
    ];

    public $timestamps = false;
}
