<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        $b_title = 'Account';
        $b_page = 'Register';
        return view('site.register', compact(['b_title', 'b_page']));
    }

    public function register(Request $request)
    {

        // $request->validate([
        //     'imageFile' => 'required',
        //     'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        //   ]);

        // print_r($request->all());
        // die();


        if ($request->hasfile('certificates')) {
            foreach ($request->file('certificates') as $file) {
                $name = $file->getClientOriginalName();
                $name = time().'.'.$name;
                $file->move(public_path() . '/certificates/', $name);
                $imgData[] = $name;
            }

            $user = new User();
            $user->name=$request->get('name');
            $user->email=$request->get('email');
            $user->mobile=$request->get('tel');
            $user->address=$request->get('registered-address');
            $user->additional_details=$request->get('additional-details');
            $user->company=$request->get('company');
            $user->certificates=json_encode($imgData);
            $user->save();

            // Mail::to($request->get('email'))->send(new SellerWelcome());

            // if (Mail::failures()) {
            //     return response()->Fail('Sorry! Please try again latter');
            // } else {
            //     return response()->success('Great! Successfully send in your mail');
            // }
        }

        return redirect('/');
    }

      

    // public function customRegistration(Request $request)
    // {  
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|min:6',
    //     ]);
           
    //     $data = $request->all();
    //     $check = $this->create($data);
         
    //     return redirect("dashboard")->withSuccess('You have signed-in');
    // }


    // public function create(array $data)
    // {
    //   return User::create([
    //     'name' => $data['name'],
    //     'email' => $data['email'],
    //     'password' => Hash::make($data['password'])
    //   ]);
    // }  
}
