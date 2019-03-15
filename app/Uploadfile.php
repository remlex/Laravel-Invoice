<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploadfile extends Model
{
    protected $fillable = [
        'name',
        'phone', 
        'email',
        'photos'
    ];
}
