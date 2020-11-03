<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'product_name',
        'product_category',
        'Product_short_description',
        'Product_long_description',
        'product_price',
        'product_quantity',
        'publication_status',
        'deleted_at',
        'product_image',
    ];
    public function relationWithCategory(){
        return $this->hasOne('App\Category','category_name','product_category');
    }
    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }
}
