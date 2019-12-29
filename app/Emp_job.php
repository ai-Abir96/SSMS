<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emp_job extends Model
{
  protected $fillable= [
      'id',
      'emp_id',
      'position_id',
      'salary',
      'bonus',
      'status',
      'signing_date',
      'departing_date',
];

public function jusers()
{
  return $this->belongsTo('App\User','emp_id');
}

public function positions()
{
  return $this->belongsTo('App\Emp_position','position_id');
}


}
