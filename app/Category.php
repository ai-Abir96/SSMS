<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = [
        'ct_name',
        'ct_description',
    ];
}
