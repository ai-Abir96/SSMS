<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
  protected $fillable = [
        'cat_id',
        'sct_name',
        'sct_description',
    ];
    public function sub_stocks()
    {
      return $this->belongsTo('App\Stock','fscat_id');
    }

    public function categories()
    {
      return $this->belongsTo('App\Category','cat_id');
    }
}
