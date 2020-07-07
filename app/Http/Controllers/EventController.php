<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Event;
use DB;
use Carbon\Carbon;
use Auth;
use Validator;
use DateTime;
class EventController extends Controller{

  public function show(){
          $events = Event::all();
          return $events->toJson();
  }

  public function validateEvent($eventID){
       $event = Event::find($eventID);
       $event->confirmed=false;
       $event->save();

       return redirect()->back()->with('success', 'Votre événement a bien été ajouté');

  }

  public function create(Request $request){
    date_default_timezone_set('Europe/Paris');
    $nom= $request->event_name;
    $start=$request->start_date.'T'.$request->start_hour.'Z';
    $end=$request->end_date.'T'.$request->end_hour.'Z';
    $resource=$request->room_id;
    $current_user=Auth::user()->id;            //commenter cette ligne pour que ça fonctionne
    $end_date=$request->end_date.$request->end_hour;
    $start_date=$request->start_date.$request->start_hour;

    $now = Carbon::now('Europe/Paris')->format('Y-m-dH:i');

    $request->validate([
    'room_id' =>'integer',
    'event_name' => 'required',
    'start_date' => 'date|date_format:Y-m-d',
    'end_date' => 'date|date_format:Y-m-d',
    'capacity' => 'integer',  //ajouter la validation de l'image
    ]);

    if($start_date>$end_date){
      return redirect()->back()->with('error', 'Impossible d\'effectuer une réservation dont les heures sont incohérentes');
    }
    if($start_date<$now){
      return redirect()->back()->with('error', 'Impossible d\'effectuer une réservation dans le passé');
    }

    //limitation de l'intervalle de temps à réserver ici max 3h par jours.
    $start_date = new DateTime($start_date);
    $end_date = new DateTime($end_date);

    if((date_diff($start_date, $end_date)->format('%h'))>"3"){
      return redirect()->back()->with('error', 'Impossible d\'effectuer une réservation sur plus de 3 heures');
    }


  //Honorine
  // A revoir problème pour comparer seulement la date:
  // Ce qu on doit faire : comparer l id user dans la meme journé le nombre de reservation si plus 1 faire l addition des heures
  // et voir si inférieur à 3 si inférieur à 3 c est bon sinon retourner 'Impossible d\'effectuer une réservation sur plus de 3 heures par jour'
    // dd((date_diff($start_date, $end_date)->format('%d')));
    // $query=Event::where('user_id','==',$current_user)
    //       ->where('start'.date('Y-m-d'),'=',$start.date('Y-m-d'))
    //       // ->where((date_diff('start',$start_date)->format('Y-m-d'))=="0")
    //       // ->where((date_diff('end',$end_date)->format('Y-m-d'))=="0")
    //       ->count();
    //
    // dd($query);
    // if($query>0){
    //   return redirect()->back()->with('error', 'Votre événement n\'a pas pu être ajouté car l\'horaire est déjà prise');
    // }

    
    //Compte le nb d'events dans la même plage horaire séléctionnée A REVOIR CA NE MARCHE PAS
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

    //Si un événement trouvé, message d'erreur
    if ($query>0){
      return redirect()->back()->with('error', 'Votre événement n\'a pas pu être ajouté car l\'horaire est déjà prise');
    }

    $event = new Event;
    $event->title = $nom;
    $event->start = $start;
    $event->end = $end;
    $event->resourceId = $resource;
    $event->user_id=$current_user;
    $event->confirmed=false;
    $event->save();

            return redirect()->back()->with('success', 'Votre événement a bien été ajouté');

    }


     public function update(Request $request){

     date_default_timezone_set('Europe/Paris');
     $eventID = $request->input('event_id');
     $end_date=$request->end_date.$request->end_hour;
     $start_date=$request->start_date.$request->start_hour;
     $current_user=Auth::user()->id;

    if($eventID!=null){

    [$user_event] = DB::select('select user_id from events where id =:id',['id'=>$eventID]);

    $user= $user_event->user_id;


    if($current_user!=$user){

         return redirect()->back()->with('error', 'Ce n\'est pas votre événement');
      }


     $nom= $request->event_name;
     $start=$request->start_date.'T'.$request->start_hour.'Z';
     $end=$request->end_date.'T'.$request->end_hour.'Z';
     $resource=$request->room_id;
     $now = Carbon::now('Europe/Paris')->format('Y-m-dH:i');


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

   public function delete(Request $request,$id){
        $event = Event::find($id)->delete();

        return redirect()->back()->with('success', 'Votre événement a bien été supprimé');
    }

}
