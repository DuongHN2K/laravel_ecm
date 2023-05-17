<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $productsTotal = Product::count();
        $categoriesTotal = Category::count();
        $brandsTotal = Brand::count();
        $allUsersTotal = User::count();
        $adminsTotal = User::where('user_type', '1')->count();
        $usersTotal = User::where('user_type', '0')->count();

        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $ordersTotal = Order::count();
        $todayOrdersTotal = Order::whereDate('created_at', Carbon::today())->count();
        $thisMonthOrdersTotal = Order::whereMonth('created_at', $thisMonth)->count();
        $thisYearOrdersTotal = Order::whereYear('created_at', $thisYear)->count();


        return view('admin.dashboard', compact(
            'productsTotal',
            'categoriesTotal',
            'brandsTotal',
            'allUsersTotal',
            'adminsTotal',
            'usersTotal',
            'ordersTotal',
            'todayOrdersTotal',
            'thisMonthOrdersTotal',
            'thisYearOrdersTotal'
        ));
    }
}
