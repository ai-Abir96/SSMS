<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emp_info extends Model
{
  protected $fillable = [
      'id',
      'emp_user_id',
      'emp_image',
      'emp_fname',
      'emp_lname',
      'emp_phone1',
      'emp_phone2',
      'emp_email',
      'employee_nid',
      'emp_birth_date',
      'emp_age',
      'emp_blood',
      'emp_preaddress',
      'emp_peraddress',
      'emp_marital_status',
      'ec_name',
      'ec_phone1',
      'ec_phone2',
      'ec_relation',
      'ec_address',


  ];
  protected $hidden = [

  ];

  public function users()
  {
    return $this->hasOne('App\User','id','emp_user_id');
  }

  public function emp_jobs()
  {
    return $this->belongsTo('App\Emp_job');
  }



}
