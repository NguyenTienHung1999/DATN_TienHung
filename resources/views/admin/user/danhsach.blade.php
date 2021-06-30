@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User<small>/Danh sách</small>
                        </h1>
                    </div>
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
                    <!-- /.col-lg-12 -->
                    
                    <table class="table table-striped table-bordered table-hover">
                        
                        <thead>
                            <tr align="center">
                                <th style="text-align: center;">ID</th>
                                <th style="text-align: center;">Tên người dùng</th>
                                <th style="text-align: center;">Email</th>
                                <th style="text-align: center;">Password</th>
                                <th style="text-align: center;">Số điện thoại</th>
                                <th style="text-align: center;">Địa chỉ</th>
                                <th style="text-align: center;">Edit</th>
                                <th style="text-align: center;">Trạng thái
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($us as $U)
                            <tr class="odd gradeX" align="center">
                                <td>{{$U->id}}</td>
                                <td>{{$U->name}}</td>
                                <td>{{$U->email}}</td>
                                <td>{{$U->password}}</td>
                                <td>{{$U->phone}}</td>
                                <td>{{$U->address}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua/{{$U->id}}">Edit</a></td>
                                <td>
                                    
                                    <a href="admin/user/xoa/{{$U->id}}" onclick="return confirm('bạn có muốn xóa người dùng này không không?')" class="btn btn-danger"> Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">{{$us->links()}}</div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @endsection