@extends('admin.layouts.master')
@section('content')
    <style>
        .content{
            background: #ffffff;
            margin-top: 1em;
            width: 98%;
        }
        .card{
            padding: 1em;
        }
        .card .create{
            margin-bottom: 0.8em;
            display: inline-table;
        }
        .card .search{
            margin-bottom: 0.8em;
            display: inline-table;
        }
        .card table, th, td{
            border: 1px solid #3c8dbc;
        }
        .card th{
            text-align: center;
            background-color: #3c8dbc;
            border: none;
            color: #fff;
        }
        .status .pending
        {
            display: inline-table;
            width: 100px;
            padding: 6px;
            background-color: #ff2634;
            color: #fff;
            text-align: center;
            font-weight: bold
        }
        .order_info ul li{
            list-style-type: none;
        }
        .order_info ul li p{
            width: 110px;
            display: inline-table;
            text-align: end;
            margin-right:2em;
            color: #000000;
            font-weight: bold;
        }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Order
            <small>Detail</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Order</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <h2 style="margin-top: 0;text-align: center;">ORDER DETAILS #{!! $order->id !!}</h2>
            <hr style="margin: 0;">
        </div>
        <div class="row">
            <div class=" card">

                <div class="container-fluid">

                    <div class="col-md-6 order_info">
                        <ul>
                            <li><p>Order id:</p> <span>#{!! $order->id !!}</span></li>
                            <li><p>Name customer:</p> <span>{!! $order->name !!}</span></li>
                            <li><p>telephone:</p><span>{!! $order->tel !!}</span></li>
                            <li><p>Address:</p><span>{!! $order->address !!}</span></li>
                        </ul>
                    </div>
                    <div class="col-md-6 order_info">
                        <ul>
                            <li><p>Total:</p> <span>{!! number_format($order->total) !!} đ</span></li>
                            <li><p>Order date:</p>  <span>{{ date('d/m/Y',strtotime($order->order_date))}}</span></li>
                            <li class="status">
                                <p>Status:</p>
                                    @if($order->status == 1)
                                        <span class="pending">PENDING</span>
                                    @elseif($order->status == 2)
                                        <span class="approved">APPROVED</span>
                                    @elseif($order->status == 3)
                                        <span class="shipping">SHIPPING</span>
                                    @elseif($order->status == 4)
                                        <span class="cancel">CANCEL</span>
                                    @endif
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>price</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->order_details as $order_detail)
                            <tr>
                                <td>{{$order_detail->id}}</td>
                                <td><img src="{!! asset('storage/'.$order_detail->product->images[0]->url) !!}" alt="" width="60"></td>
                                <td>{{$order_detail->product->name}}</td>
                                <td>{{ number_format($order_detail->price)}} đ</td>
                                <td>{{$order_detail->quantily}}</td>
                                <td>{{number_format($order_detail->total_detail)}} đ</td>
                            </tr>
                        @endforeach
                        <tr>
                            @if(!count($order->order_details)>0)
                                <td colspan="3"><h2>No order detail</h2></td>
                            @endif
                        </tr>

                        </tbody>
                    </table>
{{--                    {{$orders->links()}}--}}
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection
