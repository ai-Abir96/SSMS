<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
  protected $fillable = [
    'p_code', 'p_name', 'fcat_id', 'fscat_id', 'fsup_id', 'quantity', 'st_price', 'description',
    ];


    public function categories()
    {
      return $this->belongsTo('App\Category','fcat_id');
    }
    public function subcategories()
    {
      return $this->belongsTo('App\Sub_category','fscat_id');
    }
    public function suppliers()
    {
      return $this->belongsTo('App\Supplier','fsup_id');
    }
}
