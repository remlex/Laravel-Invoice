<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    protected $fillable = [
        'cust_id', 
        'user_id',
        'amount_wth',
        'wth_name', 
        'wth_phone', 
        'wth_address',
    ];

    public function users()
    {
     return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function customers()
    {
     return $this->belongsTo(Customer::class, 'cust_id', 'id');
    }
}
