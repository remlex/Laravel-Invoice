<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $fillable = [
        'cust_id', 
        'user_id',
        'balance', 
    ];
}
