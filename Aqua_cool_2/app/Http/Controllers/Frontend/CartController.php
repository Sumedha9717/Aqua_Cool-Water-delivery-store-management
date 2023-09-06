<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //---------------------------------------------------------------------Index Function-----------------------------------------------

    public function index()
    {
        return view('frontend.cart.index');
    }
    
}
