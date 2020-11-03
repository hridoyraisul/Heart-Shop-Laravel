<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable= [
        'first_name', 'last_name', 'email_address', 'phone_number', 'password',
    ];

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }
}
