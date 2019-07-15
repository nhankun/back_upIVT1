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
            User
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="#"><i class="fa fa-user"></i> User</a></li>
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
{{--                @if ($errors->any())--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        <ul>--}}
{{--                            @foreach ($errors->all() as $error)--}}
{{--                                <li>{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                @endif--}}

                <form action="{{route('user.store')}}" method="post" >
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12 @error('name') has-error @enderror">
                            <label for="name">Name <sup class="title-danger">*</sup>:</label>
                            <input type="text" @error('name') id="inputError" @enderror class="form-control" name="name" value="{!! old('name') !!}" required id="name">
                            @error('name')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 @error('email') has-error @enderror">
                            <label for="email">Email <sup class="title-danger">*</sup>:</label>
                            <input type="email" @error('email') id="inputError" @enderror class="form-control" name="email" value="{!! old('email') !!}" required id="email">
                            @error('email')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 @error('password') has-error @enderror">
                            <label for="password">Password <sup class="title-danger">*</sup>:</label>
                            <input type="password" @error('password') id="inputError" @enderror class="form-control" name="password" value="{!! old('password') !!}" required id="password">
                            @error('password')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 @error('tel') has-error @enderror">
                            <label for="tel">Tel <sup class="title-danger">*</sup>:</label>
                            <input type="text" @error('tel') id="inputError" @enderror class="form-control" name="tel" value="{!! old('tel') !!}" required id="tel">
                            @error('tel')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 @error('address') has-error @enderror">
                            <label for="address">Address <sup class="title-danger">*</sup>:</label>
                            <input type="text" @error('address') id="inputError" @enderror class="form-control" name="address" value="{!! old('address') !!}" required id="address">
                            @error('address')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 @error('active') has-error @enderror">
                            <label for="active">Active <sup class="title-danger">*</sup>:</label>
                            <select name="active" @error('active') id="inputError" @enderror id="active" class="form-control" required>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                            @error('active')
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
