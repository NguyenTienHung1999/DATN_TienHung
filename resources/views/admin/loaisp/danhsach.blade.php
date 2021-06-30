@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại Sản Phẩm<small>/Danh sách</small>
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
                                <th style="text-align: center;">Tên loại</th>
                                <th style="text-align: center;">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Loaisp as $lsp)
                            <tr class="odd gradeX" align="center">
                                <td>{{$lsp->id}}</td>
                                <td>{{$lsp->name}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaisp/sua/{{$lsp->id}}">Edit</a></td>
                                {{-- <td>
                                    <a href="admin/loaisp/anloaisp/{{$lsp->id}}" onclick="return confirm('bạn có muốn ẩn loại sản phẩm này không?')" class="btn btn-danger">Ẩn</a>
                                    <a href="admin/loaisp/hienloaisp/{{$lsp->id}}" onclick="return confirm('bạn có muốn hiện loại sản phẩm này không?')" class="btn btn-danger">Hiện</a>
                                    <a href="admin/loaisp/xoa/{{$lsp->id}}" onclick="return confirm('bạn có muốn xóa loại sản phẩm này không?')" class="btn btn-danger"> Delete</a>
                                </td> --}} 

                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">{{$Loaisp->links()}}</div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @endsection