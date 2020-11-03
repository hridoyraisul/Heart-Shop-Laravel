<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class CategoryController extends Controller
{
    public function create()
    {
        return view('backend.category.add_form');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required | unique:categories',
            'category_description' => 'required',
            'publication_status' => 'required',
        ]);
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();
        return back()->with('catgory_add_notify','Category Added Successfully!');
    }
    public function manage(){
        $category = Category::paginate(5);
        return view('backend.category.manage',compact('category'));
    }
    public function unpublish($category){
        $data = Category::find($category);
        $data->publication_status = 0;
        $data->save();
        return back()->with('unpublish_notify','Category Unpublished!');
    }
    public function publish($category){
        $data = Category::find($category);
        $data->publication_status = 1;
        $data->save();
        return back()->with('publish_notify','Category Published!');
    }
    public function edit($category)
    {
        $data = Category::find($category);
        return view('backend.category.edit', compact('data'));
    }
    public function update(Request $request, Category $cat)
    {
        $validatedData = $request->validate([
            'category_name' => 'required',
            'category_description' => 'required',
            'publication_status' => 'required',
        ]);
        $category = Category::find($request->id);
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();
        return back()->with('update_notify','Category Updated!');
    }
    public function destroy($category)
    {
        $data=Category::find($category);
        $data->delete();
        if ($data) {
            return Redirect()->back()->with('delete_notify','Category Deleted!');
        }
    }
}
