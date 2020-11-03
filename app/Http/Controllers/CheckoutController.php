<?php

namespace App\Http\Controllers;
use App\Mail\OrderInvoice;
use App\Order;
use App\OrderDetails;
use App\Product;
use App\Shipping;
use Cart;
use Illuminate\Http\Request;
use App\Customer;
use App\Mail\SentCustomer;
use Illuminate\Support\Facades\DB;
use Mail;
use PhpParser\Node\Stmt\Return_;
use Session;
class CheckoutController extends Controller
{
    //Shipping activity.................................................................................................
    public function shippingProduct(){
        $customer = Customer::find(Session::get('customer_id'));
        return view('frontend.checkout.shipping',compact('customer'));
    }
    public function storeShipping(Request $request){
        $validatedData = $request->validate([
            'full_name' => 'required',
            'email_address' => 'required | email',
            'phone_number' => 'required | max:11',
            'address' => 'required',
        ]);
        $shipping = new Shipping;
        $shipping->full_name = $request->full_name;
        $shipping->email_address = $request->email_address;
        $shipping->phone_number = $request->phone_number;
        $shipping->address = $request->address;
        $shipping->save();
        Session::put(['shipping_id'=>$shipping->id]);
        return view('frontend.checkout.payment');
    }
    public function editShipping($customer){
        $shipping = Customer::find(Session::get('customer_id'));
        $data = Shipping::where('id','=',$customer)->first();
        return view('frontend.checkout.edit_shipping',compact('data'));
    }
    public function updateShipping(Request $request,Shipping $customer){
        $data = Shipping::find($request->id);
        $data->full_name  = $request->full_name;
        $data->email_address  = $request->email_address;
        $data->phone_number  = $request->phone_number;
        $data->address = $request->address;
        $data->save();
        return view('frontend.checkout.payment');
    }
    //order confirmation................................................................................................
    public function storeOrder(Request $request){
        if ($request->payment_type == 'Cash'){
            $order = new Order;
            $order->customer_id = Session::get('customer_id');
            $order->shipping_id = Session::get('shipping_id');
            $order->total_price = Session::get('totalPrice');
            $order->payment_type = $request->payment_type;
            $order->save();
            $cartContent = Cart::getContent();
            foreach ($cartContent as $content){
                $orderDetails = new OrderDetails;
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $content->id ;
                $orderDetails->product_name = $content->name ;
                $orderDetails->product_image = $content->attributes->product_image ;
                $orderDetails->product_price = $content->price;
                $orderDetails->product_quantity = $content->quantity;
                DB::table('products')
                    ->where('id', $content->id)
                    ->decrement('product_quantity', $content->quantity);
                $orderDetails->save();
            }
            Cart::clear();
            Mail::to($order->OrderRelCustomer->email_address)->send(new OrderInvoice($order));
            // return redirect()->route('invoice_download',$order);
            return view('frontend.checkout.order_success');
        }
        elseif ($request->payment_type == 'DBBL'){
            return "we are working on it. Please select Cash on delivery option";
        }
        elseif ($request->payment_type == 'Bkash'){
            return "we are working on it. Please select Cash on delivery option";
        }
    }
}

