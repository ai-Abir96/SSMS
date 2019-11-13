<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_info extends Model
{
  protected $fillable = [
      'employee_fname',
      'employee_lname',
      'employee_image',
      'employee_nid',
      'employee_birth_date',
      'employee_address',
      'employee_contact_no',
      'employee_alternate_cn',
      'employee_email',
      'employee_marital_status',

  ];



  
}
