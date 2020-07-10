<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Event;
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

    $start=$this->event->setDate('start',$request->start_date,$request->start_hour);
    $end=$this->event->setDate('end',$request->end_date,$request->end_hour);


    $event = new Event;
    $event->title = $nom;
    $event->start = $start;
    $event->end = $end;
    $event->resourceId = $resource;
    $event->user_id=$current_user;
    $event->confirmed=false;

    if ($this->event->isPassed()){
      return redirect()->back()->with('error', 'Impossible d\'effectuer une réservation dans le passé');
    }

    if($this->event->datesCoherent()==False){
      return redirect()->back()->with('error', 'Impossible d\'effectuer une réservation dont les heures sont incohérentes');
    }

    if($this->event->moreThan3hour()){
      return redirect()->back()->with('error', 'Impossible d\'effectuer une réservation sur plus de 3 heures');
    }

    if($event->alreadyReserved() && $event->alreadyMoreThan3hour()){
      return redirect()->back()->with('error', 'Vous avez déjà réservé plus de 3 heures dans la journée');

    }

    //Si un événement trouvé, message d'erreur
    if ($event->isReserved()){
      return redirect()->back()->with('error', 'Votre événement n\'a pas pu être ajouté car l\'horaire est déjà prise');
    }

    $event->save();
    return redirect()->back()->with('success', 'Votre événement a bien été ajouté');
    }


     public function update(Request $request){

       $eventID = $request->input('event_id');  // à enlever

       $nom= $request->event_name;
       $resource=$request->room_id;
       $current_user=Auth::user()->id;

       $start=$this->event->setDate('start',$request->start_date,$request->start_hour);
       $end=$this->event->setDate('end',$request->end_date,$request->end_hour);


       $event = Event::find($eventID);
       $event->title = $nom;
       $event->start = $start;
       $event->end = $end;
       $event->resourceId = $resource;

      if($eventID!=null){

      if ($this->event->isPassed()){
          return redirect()->back()->with('error', 'Impossible d\'effectuer une réservation dans le passé');
      }

      if($this->event->datesCoherent()==False){
         return redirect()->back()->with('error', 'Impossible d\'effectuer une réservation dont les heures sont incohérentes');
      }

      if($this->event->moreThan3hour()){
         return redirect()->back()->with('error', 'Impossible d\'effectuer une réservation sur plus de 3 heures');
      }


       if ($event->isReservedUpdate()){
         return redirect()->back()->with('error', 'Votre événement n\'a pas pu être modifié  car l\'horaire est déjà prise');
       }

       $event->save();
       return redirect()->back()->with('success', 'Votre événement a bien été modfié');

     }
}




   public function delete(Request $request,$id){
        $event = Event::find($id)->delete();

        return redirect()->back()->with('success', 'Votre événement a bien été supprimé');
    }

}
