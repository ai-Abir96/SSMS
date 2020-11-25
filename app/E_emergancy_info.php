<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class E_emergancy_info extends Model
{
  protected $fillable = [
      'id',
      'ee_user_id',
      'ec_name',
      'ec_phone1',
      'ec_phone2',
      'ec_gender',
      'ec_relation',
      'ec_address',


  ];

  public function users()
  {
    return $this->hasOne('App\User','id','ee_user_id');
  }
  public function contacts()
  {
    return $this->belongsTo('App\E_contact_info','ee_user_id');
  }
  public function personals()
  {
    return $this->belongsTo('App\E_personal_info','ee_user_id');
  }

}
