<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('index',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);
Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSP'
]);
Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);
Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienhe'
]);
Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioithieu'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddToCart'
]);
Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);
Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);
Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);
Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);

Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);
Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);
Route::get('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@getSignin'
]);
Route::post('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@postSignin'
]);
Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@postLogout'
]);


Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'loaisp'],function(){
		Route::get('danhsach','LoaiSPController@getDS');

		Route::get('sua/{id}','LoaiSPController@getSua');
		Route::post('sua/{id}','LoaiSPController@postSua');

		Route::get('them','LoaiSPController@getThem');
		Route::post('them','LoaiSPController@postThem');

		Route::get('xoa/{id}','LoaiSPController@getXoa');

		Route::get('anloaisp/{id}','LoaiSPController@getAn');
		Route::get('hienloaisp/{id}','LoaiSPController@getHien');
	});

	Route::group(['prefix'=>'sanpham'],function(){
		Route::get('danhsach','SPController@getDS');

		Route::get('sua/{id}','SPController@getSua');
		Route::post('sua/{id}','SPController@postSua');

		Route::get('them','SPController@getThem');
		Route::post('them','SPController@postThem');

		Route::get('xoa/{id}','SPController@getXoa');

		Route::get('ansp/{id}','SPController@getAn');
		Route::get('hiensp/{id}','SPController@getHien');

	});

	Route::group(['prefix'=>'user'],function(){
		Route::get('danhsach','UserController@getDS');

		Route::get('sua','UserController@getSua');

		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');

		Route::get('xoa/{id}','UserController@getXoa');


	});
	Route::group(['prefix'=>'hoadon'],function(){
		Route::get('danhsach','HDController@getDS'); 

		Route::get('huy/{id}','HDController@getHuy');
	});
	Route::group(['prefix'=>'hoadon'],function(){
		Route::get('chitiethd','CTHDController@getDS'); 

		Route::get('huy/{id}','CTHDController@getHuy');
	});
	Route::group(['prefix'=>'khachhang'],function(){
		Route::get('danhsach','KHController@getDS'); 
	});

	Route::group(['prefix'=>'nhacc'],function(){
		Route::get('danhsach','NCCController@getDS');

		Route::get('them','NCCController@getThem');
		Route::post('them','NCCController@postThem');

		Route::get('sua/{id}','NCCController@getSua');
		Route::post('sua/{id}','NCCController@postSua');
	});

	Route::group(['prefix'=>'noisx'],function(){
		Route::get('danhsach','NSXController@getDS');

		Route::get('them','NSXController@getThem');
		Route::post('them','NSXController@postThem');

		Route::get('sua/{id}','NSXController@getSua');
		Route::post('sua/{id}','NSXController@postSua');
	});

	Route::group(['prefix'=>'transport'],function(){
		Route::get('danhsach','TransportController@getDS');

		Route::get('them','TransportController@getThem');
		Route::post('them','TransportController@postThem');

		Route::get('sua/{id}','TransportController@getSua');
		Route::post('sua/{id}','TransportController@postSua');
	});

	Route::group(['prefix'=>'payment'],function(){
		Route::get('danhsach','PaymentController@getDS');

		Route::get('them','PaymentController@getThem');
		Route::post('them','PaymentController@postThem');

		Route::get('sua/{id}','PaymentController@getSua');
		Route::post('sua/{id}','PaymentController@postSua');
	});

	Route::group(['prefix'=>'accadmin'],function(){
		Route::get('danhsach','AdminController@getDS');

		Route::get('them','AdminController@getThem');
		Route::post('them','AdminController@postThem');

		Route::get('sua/{id}','AdminController@getSua');
		Route::post('sua/{id}','AdminController@postSua');
	});



});
Route::get('admin/dangnhap','AdminController@getLoginAdmin');
Route::post('admin/dangnhap','AdminController@postLoginAdmin');
Route::get('admin/dangxuat','AdminController@getLogoutAdmin');