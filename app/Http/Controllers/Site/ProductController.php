<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $b_title = 'Add New Product';
        $b_page = 'Add New Product';
        $user = Auth::user();
        $categories = Category::whereNull('category_id')->with('childrenCategories')->get();
        // $socials = $user->socials;
        // $certificate_path = env('APP_URL') . '/public/certificates/';
        // $categories;
        return view('site.add_product', compact(['b_title', 'b_page', 'user','categories']));
    }

    public function store(Request $request){
        $product = new Product();
        $product->name= $request->name;
        $product->slug= Str::slug($request->name, '-');
        $product->category_id=$request->category_id;
        $product->user_id=$request->user_id;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->unit=$request->unit;
        $product->short_description=$request->short_description;
        $product->long_description=$request->long_description;

        if ($request->hasfile('image_1')) {
            $file = $request->file('image_1');
            $name = $file->getClientOriginalName();
            $name = time() . '.' . $name;
            $file->move(public_path() . '/products/', $name);
            $product->image_1 = $name;
        }
        if ($request->hasfile('image_2')) {
            $file = $request->file('image_2');
            $name = $file->getClientOriginalName();
            $name = time() . '.' . $name;
            $file->move(public_path() . '/products/', $name);
            $product->image_2 = $name;
        }
        if ($request->hasfile('image_3')) {
            $file = $request->file('image_3');
            $name = $file->getClientOriginalName();
            $name = time() . '.' . $name;
            $file->move(public_path() . '/products/', $name);
            $product->image_3 = $name;
        }
        if ($request->hasfile('image_4')) {
            $file = $request->file('image_4');
            $name = $file->getClientOriginalName();
            $name = time() . '.' . $name;
            $file->move(public_path() . '/products/', $name);
            $product->image_4 = $name;
        }
        $product->save();
        return redirect()->route('myAccount');
    }

    public function edit(Request $request){
        $b_title = 'Edit Product';
        $b_page = 'Edit Product';
        $categories = Category::whereNull('category_id')->with('childrenCategories')->get();
        $user = Auth::user();
        $product = Product::where([['id',$request->id],['user_id',$user->id]])->first();
        $product_img_path='public/products/';
        if($product){
            return view('site.edit_product', compact(['product','b_page','b_title','categories','product_img_path']));
        }else{
            return redirect()->route('myAccount');
        }      
    }

    public function update(Request $request){
        $user = Auth::user();
        $product = Product::where([['id',$request->id],['user_id',$user->id]])->first();
        $product->name= $request->name;
        $product->slug= Str::slug($request->name, '-');
        $product->category_id=$request->category_id;
        $product->user_id=$user->user_id;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->unit=$request->unit;
        $product->short_description=$request->short_description;
        $product->long_description=$request->long_description;

        
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
        return redirect()->route('myAccount');
    }

    public function getSubcategories(Request $request){
        return response()->json(Category::where('category_id',$request->category_id)->get(['id','title']));
    }
}
