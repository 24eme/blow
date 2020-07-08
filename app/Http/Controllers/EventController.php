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

  protected $event;



  public function __construct() {

    $this->event = new Event;


  }

  public function show(){
          $events = Event::all();
          return $events->toJson();
  }

  public function validateEvent($eventID){

       $event = Event::find($eventID);
       $event->confirmed=true;
       $event->save();

       return redirect()->back()->with('success', 'Votre événement a bien été validé');

  }


  public function create(Request $request){


    $request->validate([
    'room_id' =>'integer',
    'event_name' => 'required',
    'start_date' => 'date|date_format:Y-m-d',
    'end_date' => 'date|date_format:Y-m-d',
    'capacity' => 'integer',  //ajouter la validation de l'image
    ]);

    $nom= $request->event_name;
    $resource=$request->room_id;
    $current_user=Auth::user()->id;

    $start= $this->event->setDateTZ($request->start_date, $request->start_hour);
    $end= $this->event->setDateTZ($request->end_date, $request->end_hour);

    $end_date = $this->event->setDate($request->end_date, $request->end_hour);
    $start_date = $this->event->setDate($request->start_date, $request->start_hour);



    if ($this->event->isPassed($start_date)){
      return redirect()->back()->with('error', 'Impossible d\'effectuer une réservation dans le passé');
    }

    if($this->event->datesCoherent($start_date,$end_date)==False){
      return redirect()->back()->with('error', 'Impossible d\'effectuer une réservation dont les heures sont incohérentes');
    }

    if($this->event->moreThan3hour($start_date,$end_date)){
      return redirect()->back()->with('error', 'Impossible d\'effectuer une réservation sur plus de 3 heures');
    }

    //Compte le nb d'events dans la même plage horaire séléctionnée 
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

    $this->event->saveEvent($nom,$start,$end,$resource,$current_user);
    return redirect()->back()->with('success', 'Votre événement a bien été ajouté');
    }


     public function update(Request $request){

       $eventID = $request->input('event_id');  // à enlever

       $nom= $request->event_name;
       $resource=$request->room_id;
       $current_user=Auth::user()->id;

       $end_date = $this->event->setDate($request->end_date, $request->end_hour);
       $start_date = $this->event->setDate($request->start_date, $request->start_hour);

       $start= $this->event->setDateTZ($request->start_date, $request->start_hour);
       $end= $this->event->setDateTZ($request->end_date, $request->end_hour);


      if($eventID!=null){//sidi  à revoir

      [$user_event] = DB::select('select user_id from events where id =:id',['id'=>$eventID]);

      $user= $user_event->user_id;
      // if($current_user!=$user){
      //
      //      return redirect()->back()->with('error', 'Ce n\'est pas votre événement');
      //   }


      if ($this->event->isPassed($start_date)){
          return redirect()->back()->with('error', 'Impossible d\'effectuer une réservation dans le passé');
      }

      if($this->event->datesCoherent($start_date,$end_date)==False){
         return redirect()->back()->with('error', 'Impossible d\'effectuer une réservation dont les heures sont incohérentes');
      }

      if($this->event->moreThan3hour($start_date,$end_date)){
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

       $this->event->saveUpdateEvent($nom,$start,$end,$resource,$eventID);
       return redirect()->back()->with('success', 'Votre événement a bien été modfié');

     }
}

   public function delete(Request $request,$id){
        $event = Event::find($id)->delete();

        return redirect()->back()->with('success', 'Votre événement a bien été supprimé');
    }

}
