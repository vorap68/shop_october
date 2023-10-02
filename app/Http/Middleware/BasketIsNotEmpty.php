<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;

class BasketIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $order_id = session('order_id');
        if(!is_null($order_id)){
            $order = Order::findOrFail($order_id);
                if(!($order->products->count()==0)){
                    return $next($request);
                }else{
                    session()->flash('warning','Ваша корзина пуста');
                return back();
            }}

            session()->flash('warning','Ваша корзина пуста');
            return back();
    }
}
