<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Room;

class RoomController extends Controller
{
  public function show(){
      $rooms = Room::all();
      return $rooms->toJson();
  }

  public function update(){
    $roomId = $request->input('room_id');

    if($roomId!=null){

       $title = $request->input('room_name');
       $equipment=$request->input('equipment');
       $capacity=$request->input('capacity');
       $eventColor=$request->input('eventColor');

       $data = array('title'=>$title,'equipement'=>$equipment,'capacity'=>$capacity,'eventColor'=>$eventColor);
       $query =  DB::table('rooms')
       ->where('id', $roomId)
       ->update($data);

        return redirect()->to(url()->previous() . '#reserver')->with('failUnavailable',
                'Votre événement a été modifié');
}
       return redirect()->to(url()->previous() . '#reserver')->with('failUnavailable',
             'On ne peut pas modifié un événement inexistant');
  }

}
