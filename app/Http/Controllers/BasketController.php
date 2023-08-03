<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket(){
              $orderId = session('orderId');
        if(!is_null($orderId)){
            $order = Order::findOrFail($orderId);
        }
        return view('basket',compact('order'));
    }

    public function basketPlace(){
        $orderId = session('orderId');
        if (is_null($orderId)){
            return redirect()->route('index');
        }
        $order = Order::first($orderId);
        return view('order',compact('order'));
    }

    public function basketAdd($productid) {
        $orderId = session('orderId');
    if(is_null($orderId)){
            $order = Order::create();
            session(['orderId'=>$order->id]);
        }else{
            $order = Order::find($orderId);
        }
        if($order->products->contains($productid)){
            $pivotRow = $order->products()->where('product_id',$productid)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
            }else{
            $order->products()->attach($productid);
        }
        return redirect()->route('basket');

    }
    public function basketRemove($productid) {
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);
        if($order->products->contains($productid)){
            $pivotRow = $order->products()->where('product_id',$productid)->first()->pivot;
             if($pivotRow->count < 2) {
                $order->products()->detach($productid);
             }else{
              $pivotRow->count--;
              $pivotRow->update();
             }
            }
        return redirect()->route('basket');
        }

}
