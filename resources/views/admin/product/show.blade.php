@extends('admin.layouts.master')
@section('content')
    <style>
        .content {
            background: #ffffff;
            margin-top: 1em;
            width: 98%;
        }

        #name {
            color: #333;
            font-weight: 700;
            font-size: 26px;
            text-transform: uppercase;
            font-family: 'Roboto', sans-serif !important;
        }

        .item_price {
            color: #575757;
            font-size: 36px;
            font-weight: 700;
            font-family: 'Roboto', sans-serif !important;
            margin: 0;
            padding: 0;
        }

        .rating1 i {
            color: #fbff00;
            margin-bottom: 0.3em;
        }

        #qty {
            font-size: 0.9em;
            font-weight: bold;
            cursor: pointer;
            color: #4f4f4f;
            position: relative;
            padding: 5px 5px 5px 40px;
            margin-bottom: 10px;
            border-radius: 2px;
            background-color: #f8f8f8;
            border: solid 1px #eaeaea;
        }

        #qty span {
            padding-right: 1em;
        }
    </style>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Product
            <small>Show</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="#"><i class="fa fa-tablet"></i> Product</a></li>
            <li class="active">Show</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="container-fluid">
            <div class="card mb-4 row" style="padding: 1em 0;">
                <div class="container-fluid" style="padding: 0 0.5em">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-3" style="padding-right: 0;">
                                    <ul class="list-unstyled">
                                        @if(count($product->images)>0)
                                            @foreach($product->images as $image)
                                                <li><img id="imgClick" src="{{asset('storage/'.$image->url)}}"
                                                         width="120" alt="..." class="img-thumbnail mb-1"></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="col-md-9" style="padding: 0 0.5em">
                                    <img id="imgShow" src="{{asset('storage/'.$product->images[0]->url)}}" width="300"
                                         alt="..." class="img-thumbnail">
                                </div>
                                <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
                                <script type="text/javascript"
                                        src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
                                <script type="text/javascript"
                                        src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $('.list-unstyled img').click(function (e) {
                                            e.preventDefault();
                                            $('#imgShow').attr("src", $(this).attr("src"));

                                            $('#imgShow').ezPlus();
                                        });
                                        $('#imgShow').ezPlus();
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="col-md-5 single-right-left simpleCart_shelfItem">
                            <h3 id="name">{{$product->name}}</h3>
                            <p class="item_price"><span>{{number_format($product->price)}} đ</span>
                                <del></del>
                            </p>
                            <hr>
                            <div class="rating1">
                                {{--                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>--}}
                                {{--                                (12)--}}
                                <p id="qty"><span style="color: #ff7e57;">Category: </span> {{$product->category->name}}
                                </p>
                            </div>
                            <hr>
                            <p class="" id="qty"><span>Quantily: </span>{{$product->quantily}}</p>
                        </div>

                        <div class="col-md-3">
                            <style>
                                .block-note-product {
                                    list-style-type: none;
                                    margin: 0;
                                    padding: 0;
                                    width: 100%;
                                }

                                .block-note-product li {
                                    padding: 1em 1em;
                                    border-bottom: 1px solid #eff0f5;
                                    width: 100%;
                                }

                                .block-note-product li label {
                                    color: #838282;
                                }

                                .block-note-product li .xem-chi-tiet {
                                    color: #000000;
                                    text-decoration: none;
                                }

                                .banner {
                                    margin: 0;
                                    padding: 0;
                                    width: 100%;
                                }

                                .banner img {
                                    margin: 0.4em 0;
                                    padding: 0;
                                    width: 100%;
                                }
                            </style>
                            <div class="container-fluid">
                                <div class="row" style="background-color: #fafafa">
                                    <ul class="block-note-product">
                                        <li class="product-attribute">
                                            <label>Màn hình: </label>
                                            <a href="" class="xem-chi-tiet">
                                                {{$product->product_Detail->screen}}
                                            </a>
                                        </li>
                                        <li><label>Camera trước: </label> {{$product->product_Detail->font_camera}}</li>
                                        <li><label>Camera sau: </label>
                                            {{$product->product_Detail->camera}}
                                        </li>
                                        <li><label>RAM: </label>
                                            {{$product->product_Detail->ram}}
                                        </li>
                                        <li><label>Bộ nhớ trong: </label>
                                            {{$product->product_Detail->memory}}
                                        </li>
                                        <li><label>CPU: </label>
                                            {{$product->product_Detail->cpu}}
                                        </li>
                                        <li><label>GPU: </label>
                                            {{$product->product_Detail->gpu}}
                                        </li>
                                        <li><label>Dung lượng pin: </label>
                                            {{$product->product_Detail->Battery_capacity}}
                                        </li>
                                        <li><label>Hệ điều hành: </label>
                                            {{$product->product_Detail->os}}
                                        </li>
                                        <li><label>Thẻ SIM: </label>
                                            {{$product->product_Detail->sim}}
                                        </li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="banner">
                                        <img src="{{asset('image/slide1.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4 row" style="padding: 1em 0;">
                <style>
                    pre, code {
                        font-family: "Times New Roman";
                        font-size: 17px;
                    }
                    pre {
                        overflow: auto;
                        background-color: #ffffff;
                    }
                    pre > code {
                        display: block;
                        padding: 1rem;
                        word-wrap: normal;
                    }
                    figcaption{
                        font-size: 19px;
                        font-weight: bold;
                        cursor: pointer;
                    }
                </style>
                <figure>
                    <figcaption>Mô tả</figcaption>
                    <pre>
                        <code>{{$product->describe}}</code>
                    </pre>
                </figure>
            </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection
