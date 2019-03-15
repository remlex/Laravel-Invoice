<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $fillable = [
        'order_code', 
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
     return $this->belongsTo(Invoice::class, 'order_id', 'id');
    }
}
