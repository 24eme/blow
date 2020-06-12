<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{

  protected $guarded = [];  //à changer pour le sécurité demandez à Sidi
  public function evenements()
  {
      return $this->hasMany('App\Evenement');
  }
}
