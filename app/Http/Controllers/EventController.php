<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Event;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;
use Validator;
class EventController extends Controller
{

//function pour afficher les evennements

  public function show(){
    $events = Event::all();
    return $events->toJson();
  }


  public function create(Request $request){
    date_default_timezone_set('Europe/Paris');

    //pour remplir la base de données
    $nom= $request->input('event_name');
    $start=$request->input('start_date').'T'.$request->input('start_hour').'Z';
    $end=$request->input('end_date').'T'.$request->input('end_hour').'Z';
    $resource=$request->input('room_id');
    $current_user=Auth::user()->id;            //commenter cette ligne pour que ça fonctionne

    //pour faire des comparaison entre les datetimes
    $end_date=$request->input('end_date').$request->input('end_hour');
    $start_date=$request->input('start_date').$request->input('start_hour');
    $now=Carbon::now('Europe/Paris')->format('Y-m-dH:i');

    //echo($start);
    $validator = Validator::make($request->all(), [
      // 'room_id' =>'integer',
      'event_name' => 'alpha',
      'start_date' => 'date|date_format:Y-m-d',
      'start_hour' => 'date|date_format:H:i',
      'end_date' => 'date|date_format:Y-m-d',
      'end_hour' => 'date|date_format:H:i'
    ]);

    if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }



    if($start_date>$end_date){
        return('Le début est après la fin ? ');
    }
    if($start_date<$now){
      return ('Pas possible de retourner dans le temps');
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
      return('horaire déjà pris');
      }
    // $data=array('title'=>$nom,'start'=>$start,"end"=>$end,"resourceId"=>$resouce,"user_id"=>$current_user);  //pour voir ça fonctionne il faut
    // DB::table('events')->insert($data);
                                                                       //donner $resource =1 et user_id=1
    $event = new App\Event;
    $event->title = $nom;
    $event->start = $start;
    $event->end = $end;
    $event->resourceId=$resource;
    $event->user_id=$current_user;
    $event->save();
    return ('événement à bien été rajouté');

    }


   //modifier un evennement


      public function update(Request $request, $idEvent ){
      $idEvent = $request->input('event_id');

      if($idEvent!=null){
      $title= $request->input('event_name');
      $start=$request->input('start_date').'T'.$request->input('start_hour').'Z';
      $end=$request->input('end_date').'T'.$request->input('end_hour').'Z';
      $resource=$request->input('room_id');


        $events = Event::where('id', $idEvent)
            ->update(['title' => $title,'start'=>$start,'end'=>$end,'resourceId'=>$resource]);
          // return ('event a été modifié');
          return response()->json(array('succes'=> 200, 'data' =>$events, 'message' =>'Event a ete modifié'));
        }


   }


       //supprimer un evennement
        public function delete(Request $request, $idEvent)
      {

              $idEvent = $request->input('event_id');

              $events = Event::find($idEvent)->delete();

              return response()->json(array('succes'=> 200, 'data' =>$events, 'message' =>'Event a ete supprimer'));
        }




}
