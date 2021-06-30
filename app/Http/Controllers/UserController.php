<?php

namespace App\Http\Controllers;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function getDS(){
        $us = User::paginate(10);
        return view('admin.user.danhsach',compact('us'));
    }

    // public function getSua($id){
    //     $us = User::find($id);
    //     return view('admin.user.sua',compact('us'));
    // }
    // public function postSua(Request $req){        
    // }

    // public function getThem(){
    //     return view('admin.user.them');
    // }
    // public function postThem( Request $req){
    //     $this->validate($req,
    //         [
    //             'email'=>'required|email|unique:users,email',
    //             'password'=>'required|min:6|max:20',
    //             'full_name'=>'required',
    //             're_password'=>'required|same:password'
    //         ],
    //         [
    //             'email.required'=>'Vui lòng nhập email',
    //             'email.email'=>'Không đúng định dạng email',
    //             'email.unique'=>'Email đã có người sử dụng',
    //             'password.required'=>'Vui lòng nhập mật khẩu',
    //             'full_name.required'=>'Vui lòng nhập tên người dùng',
    //             're_password.same'=>'Mật khẩu không giống nhau',
    //             'password.min'=>'Mật khẩu ít nhất 6 kí tự'
    //         ]);
    //     $us = new User();
    //     $us->full_name = $req->full_name;
    //     $us->email =$req->email;
    //     $us->password= Hash::make($req->password);
    //     $us->phone =$req->phone;
    //     $us->address=$req->address;
    //     $us->quyen_user=$req->quyen_user;
    //     $us->save();
    //     return redirect('admin/user/danhsach')->with('thongbao','Thêm tài khoản thành công');
    // }
    // public function getXoa($id){
    //     $us = User::find($id);
    //     $us->delete();
    //     return redirect('admin/user/danhsach')->with('thongbao','Xóa thành công');
    // }
}