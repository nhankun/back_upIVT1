<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Comment;
use App\Product;

class AdminController extends Controller
{
    public function index()
    {
    	$orders = Order::orderBy('order_date','desc')->take(4)->get();
    	$count_order_new = Order::where('status','=',1)->count();
    	$count_user_register = User::where('user_type','=',1)->where('active','=',1)->count();
    	$count_comment = Comment::count();
    	$count_product = Product::count();
    	return view('admin.index',compact(['orders','count_order_new','count_user_register','count_comment','count_product']));
    }
}
