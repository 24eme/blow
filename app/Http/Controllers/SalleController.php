<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    //

    public function listTest(){
      //$events = Evenement::all();
      $resources = DB::table('salles')->select('id', 'title','eventColor')->get();
      return response(json_encode($resources), 200)->header('Content-Type', 'application/json');


      // return view('json-list-events',
      //     [
      //       'events' => $events
      //     ]
      //   );
      }
}
