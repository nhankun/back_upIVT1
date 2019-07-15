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
            Product
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="#"><i class="fa fa-tablet"></i> Product</a></li>
            <li class="active">Create</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
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

                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-4 @error('name') has-error @enderror">
                            <label for="name">Name <sup class="title-danger">*</sup>:</label>
                            <input type="text" class="form-control" value="{!! old('name') !!}" @error('name') id="inputError" @enderror name="name" required id="name">
                            @error('name')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-4 @error('category_id') has-error @enderror">
                            <label for="category_id">Category <sup class="title-danger">*</sup>:</label>
                            <select name="category_id" @error('category_id') id="inputError" @enderror id="category_id" class="form-control" required>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-4 @error('price') has-error @enderror">
                            <label for="price">Price <sup class="title-danger">*</sup>:</label>
                            <input type="number" value="{!! old('price') !!}" @error('price') id="inputError" @enderror class="form-control" name="price" required id="price">
                            @error('price')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4 @error('quantily') has-error @enderror">
                            <label for="quantily">Quantily <sup class="title-danger">*</sup>:</label>
                            <input type="number" value="{!! old('quantily') !!}" @error('quantily') id="inputError" @enderror class="form-control" name="quantily" required id="quantily">
                            @error('quantily')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-4 @error('screen') has-error @enderror">
                            <label for="screen">Screen:</label>
                            <input type="text" value="{!! old('screen') !!}" @error('screen') id="inputError" @enderror class="form-control" name="screen" id="screen">
                            @error('screen')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-4 @error('os') has-error @enderror">
                            <label for="os">OS:</label>
                            <input type="text" value="{!! old('os') !!}" @error('os') id="inputError" @enderror class="form-control" name="os" id="os">
                            @error('os')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>

                    {{--details--}}

                    <div class="form-group row">
                        <div class="col-md-4 @error('camera') has-error @enderror">
                            <label for="camera">Camera:</label>
                            <input type="text" value="{!! old('camera') !!}" @error('camera') id="inputError" @enderror class="form-control" name="camera" id="camera">
                            @error('camera')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-4 @error('font_camera') has-error @enderror">
                            <label for="font_camera">Font Camera:</label>
                            <input type="text" value="{!! old('font_camera') !!}" @error('font_camera') id="inputError" @enderror class="form-control" name="font_camera" id="font_camera">
                            @error('font_camera')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>

                        <div class="col-md-4 @error('cpu') has-error @enderror">
                            <label for="cpu">Cpu:</label>
                            <input type="text" value="{!! old('cpu') !!}" @error('cpu') id="inputError" @enderror class="form-control" name="cpu" id="cpu">
                            @error('cpu')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4 @error('gpu') has-error @enderror">
                            <label for="gpu">Gpu:</label>
                            <input type="text" value="{!! old('gpu') !!}" @error('gpu') id="inputError" @enderror class="form-control" name="gpu" id="gpu">
                            @error('gpu')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-4 @error('ram') has-error @enderror">
                            <label for="ram">Ram:</label>
                            <input type="text" value="{!! old('ram') !!}" @error('ram') id="inputError" @enderror class="form-control" name="ram" id="ram">
                            @error('ram')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-4 @error('memory') has-error @enderror">
                            <label for="memory">Memory:</label>
                            <input type="text" value="{!! old('memory') !!}" @error('memory') id="inputError" @enderror class="form-control" name="memory" id="memory">
                            @error('memory')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4 @error('sim') has-error @enderror">
                            <label for="sim">Sim:</label>
                            <input type="text" value="{!! old('sim') !!}" @error('sim') id="inputError" @enderror class="form-control" name="sim" id="sim">
                            @error('sim')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-4 @error('Battery_capacity') has-error @enderror">
                            <label for="Battery_capacity">Battery capacity:</label>
                            <input type="text" value="{!! old('Battery_capacity') !!}" @error('Battery_capacity') id="inputError" @enderror class="form-control" name="Battery_capacity" id="Battery_capacity">
                            @error('Battery_capacity')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-4 @error('describe') has-error @enderror">
                            <label for="describe">Describe:</label>
                            <textarea @error('describe') id="inputError" @enderror class="form-control" name="describe" id="describe">{!! old('describe') !!}</textarea>
                            @error('describe')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 @error('images_up') has-error @enderror">
                            <img id="blah" alt="your image" width="100" height="100" style="display: block"/>
                            <label for="images">Images <sup class="title-danger">*</sup>:</label>
                            <input type="file" @error('images_up') id="inputError" @enderror class="form-control" name="images_up[]" id="images" multiple
                                   onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
                            >
                            @error('images_up')
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
