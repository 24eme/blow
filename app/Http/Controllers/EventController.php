<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

class EventController extends Controller
{

//function pour afficher les evennements

  public function show(){

    $events = Event::all();
    return $events->toJson();

  }
}
