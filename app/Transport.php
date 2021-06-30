<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $table ="transport";
    public function bill(){
    	return $this->hasMany('App\Bill','id_transport','id');
    }
}
