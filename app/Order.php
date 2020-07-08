<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [

        'id', 'customer_id', 'shipping_id',	'total_price', 'payment_type', 'order_status', 'payment_status', 'created_at', 'updated_at',
    ];
    public function OrderRelCustomer(){
        return $this->hasOne('App\Customer','id', 'customer_id');
    }
}
