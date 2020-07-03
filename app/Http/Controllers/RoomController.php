<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


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
  public function create(Request $request){

        $request->validate([
        'room_name' => 'required',
        'capacity' => 'integer',  //ajouter la validation de l'image

        ]);

       $room = new Room;

       $room->title = $request->room_name;
       $room->equipment = $request->equipment;
       $room->capacity = $request->capacity;
       $room->eventColor = $request->eventColor;
       $room->image=$request->image;
       $room->save();

      //ajouter dans le dossier image l'image

      $image = $request->file('image');
      //dd($image);
      $storage=Storage::put('https://ressources.blogdumoderateur.com/2013/09/google-logo.png', 'public');
      dd($storage);
     // $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
     //
     // $destinationPath = public_path('/thumbnail');
     //
     // $img = Image::make($image->getRealPath());
     //
     // $img->resize(100, 100, function ($constraint) {
     //
     //     $constraint->aspectRatio();
     //
     // })->save($destinationPath.'/'.$input['imagename']);
     //
     // /*After Resize Add this Code to Upload Image*/
     // $destinationPath = public_path('/');
     //
     //
     // $image->move($destinationPath, $input['imagename']);






      return redirect('/')->with('success', 'La salle a bien été ajouté');
  }

  public function update(Request $request){

    $roomId = $request->input('room_id');

    if($roomId!=null){

       $title = $request->input('room_name');
       $equipment=$request->input('equipment');
       $capacity=$request->input('capacity');
       $eventColor=$request->input('eventColor');
       $image=$request->input('image');

       Room::where('id', $roomId)
          ->update(['title' => $title,'equipment'=>$equipment,'capacity'=>$capacity,'eventColor'=>$eventColor]);
        return ('la salle a été modifié');
    }

      return ("cette salle n'existe pas");

  }
  public function delete(Request $request,$id){

         $room = Room::find($id)->delete();
             return redirect('/')->with('success', 'Votre salle a bien été supprimé');
   }

}
