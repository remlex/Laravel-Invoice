<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'firstname', 
        'lastname', 
        'email', 
        'phone', 
        'address', 
        'country', 
        'state', 
        'username', 
        'password', 
        'verified',
        'status',
        'roles',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function invoices()
    {
     	return $this->hasMany(Invoice::class, 'cust_id', 'user_id');
    }
}
