<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    public function rooms()
    {
      return $this->belongsTo('App\Room');
    }

    public function users()
    {
      return $this->belongsTo('App\User');
  }

}
