<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
  protected $guarded = [];

  public function salles()
    {
     return $this->belongsTo('App\Salle');
    }
}
