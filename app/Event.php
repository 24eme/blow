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

   public function isValide(){

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

  public function doUpdate ($request){

    date_default_timezone_set('Europe/Paris');
    $eventID = $request->input('event_id');
    $end_date=$request->end_date.$request->end_hour;
    $start_date=$request->start_date.$request->start_hour;
    $current_user=Auth::user()->id;

   if($eventID!=null){

   [$user_event] = DB::select('select user_id from events where id =:id',['id'=>$eventID]);//sidi  à revoir

   $user= $user_event->user_id;


   if($current_user!=$user){

        return redirect()->back()->with('error', 'Ce n\'est pas votre événement');
     }


    $nom= $request->event_name;
    $start=$request->start_date.'T'.$request->start_hour.'Z';
    $end=$request->end_date.'T'.$request->end_hour.'Z';
    $resource=$request->room_id;
    $now = Carbon::now('Europe/Paris')->format('Y-m-dH:i');
            //commenter cette ligne pour que ça fonctionne


    if($start_date>$end_date){
      return redirect()->back()->with('error', 'Impossible d\'effectuer une réservation dont les heures sont incohérentes');
    }
    if($start_date<$now){
      return redirect()->back()->with('error', 'Impossible d\'effectuer une réservation avant aujourd\'hui');
    }

    //limitation de l'intervalle de temps à réserver ici max 3h par jours.
    $start_date = new DateTime($start_date);
    $end_date = new DateTime($end_date);

    if((date_diff($start_date, $end_date)->format('%h'))>"3"){
      return redirect()->back()->with('error', 'Impossible d\'effectuer une réservation sur plus de 3 heures');
    }

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

    if ($query>1){
      return redirect()->back()->with('error', 'Votre événement n\'a pas pu être modifié  car l\'horaire est déjà prise');
    }

      $eventID = $request->event_id;
      $event = Event::find($eventID);
      $event->title = $request->event_name;
      $event->start = $request->start_date.'T'.$request->start_hour.'Z';
      $event->end = $request->end_date.'T'.$request->end_hour.'Z';
      $event->resourceId = $request->room_id;
      $event->save();

      return redirect()->back()->with('success', 'Votre événement a bien été modfié');
 }
  }


}
