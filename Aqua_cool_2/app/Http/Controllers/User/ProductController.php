<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
     // -----------------------------------------------------------index function-----------------------------------------------------
     public function index()
     {
         $products = Product::all();
         return view('user.products.index', compact('products'));
     }
}
