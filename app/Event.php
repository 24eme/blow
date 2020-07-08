<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use User;
use Auth;
use DB;
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


  public function setDate($date, $time){
    return ($date.$time);
  }

  public function setDateTZ($date,$time){
    return ($date.'T'.$time.'Z');
  }

  public function moreThan3hour($start,$end){
    $start= new DateTime($start);
    $end = new DateTime($end);
    if((date_diff($start, $end)->format('%h'))>"3"){
      return True;
    }
    return False;
  }

  public function datesCoherent($start,$end){
    if($start<$end){
      return True;
    }
    return False;
  }

  public function isPassed($start){
    $now = Carbon::now('Europe/Paris')->format('Y-m-dH:i');
    if($start<$now){
      return True;
    }
    return False;
  }

  public function saveEvent($nom,$start,$end,$resource,$current_user){
    $event = new Event;
    $event->title = $nom;
    $event->start = $start;
    $event->end = $end;
    $event->resourceId = $resource;
    $event->user_id=$current_user;
    $event->confirmed=false;
    $event->save();
  }

  public function saveUpdateEvent($nom,$start,$end,$resource,$eventID){
    $event = Event::find($eventID);
    $event->title = $nom;
    $event->start = $start;
    $event->end = $end;
    $event->resourceId = $resource;
    $event->save();
  }

}
