<?php

namespace App\Http\Controllers;
use App\Supplier;

use Illuminate\Http\Request;

class NCCController extends Controller
{
    public function getDS(){
        $nhacc = Supplier::paginate(10);
        return view('admin.nhacc.danhsach',compact('nhacc'));
    }

    public function getSua($id){
        $nhacc = Supplier::find($id);
        return view('admin.nhacc.sua',compact('nhacc'));
    }
    public function postSua(Request $req,$id){
        $nhacc = Supplier::find($id);
        $this->validate($req,
            [           
            'name'=>'required|min:3|max:100',
            'address'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            ],
            [
            'name.required'=>'Bạn chưa nhập tên nhà cung cấp',
            'name.min'=>'Tên nhà cung cấp từ 3 đến 100 kí tự',
            'name.max'=>'Tên nhà cung cấp từ 3 đến 100 kí tự',
            'address.required'=>'Bạn chưa nhập địa chỉ',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'phone.required'=>'Bạn chưa nhập số điện thoại',
            ]);
        $nhacc->name = $req->name;
        $nhacc->address = $req->address;
        $nhacc->email = $req->email;
        $nhacc->phone = $req->phone;
        $nhacc->save();
        return redirect('admin/nhacc/danhsach')->with('thongbao','Sửa thành công');
    }

    public function getThem(){
        return view('admin.nhacc.them');
    }
    public function postThem( Request $req){
        $this->validate($req,
            [           
            'name'=>'required|min:3|max:100',
            'address'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            ],
            [
            'name.required'=>'Bạn chưa nhập tên nhà cung cấp',
            'name.min'=>'Tên nhà cung cấp từ 3 đến 100 kí tự',
            'name.max'=>'Tên nhà cung cấp từ 3 đến 100 kí tự',
            'address.required'=>'Bạn chưa nhập địa chỉ',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'phone.required'=>'Bạn chưa nhập số điện thoại',
            ]);
        $nhacc = new Supplier;
        $nhacc->name = $req->name;
        $nhacc->address = $req->address;
        $nhacc->email = $req->email;
        $nhacc->phone = $req->phone;
        $nhacc->save();
        return redirect('admin/nhacc/danhsach')->with('thongbao','Thêm thành công');
    }
    
}