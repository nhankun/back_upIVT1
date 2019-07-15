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
            padding: 6px;
            background-color: #ff2634;
            color: #fff;
            text-align: center;
            font-weight: bold
        }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Order
            @if($status == 'A')
                <small>list</small>
            @elseif($status == 'B')
                <small>Browse</small>
            @elseif($status == 'C')
                <small>Export</small>
            @elseif($status == 'D')
                <small>Shipped</small>
            @elseif($status == 'E')
                <small>Cancel</small>
            @endif
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href=""><i class="fa fa-shopping-cart"></i>Order</a></li>
            @if($status == 'A')
                <li  class="active"><a href="#">list</a></li>
            @elseif($status == 'B')
                <li  class="active"><a href="#">Browse</a></li>
            @elseif($status == 'C')
                <li  class="active"><a href="#">Export</a></li>
            @elseif($status == 'D')
                <li  class="active"><a href="#">Shipped</a></li>
            @elseif($status == 'E')
                <li  class="active"><a href="#">Cancel</a></li>
            @endif
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class=" card">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
{{--                            <a href="{{route('order.create')}}" class="btn btn-primary create">Create</a>--}}
                        </div>
                        <div class="col-md-4 search">
                            <form action="{{route('order.search')}}" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="key" placeholder="Search for..." required>
                                    <input type="hidden" name="status" value="{!! $status !!}">
                                    <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">Go!</button>
                                        </span>
                                </div><!-- /input-group -->
                            </form>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                        @if($status == 'A')
                            @include('admin.order.partials.list')
                        @elseif($status == 'B')
                            @include('admin.order.partials.browse')
                        @elseif($status == 'C')
                            @include('admin.order.partials.export')
                        @elseif($status == 'D')
                            @include('admin.order.partials.shipped')
                        @elseif($status == 'E')
                            @include('admin.order.partials.cancel')
                        @endif

                    @if(!isset($key))
                    {{$orders->links()}}
                    @endif
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection
