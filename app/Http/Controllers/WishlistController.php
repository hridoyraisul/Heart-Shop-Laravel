<?php

namespace App\Http\Controllers;
use App\Wishlist;
use App\Customer;
use App\Product;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class WishlistController extends Controller
{
    public function index(){
        $customer = Session('customer_id');
        $wishlists = Wishlist::where("user_id", "=", $customer)->orderby('id', 'desc')->paginate(10);
        return view('frontend.wishlist', compact('customer', 'wishlists'));
    }
    public function store(Request $request){
        if(is_null($request->customer_id)){
            return redirect()->back()
                ->with('flash_message',
                    'Please Login first before add this to your wishlist');
        }
        $this->validate($request, array(
            'customer_id'=>'required',
            'product_id' =>'required',
        ));
        $status=Wishlist::where('customer_id','=',Session('customer_id'))
            ->where('product_id','=',$request->product_id)
            ->first();
        if(isset($status->customer_id) and isset($request->product_id))
        {
            return redirect()->back()->with('flash_message', 'This item is already in your
       wishlist!');
        }
        else
        {
            $wishlist = new Wishlist;
            $wishlist->customer_id = $request->customer_id;
            $wishlist->product_id = $request->product_id;
            $wishlist->save();
            return redirect()->back()->with('flash_message_success',
                'Item, '. $wishlist->product->title.' Added to your wishlist.');
        }
    }
    public function destroy($id){
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();
        return redirect()->route('wishlist.index')
            ->with('flash_message',
                'Wishlist successfully cleared');
    }
}
