@extends('layouts.master')
@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-7">
            <div class="row cart-content-top">
                <p class="font-weight-bolder">THÔNG TIN ĐƠN HÀNG <span>({!! $cart_contents->count() !!} sản phẩm)</span></p>
            </div>
            @foreach($cart_contents as $cart)
                <div class="row cart-content-cart mb-2 border pt-2 pb-2">
                    <div class="col-md-2"><img src="{!! asset('storage/'.$cart['attributes']->img) !!}" class="img-thumbnail" width="100" alt=""></div>
                    <div class="col-md-6"><a href="">{!! $cart->name !!}</a></div>
                    <div class="col-md-2">{!! number_format($cart->price) !!} đ</div>
                    <div class="col-md-2 m-0" id="qty">
                        <style>
                            #qty{
                                width: 100%;
                                margin: 0px 0px;
                            }
                            #qty input{
                                width: 50px;
                                text-align: center;
                                height: 35px;
                            }
                        </style>
                        <input type="hidden" name ="id_product" value="">
                        <input id="quaty" type="text" name="qty" value="{!! $cart->quantity !!}" step="1" min="1" max="5" autocomplete="off" disabled>
                    </div>
                </div>
            @endforeach
            <div class="row cart-content-total border mb-2 justify-content-center">
                <div class="col-md-4"><p class="font-weight-bold">Tổng tiền: <span class="ml-auto">{!! number_format($total) !!} đ</span></p></div>
            </div>
            <form action="{!! route('orderPay') !!}" method="post">
                @csrf
                <div class="row cart-content-inforcustomer border mb-2">
                    <div class="title col-12">
                        <p class="font-weight-bolder">THÔNG TIN GIAO HÀNG</p>
                    </div>
                    <div class="container">
                        <div class="form-group">
                            <label for="usr">Họ tên <sup class="title-danger">*</sup>:</label>
                            <input type="text" class="form-control" name="name" value="{!! $user->name ? $user->name : old('name') !!}" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email <sup class="title-danger">*</sup>:</label>
                            <input type="email" class="form-control" name="email" value="{!! $user->email ? $user->email :  old('email') !!}" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Số điện thoại <sup class="title-danger">*</sup>:</label>
                            <input type="text" class="form-control" name="tel" value="{!! $user->tel ? $user->tel : old('tel') !!}" id="tel" required>
                        </div>
                        <div class="form-group">
                            <label for="usr">Địa chỉ giao hàng <sup class="title-danger">*</sup>:</label>
                            <input type="text" class="form-control" name="address" value="{!! $user->address ? $user->address :  old('address') !!}" id="address" required>
                        </div>
                    </div>
                </div>
                <div class="row cart-content-submit">
                    <button type="submit" class="btn btn-danger">ĐẶT HÀNG</button>
                </div>
            </form>
        </div>
    </div>
@endsection