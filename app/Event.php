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

  public function setDate($se,$date,$time){
      return $this->$se=($date.'T'.$time.'Z');
      //return $this->event;
  }

  protected function convertDate($date){
    $date=str_replace('T', '', $date);
    $date=str_replace('Z','',$date);
    return $date;
  }

  protected function convertDateTimetoDate($date){
    $date=substr($date,0,10);
    return $date;
  }

  public function sameDate($date){
    $user_id=$this->user_id;
    $date=$this->convertDateTimetoDate($date);
    $query= Event::whereDate('start', $date)
          ->where('user_id','=',$user_id)
          ->count();

    return $query;
  }

  public function moreThan3hour(){
    $start= new DateTime($this->convertDate($this->start));
    $end = new DateTime($this->convertDate($this->end));
    if((date_diff($start, $end)->format('%h'))>"3"){
      return True;
    }
    return False;
  }


  public function datesCoherent(){
    $start=$this->convertDate($this->start);
    $end=$this->convertDate($this->end);
    if($start<=$end){
      return True;
    }
    return False;
  }

  public function isPassed(){
    $start=$this->convertDate($this->start);
    $now = Carbon::now('Europe/Paris')->format('Y-m-dH:i');
    if($start<$now){
      return True;
    }
    return False;
  }

//Compte le nb d'events dans la même plage horaire séléctionnée
  public function isReserved(){
    $start=$this->start;
    $end=$this->end;
    $resource=$this->resourceId;

    $query= Event::where ('resourceId','=', $resource)
          ->where (function($query)use ($start,$end){
              $query->where('start', '<=', $start)
                    ->where('end', '>=', $end)
                    ->orWhere(function($query)use ($start,$end){
                        $query->where('start', '>=', $start)
                              ->where('end', '<=',$end)
                              ->orWhere(function($query)use ($start,$end){
                                $query->where('end','>',$start)
                                      ->where('start','<',$start)
                                      ->orWhere(function($query)use ($start,$end){
                                        $query->where('start','<',$end)
                                              ->where('end','>',$end);
                                      });
                              });
                        });
              })

          ->count();
    if($query>0){
      return True;
    }
    return False;
  }

  public function isReservedUpdate(){
    $start=$this->start;
    $end=$this->end;
    $resource=$this->resourceId;
    $eventID=$this->id;

    $query= Event::where ('resourceId','=', $resource)
          ->where ('id','!=',$eventID)
          ->where (function($query)use ($start,$end){
              $query->where('start', '<=', $start)
                    ->where('end', '>=', $end)
                    ->orWhere(function($query)use ($start,$end){
                        $query->where('start', '>=', $start)
                              ->where('end', '<=',$end)
                              ->orWhere(function($query)use ($start,$end){
                                $query->where('end','>',$start)
                                      ->where('start','<',$start)
                                      ->orWhere(function($query)use ($start,$end){
                                        $query->where('start','<',$end)
                                              ->where('end','>',$end);
                                      });
                              });
                        });
              })



           ->count();
    if($query>0){
         return True;
       }
         return False;
  }

}
