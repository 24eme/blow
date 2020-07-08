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
    public function delete($id)
    {
       $user= User::find($id);
       if ($user->type == 'admin') {
          return redirect('/admin')->with('error', 'Vous ne pouvez pas supprimé votre profil');
       };
       $user->delete();
       Event::where('user_id', $id)->delete();
       return redirect('/admin')->with('success', 'L\'utilisateur a été supprimé');

     }
}
