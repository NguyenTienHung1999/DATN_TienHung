@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhà Cung Cấp<small>/</small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                	@if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                {{$err}}<br>
                                @endforeach
                            </div>
                            @endif
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/nhacc/sua/{{ $nhacc->id }}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên nhà cung cấp</label>
                                <input class="form-control" name="name" value="{{ $nhacc->name }}" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="address" value="{{ $nhacc->address }}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" value="{{ $nhacc->email }}" />
                            </div>
                            <div class="form-group">
                                <label>Số Điện thoại</label>
                                <input class="form-control" name="phone" value="{{ $nhacc->phone }}" />
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @endsection