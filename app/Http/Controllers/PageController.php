<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use App\Payment;
use App\Transport;
use Session;
use Hash;
use Auth;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
    	//return view('page.trangchu',['slide'=>$slide]);
        $new_product = Product::where('new',1)->paginate(10);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(4);
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }
    public function getLoaiSP($type){
        $sp_theoloai = Product::where('id_type',$type)->paginate(9);
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id',$type)->first();
    	return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }
    public function getChitiet(Request $req){
        $sanpham = Product::where('id',$req ->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(3);
    	return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu'));
    }
    public function getLienhe(){
    	return view('page.lienhe');
    }
    public function getGioithieu(){
    	return view('page.gioithieu');
    }
    public function getAddToCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();

    }
    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }
        return redirect('index');

    }
    public function getCheckout(){
        $payment = Payment::all();
        $transport = Transport::all();
        return view('page.dat-hang', compact('payment','transport'));
    }
    public function postCheckout(Request $req){
        $cart = Session::get('cart');
        $customer = new Customer();
        $customer ->name = $req->name;
        $customer ->gender = $req->gender;
        $customer ->email = $req->email;
        $customer ->address = $req->address;
        $customer ->phone_number = $req->phone;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->id_payment = $req->id_payment;
        $bill->id_transport = $req->id_transport;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao', '?????t h??ng th??nh c??ng');
        
    }

    public function getSearch(Request $req){
        $product = Product::where('name','like','%'.$req->key.'%')
        ->orwhere('unit_price',$req->key)
        ->get();
        return view('page.search',compact('product'));
    }

    
    public function getSignin(){
        return view('page.dangki');
    }
    public function postSignin( Request $req){
        $this->validate(
            $req,
            [
                'name'=>'required',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                're_password'=>'required|same:password'
            ],
            [
                'name.required'=>'Vui l??ng nh???p t??n',
                'email.required'=>'Vui l??ng nh???p email',
                'email.email'=>'Kh??ng ????ng ?????nh d???ng email',
                'email.unique'=>'Email ???? c?? ng?????i s??? d???ng',
                'password.required'=>'Vui l??ng nh???p m???t kh???u',
                're_password.same'=>'M???t kh???u kh??ng gi???ng nhau',
                'password.min'=>'M???t kh???u ??t nh???t 6 k?? t???',
                'password.max'=>'M???t kh???u kh??ng qu?? 20 k?? t???'
            ]);
        $account = new User();
        $account->name = $req->name;
        $account->phone =$req->phone;
        $account->email = $req->email;
        $account->password= Hash::make($req->password);
        $account->address = $req->address;
        $account->save();
        return redirect()->back()->with('thanhcong','T???o t??i kho???n th??nh c??ng');
    }
    public function getLogin(){
        return view('page.dangnhap');
    }
    public function postLogin(Request $req){
        $this->validate(
            $req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20',
            ],
            [
                'email.required'=>'Vui l??ng nh???p email',
                'email.email'=>'Kh??ng ????ng ?????nh d???ng email',
                'password.required'=>'Vui l??ng nh???p m???t kh???u',
                'password.min'=>'M???t kh???u ??t nh???t 6 k?? t???',
                'password.max'=>'M???t kh???u kh??ng qu?? 20 k?? t???'
            ]);
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect('index');
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'????ng nh???p th???t b???i']);
        }
    }
    public function postLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }
}
