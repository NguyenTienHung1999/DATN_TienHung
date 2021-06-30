@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại nông sản<small>/Thêm Loại</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/loaisp/them" method="POST">
                            @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                {{$err}}<br>
                                @endforeach
                            </div>
                            @endif
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            {{--<div class="form-group">
                                <label>Mã Loại</label>
                                <input class="form-control" name="id" placeholder="Nhập mã loại phụ kiện" />
                            </div>--}}
                            <div class="form-group">
                                <label>Tên Loại</label>
                                <input class="form-control" name="name" placeholder="Nhập tên loại phụ kiện" />
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @endsection