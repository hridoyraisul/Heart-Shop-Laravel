<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = [

        'id', 'order_id', 'product_id', 'product_name',	'product_image', 'product_price', 'product_quantity', 'created_at',	'updated_at',
    ];
}
