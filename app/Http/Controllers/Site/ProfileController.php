<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $b_title = 'Seller Details';
        $b_page = 'Seller Details';
        return view('site.profile', compact(['b_title', 'b_page']));
    } 
}
