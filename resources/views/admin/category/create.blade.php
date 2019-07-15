@extends('admin.layouts.master')
@section('content')
    <style>
        .content{
            background: #ffffff;
            margin-top: 1em;
            width: 98%;
        }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Category
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="#"><i class="fa fa-list"></i> Category</a></li>
            <li class="active">Create</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
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
{{--                    @if ($errors->any())--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <ul>--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <li>{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}

                    <form action="{{route('category.store')}}" method="post" >
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12 @error('name') has-error @enderror">
                                <label for="name">Name category: <sup class="title-danger">*</sup></label>
                            <input type="text" class="form-control" value="{!! old('name') !!}" @error('name') id="inputError" @enderror name="name" value="{{ old('name') }}" required id="name">
                                @error('name')
                                    <span class="help-block"><strong>{{$message}}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
            <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection
