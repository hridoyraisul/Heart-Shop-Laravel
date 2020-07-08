<?php

namespace App\Http\Controllers;
use PDF;
use App\Customer;
use App\Order;
use App\OrderDetails;
use App\Shipping;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    public function manageOrder(){
        $allOrder = Order::get();
        return view('backend.order.manage',compact('allOrder'));
    }
    public function orderDetails($id){
        $orderinfo = Order::find($id);
        $customerinfo = Customer::find($orderinfo->customer_id);
        $shippinginfo = Shipping::find($orderinfo->shipping_id);
        $productinfo = OrderDetails::where('order_id',$id)->get();
        return view('backend.order.details',compact('orderinfo','customerinfo','shippinginfo','productinfo'));
    }
    public function invoiceView($id){
        $orderinfo = Order::find($id);
        $customerinfo = Customer::find($orderinfo->customer_id);
        $shippinginfo = Shipping::find($orderinfo->shipping_id);
        $productinfo = OrderDetails::where('order_id',$id)->get();
        return view('backend.order.invoice',compact('orderinfo','customerinfo','shippinginfo','productinfo'));
    }
    public function invoiceDownload($id){
        $orderinfo = Order::find($id);
        $customerinfo = Customer::find($orderinfo->customer_id);
        $shippinginfo = Shipping::find($orderinfo->shipping_id);
        $productinfo = OrderDetails::where('order_id',$id)->get();
        $pdf = PDF::loadView('backend.order.invoice_download',array('orderinfo' => $orderinfo,'customerinfo' => $customerinfo,'shippinginfo'=>$shippinginfo,'productinfo'=>$productinfo));
        return $pdf->download($customerinfo->first_name.' '.$customerinfo->last_name.'.pdf');
    }
    public function destroy($id){
        $data=Order::find($id);
        $data->delete();
        $text = $data->OrderRelCustomer->first_name.' '.$data->OrderRelCustomer->last_name.'\'s order canceled';
        if ($data) {
            return Redirect()->back()->with('delete_notify',$text);
        }
    }
}
