<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table ="payment";
    public function bill(){
    	return $this->hasMany('App\Bill','id_payment','id');
    }
}
