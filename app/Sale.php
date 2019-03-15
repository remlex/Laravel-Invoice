<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'prod_id',
        'qty', 
        'price',
        'discount',
        'amount'
    ];
}
