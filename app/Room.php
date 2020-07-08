<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Room extends Model
{
    //
    protected $fillable = ['equipment'];

    public function events()
    {
   return $this->hasMany('App\Event');
    }

    public function showRoom(){
    $rooms = Room::all();
    return $rooms->toJson();
    }

    public function saveRoom($name,$equipment,$capacity,$eventColor,$image){
      $room = new Room;
      $room->title = $name;
      $room->equipment = $equipment;
      $room->capacity = $capacity;
      $room->eventColor = $eventColor;
      $room->image=$image;
      $room->save();
    }

    





}
