<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bdays extends Model
{
    protected $fillable = [
        'fullname',
        'phone',
        'address',
        'occupation',
        'dob',        
        'day',
        'month',
        'email',
        'marital_status',
        'gender',
        'subgroup',
        'position',
        'all_grp',
        'region',
    ];
}
