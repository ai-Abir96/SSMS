<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
  protected $fillable = [
        's_id','s_name','s_phone','s_address','description',
    ];
    
}
