@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhà Cung Cấp<small>/Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    @if(session('thongbao'))
                        <div class="alert alert-success">{{session('thongbao')}}</div>
                    @endif
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th style="text-align: center;">ID</th>
                                <th style="text-align: center;">Tên nhà cung cấp</th>
                                <th style="text-align: center;">Địa chỉ</th>
                                <th style="text-align: center;">Email</th>
                                <th style="text-align: center;">Số điện thoại</th>
                                <th style="text-align: center;">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nhacc as $ncc)
                            <tr class="odd gradeX" align="center">
                                <td>{{$ncc->id}}</td>
                                <td>{{$ncc->name}}</td>
                                <td>{{$ncc->address}}</td>
                                <td>{{$ncc->email}}</td>
                                <td>{{$ncc->phone}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/nhacc/sua/{{$ncc->id}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">{{$nhacc->links()}}</div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @endsection