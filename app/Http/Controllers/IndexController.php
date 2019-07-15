<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::where('quantily','>',0)
            ->orderBy('created_at','desc')
            ->take(6)
            ->get();
        $product_hots = Product::withCount('order_details')
            ->where('quantily','>',0)
            ->orderBy('order_details_count','desc')
            ->take(6)
            ->get();
        return view('index',compact(['products','product_hots']));
    }

    public function productDetail($id)
    {
        $product = Product::findOrFail($id);
        return view('product_detail',compact('product'));
    }
}
