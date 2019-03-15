<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depositor extends Model
{
    protected $fillable = [
        'cust_id', 
        'user_id',
        'amount_dep',
        'dep_name', 
        'dep_phone', 
        'dep_address',
    ];
}
