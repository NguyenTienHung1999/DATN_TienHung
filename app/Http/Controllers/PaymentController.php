<?php

namespace App\Http\Controllers;
use App\Payment;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function getDS(){
        $payment = Payment::paginate(10);
        return view('admin.payment.danhsach',compact('payment'));
    }

    public function getSua($id){
        $payment = Payment::find($id);
        return view('admin.payment.sua',compact('payment'));
    }
    public function postSua(Request $req,$id){
        $payment = Payment::find($id);
        $this->validate($req,
            [
                'name'=>'required|unique:payment,name|min:3|max:150'
            ],
            [
                'name.required'=>'Bạn chưa nhập hình thức thanh toán',
                'name.unique'=>'Hình thức thanh toán đã tồn tại',
                'name.min'=>'Hình thức thanh toán từ 3 đến 150 kí tự',
                'name.max'=>'Hình thức thanh toán từ 3 đến 150 kí tự'
            ]);
        $payment->name = $req->name;
        $payment->save();
        return redirect('admin/payment/danhsach')->with('thongbao','Sửa thành công');
    }

    public function getThem(){
        return view('admin.payment.them');
    }
    public function postThem( Request $req){
        $this->validate($req,
        [
             
            'name'=>'required|unique:payment,name|min:3|max:150'
        ],
        [
            'name.required'=>'Bạn chưa nhập hình thức thanh toán',
            'name.unique'=>'Hình thức thanh toán đã tồn tại',
            'name.min'=>'Hình thức thanh toán từ 3 đến 150 kí tự',
            'name.max'=>'Hình thức thanh toán từ 3 đến 150 kí tự'
        ]);
        $payment = new Payment;
        $payment->name = $req->name;
        $payment->save();
        return redirect('admin/payment/danhsach')->with('thongbao','Thêm thành công');
    }
}