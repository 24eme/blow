<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

  protected $guarded = [];  //à changer pour le sécurité demandez à Sidi
  protected $dates = [
        'start',
        'end',
    ];
  protected $dateFormat = 'Y-m-dTH:i:sZ';

  public function rooms()
  {
    return $this->belongsTo('App\Room');
  }

  public function users()
  {
    return $this->belongsTo('App\User');
  }

}
