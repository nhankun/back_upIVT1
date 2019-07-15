<?php

namespace App\Http\Controllers;

use App\Order;
use App\Order_Detail;
use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCart()
    {
        $cart_contents = \Cart::getContent();
        $total = \Cart::getTotal();
        return view('carts', compact(['cart_contents','total']));
    }

    public function addCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        \Cart::add(array('id'=>$product->id,'name'=>$product->name,'price'=>$product->price,'quantity'=>1,
            'attributes'=>array('img'=>$product->images[0]->url)));
        return redirect()->route('getCart');
    }

    public function addcartOne(Request $request){
        if($request->ajax()){
            $id = $request->get('id');
            $qty = $request->get('quantity');
            $product = Product::findOrFail($id);

            \Cart::add(array('id'=>$product->id,'name'=>$product->name,'price'=>$product->price,'quantity'=>$qty,
                'attributes'=>array('img'=>$product->images[0]->url)));
            return 1;
        }
    }

    public function updateCart(Request $request)
    {
        if ($request->ajax()){
            $id = $request->id;
            $qty = $request->quantity;
            \Cart::update($id, array('quantity'=>array(
                    'relative' => false,
                    'value' =>$qty,
                    )
            ));
        return 1;
        }
        return 'Fails';
    }

    public function removeCart($id)
    {
        \Cart::remove($id);
        return redirect()->route('getCart');
    }

    public function orderConfirm()
    {
        if (\auth()->check()){
            $cart_contents = \Cart::getContent();
            $total = \Cart::getTotal();
            $user = \auth()->user();
            return view('orderConfirm', compact(['cart_contents','total','user']));
        }
        return redirect()->route('login');
    }

    public function orderPay(Request $request)
    {
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->order_date = date('y-m-d');
        $order->name = $request->name;
        $order->tel = $request->tel;
        $order->address = $request->address;
        $order->total = \Cart::getTotal();
        $order->status = 1;
        $order->save();

        $cart_contents = \Cart::getContent();
        foreach ($cart_contents as $cart)
        {
            $order_detail = new Order_Detail();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $cart->id;
            $order_detail->quantily = $cart->quantity;
            $order_detail->price = $cart->price;
            $order_detail->total_detail = $cart->price * $cart->quantity;
            $order_detail->save();

            $product = Product::findOrFail($cart->id);
            if ($product->quantily < $cart->quantity)
            {
                $order->delete();
                return redirect()->route('getCart')->with('error', 'Ordering fail. '.$product->name.' not enough quantity !' );
            }
        }
        foreach($cart_contents as $cart){
            $product = Product::findOrFail($cart->id);
            $product->quantily = $product->quantily - $cart->quantity;
            $product->save();
        }
        \Cart::clear();
        return redirect()->route('getCart')->with('success','Đặt hàng thành công!');
    }
}
