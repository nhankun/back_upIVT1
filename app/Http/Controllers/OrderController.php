<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(5);
        $status = 'A';
        return view('admin.order.index',compact(['orders','status']));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with('order_details')
            ->where('id','=',$id)
            ->first();
        return view('admin.order.show',compact('order'));
    }

    public function search(Request $request)
    {
        $status = $request->status;
        $key = $request->key;
        if (!$key == '' && $status == 'A')
        {
            $orders = Order::where('id','like','%'.$key.'%')
                    ->orwhere('name','like','%'.$key.'%')
                    ->orwhere('tel','like','%'.$key.'%')
                    ->orwhere('address','like','%'.$key.'%')
                    ->orwhere('total','like','%'.$key.'%')
                    ->orwhere('order_date','like','%'.$key.'%')
                    ->get();
            return view('admin.order.index',compact(['orders','key','status']));
        }
        if (!$key == '' && $status == 'B')
        {
            $orders = Order::where('id','like','%'.$key.'%')->where('status','=',1)
                ->orwhere('name','like','%'.$key.'%')->where('status','=',1)
                ->orwhere('tel','like','%'.$key.'%')->where('status','=',1)
                ->orwhere('address','like','%'.$key.'%')->where('status','=',1)
                ->orwhere('total','like','%'.$key.'%')->where('status','=',1)
                ->orwhere('order_date','like','%'.$key.'%')->where('status','=',1)
                ->get();
            return view('admin.order.index',compact(['orders','key','status']));
        }
        if (!$key == '' && $status == 'C')
        {
            $orders = Order::where('id','like','%'.$key.'%')->where('status','=',2)
                ->orwhere('name','like','%'.$key.'%')->where('status','=',2)
                ->orwhere('tel','like','%'.$key.'%')->where('status','=',2)
                ->orwhere('address','like','%'.$key.'%')->where('status','=',2)
                ->orwhere('total','like','%'.$key.'%')->where('status','=',2)
                ->orwhere('order_date','like','%'.$key.'%')->where('status','=',2)
                ->get();
            return view('admin.order.index',compact(['orders','key','status']));
        }
        if (!$key == '' && $status == 'D')
        {
            $orders = Order::where('id','like','%'.$key.'%')->where('status','=',3)
                ->orwhere('name','like','%'.$key.'%')->where('status','=',3)
                ->orwhere('tel','like','%'.$key.'%')->where('status','=',3)
                ->orwhere('address','like','%'.$key.'%')->where('status','=',3)
                ->orwhere('total','like','%'.$key.'%')->where('status','=',3)
                ->orwhere('order_date','like','%'.$key.'%')->where('status','=',3)
                ->get();
            return view('admin.order.index',compact(['orders','key','status']));
        }
        if (!$key == '' && $status == 'E')
        {
            $orders = Order::where('id','like','%'.$key.'%')->where('status','=',5)
                ->orwhere('name','like','%'.$key.'%')->where('status','=',5)
                ->orwhere('tel','like','%'.$key.'%')->where('status','=',5)
                ->orwhere('address','like','%'.$key.'%')->where('status','=',5)
                ->orwhere('total','like','%'.$key.'%')->where('status','=',5)
                ->orwhere('order_date','like','%'.$key.'%')->where('status','=',5)
                ->get();
            return view('admin.order.index',compact(['orders','key','status']));
        }
    }

    public function getProcessing()
    {
        $orders = Order::where('status','=',1)->paginate(5);
        $status = 'B';
        return view('admin.order.index',compact(['orders','status']));
    }

    public function processing(Request $request, $id)
    {
//        $id = $request->id;
        $shipper_id = $request->shipper_id;
        $order = Order::where('id','=',$id)
            ->update(['status'=>2,'shipper_id'=>$shipper_id]);
        return redirect()->back();

    }

    public function getExportOrder()
    {
        $orders = Order::where('status','=',2)->paginate(5);
        $status = 'C';
        return view('admin.order.index',compact(['orders','status']));
    }

    public function exportOrder(Request $request, $id)
    {
        $order = Order::where('id','=',$id)
            ->update(['status'=>3]);
        return redirect()->back();

    }

    public function getShippedOrder()
    {
        $orders = Order::where('status','=',3)/*->where('shipper_id','=',auth()->user()->id)*/->paginate(5);
        $status = 'D';
        return view('admin.order.index',compact(['orders','status']));
    }

    public function shippedOrder(Request $request, $id)
    {
        $order = Order::where('id','=',$id)
            ->update(['status'=>4,'order_delivery_date'=>date('Y-m-d')]);
        return redirect()->back();

    }

    public function cancel($id)
    {
        $order = Order::where('id','=',$id)
            ->update(['status'=>5]);
        return redirect()->back()->with('success','Cancel order successfully!');
    }

    public function getCancel()
    {
        $orders = Order::where('status','=',5)->paginate(5);
        $status = 'E';
        return view('admin.order.index',compact(['orders','status']));
    }

    public function restoreOrders($id)
    {
        $order = Order::where('id','=',$id)
            ->update(['status'=>1]);
        return redirect()->back();
    }
}
