<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductType;
use App\Supplier;
use App\Producer;

use Illuminate\Http\Request;

class SPController extends Controller
{
	public function getDS(){
        $sp = Product::paginate(10);
        $loai_sp = ProductType::all();
        $nhacc = Supplier::all();
        $noisx = Producer::all();
        $new_sp = Product::where('new',1);
        return view('admin.sanpham.danhsach',compact('sp','loai_sp','nhacc','noisx','new_sp'));
    }
    public function getThem(){
        $loai_sp = ProductType::all();
        $nhacc = Supplier::all();
        $noisx = Producer::all();
        return view('admin.sanpham.them',compact('loai_sp','nhacc','noisx'));
    }
    public function postThem( Request $req){
        $this->validate($req,
        [
            'name'=>'required|min:10|max:150',
            'color'=>'required',
            'material'=>'required',
            'unit_price'=>'required',
            'quantity'=>'required',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên phụ kiện',
            'name.min'=>'Tên phụ kiện từ 10 đến 150 kí tự',
            'name.max'=>'Tên phụ kiện từ 10 đến 150 kí tự',
            'name.color'=>'Bạn chưa nhập màu sắc',
            'name.material'=>'Bạn chưa nhập chất liệu',
            'name.unit_price'=>'Bạn chưa nhập giá',
            'name.quantity'=>'Bạn chưa nhập số lượng',
        ]);
        $sp = new Product;
        $sp->name = $req->name;
        $sp->id_type =$req->id_type;
        $sp->id_producer =$req->id_producer;
        $sp->id_supplier =$req->id_supplier;
        $sp->color = $req->color;
        $sp->material = $req->material;
        $sp->description = $req->description;
        $sp->thongsokythuat = $req->thongsokythuat;
        $sp->unit_price = $req->unit_price;
        $sp->promotion_price = $req->promotion_price;
        $sp->quantity = $req->quantity;
        $sp->new = $req->new;
        $sp->status = $req->status;
        $sp->image= $req->image;
        $sp->save();
        return redirect('admin/sanpham/danhsach')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
        $sp = Product::find($id);
        $loai_sp = ProductType::all();
        $nhacc = Supplier::all();
        $noisx = Producer::all();
        return view('admin.sanpham.sua',compact('sp','loai_sp','nhacc','noisx'));
    }
    public function postSua(Request $req, $id){
        $sp = Product::find($id);
        $this->validate($req,
        [
            'name'=>'required|min:10|max:150',
            'color'=>'required',
            'material'=>'required',
            'unit_price'=>'required',
            'quantity'=>'required',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên phụ kiện',
            'name.min'=>'Tên phụ kiện từ 10 đến 150 kí tự',
            'name.max'=>'Tên phụ kiện từ 10 đến 150 kí tự',
            'name.color'=>'Bạn chưa nhập màu sắc',
            'name.material'=>'Bạn chưa nhập chất liệu',
            'name.unit_price'=>'Bạn chưa nhập giá',
            'name.quantity'=>'Bạn chưa nhập số lượng',
        ]);
        $sp->name = $req->name;
        $sp->id_type =$req->id_type;
        $sp->id_producer =$req->id_producer;
        $sp->id_supplier =$req->id_supplier;
        $sp->color = $req->color;
        $sp->material = $req->material;
        $sp->description = $req->description;
        $sp->thongsokythuat = $req->thongsokythuat;
        $sp->unit_price = $req->unit_price;
        $sp->promotion_price = $req->promotion_price;
        $sp->quantity = $req->quantity;
        $sp->new = $req->new;
        $sp->status = $req->status;
        $sp->image= $req->image;
        $sp->save();
        return redirect('admin/sanpham/danhsach')->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
        $sp = Product::find($id);
        $sp->delete();
        return redirect('admin/sanpham/danhsach')->with('thongbao','Xóa thành công');
    }
    public function getAn($id){
    	$sp= Product::find($id);
    	$sp->status='0';
    	$sp->save();
    	return redirect('admin/sanpham/danhsach')->with('thongbao','Ẩn thành công!');
    }
    public function getHien($id){
    	$sp= Product::find($id);
    	$sp->status='1';
    	$sp->save();
    	return redirect('admin/sanpham/danhsach')->with('thongbao','Hiển thị thành công!');
    }

}