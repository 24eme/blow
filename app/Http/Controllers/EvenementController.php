<?php

namespace App\Http\Controllers;
use App\Evenement;
use Illuminate\Http\Request;
use App\Http\Requests;
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
      }
    public function InsertEvent(Request $request){

      $nom = $request->input('nom');
      $start = $request->input('datededebut').'T'.$request->input('heurededebut').'Z';
      $end= $request->input('datedefin').'T'.$request->input('heuredefin').'Z';
      $resource = $request->input('salleId');

      echo "<script>alert(".$start.")</script>";
      echo "<script>alert(".$end.")</script>";

      $query = DB::table('evenements')
          ->where('start','>=',$start)
          ->where('end','<=',$end)
          ->where('resourceId','=',$resource)
          ->count();

      if($query>0){
      echo"<script>alert('Créneau déjà réservé pour cette salle');</script>";
        return redirect()->to(url()->previous() . '#reserver');
        }

      $data=array('title'=>$nom,'start'=>$start,"end"=>$end,"resourceId"=>$resource);
      DB::table('evenements')->insert($data);
      echo "<script>alert('Inseré avec succès');</script>";
        return redirect()->to(url()->previous() . '#reserver');
      }


      public function updateEvent(Request $request, $idEvent){

        $start=$request->input('start');
        $end=$request->input('end');
        $startTime=$request->input('startTime');
        $endTime=$request->input('endTime');

        $title = $request->input('title');
        $start = $request->input('start').'T'.$request->input('startTime').'Z';
        $end= $request->input('end').'T'.$request->input('endTime').'Z';
        $resourceId = $request->input('resourceId');

        $data = array('title'=>$title,'start'=>$start,"end"=>$end,"resourceId"=>$resource);
        $status =  DB::table('evenements')
        ->where('id', $idEven)
        ->update($data);
        return response()->json(array('success' => $status, 'data' => $data, 'message' => 'Evenement à bien été mise ajour'));

      }

  }

?>
