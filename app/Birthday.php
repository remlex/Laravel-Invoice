<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Birthday extends Model
{
    protected $fillable = [
        'memb_code',
        'firstname',
        'lastname',
        'email',
        'phone',
        'address',
        'gender',
        'day',
        'month',
        'subgroup',
        'branch',
        'occupation',
        'status',
    ];


}
