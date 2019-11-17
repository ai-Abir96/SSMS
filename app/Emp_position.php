<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emp_position extends Model
{
  protected $fillable = [
        'name'
    ];


    public function emp_jobs()
    {
      return $this->belongsTo('App\Emp_job');
    }
}
