<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $fillable = [

      'c_name',
      'c_phone',
      'c_email',
      'c_address',

  ];


      public function orderall(){

        return $this->belongsTo('App\Order','customer_id');
      }

      
}
