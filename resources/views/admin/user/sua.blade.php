@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User<small>/Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/user/sua/{{ $us->id }} " method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            @if(count($errors) > 0 )
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                {{$err}}<br>
                                @endforeach
                            </div>
                            @endif
                            
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" type="text" name="full_name" placeholder="Nhập họ tên" value="{{ $us->name }}" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" type="text" name="address" placeholder="Nhập địa chỉ" value="{{ $us->address }}"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" placeholder="Nhập email" value="{{ $us->email }}"/>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" type="text" name="phone" placeholder="Nhập số điện thoại" value="{{ $us->phone }}" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control"  type="password" name="password" placeholder="Nhập Password" />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại Password</label>
                                <input class="form-control"  type="password" name="re_password" placeholder="Nhập lại Password" />
                            </div>

                            <div class="form-group">
                                <label>Quyền người dùng</label>
                                <label class="radio-inline">
                                    <input name="quyen_user" value="0" 
                                    @if($us->quyen_user == 0) 
                                    {{ "checked" }}
                                    @endif
                                    type="radio">Thường
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen_user" value="1"
                                    @if($us->quyen_user == 1) 
                                    {{ "checked" }}
                                    @endif
                                     type="radio">Admin
                                </label>
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