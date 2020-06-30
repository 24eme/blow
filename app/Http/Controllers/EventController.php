<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

class EventController extends Controller
{

//function pour afficher les evennements

  public function show(){

    $events = Event::all();
    return $events->toJson();

  }


   //supprimer un evennement
    public function deleteEvent(Request $request, $idEvent)
  {

         $idEvent = $request->input('event_id');

        $events = Event::find($idEvent)->delete();

        return response()->json(array('succes'=> 200, 'data' =>$events, 'message' =>'Event a ete supprimer'));

}


}
