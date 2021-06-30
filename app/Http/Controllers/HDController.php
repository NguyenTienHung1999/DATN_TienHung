<?php

namespace App\Http\Controllers;
use App\Bill;
use App\Customer;
use App\BillDetail;

use Illuminate\Http\Request;

class HDController extends Controller
{
	public function getDS(){
		$hoadon = Bill::paginate(10);
		$chitiethd = BillDetail::all();
		$customer = Customer::all();
		return view('admin.hoadon.danhsach',compact('hoadon','customer','chitiethd'));
	}
	// public function getHuy($id){
 //        $hoadon = Bill::find($id);
 //        $hoadon->delete();
 //        return redirect('admin/hoadon/danhsach')->with('thongbao','Hủy thành công');
 //    }
}