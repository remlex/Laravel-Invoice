<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     protected $fillable = [
        'cust_code', 
        'user_id',
        'company',
        'firstname', 
        'lastname', 
        'email',
        'phone',
        'address', 
    ];

    public function users()
    {
     return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function invoices()
    {
     return $this->belongsTo(Invoice::class, 'cust_id', 'id');
    }

    public function balances()
    {
     return $this->belongsTo(Balance::class, 'cust_id', 'id');
    }

    public function withdrawals()
    {
     return $this->belongsTo(Withdrawal::class, 'cust_id', 'id');
    }
}
