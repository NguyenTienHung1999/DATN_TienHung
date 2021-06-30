<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                @if(Auth::check())
                <li class="dropdown">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li><a><i class="fa fa-user fa-fw"></i>Chào bạn {{Auth::user()->full_name}}</a>
                        <li><a href=""><i class="fa fa-gear fa-fw"></i> Settings</a>
                        <li><a href="admin/dangxuat"><i class="fa fa-sign-out fa-fw"></i>Đăng xuất</a></li>
                        
                        
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                @else
                        <li><a href="admin/dangnhap"><i class="fa fa-user fa-fw"></i>Đăng nhập</a></li>
                        </li>
                        @endif
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            @include('admin.layout.menu')
        </nav>