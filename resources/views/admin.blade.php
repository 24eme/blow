@extends('layouts.layout')
@section('content')
<nav class="navbar navbar-expand-lg navbar-light home-navbar bg-light">
 <div class="container-fluid">
   <div class="navbar-header">
     <span><a class="navbar-brand nav-link" href="#!">BLOW</a></span>
     <li></li>
     <li></li>
   </div>
   <ul class="nav navbar-nav navbar-right">
     <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user-circle"></i></a>Tableau de bord</li>
     <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user-circle"></i></a>Utilisateurs</li>
     <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user-circle"></i></a>Salles</li>
     <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user-circle"></i></a></li>
     <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}<i class="fas fa-sign-out-alt"></i></a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form></li>
   </ul>
 </div>
</nav>

<div style='z-index:100'>
  <input class="input-date" type="text" name="" placeholder="2020-01-01" id="datepicker">
  <button type="button" onclick="gotoDate()"> Y aller</button>
</div>

  <div class="container">
    <div class="ct" id="accueil">
    <div class="ct" id="calendrier">
          <div class="page" id="p1">
          <div class="container">
              @extends('components.modals.modalCRoom')
              @extends('components.modals.modalUDRoom')
              @extends('components.flash-message')
                <section><div id="calendar"></div></section>
          </div>
          </div>
          <div class="page" id="p2">
          <div class="container">

            <h1>Tableau de bord</h1>
            <div class="tab">
              <button class="tablinks" onclick="openCity(event, 'event-tab')">Evènements</button>
              <button class="tablinks" onclick="openCity(event, 'user-tab')">Utilisateurs</button>
              <button class="tablinks" onclick="openCity(event, 'room-tab')">Salles</button>
            </div>

            <div id="event-tab" class="tabcontent">
              <div class="wrapper">
                  <h3>Evenements en attente de validation</h3>
                  <p>London is the capital city of England.</p>
              </div>
              @foreach ($events as $event)
              <li>{{$event->title}}</li><button type="button" class="" data-toggle="modal" data-target="#modalCRoom" >Valider</button><button type="button" class="">Annuler</button>
              @endforeach

            </div>

            <div id="user-tab" class="tabcontent">
              <div class="wrapper">
                  <h3>Utilisateurs</h3>
                  <p>Paris is the capital of France.</p>
              </div>
              @foreach($users as $user)
              <div class="user-li-wrapper">
              <li>{{$user->name}}</li>  <button type="button" data-toggle="modal" data-target="#modalUDUser" class="btn">Supprimer</button>
              </div>
              @endforeach

            </div>

            <div id="room-tab" class="tabcontent">
              <div class="wrapper">
                  <h3>Salles</h3>  <button type="button" name="btn-success" data-toggle="modal" data-target="#modalCRoom" class="btn"><i class="fas fa-plus"></i></button>
                  <p>Tokyo is the capital of Japan.</p>
              </div>
              @foreach($rooms as $room)
              <div class="user-li-wrapper">
              <li>{{$room->title}}</li><button type="button" class="btn" onclick="modalCheckRoom({{$room}})"><i class="fas fa-pen"></i>eokd</button><button onclick="deleteRoom({{$room->id}})" type="button" name="button">Supprimer</button>
              @endforeach
              </div>
            </div>
          </div>
          </div>
    </div>
    </div>
  </div>
  @endsection
