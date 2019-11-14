<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emp_info extends Model
{
  protected $fillable = [
      'emp_image',
      'emp_fname',
      'emp_lname',
      'emp_phone1',
      'emp_phone2',
      'emp_email',
      'emp_nid',
      'emp_birth_date',
      'emp_age',
      'emp_preaddress',
      'emp_peraddress',
      'emp_marital_status',

  ];

}
