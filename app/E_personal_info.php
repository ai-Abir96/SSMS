<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class E_personal_info extends Model
{
  protected $fillable = [
      'e_p_id',
      'ep_user_id',
      'emp_image',
      'emp_fname',
      'emp_lname',
      'employee_nid',
      'emp_birth_date',
      'emp_age',
      'emp_gender',
      'emp_blood',
      'emp_marital_status',

  ];

  public function users()
  {
    return $this->hasOne('App\User','id','ep_user_id');
  }
  public function contacts()
  {
    return $this->belongsTo('App\E_contact_info','ep_user_id');
  }
  public function emergancys()
  {
    return $this->belongsTo('App\E_personal_info','ep_user_id');
  }
}
