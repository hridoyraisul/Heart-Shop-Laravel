<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;
class ProductController extends Controller
{
    public function create()
    {
        $category = Category::all()->where('publication_status', '=', 1);
        return view('backend.product.add_product',compact('category'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required | unique:products',
            'Product_short_description' => 'required',
            'Product_long_description' => 'required',
            'product_price' => 'required | integer',
            'product_quantity' => 'required | integer | min:0',
            'publication_status' => 'required',
        ]);
        $product = new Product;
        $product->product_name = $request->product_name;
        $product->product_category = $request->product_category;
        $product->Product_short_description = $request->Product_short_description;
        $product->Product_long_description = $request->Product_long_description;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->publication_status = $request->publication_status;
        $product->created_at = Carbon::now();
        $product->updated_at = Carbon::now();
        $product->save();
        $id = $product->id;
        if ($request->hasFile('product_image')) {
            $fileName = $id.".".$request->product_image->getClientOriginalExtension();
            Image::make($request->product_image)->save(base_path('public/uploads/product_image/'.$fileName));
            Product::find($product->id)->where('id','=',$id)->update(['product_image'=> $fileName]);
        }
        return back()->with('product_add_notify', 'Product Added Successfully!');
    }
    public function manage(){
//        $check = Product::where('product_quantity' == 0 )->first();
//        if($check){
//            $status = new Product;
//            $status->publication_status = 'Unpublished';
//            $status->update();
//        }
        $product = Product::orderBy('id','DESC')->paginate(5);
        return view('backend.product.manage_product',compact('product'));
    }
    public function edit($product)
    {
        $data=Product::find($product);
        $category = Category::all()->where('publication_status', '=', 1);
        return view('backend.product.edit_product',compact('data','category'));
    }
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'Product_short_description' => 'required',
            'Product_long_description' => 'required',
            'product_price' => 'required | integer',
            'product_quantity' => 'required | integer | min:0',
            'publication_status' => 'required',
        ]);
        $product = Product::find($request->id);
        $product->product_name = $request->product_name;
        $product->product_category = $request->product_category;
        $product->Product_short_description = $request->Product_short_description;
        $product->Product_long_description = $request->Product_long_description;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->publication_status = $request->publication_status;
        $product->updated_at = Carbon::now();
        $product->save();
        if ($request->hasFile('product_image')) {
            Product::find($request->id);
            if ($product->product_image == 'default_image.jpg'){
                $fileName = $request->id.".".$request->product_image->getClientOriginalExtension();
                Image::make($request->product_image)->save(base_path('public/uploads/product_image/'.$fileName));
                Product::find($product->id)->where('id','=',$request->id)->update(['product_image'=> $fileName]);
            }
            else{
                unlink(base_path('public/uploads/product_image/'.$product->product_image));
                $fileName = $request->id.".".$request->product_image->getClientOriginalExtension();
                Image::make($request->product_image)->save(base_path('public/uploads/product_image/'.$fileName));
                Product::find($product->id)->where('id','=',$request->id)->update(['product_image'=> $fileName]);
            }
        }
        return back()->with('product_update_notify','Product Updated!');
    }
    public function destroy($product)
    {
        $data=Product::find($product);
        $data->delete();
        if ($data) {
            return Redirect()->back()->with('delete_notify','Product Deleted!');
        }
    }
    // publication status
    public function unpublish($product){
        $data = Product::find($product);
        $data->publication_status = 0;
        $data->save();
        return back()->with('unpublish_notify','Product Unpublished!');
    }
    public function publish($product){
        $data = Product::find($product);
        $data->publication_status = 1;
        $data->save();
        return back()->with('publish_notify','Product Published!');
    }
    //manage deleted products
    public function manageDeleted(){
        $SoftDelProduct = Product::onlyTrashed()->paginate(3);
        return view('backend.product.manage_deleted_product',compact('SoftDelProduct'));
    }
    public function permanentDelete($product)
    {
       $prod = Product::onlyTrashed()->find($product);
        if ($prod->product_image == 'default_image.jpg'){
            Product::withTrashed()->where('id',$product)->forceDelete();
            return back()->with('permanentDelete_notify','Product Permanently Deleted!');
        }
        else{
            Product::withTrashed()->where('id',$product)->forceDelete();
            unlink(base_path('public/uploads/product_image/'.$prod->product_image));
            return back()->with('permanentDelete_notify','Product Permanently Deleted!');
        }
    }
    public function restore($product)
    {
        Product::withTrashed()->where('id',$product)->restore();
        return back()->with('restore_notify','Product Restored!');
    }
}
