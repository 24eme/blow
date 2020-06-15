<?php

//Rappel : j'ai du commenté l'extension;pdo_sqlite dans php.ini
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class addEvent extends Controller{

      public function InsertEvent(Request $request){
        // pour comparer avec d'autres existant
        // $datestart=$request->input('datededebut');
        // $dateend=$request->input('datedefin');
        // $timestart=$request->input('heurededebut');
        // $timeend=$request->input('heuredefin');
        //
        $nom = $request->input('nom');
        $start = $request->input('datededebut').'T'.$request->input('heurededebut').'Z';
        $end= $request->input('datedefin').'T'.$request->input('heuredefin').'Z';
        $resource = $request->input('salleId');

        // echo($datestart);
        // echo($timestart);
        //
        // $query0=DB::table('evenements')
        //         ->(\DB::raw('substr('start', 0, 10)'),'=',$datestart)
        //         ->count();
        // echo($query0);


        // $query = DB::table('evenements')
        //     ->where(\DB::raw('substr(start, 0, 10)'),'=',$datestart)
        //     ->where(\DB::raw('substr(start, 11, 19)'),'=',$timestart)
        //     ->where(\DB::raw('substr(end, 0, 10)'),'=',$dateend)
        //     ->where(\DB::raw('substr(end, 11, 19)'),'=',$timeend)
        //     ->where('resourceId','=',$resource)
        //     ->count();

        echo($start);
        echo ($end);

        $query = DB::table('evenements')
            ->where('start','>=',$start)
            ->where('end','<=',$end)
            ->where('resourceId','=',$resource)
            ->count();

        echo($query); //pourquoi ca vaut 0 ?
        if($query>0){
          echo"Créneau déjà réservé pour cette salle";
          return view('frontend/reserver');
          }

        $data=array('title'=>$nom,'start'=>$start,"end"=>$end,"resourceId"=>$resource);
        DB::table('evenements')->insert($data);
        echo "Inseré avec succès";
        return view('frontend/reserver');
      }
}




//faire la vérification que la date à laquelle on insère et bien plus grande
//pck prob d'insertion si on bouge avant


//je dois recuperer la date et l'heure de deb et fin dans la base de données.


//avec Sidi




// $query = DB::table('evenements')                   //select count(*) from evenements where start = $start and end='end'
//        ->where(substr('start',0,10),'>=',$tabStart[0])          //where('start','=',$start[0])
//        ->where(substr('start',11,8),'>=',$tabStart[1])          //where('start','=',$start[0])
//        ->where(substr('end',0,10),'<=',$end)              //where
//        ->where('resourceId','=',$resource)
//        ->count();






//
// $tabStartDb=split('[TZ]',$query['start']);
// $tabEndDb

// $startdb=subst('start',0,10);
// $enddb=subst('end',0,10);
// $starttime=subst('start',11,8);
// $endtime=subst('end',11,8);
//
//
// $query = DB:table('evenements')
//         -






// selectable: true,
// selectHelper: true,
// select: function(start, end, allDay) {
//  var title = prompt('Event Title:');
//  if (title) {
//  start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
//  end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
//  $.ajax({
//  url: 'http://localhost/fullcalendar/add_events.php',
//  data: 'title='+ title+'&start='+ start +'&end='+ end ,
//  type: "POST",
//  success: function(json) {
//  alert('OK');
//  }
//  });
//  calendar.fullCalendar('renderEvent',
//  {
//  title: title,
//  start: start,
//  end: end,
//  allDay: allDay
//  },
//  true // make the event "stick"
//  );
//  }
//  calendar.fullCalendar('unselect');
// }
//
//
// $title=$_POST['title'];
// $start=$_POST['start'];
// $end=$_POST['end'];
//
// @extends('database.php')
//
// $sql = "INSERT INTO evenement (title, start, end) VALUES (:title, :start, :end)";
// $q = $bdd->prepare($sql);
// $q->execute(array(':title'=>$title, ':start'=>$start, ':end'=>$end));
?>
