<?php

namespace App\Http\Controllers;
use App\Customer;

use Illuminate\Http\Request;

class KHController extends Controller
{
	public function getDS(){
		$khachhang = Customer::paginate(10);
		return view('admin.khachhang.danhsach',compact('khachhang'));
	}
}