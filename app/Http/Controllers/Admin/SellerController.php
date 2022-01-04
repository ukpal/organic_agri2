<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $sellers = User::where('user_type','seller')->get();
        // print_r($sellers); die;
        return view('admin.seller',compact('sellers'));
    }

    public function edit($id){
        $seller = User::where([['user_type','seller'],['id',$id]])->first();
        return view('admin.edit_seller',compact('seller'));
    }
}
