@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{ route('dathang') }}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">
					<div class="row">
						
						@if(Session::has('thongbao'))
						<div class=" alert alert-success">
						<h5>{{ Session::get('thongbao') }}</h5>
					    </div>
						@endif
					</div>
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text" id="name" name="name" placeholder="Họ tên" required>
						</div>
						<div class="form-block">
							<label>Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
										
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" required placeholder="expample@gmail.com">
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="address" name="address" placeholder="Street Address" required>
						</div>

						<div class="form-block">
							<label>Hình thức thanh toán</label>
							<select name="id_payment" class="form-control">
                                @foreach($payment as $pm)
                                    <option value="{{$pm->id}}">{{$pm->name}}</option>
                                @endforeach                                   
                            </select>
						</div>

						<div class="form-block">
							<label>Hình thức vận chuyển</label>
							<select name="id_transport" class="form-control">
                                @foreach($transport as $tsp)
                                    <option value="{{$tsp->id}}">{{$tsp->name}}</option>
                                @endforeach                                   
                            </select>
						</div>

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" id="phone" name="phone" required>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
									@if(Session::has('cart'))
									@foreach($product_cart as $cart)
										<div class="media">
											<img width="25%" src="source/image/product/{{ $cart['item']['image'] }}" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{ $cart['item']['name'] }}</p>
												<span class="color-gray your-order-info">Đơn giá: {{ number_format($cart['price']) }} đồng</span>
												<span class="color-gray your-order-info">Số lượng: {{ $cart['qty'] }}</span>
											</div>
										</div>
									@endforeach
									@endif
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{ number_format($totalPrice)  }} @else 0 @endif đồng</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							
							
							<div class="text-center"><button type="submit" class="beta-btn primary" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection