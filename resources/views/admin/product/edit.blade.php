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
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="#"><i class="fa fa-tablet"></i> Product</a></li>
            <li class="active">Edit</li>
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

                <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <div class="col-md-4 @error('name') has-error @enderror">
                            <label for="name">Name:</label>
                            <input type="text" @error('name') id="inputError" @enderror class="form-control" name="name" required id="name" value="{{$product->name}}">
                            @error('name')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-4 @error('category_id') has-error @enderror">
                            <label for="category_id">Category:</label>
                            <select name="category_id" @error('category_id') id="inputError" @enderror id="category_id" class="form-control" required>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                        @if($product->category_id == $category->id)
                                            selected
                                        @endif
                                    >{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-4 @error('price') has-error @enderror">
                            <label for="price">Price:</label>
                            <input type="number" @error('price') id="inputError" @enderror class="form-control" name="price" required id="price" value="{{$product->price}}">
                            @error('price')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4 @error('quantily') has-error @enderror">
                            <label for="quantily">Quantily:</label>
                            <input type="number" @error('quantily') id="inputError" @enderror class="form-control" name="quantily" required id="quantily" value="{{$product->quantily}}">
                            @error('quantily')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-4 @error('screen') has-error @enderror">
                            <label for="screen">Screen:</label>
                            <input type="text" @error('screen') id="inputError" @enderror class="form-control" name="screen" id="screen" value="{{$product->product_Detail->screen}}">
                            @error('screen')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-4 @error('os') has-error @enderror">
                            <label for="os">OS:</label>
                            <input type="text" @error('os') id="inputError" @enderror class="form-control" name="os" id="os" value="{{$product->product_Detail->os}}">
                            @error('os')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>

                    {{--details--}}

                    <div class="form-group row">
                        <div class="col-md-4 @error('camera') has-error @enderror">
                            <label for="camera">Camera:</label>
                            <input type="text" @error('camera') id="inputError" @enderror class="form-control" name="camera" id="camera" value="{{$product->product_Detail->camera}}">
                            @error('camera')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-4 @error('font_camera') has-error @enderror">
                            <label for="font_camera">Font Camera:</label>
                            <input type="text" @error('font_camera') id="inputError" @enderror class="form-control" name="font_camera" id="font_camera" value="{{$product->product_Detail->font_camera}}">
                            @error('font_camera')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-4 @error('cpu') has-error @enderror">
                            <label for="cpu">Cpu:</label>
                            <input type="text" @error('cpu') id="inputError" @enderror class="form-control" name="cpu" id="cpu" value="{{$product->product_Detail->cpu}}">
                            @error('cpu')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4 @error('gpu') has-error @enderror">
                            <label for="gpu">Gpu:</label>
                            <input type="text" @error('gpu') id="inputError" @enderror class="form-control" name="gpu" id="gpu" value="{{$product->product_Detail->gpu}}">
                            @error('gpu')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-4 @error('ram') has-error @enderror">
                            <label for="ram">Ram:</label>
                            <input type="text" @error('ram') id="inputError" @enderror class="form-control" name="ram" id="ram" value="{{$product->product_Detail->ram}}">
                            @error('ram')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-4 @error('memory') has-error @enderror">
                            <label for="memory">Memory:</label>
                            <input type="text" @error('memory') id="inputError" @enderror class="form-control" name="memory" id="memory" value="{{$product->product_Detail->memory}}">
                            @error('memory')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4 @error('sim') has-error @enderror">
                            <label for="sim">Sim:</label>
                            <input type="text" @error('sim') id="inputError" @enderror class="form-control" name="sim" id="sim" value="{{$product->product_Detail->sim}}">
                            @error('sim')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-4 @error('Battery_capacity') has-error @enderror">
                            <label for="Battery_capacity">Battery capacity:</label>
                            <input type="text" @error('Battery_capacity') id="inputError" @enderror class="form-control" name="Battery_capacity" id="Battery_capacity" value="{{$product->product_Detail->Battery_capacity}}">
                            @error('Battery_capacity')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-4 @error('describe') has-error @enderror">
                            <label for="describe">Describe:</label>
                            <textarea @error('describe') id="inputError" @enderror class="form-control" name="describe" id="describe">{{$product->describe}}</textarea>
                            @error('describe')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4 @error('images_up') has-error @enderror">
                            <img id="blah" src="{{ count($product->images)>0 ? asset('storage/'.$product->images[0]->url) : ''}}" alt="your image" width="100" height="100" style="display: block"/>
                            <label for="images">Images:</label>
                            <input type="file" @error('images_up') id="inputError" @enderror class="form-control" name="images_up[]" id="images" multiple
                                   onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
                            >
                            @error('images_up')
                            <span class="help-block"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection
