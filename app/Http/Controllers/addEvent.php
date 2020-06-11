<?php

//Rappel : j'ai du commenté l'extension;pdo_sqlite dans php.ini
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class addEvent extends Controller{

      public function InsertEvent(Request $request){


        $nom = $request->input('nom');

        $start = $request->input('datededebut').'T'.$request->input('heurededebut').'Z';
        $end= $request->input('datedefin').'T'.$request->input('heuredefin').'Z';
        $resource = $request->input('salleId');

        $data=array('title'=>$nom,'start'=>$start,"end"=>$end,"resourceId"=>$resource);
        DB::table('evenements')->insert($data);


        echo "Inseré avec succès";
        return view('frontend/reserver');
      }
}
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
