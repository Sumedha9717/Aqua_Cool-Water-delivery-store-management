<?php

namespace App\Http\Controllers\Admin;

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

        $totalAllUsers = User::count();
        $totalUser = User::where('role_as','0')->count();
        $totalAdmin = User::where('role_as','1')->count();

        $todayDate = Carbon::now()->format('m-d-Y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $totalOrder = Order::count();
        $todayOrder = Order::where('created_at',$todayDate)->count();
        $thisMonthOrder = Order::whereMonth('created_at',$thisMonth)->count();
        $thisYearOrder = Order::whereYear('created_at',$thisYear)->count();



        return view ('admin.dashboard',compact('totalProducts','totalCategories','totalBrands',
                                                'totalAllUsers','totalUser','totalAdmin',
                                                'totalOrder','todayOrder','thisMonthOrder','thisYearOrder'));

    }
}
