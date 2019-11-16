<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emp_job extends Model
{
  protected $fillable= [
          'emp_id',
      'emp_name',
      'designation',
      'salaray',
      'bonus',
      'status',
      'signing_date',
      'departing_date',
];

public function emp_infos()
{
  return $this->hasOne('App\Emp_info');
}

}
