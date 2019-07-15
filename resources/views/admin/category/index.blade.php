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
            Category
            <small>list</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="#"><i class="fa fa-list"></i> Category</a></li>
            <li class="active">List</li>
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
                            <a href="{{route('category.create')}}" class="btn btn-primary create">Create</a>
                            <span class="" style="font-size: 1em;margin-left: 2em;">filters:</span>
                            <span> <a href="">id-desc</a></span>
                            </div>
                            <div class="col-md-4">
                                <form action="{{route('category.search')}}" method="get">
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
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary">Edit</a> |
                                    <form action="{{route('category.destroy',$category->id)}}" method="post" style="display: inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            @if(!count($categories)>0)
                                <td colspan="3"><h2>No categories</h2></td>
                            @endif
                        </tr>

                        </tbody>
                    </table>
                    @if(!isset($key))
                        {{$categories->links()}}
                    @endif
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection
