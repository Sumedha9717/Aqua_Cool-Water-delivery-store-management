<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Brands;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function index()
    {

        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalBrands = Brands::count();
        $totalBranch = Branch::count();

        $totalUser = User::where('role_as','0')->count();

        $totalOrder = Order::count();




        return view ('user.dashboard',compact('totalProducts','totalCategories','totalBrands','totalBranch',
                                                'totalUser',
                                                'totalOrder'));

    }
}
