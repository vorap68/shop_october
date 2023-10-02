<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->get();
       // dd($orders);
       return view('auth.order.index',compact('orders'));
    }

    public function show(Order $order){
        return view('auth.order.show',compact('order'));
    }
}
