<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFilterRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class MainController extends Controller
{
    public function index(ProductsFilterRequest $request)
    {

        // $productQuery = Product::query();
        $productQuery = Product::with('category');
        if ($request->filled('price_from')) {
            $productQuery->where('price', '>=', $request->price_from);
        }
        if ($request->filled('price_to')) {
            $productQuery->where('price', '>=', $request->price_to);
        };
        foreach (['hit', 'new', 'recommend'] as $field) {
            if ($request->input($field) === 'on') {
                $productQuery->$field();
            }
        }

        $products = $productQuery->paginate(6);

        return view('index', compact('products'));
    }

    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category($code)
    {
        $category = Category::where('code', $code)->first();
        return view('category', compact('category'));
    }

    public function product(Product $product)
    {
        //dump($product);
        return view('product', compact('product'));
    }

    public function proba()
    {
        return view('proba');
    }
}
