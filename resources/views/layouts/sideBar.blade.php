<div class="side_bar">
    <div class="row">
        <div class="col-md-8">
            <div id="slide_top" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#slide_top" data-slide-to="0" class="active"></li>
                    <li data-target="#slide_top" data-slide-to="1"></li>
                    <li data-target="#slide_top" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('storage/images/slide1.png')}}" width="100%" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('storage/images/slide2.png')}}" width="100%" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('storage/images/slide3.png')}}" width="100%" alt="">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#slide_top" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#slide_top" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>
        </div>
        <div class="col-md-4">
            <ul class="navbar-nav">
                <li class="nav-item"><img src="{{asset('storage/images/topside1.png')}}" width="100%" alt=""></li>
            </ul>
        </div>
    </div>
</div>