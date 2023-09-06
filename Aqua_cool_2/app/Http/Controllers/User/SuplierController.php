<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
     // --------------------------------------------------------Index Function--------------------------------------------------------

   public function index()
   {
      return view('user.supplier.index');
   }

}
