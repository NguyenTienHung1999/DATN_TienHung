@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh Sách Nông Sản<small>/Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/sanpham/them" method="POST">
                            
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                {{$err}}<br>
                                @endforeach
                            </div>
                            @endif
                            <div class="form-group">
                                <label>Tên nông sản</label>
                                <input class="form-control" name="name" placeholder="Nhập tên phụ kiện" />
                            </div>
                            <div class="form-group">
                                <label>Loại nông sản</label>
                                <select name="id_type" class="form-control">
                                    @foreach($loai_sp as $loai)
                                    <option value="{{$loai->id}}">{{$loai->name}}</option>
                                    @endforeach                                   
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label>Nhà Cung Cấp</label>
                                <select name="id_supplier" class="form-control">
                                    @foreach($nhacc as $ncc)
                                    <option value="{{$ncc->id}}">{{$ncc->name}}</option>
                                    @endforeach                                   
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label>Nơi Sản Xuất</label>
                                <select name="id_producer" class="form-control">
                                    @foreach($noisx as $nsx)
                                    <option value="{{$nsx->id}}">{{$nsx->name}}</option>
                                    @endforeach                                   
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="">Hình ảnh</label>
                                <input type="file" name="image" class="form-control" placeholder="">
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea name="description" class="form-control " id="editor1"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Giá bán</label>
                                <input type="text" name="unit_price" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Giá khuyến mại</label>
                                <input type="text" name="promotion_price" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Số lượng</label>
                                <input type="text" name="quantity" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Mới :</label>
                                <label class="radio-inline">
                                    <input name="new" value="0" checked="" type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="new" value="1" type="radio">Mới
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái :</label>
                                <label class="radio-inline">
                                    <input name="status" value="0" checked="" type="radio">Ẩn
                                </label>
                                <label class="radio-inline">
                                    <input name="status" value="1" type="radio">Hiển thị
                                </label>
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