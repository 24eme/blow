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



  protected $eventReserve;
  protected $eventUpdate;

  public function __construct() {

    $this->eventUpdate = new Event;
    $this->eventReserve = new Event;

  }

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


      return $this->eventReserve->isReserve($request);


    }


     public function update(Request $request){

     return $this->eventUpdate->doUpdate($request);


     }


   public function delete(Request $request,$id){
        $event = Event::find($id)->delete();

        return redirect()->back()->with('success', 'Votre événement a bien été supprimé');
    }

}
