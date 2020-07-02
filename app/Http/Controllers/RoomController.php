<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Room;

class RoomController extends Controller
{
  public function index(){
      $rooms = Room::all();
      return view('home', compact('rooms'));
  }

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
  public function create(Request $request){


    $request->validate([
    'name' => 'required',
    'detail' => 'required',
    ]);

   $room = new Room;

   $room->title = $request->title;
   $room->equipment = $request->equipment;
   $room->capacity = $request->capacity;
   $room->eventColor = $request->eventColor;
   $room->save();

   Romm::create($request->all());

    return redirect('/')->with('success', 'La salle a bien été ajouté');
  }

  public function delete($roomname){
    //$room = Room::find($request->title);
    dd($roomname);
    $room->delete();

    return redirect('home')->with('success', 'La salle a été supprimé !');
  }
}
