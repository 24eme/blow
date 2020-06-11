<?php

namespace App\Http\Controllers;
use App\Providers\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvenementController extends Controller
{
    public function list(){
      $events = Evenement::all();

      return view('index', [
          'events' => $events
        ]);


            }

    public function listTest(){
      //$events = Evenement::all();
      $events = DB::table('evenements')->select('title', 'start','resourceId','end')->get();
      return response(json_encode($events), 200)->header('Content-Type', 'application/json');


      // return view('json-list-events',
      //     [
      //       'events' => $events
      //     ]
      //   );
      }

      // public function Reserved(){
      //     return view('frontend/home');      //a chnger.
      // }
      //
      // public function InsertEvent(Request $request){
      //
      //
      //   $nom = $request->input('nom');
      //
      //   $start = $request->input('datededebut').'T'.$request->input('heurededebut').'Z';
      //   $end= $request->input('datedefin').'T'.$request->input('heuredefin').'Z';
      //   $resource = $request->input('salleId');
      //
      //   $data=array('title'=>$nom,'start'=>$start,"end"=>$end,"resourceId"=>$resource);
      //   DB::table('evenements')->insert($data);
      //
      //
      //   echo "Inseré avec succès";
      // }







}
