<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $q = $request->searchProduct;
        $allProduct = Product::where('product_name','LIKE','%'.$q.'%')
            ->where('publication_status',1)
            ->where('product_quantity','!=',0)
            ->paginate(9);
        if(count($allProduct) > 0){
            return view('frontend.shop_view',compact('allProduct'));
        }
        else {
            $allProduct = NULL;
            return view('frontend.shop_view',compact('allProduct'))
                ->with('search_notify', 'Sorry no product found.');
        }
    }
    public function colorRed(Request $request){
        $q = $request->searchColor;
        $allProduct = Product::where('product_name','LIKE','%'.$q.'%')
            ->where('publication_status',1)
            ->where('product_quantity','!=',0)
            ->paginate(9);
        if(count($allProduct) > 0){
            return view('frontend.shop_view',compact('allProduct'));
        }
        else {
            $allProduct = NULL;
            return view('frontend.shop_view',compact('allProduct'))
                ->with('search_notify', 'Sorry no product found.');
        }
    }
    public function colorWhite(Request $request){
        $q = $request->searchColor;
        $allProduct = Product::where('product_name','LIKE','%'.$q.'%')
            ->where('publication_status',1)
            ->where('product_quantity','!=',0)
            ->paginate(9);
        if(count($allProduct) > 0){
            return view('frontend.shop_view',compact('allProduct'));
        }
        else {
            $allProduct = NULL;
            return view('frontend.shop_view',compact('allProduct'))
                ->with('search_notify', 'Sorry no product found.');
        }
    }
    public function colorBlack(Request $request){
        $q = $request->searchColor;
        $allProduct = Product::where('product_name','LIKE','%'.$q.'%')
            ->where('publication_status',1)
            ->where('product_quantity','!=',0)
            ->paginate(9);
        if(count($allProduct) > 0){
            return view('frontend.shop_view',compact('allProduct'));
        }
        else {
            $allProduct = NULL;
            return view('frontend.shop_view',compact('allProduct'))
                ->with('search_notify', 'Sorry no product found.');
        }
    }
    public function colorBlue(Request $request){
        $q = $request->searchColor;
        $allProduct = Product::where('product_name','LIKE','%'.$q.'%')
            ->where('publication_status',1)
            ->where('product_quantity','!=',0)
            ->paginate(9);
        if(count($allProduct) > 0){
            return view('frontend.shop_view',compact('allProduct'));
        }
        else {
            $allProduct = NULL;
            return view('frontend.shop_view',compact('allProduct'))
                ->with('search_notify', 'Sorry no product found.');
        }
    }
    public function colorYellow(Request $request){
        $q = $request->searchColor;
        $allProduct = Product::where('product_name','LIKE','%'.$q.'%')
            ->where('publication_status',1)
            ->where('product_quantity','!=',0)
            ->paginate(9);
        if(count($allProduct) > 0){
            return view('frontend.shop_view',compact('allProduct'));
        }
        else {
            $allProduct = NULL;
            return view('frontend.shop_view',compact('allProduct'))
                ->with('search_notify', 'Sorry no product found.');
        }
    }
    public function colorGreen(Request $request){
        $q = $request->searchColor;
        $allProduct = Product::where('product_name','LIKE','%'.$q.'%')
            ->where('publication_status',1)
            ->where('product_quantity','!=',0)
            ->paginate(9);
        if(count($allProduct) > 0){
            return view('frontend.shop_view',compact('allProduct'));
        }
        else {
            $allProduct = NULL;
            return view('frontend.shop_view',compact('allProduct'))
                ->with('search_notify', 'Sorry no product found.');
        }
    }
}
