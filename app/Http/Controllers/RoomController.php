<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Room;

class RoomController extends Controller
{
  public function show(){
      $rooms = Room::all();
      return $rooms->toJson();
  }

  public function update(Request $request){
    $roomId = $request->input('room_id');

    if($roomId!=null){

       $title = $request->input('room_name');
       $equipment=$request->input('equipment');
       $capacity=$request->input('capacity');
       $eventColor=$request->input('eventColor');

       Room::where('id', $roomId)
          ->update(['title' => $title,'equipment'=>$equipment,'capacity'=>$capacity,'eventColor'=>$eventColor]);
        return ('la salle a été modifié');
      }
      
      return ("cette salle n'existe pas");

}
}
