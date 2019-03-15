<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_id', 
        'order_id', 
        'user_id',
        'prod_name' => 'array', //'model_name ' => 'array',
        'description', 
        'qty' => 'array',
        'price' => 'array',
        'discount' => 'array',
        'total' => 'array', 
        'status',
    ];

    public function users()
    {
     return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function orders()
    {
     return $this->belongsTo(Order::class, 'id', 'order_id');
    }
}
