<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Return_product extends Model
{

  protected $fillable = [

    'order_id',
    'customer_id',
    'seller_id',
    'refunder_id',
    'product_id',
    'unitprice',
    'discount',
    'cause',
    'quantity',
    'amount',

    ];


    public function orderdetails(){

              return $this->belongsTo('App\Order','order_id');

    }


    public function stocks(){
      return $this->belongsTo('App\Stock','product_id');
    }
    public function products(){
      return $this->belongsTo('App\Product');
    }

    public function customers(){
      return $this->belongsTo('App\Customer','customer_id');
    }

    public function orders(){
      return $this->belongsTo('App\Order','order_id');
    }
    public function users(){
      return $this->belongsTo('App\User','seller_id');
    }
}
