<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emp_job extends Model
{
  protected $fillable= [
      'id',
      'emp_id',
      'position_id',
      'salaray',
      'bonus',
      'status',
      'signing_date',
      'departing_date',
];

public function emp_infos()
{
  return $this->hasOne('App\Emp_info','id','emp_id');
}

public function emp_pos()
{
  return $this->hasOne('App\Emp_position','id','position_id');
}


}
