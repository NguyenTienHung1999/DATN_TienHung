<?php

namespace App\Http\Controllers;
use App\Transport;

use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function getDS(){
        $transport = Transport::paginate(10);
        return view('admin.transport.danhsach',compact('transport'));
    }

    public function getSua($id){
        $transport = Transport::find($id);
        return view('admin.transport.sua',compact('transport'));
    }
    public function postSua(Request $req,$id){
        $transport = Transport::find($id);
        $this->validate($req,
            [
                'name'=>'required|unique:transport,name|min:3|max:150'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên dịch vụ vận chuyển',
                'name.unique'=>'Tên dịch vụ vận chuyển đã tồn tại',
                'name.min'=>'Tên dịch vụ vận chuyển từ 3 đến 150 kí tự',
                'name.max'=>'Tên dịch vụ vận chuyển từ 3 đến 150 kí tự'
            ]);
        $transport->name = $req->name;
        $transport->save();
        return redirect('admin/transport/danhsach')->with('thongbao','Sửa thành công');
    }

    public function getThem(){
        return view('admin.transport.them');
    }
    public function postThem( Request $req){
        $this->validate($req,
            [
             
            'name'=>'required|unique:transport,name|min:3|max:150'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên dịch vụ vận chuyển',
            'name.unique'=>'Tên dịch vụ vận chuyển đã tồn tại',
            'name.min'=>'Tên dịch vụ vận chuyển từ 3 đến 150 kí tự',
            'name.max'=>'Tên dịch vụ vận chuyển từ 3 đến 150 kí tự'
        ]);
        $transport = new Transport;
        $transport->name = $req->name;
        $transport->save();
        return redirect('admin/transport/danhsach')->with('thongbao','Thêm thành công');
    }
}