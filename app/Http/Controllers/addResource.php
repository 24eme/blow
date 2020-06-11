<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class addResource extends Controller{

      public function InsertResource(Request $request){

        $nom = $request->input('nomdesalle');
        $surface = $request->input('surface')
        $capacite = $request->input('capacite');
        $resourceID = $request->input('salleID');

        $data=array('nom'=>$nom,'surface'=>$start,"capacite"=>$end,"resourceId"=>$resourceID);
        DB::table('salles')->insert($data);


        return view('frontend/admin');
      }
}
?>
