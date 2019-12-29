<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class E_contact_info extends Model
{
  protected $fillable = [

      'ec_user_id',
      'emp_phone1',
      'emp_phone2',
      'emp_email',
      'emp_preaddress',
      'emp_peraddress',


  ];

  public function users()
  {
    return $this->hasOne('App\User','id','ec_user_id');
  }
  public function emergancys()
  {
    return $this->belongsTo('App\E_contact_info','ec_user_id');
  }
  public function personals()
  {
    return $this->belongsTo('App\E_personal_info','ec_user_id');
  }
}
