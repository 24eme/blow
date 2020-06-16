<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests;
// use App\Http\Controllers\Controller;
// use App\Evenement;
use Illuminate\Support\Facades\DB;



class SalleController extends Controller
{
    //

    public function listTest(){
      //$events = Evenement::all();
      $resources = DB::table('salles')->select('id', 'title','eventColor')->get();
      return response(json_encode($resources), 200)->header('Content-Type', 'application/json');
      }


}




// return view('json-list-events',
//     [
//       'events' => $events
//     ]
//   );



// public function InsertResource(Request $request){
//
//   $nom = $request->input('nomdesalle');
//   $surface = $request->input('surface')
//   $capacite = $request->input('capacite');
//   $resourceID = $request->input('salleID');
//
//   $data=array('nom'=>$nom,'surface'=>$start,"capacite"=>$end,"resourceId"=>$resourceID);
//   DB::table('salles')->insert($data);
//
//
//   return view('frontend/admin');
// }
