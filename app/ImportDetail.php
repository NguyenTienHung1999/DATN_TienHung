<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportDetail extends Model
{
    protected $table ="import_detail";
    public function product(){
    	return $this->belongsTo('App\Product','id_product','id');
    }
    public function importbill(){
    	return $this->belongsTo('App\ImportBill','id_import','id');
    }
}
