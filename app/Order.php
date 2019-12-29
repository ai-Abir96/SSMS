<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = [
    'id',
    'user_id',
    'customer_id',
    'totalamount',

    ];

    public function customers(){

      return $this->belongsTo('App\Customer','customer_id');
    }

    public function users(){

      return $this->belongsTo('App\User','user_id');
    }

}
