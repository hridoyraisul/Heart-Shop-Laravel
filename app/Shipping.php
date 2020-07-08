<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'full_name', 'email_address', 'phone_number', 'address',
    ];
}
