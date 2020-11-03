<?php

namespace App\Http\Controllers;
use App\Category;
use App\Frontend;
use App\Product;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;
use DB;
class FrontendController extends Controller
{
    public function index()
    {
        $allCategory = Category::all();
        $latestProduct = Product::where('publication_status',1)
            ->where('product_quantity','!=',0)
            ->orderBy('id','DESC')
            ->take(8)
            ->get();
        $allProduct = Product::where('publication_status',1)
            ->where('product_quantity','!=',0)
            ->orderBy('id','DESC')
            ->get();
        return view('frontend.index',compact('latestProduct','allProduct','allCategory'));
    }
    public function productDetails($request){
        $product = Product::find($request);
        $relatedProduct = Product::where('product_category',$product->product_category)
            ->where('publication_status',1)
            ->where('product_quantity','!=',0)
            ->orderBy('id','DESC')
            ->get();
        $latestProduct = Product::where('publication_status',1)
            ->where('product_quantity','!=',0)
            ->orderBy('id','DESC')
            ->take(8)
            ->get();
        return view('frontend.product_details',compact('product','latestProduct','relatedProduct'));
    }
    public function shopView(){
        $allProduct = Product::where('publication_status',1)
            ->where('product_quantity','!=',0)
            ->orderBy('id','DESC')
            ->paginate(9);
        return view('frontend.shop_view',compact('allProduct'));
    }
    public function categoryView($request){
        $allProduct = Product::where('product_category',$request)
            ->where('publication_status',1)
            ->where('product_quantity','!=',0)
            ->orderBy('id','DESC')
            ->paginate(9);
        return view('frontend.shop_view',compact('allProduct'));
    }
    public function playVideo(){
        return view('frontend.video.play_video');
    }

}

