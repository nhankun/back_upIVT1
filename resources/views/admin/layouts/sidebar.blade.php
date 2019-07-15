<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{route('admin.index')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('category.index')}}">
                    <i class="fa fa-list-alt"></i> <span>Categories</span>
                    <span class="pull-right-container"><small class="label pull-right bg-green">{{\App\Category::countCategory()}}</small></span>
                </a>
            </li>
            <li>
                <a href="{{route('product.index')}}">
                    <i class="fa fa-tablet"></i> <span>Products</span>
                    <span class="pull-right-container"><small class="label pull-right bg-green">{{\App\Product::countProduct()}}</small></span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Order</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! route('order.index') !!}"><i class="fa fa-circle-o"></i> Order list</a></li>
                    <li><a href="{!! route('order.getProcessing') !!}"><i class="fa fa-circle-o"></i> Browse orders</a></li>
                    <li><a href="{!! route('order.getExport') !!}"><i class="fa fa-circle-o"></i>Export order</a></li>
                    <li><a href="{!! route('order.getShipped') !!}"><i class="fa fa-circle-o"></i> shipped</a></li>
                    <li><a href="{!! route('order.getCancel') !!}"><i class="fa fa-circle-o"></i> Cancel</a></li>
                </ul>
            </li>
            <li><a href="{{route('user.index')}}"><i class="fa fa-user"></i> <span>Users</span>
                    <span class="pull-right-container"><small class="label pull-right bg-green">{{\App\User::countUsers()}}</small></span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
