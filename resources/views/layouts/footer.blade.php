<div id="footer" class="container-fluid">
    <div class="footer-content-one row">
        <div class="col-md-4">
            <h4 class="title" id="intro">About the company</h4>
            <p>CellPhone.com nhận đặt hàng trực tuyến và giao hàng tận nơi. KHÔNG hỗ trợ đặt mua và nhận hàng trực tiếp tại văn phòng cũng như tất cả Hệ Thống trên toàn quốc.</p>
        </div>
        <div class="col-md-2">
            <h4 class="title">Quick link</h4>
            <ul class="nav flex-column row">
                @foreach($categories->take(4) as $category)
                    @if(count($category->products)>0)
                        <li class="nav-item">
                            <a class="nav-link" href="#">{!! $category->name !!}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="col-md-3">

        </div>
        <div class="col-md-3">
            <h4 class="title" id="contact">LIÊN HỆ</h4>
            <ul class="nav flex-column row">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-map-marker-alt"></i> 21 Lê Duẩn Street Đà Nẵng, Việt Nam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-phone"></i> 083 9158 372</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-envelope"></i> hovannhan.php@gmail.com</a>
                </li>
            </ul>
            <ul class="nav justify-content-center row">
                <li class="nav-item">
                    <a href="https://www.facebook.com/nhanFieuzinthewind" class="nav-link p-0"><i class="fab fa-facebook fa-2x"></i>&nbsp;</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link  p-0"><i class="fab fa-twitter-square fa-2x"></i>&nbsp;</a>
                </li>
                <li class="nav-item">
                    <a href="https://github.com/Nhan10" class="nav-link  p-0"><i class="fab fa-github fa-2x"></i>&nbsp;</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link  p-0"><i class="fas fa-envelope fa-2x"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <p class="button-footer">Design by hovannhan.php@gmail.com and hungquytk@gmail.com</p>
        </div>
    </div>
</div>