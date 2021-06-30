@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh Sách Hóa Đơn Bán<small>/Danh sách</small>
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
                                <th style="text-align: center;">Tên khách hàng</th>
                                <th style="text-align: center;">Ngày đặt</th>
                                <th style="text-align: center;">Chi tiết</th>
                                <th style="text-align: center;">Tổng tiền</th>
                                <th style="text-align: center;">Hình thức thanh toán</th>
                                <th style="text-align: center;">Vận chuyển</th>
                                {{-- <th style="text-align: center; width: 200px">Tùy chọn</th> --}}
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hoadon as $hd)
                            <tr class="odd gradeX" align="center">
                                <td>{{$hd->id}}</td>
                                <td>{{$hd->customer->name}}</td>
                                <td>{{$hd->date_order}}</td>
                                <td>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                <th>Tên sản phẩm</th>
                                                <th>Hình ảnh</th>
                                                <th>Số lượng</th>
                                                <th>Đơn giá</th>
                                            </thead>
                                            <tbody>
                                             @foreach($chitiethd as $cthdb)
                                                @if($cthdb->id_bill == $hd->id)
                                                <tr>
                                                <td>{{$cthdb->product->name}}</td>
                                                <td><img src="source/image/product/{{$cthdb->product->image}}" width="100" height="100"></td>
                                                <td>{{$cthdb->quantity}}</td>
                                                <td>{{number_format($cthdb->unit_price)}}₫</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                                <td>{{number_format($hd->total)}}</td>
                                <td>{{$hd->payment->name}}</td>
                                <td>{{$hd->transport->name}}</td>
                                {{-- <td>
                                    <a href="#" onclick="return confirm('bạn có muốn đặt đơn hàng này không?')" class="btn btn-danger">Đặt</a>
                                    <a href="admin/hoadon/huy/{{$hd->id}}" onclick="return confirm('bạn có muốn hủy đơn hàng này không?')" class="btn btn-danger">Hủy đơn</a>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">{{$hoadon->links()}}</div>
                </div>
                
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @endsection