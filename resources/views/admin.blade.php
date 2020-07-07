@extends('layouts.layout')
@section('content')

<nav class="navbar navbar-expand-lg navbar-light home-navbar secondnav">
 <div class="container-fluid">
   <ul class="nav navbar-nav ">
     <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-chart-line"></i>Tableau de bord</a></li>
     <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-users"></i></i>Utilisateurs</a></li>
     <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-dice-d6"></i>Salles</a></li>
     <li class="nav-item"><a class="nav-link" href="#"><i class="far fa-calendar-check"></i>Evenements</a></li>
     <li class="nav-item"><a class="nav-link" href="#"><i class="far fa-calendar-alt"></i>Calendrier</a></li>
   </ul>
 </div>
</nav>



<div class="container">
            <h1>Tableau de bord</h1>
            <div class="tab">
              <button class="tablinks" onclick="openCity(event, 'event-tab')">Evènements</button>
              <button class="tablinks" onclick="openCity(event, 'user-tab')">Utilisateurs</button>
              <button class="tablinks" onclick="openCity(event, 'room-tab')">Salles</button>
              <button class="tablinks" onclick="openCity(event, 'calendar-tab')">Calendrier</button>
            </div>

            <div id="event-tab" class="tabcontent">
              <div class="wrapper">
                  <h3>Evenements en attente de validation</h3>
                  <p>London is the capital city of England.</p>
              </div>
              @foreach ($events as $event)
              @if($event->confirmed == "0")
              <li>{{$event->title}}</li>
                  <button type="button" class="btn btn-validate" onclick="this.disabled=true;validateEvent({{$event}})">Valider</button>
                  <button type="button" class="btn" onclick="cancelEvent({{$event->id}})">Annuler</button>
              @endif
              @endforeach

            </div>

            <div id="user-tab" class="tabcontent">
              <div class="wrapper">
                  <h3>Utilisateurs</h3>
                  <p>Paris is the capital of France.</p>
              </div>
              @foreach($users as $user)
              <div class="user-li-wrapper">
              <li>{{$user->id}} {{$user->name}}  {{$user->email}}  </li>
                  <button type="button" class="btn" onclick= "deleteUser({{$user->id}})" >Supprimer</button>
              </div>
              @endforeach

            </div>
            <div id="calendar-tab" class="tabcontent ">
              @extends('components.modals.modalCRoom')
              @extends('components.modals.modalUDRoom')
              @extends('components.flash-message')
              <div style='z-index:100'>
                <input class="input-date" type="text" name="" placeholder="date" id="datepicker">
                <button type="button" onclick="gotoDate()"><i class="fas fa-search"></i>
                </button>
              </div>
                  <div id="calendar"></div>
            </div>

            <div id="room-tab" class="tabcontent">
              <div class="room-li-wrapper">
                  <h3>Salles</h3>
                  <p>Tokyo is the capital of Japan.</p>
                  <button type="button" class="btn" data-toggle="modal" data-target="#modalCRoom" class="btn"><i class="fas fa-plus"></i></button>
              </div>
              @foreach($rooms as $room)
              <div class="user-li-wrapper">
              <li>{{$room->title}}</li>
                  <button type="button" class="btn" onclick="modalCheckRoom({{$room}})"><i class="fas fa-pen"></i>Modifier</button>
                  <button type="button" class="btn" onclick="deleteRoom({{$room->id}})" type="button">Supprimer</button>
              @endforeach
              </div>
            </div>

</div>

@endsection
