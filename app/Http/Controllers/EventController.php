<?php

namespace App\Http\Controllers;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
// use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function showEvents(){
      $events = Event::all();
      return view('index', [
          'events' => $events
        ]);
    }

    public function createEventsJson(){
      $events = DB::table('events')->select('id','title', 'start','resourceId','end')->get();
      return response(json_encode($events), 200)->header('Content-Type', 'application/json');
    }

    public function ManagedEvent(Request $request){
      switch ($request->input('action')) {
           case 'Ajouter':
             $nom = $request->input('event_name');
             $start = $request->input('start_date').'T'.$request->input('start_hour').'Z';
             $end= $request->input('end_date').'T'.$request->input('end_hour').'Z';
             $resource = $request->input('room_id');

             $start_date = $request->input('start_date').$request->input('start_hour');
             $date = Carbon::now('Europe/Paris')->format('Y-m-dH:i:s');
             $current_user= Auth::user()->id;

             date_default_timezone_set('Europe/Paris');

              echo($date);
              echo($start_date);



               if ($start_date < $date){ //si la date et l'heure sont déjà je ne peux pas réserver
               return redirect()->to(url()->previous() . '#reserver')->with('failPassed',
               'Pour l\'instant, on ne peut pas remonter dans le temps, désolé :(');;
             }

             //Vérifier qu'il n'y a pas déjà un événement dans l'interval du créneau soufaité.
             $query =DB::select('select * from events where resourceId =:resource and ( (start <=:start and end >=:end) or (start >=:start and end<=:end))',
             ['resource'=>$resource,'start' => $start, 'end' => $end]);

             // echo(count($query));
             if(count($query)>0){
                  return redirect()->to(url()->previous() . '#reserver')->with('failUnavailable',
                  'Votre événement n\'a pas été ajouté car le créneau est déja réservé pour cette salle');
               }

             $data=array('title'=>$nom,'start'=>$start,"end"=>$end,"resourceId"=>$resource,"user_id"=>$current_user);
             DB::table('events')->insert($data);
               return redirect()->to(url()->previous() . '#reserver')->with('success',
               'Votre événement a été ajouté, vous pouvez désormais envoyez un lien de partage');

           case 'Modifier':
             $eventID = $request->input('event_id');
             $current_user=Auth::user()->id;

            if($eventID!=null){
            //dd($current_user);
            [$user_event] = DB::select('select user_id from events where id =:id',['id'=>$eventID]);
            //dd($user_event->user_id);
            $user= $user_event->user_id;


            if($current_user!=$user){
                 return redirect()->to(url()->previous() . '#reserver')->with('failUnavailable',
                 'Ce n\'est pas votre événement');
              }
                    $title = $request->input('event_name');

                    $start = $request->input('start_date').'T'.$request->input('start_hour').'Z';
                    $end= $request->input('end_date').'T'.$request->input('end_hour').'Z';
                    $resource = $request->input('room_id');
                     $start_date = $request->input('start_date').$request->input('start_hour');
                     $date = Carbon::now('Europe/Paris')->format('Y-m-dH:i:s');

                     if ($start_date < $date){     //si la date et l'heure sont déjà je ne peux pas modifier
                     return redirect()->to(url()->previous() . '#reserver')->with('failPassed',
                     'Pour l\'instant, on ne peut pas remonter dans le temps, désolé :(');;
                     }


                     //Vérifier qu'il n'y a pas déjà un événement dans l'interval du créneau soufaité.
                    $query =DB::select('select * from events where resourceId =:resource and id!=:eventID and ( (start <=:start and end >=:end) or (start >=:start and end<=:end))',
                    ['resource'=>$resource,'eventID' => $eventID,'start' => $start, 'end' => $end]);


                    // echo(count($query));
                    if(count($query)>0){
                         return redirect()->to(url()->previous() . '#reserver')->with('failUnavailable',
                                 'Votre événement n\'a pas été ajouté car le créneau est déja réservé pour cette salle');
                    }

                    $data = array('title'=>$title,'start'=>$start,'end'=>$end);
                    $status =  DB::table('events')
                    ->where('id', $eventID)
                    ->update($data);

                     return redirect()->to(url()->previous() . '#reserver')->with('failUnavailable',
                             'Votre événement a été modifié');
          }
                    return redirect()->to(url()->previous() . '#reserver')->with('failUnavailable',
                          'On ne peut pas modifié un événement inexistant');
           case 'Supprimer':
           $idEvent = $request->input('event_id');
           if($idEvent!=null){
           $current_user=Auth::user()->id;
             //dd($current_user);
             [$user_event] = DB::select('select user_id from events where id =:id',['id'=>$idEvent]);
             //dd($user_event->user_id);
             $user= $user_event->user_id;

             if($current_user!=$user){
                  return redirect()->to(url()->previous() . '#reserver')->with('failUnavailable',
                  'Ce n\'est pas votre événement');
               }

                $status = Event::find($idEvent)->delete();
                return redirect()->to(url()->previous() . '#reserver')->with('failUnavailable',
                       'Votre événement a bien été éffacé');;
            }
                return redirect()->to(url()->previous() . '#reserver')->with('failUnavailable',
                       'Vous ne pouvez pas supprimé un événement inexistant');;

       }
    }


  }

?>
