<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class brandController extends Controller
{
    //
     // -------------------------------------------------index Function-----------------------------------------------------------
     public function index()
     {
         return view('user.brands.index');
     }
}
