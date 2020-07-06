<?php

namespace App\Http\Controllers;

use App\Room;
use App\User;
use App\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
      $rooms = Room::all();
      $events = Event::all();
      $users = User::all();
      return view('admin', compact('events','rooms','users'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        return view('admin');
    }
}
