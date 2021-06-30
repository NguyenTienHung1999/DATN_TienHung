<?php

namespace App\Http\Controllers;
use App\Producer;

use Illuminate\Http\Request;

class NSXController extends Controller
{
    public function getDS(){
        $noisx = Producer::paginate(10);
        return view('admin.noisx.danhsach',compact('noisx'));
    }

    public function getSua($id){
        $noisx = Producer::find($id);
        return view('admin.noisx.sua',compact('noisx'));
    }
    public function postSua(Request $req,$id){
        $noisx = Producer::find($id);
        $this->validate($req,
            [
                'name'=>'required|unique:producer,name|min:2|max:50'
            ],
            [
                'name.required'=>'Bạn chưa nhập Nơi sản xuất',
                'name.unique'=>'Nơi sản xuất đã tồn tại',
                'name.min'=>'Nơi sản xuất từ 2 đến 100 kí tự',
                'name.max'=>'Nơi sản xuất từ 2 đến 100 kí tự'
            ]);
        $noisx->name = $req->name;
        $noisx->save();
        return redirect('admin/noisx/danhsach')->with('thongbao','Sửa thành công');
    }

    public function getThem(){
        return view('admin.noisx.them');
    }
    public function postThem( Request $req){
        $this->validate($req,
            [
                'name'=>'required|unique:producer,name|min:2|max:50'
            ],
            [
                'name.required'=>'Bạn chưa nhập Nơi sản xuất',
                'name.unique'=>'Nơi sản xuất đã tồn tại',
                'name.min'=>'Nơi sản xuất từ 2 đến 100 kí tự',
                'name.max'=>'Nơi sản xuất từ 2 đến 100 kí tự'
            ]);
        $noisx = new Producer;
        $noisx->name = $req->name;
        $noisx->save();
        return redirect('admin/noisx/danhsach')->with('thongbao','Thêm thành công');
    }
}