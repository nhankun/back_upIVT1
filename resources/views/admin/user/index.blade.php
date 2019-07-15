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
        .card table, th, td{
            border: 1px solid #3c8dbc;
        }
        .card th{
            text-align: center;
            background-color: #3c8dbc;
            border: none;
            color: #fff;
        }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
            <small>list</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="#"><i class="fa fa-user"></i> User</a></li>
            <li class="active">list</li>
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
                            <a href="{{route('user.create')}}" class="btn btn-primary create">Create</a>
                        </div>
                        <div class="col-md-4">
                            <form action="{{route('user.search')}}" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="key" placeholder="Search for...">
                                    <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">Go!</button>
                                        </span>
                                </div><!-- /input-group -->
                            </form>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>Telephone</th>
                            <th>Address</th>
                            <th>User type</th>
                            <th>Active</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->tel}}</td>
                                <td>{{$user->address}}</td>
                                <td>
                                    @if($user->user_type == 0)
                                        Admin
                                    @elseif($user->user_type == 1)
                                        Customer
                                    @elseif($user->user_type == 2)
                                        Shipper
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    @if($user->active == 1)
                                        <i class="fa fa-check-circle" style="color: #7bd556"></i>
                                    @else
                                        <i class="fa fa-times" style="color: #d54c2f"></i>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary">Edit</a>

                                    @if(!$user->user_type == 0)
                                        |
                                        <form action="{{route('user.destroy',$user->id)}}" method="post" style="display: inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        |
                                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#myModal-{{$user->id}}">Decentralization</a>
                                        <!-- The Modal -->
                                        <div class="modal fade" id="myModal-{{$user->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">User decentralization: #{{$user->id}}</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <form action="{{route('user.decentralization',$user->id)}}" method="post">
                                                    @csrf
                                                    <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <select name="user_type" id="user_type" class="form-control">
                                                                    <option value="1" @if($user->user_type == 1) selected @endif>Customer</option>
                                                                    <option value="2" @if($user->user_type == 2) selected @endif>Shipped</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Xử lý</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Modal -->
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            @if(!count($users)>0)
                                <td colspan="7"><h2>No users</h2></td>
                            @endif
                        </tr>

                        </tbody>
                    </table>
                    @if(!isset($key))
                        {{$users->links()}}
                    @endif
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection
