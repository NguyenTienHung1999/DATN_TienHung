<?php

namespace App\Http\Controllers;
use App\Admin;
use Hash;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function getDS(){
        $ad = Admin::paginate(10);
        return view('admin.accadmin.danhsach',compact('ad'));
    }
    public function getLoginAdmin(){
        return view('admin.login');
    }
    public function postLoginAdmin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20',
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]);
        if (Auth::attempt(['email'=>$req->email,'password'=>$req->password])) 
        {
            return redirect('admin/loaisp/danhsach');
        }
        else
        {
            return redirect('admin/dangnhap')->with('thongbao','Thông tin tài khoản hoặc mật khẩu không chính xác');
        }
    }
    public function getLogoutAdmin(){
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}