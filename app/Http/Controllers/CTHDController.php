<?php

namespace App\Http\Controllers;
use App\BillDetail;

use Illuminate\Http\Request;

class CTHDController extends Controller
{
	public function getDS(){
		$chitiethd = BillDetail::all();
		return view('admin.hoadon.chitiethd',compact('chitiethd'));
	}
}