<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //---------------------------------------------------------------------Index Function-----------------------------------------------

    public function index()
    {
        return view('frontend.checkout.index');
    }
}
