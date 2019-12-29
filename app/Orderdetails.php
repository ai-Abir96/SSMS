<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
  protected $fillable = [

      'order_id',
      'product_id',
      'quantity',
      'unitprice',
      'discount',
      'amount',

    ];

    public function stocks(){
      return $this->belongsTo('App\Stock','product_id');
    }
    public function products(){
      return $this->belongsTo('App\Product');
    }

    public function customers(){
      return $this->belongsTo('App\Customer');
    }

    public function orders(){
      return $this->belongsTo('App\Order','order_id');
    }

}
