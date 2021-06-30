@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nơi Sản Xuất<small>/Danh sách</small>
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
                                <th style="text-align: center;">Tên </th>
                                <th style="text-align: center;">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($noisx as $nsx)
                            <tr class="odd gradeX" align="center">
                                <td>{{$nsx->id}}</td>
                                <td>{{$nsx->name}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/noisx/sua/{{$nsx->id}}">Edit</a></td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">{{$noisx->links()}}</div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @endsection