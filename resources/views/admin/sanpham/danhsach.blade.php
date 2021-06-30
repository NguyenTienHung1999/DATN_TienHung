@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh Sách Nông Sản<small>/Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    </div>
                <div class="row">
                    
                        @if(count($errors)>0)
                    <div class=" alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}}
                        @endforeach
                    </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-success">{{session('thongbao')}}</div>
                    @endif
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th style="text-align: center;">ID</th>
                                <th style="text-align: center;">Tên Nông Sản</th>
                                <th style="text-align: center;">Loại</th>
                                <th style="text-align: center;">Nhà cung cấp</th>
                                <th style="text-align: center;">Nơi sản xuất</th>
                                
                                <th style="text-align: center;">Đơn giá</th>
                                <th style="text-align: center;">Giá khuyến mãi</th>
                                <th style="text-align: center;">Ảnh</th>
                                <th style="text-align: center;">Số lượng</th>
                                <th style="text-align: center; width: 50px">Mới</th>
                                <th style="text-align: center;">Trạng thái</th>
                                <th style="text-align: center;">Edit</th>
                                <th style="text-align: center; width: 150px">Tùy chọn</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sp as $SP)
                            <tr class="odd gradeX" align="center">
                                
                                <td>{{$SP->id}}</td>
                                <td>{{$SP->name}}</td>
                                <td>{{$SP->product_type->name}}</td>
                                <td>{{$SP->supplier->name}}</td>
                                <td>{{$SP->producer->name}}</td>
                                
                                <td>{{number_format($SP->unit_price)}}</td>
                                <td>{{number_format($SP->promotion_price)}}</td>
                                <td><img src="source/image/product/{{$SP->image}}" alt="" height="100px"></td>
                                <td>{{$SP->quantity}}</td>
                                <td>
                                    @if($SP->new == 1) {{ "Mới" }}
                                    @endif
                                </td>
                                <td>
                                    @if($SP->status == 0) {{ "Ẩn" }}
                                    @else {{ "Hiển thị" }}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham/sua/{{$SP->id}}">Edit</a></td>
                                <td>
                                    <a href="admin/sanpham/ansp/{{$SP->id}}" onclick="return confirm('bạn có muốn ẩn sản phẩm này không?')" class="btn btn-danger">Ẩn</a>
                                    <a href="admin/sanpham/hiensp/{{$SP->id}}" onclick="return confirm('bạn có muốn hiện sản phẩm này không?')" class="btn btn-danger">Hiện</a>
                                    {{-- <a href="admin/sanpham/xoa/{{$SP->id}}" onclick="return confirm('bạn có muốn xóa sản phẩm này không?')" class="btn btn-danger"> Delete</a> --}}
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">{{$sp->links()}}</div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @endsection