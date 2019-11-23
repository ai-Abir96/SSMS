<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
  protected $fillable = [
        'sct_name',
        'sct_description',
    ];
}
