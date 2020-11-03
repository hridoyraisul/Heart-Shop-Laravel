<?php

namespace App\Http\Controllers;
use App\Product;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class
CartController extends Controller
{
    public function addProduct(Request $request){
        $product = Product::find($request->product_id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'quantity' => $request->product_quantity,
            'attributes' => [
                'product_image' => $product->product_image,
            ]
        ]);
        return redirect('shop-view/category/'.$product->product_category);
    }
    public function removeProduct($request){
        $cartContent = Cart::getContent($request);
        Cart::remove($request);
        return back();
    }
    public function updateProduct(Request $request){
        $pro = Product::find($request->product_id);
        if ($pro->product_quantity <= 1){
            return back();
        }
        else{
            Cart::update($request->product_id, [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->product_quantity,
                ],
            ]);
            return back();
        }
    }
}
