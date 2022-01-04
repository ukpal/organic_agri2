<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('category_id')
            ->with('childrenCategories')
            ->get();
        return view('admin.category.categories', compact('categories'));
    }

    public function add()
    {
        $categories = Category::whereNull('category_id')->get();
        return view('admin.category.add_category', compact('categories'));
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->slug = Str::slug($request->title, '-');
        $category->category_id=$request->category_id;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $name = time() . '.' . $name;
            $file->move(public_path() . '/category/', $name);
            $category->image = $name;
        }
        $category->save();
        return redirect('admin/categories');
    }

    public function edit(Request $request){
        $categories = Category::whereNull('category_id')->get();
        $category = Category::find($request->id);
        $storage_path = 'public/category/';
        return view('admin.category.edit_category', compact(['categories','category','storage_path']));
    }

    public function update(Request $request){
        $category = Category::find($request->id);
        $category->title = $request->title;
        $category->slug = Str::slug($request->title, '-');
        $category->category_id=$request->category_id;
        if($request->del_img){
            unlink(public_path() . '/category/'.$category->image);
            $category->image='';
        }
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $name = time() . '.' . $name;
            $file->move(public_path() . '/category/', $name);
            $category->image = $name;
        }
        $category->save();
        return redirect('admin/categories')->with("success", "Category updated successfully.");
    }

    public function delete(Request $request)
    {
        $category = Category::find($request->id);
        if($category){
            if($category->image){
                unlink(public_path() . '/category/'.$category->image);
            }          
            Category::where("id", $category->id)->delete();
        }else{
            return back()->with("error", "Category not found.");
        }
        return back()->with("success", "Category deleted successfully.");
    }

    // public function deleteImage(Request $request){
    //     // $category = Category::find($request->id);
    //     if($request->image){
    //         unlink(public_path() . '/category/'.$request->image);
    //     }
    //     // echo $request->image;
    // }
}
