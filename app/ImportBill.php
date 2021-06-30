<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportBill extends Model
{
    protected $table ="import_bill";
    public function import_detail(){
    	return $this->hasMany('App\ImportDetail','id_import','id');
    }
    public function importbill(){
    	return $this->belongsTo('App\Supplier','id_supplier','id');
    }
}
