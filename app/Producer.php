<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    protected $table ="producer";
    public function Product(){
    	return $this->hasMany('App\Product','id_producer','id');
    }
}
