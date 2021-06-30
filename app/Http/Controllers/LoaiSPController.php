<?php

namespace App\Http\Controllers;
use App\ProductType;

use Illuminate\Http\Request;

class LoaiSPController extends Controller
{
    public function getDS(){
        $Loaisp = ProductType::paginate(10);
        return view('admin.loaisp.danhsach',compact('Loaisp'));
    }

    public function getSua($id){
        $loaisp = ProductType::find($id);
        return view('admin.loaisp.sua',compact('loaisp'));
    }
    public function postSua(Request $req,$id){
        $loaisp = ProductType::find($id);
        $this->validate($req,
            [
                'name'=>'required|unique:type_products,name|min:3|max:50'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên loại phụ kiện',
                'name.unique'=>'Tên loại phụ kiện đã tồn tại',
                'name.min'=>'Tên loại phụ kiện từ 3 đến 50 kí tự',
                'name.max'=>'Tên loại phụ kiện từ 3 đến 50 kí tự'
            ]);
        $loaisp->name = $req->name;
        $loaisp->save();
        return redirect('admin/loaisp/danhsach')->with('thongbao','Sửa thành công');
    }

    public function getThem(){
        return view('admin.loaisp.them');
    }
    public function postThem( Request $req){
        $this->validate($req,
            [
             
            'name'=>'required|unique:type_products,name|min:3|max:50'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên loại phụ kiện',
            'name.unique'=>'Tên loại phụ kiện đã tồn tại',
            'name.min'=>'Tên loại phụ kiện từ 3 đến 50 kí tự',
            'name.max'=>'Tên loại phụ kiện từ 3 đến 50 kí tự'
        ]);
        $loaisp = new ProductType;
        $loaisp->name = $req->name;
        $loaisp->save();
        return redirect('admin/loaisp/danhsach')->with('thongbao','Thêm thành công');
    }
    public function getXoa($id){
        $loaisp = ProductType::find($id);
        $loaisp->delete();
        return redirect('admin/loaisp/danhsach')->with('thongbao','Xóa thành công');
    }
    public function getAn($id){
        $loaisp= ProductType::find($id);
        $loaisp->status='0';
        $loaisp->save();
        return redirect('admin/loaisp/danhsach')->with('thongbao','Ẩn thành công!');
    }
    public function getHien($id){
        $loaisp= ProductType::find($id);
        $loaisp->status='1';
        $loaisp->save();
        return redirect('admin/loaisp/danhsach')->with('thongbao','Hiện thành công!');
    }
}