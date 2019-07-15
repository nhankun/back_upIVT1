@extends('layouts.master')
@section('sidebar')
    @include('layouts.sideBar')
@endsection

@section('content')

    <div class="row mb-5">
        <div class="col-md-12">
            <link rel="stylesheet" href="{{asset('front_end/css/cardslider.css')}}">
            <div id="productnew" class="carousel1 slide" data-ride="carousel">
                <div class="container-fluid">
                    <div class="row mb-1 p-0" style="border-bottom: 2px solid #7d7d7d">
                        <div class="col-2 m-0 p-0">
                            <h6 class="m-0" style="background-color: #ff1d15;color: #fff;width: 100%;height: 40px;line-height:40px;text-align: center">SẢN PHẨM MỚI</h6>
                        </div>
                        <div class="col-10 text-right mb-2">
                            <a class="btn btn-outline-secondary prev1" href="#productnew" title="go back"><i class="fa fa-lg fa-chevron-left"></i></a>
                            <a class="btn btn-outline-secondary next1" href="#productnew" title="more"><i class="fa fa-lg fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- The slideshow -->
                <div class="container-fluid carousel-inner no-padding">

                    <link rel="stylesheet" href="{{asset('front_end/css/product_grid4.css')}}">

                    <div class="carousel-item active">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-xs-3 col-sm-3 col-md-2">
                                <div class="product-grid4">
                                    <div class="product-image4">
                                        <a href="#">
                                            <img class="pic-1" src="{!! asset('storage/'.$product->images[0]->url) !!}">
                                            <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo5/images/img-2.jpg">
                                        </a>
                                        <ul class="social">
                                            <li><a href="{!! route('productDetail', $product->id) !!}" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                            <li>
                                                <a href="#" data-tip="Add to Cart"
                                                   onclick="event.preventDefault();
                                                           document.getElementById('addCart-form-{{$product->id}}').submit();"
                                                >
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                                <form action="{!! route('addCart',$product->id) !!}" id="addCart-form-{{$product->id}}" method="post">
                                                    @csrf
                                                    {{--                                            <button type="submit" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></button>--}}
                                                </form>
                                            </li>
                                        </ul>
{{--                                        <span class="product-new-label">New</span>--}}
                                        <span class="product-discount-label">New</span>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title"><a href="#">{!! $product->name !!}</a></h3>
                                        <div class="price">
                                            {!! number_format($product->price) !!} đ
{{--                                            <span>$16.00</span>--}}
                                        </div>
                                        {{--                                        <a class="add-to-cart" href="">ADD TO CART</a>--}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-xs-3 col-sm-3 col-md-2">
                                    <div class="product-grid4">
                                        <div class="product-image4">
                                            <a href="#">
                                                <img class="pic-1" src="{!! asset('storage/'.$product->images[0]->url) !!}">
                                                <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo5/images/img-2.jpg">
                                            </a>
                                            <ul class="social">
                                                <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                                <li>
                                                    <a href="#" data-tip="Add to Cart"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('addCart-form-{{$product->id}}').submit();"
                                                    >
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                    <form action="{!! route('addCart',$product->id) !!}" id="addCart-form-{{$product->id}}" method="post">
                                                        @csrf
                                                        {{--                                            <button type="submit" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></button>--}}
                                                    </form>
                                                </li>
                                            </ul>
{{--                                            <span class="product-new-label">New</span>--}}
                                            <span class="product-discount-label">New</span>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title"><a href="#">{!! $product->name !!}</a></h3>
                                            <div class="price">
                                                {!! number_format($product->price) !!} đ
                                                {{--                                            <span>$16.00</span>--}}
                                            </div>
                                            {{--                                        <a class="add-to-cart" href="">ADD TO CART</a>--}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-2">
                                <div class="product-grid4">
                                    <div class="product-image4">
                                        <a href="#">
                                            <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo5/images/img-1.jpg">
                                            <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo5/images/img-2.jpg">
                                        </a>
                                        <ul class="social">
                                            <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                            <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
{{--                                        <span class="product-new-label"></span>--}}
                                        <span class="product-discount-label">New</span>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title"><a href="#">Women's Black Top</a></h3>
                                        <div class="price">
                                            $14.40
                                            <span>$16.00</span>
                                        </div>
                                        {{--                                        <a class="add-to-cart" href="">ADD TO CART</a>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-2">
                                <div class="product-grid4">
                                    <div class="product-image4">
                                        <a href="#">
                                            <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo5/images/img-3.jpg">
                                            <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo5/images/img-4.jpg">
                                        </a>
                                        <ul class="social">
                                            <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                            <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                        <span class="product-discount-label">NEW</span>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title"><a href="#">Men's Blue Shirt</a></h3>
                                        <div class="price">
                                            $17.60
                                            <span>$20.00</span>
                                        </div>
                                        {{--                                        <a class="add-to-cart" href="">ADD TO CART</a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                (function($){
                    "use strict";
                    $('.next1').click(function(){ $('.carousel1').carousel('next');return false; });
                    $('.prev1').click(function(){ $('.carousel1').carousel('prev');return false; });
                })
                (jQuery);
            </script>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="container-fluid">
                <div class="row mb-1 p-0" style="border-bottom: 2px solid #7d7d7d">
                    <div class="col-2 m-0 p-0">
                        <h6 class="m-0" style="background-color: #ff1d15;color: #fff;width: 100%;height: 40px;line-height:40px;text-align: center">SẢN PHẨM BÁN CHẠY</h6>
                    </div>
                    <div class="col-10 text-right mb-4">
                        <a href="">Xem thêm </a>
                    </div>
                </div>
            </div>
            <div class="container-fluid pr-0 pl-0">
                <div class="row">
                    @foreach($product_hots as $product)
                        <div class="col-md-2">
                        <div class="product-grid4">
                            <div class="product-image4">
                                <a href="#">
                                    <img class="pic-1" src="{!! asset('storage/'.$product->images[0]->url) !!}" height="811">
                                    @if(isset($product->images[1]->url))
                                        <img class="pic-2" src="{!! asset('storage/'.$product->images[1]->url) !!}" height="811">
                                    @else
                                        <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo5/images/img-2.jpg">
                                    @endif
                                </a>
                                <ul class="social">
                                    <li><a href="{!! route('productDetail',$product->id) !!}" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                    <li>
                                        <a href="#" data-tip="Add to Cart"
                                           onclick="event.preventDefault();
                                                     document.getElementById('addCart-form-{{$product->id}}').submit();"
                                        >
                                            <i class="fa fa-shopping-cart"></i>
                                        </a>
                                        <form action="{!! route('addCart',$product->id) !!}" id="addCart-form-{{$product->id}}" method="post">
                                            @csrf
{{--                                            <button type="submit" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></button>--}}
                                        </form>
                                    </li>
                                </ul>
{{--                                <span class="product-new-label">New</span>--}}
{{--                                <span class="product-discount-label">-10%</span>--}}
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="#">{!! $product->name !!}</a></h3>
                                <div class="price">
                                    {!! number_format($product->price) !!} đ
{{--                                    <span>$16.00</span>--}}
                                </div>
                                {{--                                        <a class="add-to-cart" href="">ADD TO CART</a>--}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection