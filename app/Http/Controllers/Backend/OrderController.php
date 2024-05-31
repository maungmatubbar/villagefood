<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['product','invoice','address','user'])->get();

        return view('backend.pages.orders.orders', compact('orders'));
    }
}
