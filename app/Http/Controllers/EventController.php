<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Event;

use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;
use Validator;
class EventController extends Controller{

  public function show(){
          $events = Event::all();
          return $events->toJson();
  }

  public function create(Request $request){
    date_default_timezone_set('Europe/Paris');

    $nom= $request->event_name;
    $start=$request->start_date.'T'.$request->start_hour.'Z';
    $end=$request->end_date.'T'.$request->end_hour.'Z';
    $resource=$request->room_id;

//    $current_user=Auth::user()->id;            //commenter cette ligne pour que ça fonctionne

    $end_date=$request->end_date.$request->end_hour;
    $start_date=$request->start_date.$request->start_hour;

    $now = Carbon::now('Europe/Paris')->format('Y-m-dH:i');

  //   $validator = Validator::make($request->all(), [
  //     'room_id' =>'integer',
  //     'event_name' => 'alpha',
  //     'start_date' => 'date|date_format:Y-m-d',
  // //    'start_hour' => 'date|date_format:H:i',
  //     'end_date' => 'date|date_format:Y-m-d',
  // //    'end_hour' => 'date|date_format:H:i'
  //   ]);
  //
  //   if ($validator->fails()) {
  //           return back()->withErrors($validator)->withInput();
  //   }

  $request->validate([
  'room_id' =>'integer',
  'event_name' => 'required',
  'start_date' => 'date|date_format:Y-m-d',
  'end_date' => 'date|date_format:Y-m-d',
  'capacity' => 'integer',  //ajouter la validation de l'image
  ]);


    if($start_date>$end_date){
      // return redirect('/')->with('failPassed', 'Impossible d\'effectuer une réservation dont les heures sont incohérentes');
      return redirect('/')
        ->with('error','Impossible d\'effectuer une réservation dont les heures sont incohérentes!');
    }
    if($start_date<$now){
      // return redirect('/')->with('failPassed', 'Impossible d\'effectuer une réservation avant aujourd\'hui');
      return redirect('/')
        ->with('error', 'Pour l\'instant, on ne peut pas remonter dans le temps, désolé');
    }


    $query= DB::table('events')                                //compte le nombre d'events dans la même plage horaire séléctionner
          ->where ('resourceId','=', $resource)                               //changer $resource par 1 pour que ça fonctionne
          ->where (function($query)use ($start,$end){
              $query->where('start', '<=', $start)
                    ->where('end', '>=', $end);
              })
          ->orWhere(function($query)use ($start,$end){
              $query->where('start', '>=', $start)
                    ->where('end', '<=',$end);
              })
          ->count();


    if ($query>0){ //s'il y plus de 0 event qui se trouve sur la plage horaire je ne le créer pas
      // return('horaire déjà pris');
      return redirect('/')
        ->with('error','horaire déjà pris');
    }
    // $data=array('title'=>$nom,'start'=>$start,"end"=>$end,"resourceId"=>$resouce,"user_id"=>$current_user);  //pour voir ça fonctionne il faut
    // DB::table('events')->insert($data);
                                                                       //donner $resource =1 et user_id=1
    $event = new Event;
    $event->title = $nom;
    $event->start = $start;
    $event->end = $end;
    $event->resourceId = $resource;
    //$event->user_id=$current_user;
    $event->user_id=1;// seulement pour tester
    $event->save();

    return redirect('/')->with('success', 'Votre événement a bien été ajouté');

    }

    public function update(Request $request){

        $EVENTID = $request->event_id;

        $EVENT = Event::find($EVENTID);

        $EVENT->title = $request->event_name;
        $EVENT->start = $request->start_date.'T'.$request->start_hour.'Z';
        $EVENT->end = $request->end_date.'T'.$request->end_hour.'Z';
        $EVENT->resourceId = $request->room_id;
        $EVENT->save();

      // $idEvent = $request->input('event_id');
      //
      // if($idEvent!=null){
      // $title= $request->input('event_name');
      // $start=$request->input('start_date').'T'.$request->input('start_hour').'Z';
      // $end=$request->input('end_date').'T'.$request->input('end_hour').'Z';
      // $resource=$request->input('room_id');
      //
      //
      //   $events = Event::where('id', $idEvent)
      //       ->update(['title' => $title,'start'=>$start,'end'=>$end,'resourceId'=>$resource]);
      //     // return ('event a été modifié');
      // return redirect('/')->with('success', 'Votre événement a bien été modfié');
      return redirect('/')
        ->with('success','Votre événement a bien été modfié avec succès!');


   }


   public function delete(Request $request,$id){

          $events = Event::find($id)->delete();
              return redirect('/')
                ->with('success','Votre événement a bien été supprimé');
    }




}
