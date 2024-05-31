<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function dashboard()
    {
        $orders = Order::with('invoice','address','product')->where('user_id',auth()->user()->id)->get();
        $addresses = UserAddress::where('user_id',auth()->user()->id)->get();
        return view('frontend.pages.customer.dashboard',['orders'=>$orders, 'addresses'=>$addresses]);
    }


}
