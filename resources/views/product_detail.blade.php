@extends('layouts.master')
@section('content')
    <link rel="stylesheet" href="{!! asset('front_end/css/product_detail.css') !!}">
    <div class="row mt-4">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-5">
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
                <div class="col-md-7 single-right-left simpleCart_shelfItem">
                    <h3 id="name">{{$product->name}}</h3>
                    <p class="item_price"><span>{{number_format($product->price)}} đ</span>
                        <del></del>
                    </p>
                    <hr>
                    <div class="rating1">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        (12)
                    </div>
                    <hr>
                    <div id="qty">
                        <P>Số Lượng:</P>
                        <button type="button" id="reduction"><i class="far fa-minus-square"></i></button>
                        <input type="hidden" name ="id_product" value="{{$product->id}}">
                        @csrf
                        <input id="quaty" type="text" name="qty" value="1" step="1" min="1" max="5" autocomplete="off">
                        <button type="button" id="increase"><i class="far fa-plus-square"></i></button>
                        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                var max = parseInt( $("#quaty").attr("max"));
                                var min = parseInt($("#quaty").attr("min"));
                                $("#reduction").click(function(){

                                    var qty = parseInt($("#quaty").val());
                                    if(qty===1){
                                        $("#quaty").val(1);
                                    }
                                    else {
                                        $("#quaty").val(qty-1);

                                    }
                                });
                                $("#increase").click(function(){
                                    var qty = parseInt( $("#quaty").val());
                                    if(qty===5){
                                        $("#quaty").val(5);
                                    }
                                    else{
                                        $("#quaty").val(qty+1);
                                    }
                                });
                            });
                        </script>
                    </div>
                    <a id="add-cart" href="#" class="btn btn-outline-success"><i class="fas fa-cart-plus"></i> THÊM VÀO GIỎ HÀNG</a>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('#add-cart').click(function(){
                                var id = $('input[name="id_product"]').val();
                                var token= $('input[name="_token"]').val();
                                var qty = $('input[name="qty"]').val();
                                $.ajax({
                                    url:"{!! route('addcartOne') !!}",
                                    type:"POST",
                                    cahe:false,
                                    data:{"_token":token,"id":id,"quantity":qty},
                                    success:function(data){
                                        if(data==1){
                                            location.reload();
                                            alert("Thêm giỏi hàng thành công!");

                                        }
                                    }
                                });
                            });
                        });
                    </script>
                </div>
            </div>
            <div class="row mt-4 p-0 m-0" >
                <div class="">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home">Mô Tả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1">Bình Luận</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2">Đánh giá</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home" class="container tab-pane active"><br>
                            <h3>Mô Tả</h3>
                            {!! $product->describe !!}
                        </div>
                        <div id="menu1" class="container tab-pane fade"><br>
                            <h3>Menu 1</h3>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div id="menu2" class="container tab-pane fade"><br>
                            <h3>Menu 2</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="" style="background-color: #fafafa">
                <ul class="block-note-product">
                    <li>
                        <h5 class="text-center p-0 m-0">Thông số kỹ thuật</h5>
                    </li>
                    <li class="product-attribute">
                        <label>Màn hình: </label>
{{--                        <a href="" class="xem-chi-tiet">--}}
                            {{$product->product_Detail->screen}}
{{--                        </a>--}}
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
        </div>
    </div>
@endsection