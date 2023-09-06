<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    //
    // -------------------------------------------------index Function-----------------------------------------------------------
    public function index()
    {
        return view('user.category.index');
    }
}
