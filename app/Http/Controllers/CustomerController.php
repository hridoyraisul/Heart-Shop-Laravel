<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Mail\SentCustomer;
use App\Product;
use Session;
use Illuminate\Http\Request;
class CustomerController extends Controller
{
    public function loginForm(){
        return view('frontend.checkout.checkout_form');
    }
    //customer login activity...........................................................................................
    public function customerLogin(Request $request){
        if ($customer = Customer::where('email_address',$request->email_address)->first())
        {
            if (password_verify($request->password , $customer->password ))
            {
                session(['customer_id' => $customer->id,'customer_name'=> $customer->first_name.' '.$customer->last_name]);
                $allProduct = Product::where('publication_status',1)->orderBy('id','DESC')->paginate(9);
                return view('frontend.shop_view',compact('allProduct'));
            }
            else
            {
                return back()->with('worng_message','Wrong Password');
            }
        }
        else
        {
            return back()->with('worng_message','Please give the valid information');
        }
    }
    //customer LogOut activity..........................................................................................
    public function customerLogout(){
        session()->forget(['shipping_id','customer_id','customer_name']);
        return redirect('/');
    }
    //customer Register activity........................................................................................
    public function customerRegister(Request $request){
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required | email | unique:customers',
            'phone_number' => 'required | max:11 | unique:customers',
            'password' => 'required | min:6',
        ]);
        $data = new Customer;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email_address = $request->email_address;
        $data->phone_number = $request->phone_number;
        $data->password = bcrypt($request->password);
        $data->save();
        Session::put(['customer_id'=> $data->id]);
        Session::put(['customer_name'=> $data->first_name.' '.$data->last_name]);
        Mail::to($data->email_address)->send(new SentCustomer($data));
        return back()->with('reg_notify','Go Login Now');
    }
}
