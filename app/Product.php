<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

  protected $fillable = [

    'sp_id','p_image','p_price','p_discount',

    ];

    public function stocks(){
      return $this->belongsTo('App\Stock','sp_id');
    }

}
