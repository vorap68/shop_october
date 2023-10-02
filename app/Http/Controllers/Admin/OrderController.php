<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::all();
       // dd($orders);
       return view('auth.order.index',compact('orders'));
    }

    public function show(Order $order){
        return view('auth.order.show',compact('order'));
    }
}
