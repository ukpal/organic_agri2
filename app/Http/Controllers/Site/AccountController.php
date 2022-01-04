<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SocialAccounts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $b_title = 'My Account';
        $b_page = 'My Account';
        $user = Auth::user();
        // print_r($user->socials->facebook); die();
        $socials = $user->socials;
        $products=Product::where('user_id',$user->id)->get(['id','name','status']);
        $product_img_path='public/products/';
        $certificate_path = env('APP_URL') . '/public/certificates/';
        return view('site.account', compact(['b_title', 'b_page', 'user', 'certificate_path', 'socials','products','product_img_path']));
    }

    public function socialUpdate(Request $request)
    {
        $details = SocialAccounts::find($request->id);
        $details->facebook = $request->get('fb');
        $details->twitter = $request->get('twitter');
        $details->linkedin = $request->get('linkedin');
        $details->google = $request->get('google');
        $details->youtube = $request->get('youtube');
        $details->pinterest = $request->get('pinterest');
        $details->save();
        return redirect()->route('myAccount');
    }

    public function passwordUpdate(Request $request)
    {
        $details = User::find($request->id);
        if (Hash::check($request->current_pass, $details->password)) {
            if ($request->new_pass == $request->confirm_pass) {
                $details->password = Hash::make($request->get('new_pass'));
                $details->save();
            }
        }
        return redirect()->route('myAccount');
    }

    public function accountUpdate(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->get('name');
        // $user->email = $request->get('email');
        $user->mobile = $request->get('tel');
        $user->address = $request->get('address');
        $user->additional_details = $request->get('additional-details');
        $user->company = $request->get('company');
        $imgData=json_decode($user->certificates);

        if ($request->hasfile('certificates')) {
            foreach ($request->file('certificates') as $file) {
                $name = $file->getClientOriginalName();
                $name = time() . '.' . $name;
                $file->move(public_path() . '/certificates/', $name);
                $imgData[] = $name;
            }
            $user->certificates = json_encode($imgData);
        }
        $user->save();

        return redirect()->route('myAccount');
    }

    public function deleteCertificate($image){
        echo $image;
    }
}
