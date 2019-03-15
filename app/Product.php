<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'prod_code',
        'name', 
        'price',
        'qty',
        'stocks'
    ];
}
