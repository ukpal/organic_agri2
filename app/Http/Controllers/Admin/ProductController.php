<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){
        $products=Product::all();
        return view('admin.product.list', compact(['products']));
    }

    public function edit(Request $request){
        $product=Product::find($request->id);
        $categories = Category::whereNull('category_id')->with('childrenCategories')->get();
        $product_img_path='public/products/';
        return view('admin.product.edit', compact(['product','categories','product_img_path']));
    }

    public function update(Request $request){
        $product = Product::find($request->id);
        $product->name= $request->name;
        $product->slug= Str::slug($request->name, '-');
        $product->category_id=$request->category_id;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->unit=$request->unit;
        $product->short_description=$request->short_description;
        $product->long_description=$request->long_description;
        $product->status=$request->status;

        
        if ($request->hasfile('image_1')) {
            unlink(public_path() . '/products/'.$product->image_1);
            $file = $request->file('image_1');
            $name = $file->getClientOriginalName();
            $name = time() . '.' . $name;
            $file->move(public_path() . '/products/', $name);
            $product->image_1 = $name;
        }
        if($request->del_image_2){
            unlink(public_path() . '/products/'.$product->image_2);
            $product->image_2='';
        }
        if ($request->hasfile('image_2')) {
            $file = $request->file('image_2');
            $name = $file->getClientOriginalName();
            $name = time() . '.' . $name;
            $file->move(public_path() . '/products/', $name);
            $product->image_2 = $name;
        }
        if($request->del_image_3){
            unlink(public_path() . '/products/'.$product->image_3);
            $product->image_3='';
        }
        if ($request->hasfile('image_3')) {
            $file = $request->file('image_3');
            $name = $file->getClientOriginalName();
            $name = time() . '.' . $name;
            $file->move(public_path() . '/products/', $name);
            $product->image_3 = $name;
        }
        if($request->del_image_4){
            unlink(public_path() . '/products/'.$product->image_4);
            $product->image_4='';
        }
        if ($request->hasfile('image_4')) {
            $file = $request->file('image_4');
            $name = $file->getClientOriginalName();
            $name = time() . '.' . $name;
            $file->move(public_path() . '/products/', $name);
            $product->image_4 = $name;
        }
        $product->save();
        return redirect('admin/products');
    }
}
