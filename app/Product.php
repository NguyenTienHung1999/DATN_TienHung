<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ="products";
    public function product_type(){
    	return $this->belongsTo('App\ProductType','id_type','id');
    }
    public function producer(){
    	return $this->belongsTo('App\Producer','id_producer','id');
    }
    public function supplier(){
    	return $this->belongsTo('App\Supplier','id_supplier','id');
    }
    public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_product','id');
    }
}
