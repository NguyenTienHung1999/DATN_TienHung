@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách hàng<small>/Danh sách</small>
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
                                <th style="text-align: center;">Giới tính</th>
                                <th style="text-align: center;">Email</th>
                                <th style="text-align: center;">Địa chỉ</th>
                                <th style="text-align: center;">Số điện thoại</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($khachhang as $kh)
                            <tr class="odd gradeX" align="center">
                                <td>{{$kh->id}}</td>
                                <td>{{$kh->name}}</td>
                                <td>{{$kh->gender}}</td>
                                <td>{{$kh->email}}</td>
                                <td>{{$kh->address}}</td>
                                <td>{{$kh->phone_number}}</td>                            
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">{{$khachhang->links()}}</div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @endsection