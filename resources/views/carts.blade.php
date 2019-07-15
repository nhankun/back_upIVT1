@extends('layouts.master')
@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-7">
            <div class="row cart-content-status">
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
            </div>

            @if($cart_contents->count()==0)
                <div class="row cart-content-status">
                    <p>không có sản phẩm nào trong giỏi hàng <a href="{!! route('index') !!}" class="btn btn-danger">quay lại trang chủ</a></p>
                </div>
            @else
                <div class="row cart-content-top">
                    <p>GIỎ HÀNG CỦA BẠN<span>({!! $cart_contents->count() !!} sản phẩm)</span></p>
                    <a href="/homepages" class="ml-auto">Mua thêm sản phẩm khác</a>
                </div>
                @foreach($cart_contents as $cart)
                    <div class="row cart-content-cart mb-2 border pt-2 pb-2">
                        <div class="col-md-2"><img src="{!! asset('storage/'.$cart['attributes']->img) !!}" class="img-thumbnail" width="100" alt=""></div>
                        <div class="col-md-4"><a href="{!! route('productDetail',$cart->id) !!}">{!! $cart->name !!}</a></div>
                        <div class="col-md-2">{!! number_format($cart->price) !!} đ</div>
                        <div class="col-md-3 m-0" id="qty">
                            <style>
                                #qty{
                                    width: 100%;
                                    margin: 0px 0px;
                                }
                                #qty P{
                                    margin-bottom: 20px;
                                }
                                #qty input{
                                    width: 50px;
                                    text-align: center;
                                    height: 35px;
                                }
                                #qty button{
                                    background-color: #ffffff;
                                    border: none;
                                }
                                #qty button i{
                                    font-size: 20px;
                                }
                                #qty p
                                {
                                    display: inline-table;
                                }
                            </style>

                            <button type="button" id="reduction-{!! $cart->id !!}"><i class="far fa-minus-square"></i></button>
                            @csrf
                            <input type="hidden" name ="id_product-{!! $cart->id !!}" value="{!! $cart->id !!}">
                            <input id="quaty-{!! $cart->id !!}" type="text" name="qty-{!! $cart->id !!}" value="{!! $cart->quantity !!}" step="1" min="1" max="5" autocomplete="off">
                            <button type="button" id="increase-{!! $cart->id !!}"><i class="far fa-plus-square"></i></button>

                            <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    var max = parseInt( $("#quaty-{!! $cart->id !!}").attr("max"));
                                    var min = parseInt($("#quaty-{!! $cart->id !!}").attr("min"));
                                    $("#reduction-{!! $cart->id !!}").click(function(){
                                        var qty = parseInt($("#quaty-{!! $cart->id !!}").val());
                                        if(qty===1){
                                            $("#quaty-{!! $cart->id !!}").val(1);
                                            alert("Số lượng phải lớn hơn hoặc bằng 1");
                                        }
                                        else {
                                            $("#quaty-{!! $cart->id !!}").val(qty-1);
                                            var id = $('input[name="id_product-{!! $cart->id !!}"]').val();
                                            var token= $('input[name="_token"]').val();
                                            var qtys = $('input[name="qty-{!! $cart->id !!}"]').val();
                                            $.ajax({
                                                url:"{!! route('updateCart') !!}",
                                                type:"post",
                                                cahe:false,
                                                data:{"_token":token,"id":id,"quantity":qtys},
                                                success:function(data){
                                                    if(data==1){
                                                        location.reload();

                                                    }
                                                }
                                            });
                                        }
                                    });
                                    $("#increase-{!! $cart->id !!}").click(function(){
                                        var qty = parseInt( $("#quaty-{!! $cart->id !!}").val());
                                        if(qty===5){
                                            $("#quaty-{!! $cart->id !!}").val(5);
                                            alert("Số lượng phải nhỏ hơn hoặc bằng 5");
                                        }
                                        else{
                                            $("#quaty-{!! $cart->id !!}").val(qty+1);
                                            var id = $('input[name="id_product-{!! $cart->id !!}"]').val();
                                            var token= $('input[name="_token"]').val();
                                            var qtys = $('input[name="qty-{!! $cart->id !!}"]').val();
                                            $.ajax({
                                                url:"{!! route('updateCart') !!}",
                                                type:"post",
                                                cahe:false,
                                                data:{"_token":token,"id":id,"quantity":qtys},
                                                success:function(data){
                                                    if(data==1){
                                                        location.reload();

                                                    }
                                                }
                                            });
                                        }
                                    });
                                });
                            </script>


                        </div>
                        <div class="col-md-1"><a href="{!! route('removeCart',$cart->id) !!}"><i class="fas fa-trash"></i></a></div>
                    </div>
                @endforeach
                <div class="row cart-content-total border mb-2">
                    <div class="title p-2"><h5>Thông tin đơn hàng</h5></div>
                    <div class="container">
                        <p >Tổng tiền: <span>{!! number_format($total) !!} đ</span></p>
                    </div>
                </div>
                <div class="row cart-content-submit">
                    <a href="{!! route('orderConfirm') !!}" class="btn btn-danger">Xác nhận đơn hàng</a>
                </div>
            @endif
        </div>
    </div>
@endsection