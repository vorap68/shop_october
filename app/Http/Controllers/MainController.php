<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class MainController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('index',compact('products'));
    }

    public function categories(){
        $categories = Category::get();
        return view('categories',compact('categories'));
    }

    public function category($code){
        $category = Category::where('code',$code)->first();
       return view('category',compact('category'));
    }

    public function product(Product $product){
        //dump($product);
         return view('product',compact('product'));
    }


}
