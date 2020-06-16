<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
  protected $guarded = [];

  public function rooms()
    {
     return $this->hasMany('App\Event');

    }
}
