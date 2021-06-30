<div class="navbar-default sidebar" role="navigation" >
                <div class="sidebar-nav navbar-collapse" >
                    <ul class="nav" id="side-menu" >
                        <li class="sidebar-search" >
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li > 
                            <a href="{{route('trang-chu')}}"><i class="fa fa-dashboard fa-fw"></i> Website</a>
                        </li>
                        <li>
                            <a href="admin/loaisp/danhsach"><i class="fa fa-th-list"></i> Loại Nông Sản<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/loaisp/danhsach">Danh sách Loại</a>
                                </li>
                                <li>
                                    <a href="admin/loaisp/them">Thêm Loại</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/sanpham/danhsach"><i class="fa fa-list-ul"></i> Danh Sách Nông Sản<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/sanpham/danhsach">Danh Sách Nông Sản</a>
                                </li>
                                <li>
                                    <a href="admin/sanpham/them">Thêm Nông Sản</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/nhacc/danhsach"><i class="fa fa-list-ul"></i> Danh Sách Nhà Cung Cấp<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/nhacc/danhsach">Danh Sách Nhà Cung Cấp</a>
                                </li>
                                <li>
                                    <a href="admin/nhacc/them">Thêm Nhà Cung Cấp</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/noisx/danhsach"><i class="fa fa-list-ul"></i> Danh Sách Nơi Sản Xuất<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/noisx/danhsach">Danh Sách </a>
                                </li>
                                <li>
                                    <a href="admin/noisx/them">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/transport/danhsach"><i class="fa fa-list-ul"></i> DS Dịch vụ chuyển hàng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/transport/danhsach">Danh Sách </a>
                                </li>
                                <li>
                                    <a href="admin/transport/them">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/payment/danhsach"><i class="fa fa-list-ul"></i> DS Hình thức thanh toán<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/payment/danhsach">Danh Sách </a>
                                </li>
                                <li>
                                    <a href="admin/payment/them">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/user/danhsach">Danh sách User</a>
                                </li>
                                <!--<li>
                                    <a href="admin/user/them">Thêm User</a>
                                </li>-->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Hóa đơn bán<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/hoadon/danhsach">Danh sách hóa đơn</a>
                                </li>
                                {{-- <li>
                                    <a href="admin/hoadon/chitiethd">Chi tiết hóa đơn</a>
                                </li> --}}
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Khách hàng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/khachhang/danhsach">Danh sách khách hàng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->