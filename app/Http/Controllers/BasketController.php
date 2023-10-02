<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket(){
        //session()->forget('orderId');
              $orderId = session('orderId');
        if(!is_null($orderId)){
            $order = Order::findOrFail($orderId);

        }else{
            session()->flash('empty', 'У вас нет заказов');
           return  redirect()->route('index');
        }
        return view('basket',compact('order'));
    }

    public function basketPlace(){
        $orderId = session('orderId');
        if (is_null($orderId)){
            return redirect()->route('index');
        }
      $order = Order::find($orderId);
        return view('order',compact('order'));
    }



    public function basketConfirm(Request $request)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        $success = $order->saveOrder($request->name, $request->phone);

        if ($success) {
            session()->flash('success', 'Ваш заказ принят в обработку!');
        } else {
            session()->flash('warning', 'Случилась ошибка');
        }

        return redirect()->route('index');
    }


    public function basketAdd($productid) {
         $orderId = session('orderId');
    if(is_null($orderId)){
        $user_id = Auth::user()->id;
            $order = Order::create([
                'user_id' => $user_id,
            ]);
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
            //получаем объект из промеж таблицы
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
