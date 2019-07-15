<div id="header" class="container-fluid">
    <div class="navbar navbar-expand-md navbar-light navbar-laravel row">
        <p class="navbar-nav mr-auto">infor@bookstore.com | 0839158372</p>
        <a class="navbar-nav ml-auto" href="#" style="color: #000000"><i class="fas fa-blog fa-2x"></i></a>
        <a class="navbar-nav ml-2" href="#" style="color: #000000"><i class="fab fa-facebook fa-2x"></i></a>
    </div>

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel row content_header_two">
        <div class="container-fluid">
            <a class="navbar-brand font-weight-bold" href="{!! route('index') !!}" style="color: #fff;">CellPhone
                <img src="{{asset('image/logo-white.png')}}" width="250" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">


                <form action="" method="get" class="navbar-nav col-md-7 my-2 my-lg-0 ml-auto">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="key" placeholder="Search for...">
                        <span class="input-group-btn">
                                <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
                            </span>
                    </div>
                </form>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto login">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item mr-1">
                            <a class="nav-link btn btn-outline-light" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link btn btn-outline-light" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle no-hover" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre  style="color:#fff;">
                                <style>
                                    .image{
                                        overflow: hidden;
                                        float: left;
                                        margin-right: 10px;
                                        margin-bottom: 0;
                                        margin-top: 0;
                                    }
                                    .image img{
                                        border-radius: 50%;
                                    }
                                </style>
                                <p class="image"><img src="https://salt.tikicdn.com/desktop/img/avatar.png?v=3" height="25" width="25" alt=""></p>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="">
                                    Cập nhật thông tin
                                </a>
                                <a class="dropdown-item" href="">
                                    Quản lý đơn hàng
                                </a>
                                <a class="dropdown-item" href="">
                                    Đổi mật khẩu
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Đăng xuất') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    <li class="nav-item">
                        <a class="nav-link no-hover" href="{!! route('getCart') !!}">
                            <i class="fas fa-shopping-cart" style="color: #ffffff"></i>
                            <sub class="total">{!! \Cart::getContent()->count() !!}</sub>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    {{--        <nav class="navbar navbar-expand-md navbar-light navbar-laravel row content_header_three">--}}
    <ul class="nav row content_header_three justify-content-center">
        <li class="nav-item"><a href="{!! route('index') !!}" class="nav-link">Trang chủ</a></li>
        <li class="nav-item"><a href="#intro" class="nav-link">Giới thiệu</a></li>
        <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sản phẩm</a>
            <div class="dropdown-menu">
                @foreach($categories as $category)
                    @if(count($category->products)>0)
                    <a class="dropdown-item" href="#">{!! $category->name !!}</a>
                    @endif
                @endforeach
            </div>
        </li>
        <li class="nav-item"><a href="#contact" class="nav-link">Liên hệ</a></li>
    </ul>
    {{--        </nav>--}}
</div>