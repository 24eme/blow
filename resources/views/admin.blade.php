@extends('layouts.layout')
@section('content')
@extends('components.modals.modalUDEvent')
@extends('components.modals.modalCRoom')
@extends('components.modals.modalUDRoom')

<div class="calendar-container">
  @include('components.flash-message')
            <div class="row m-auto tab-navbar ">
              <div class="col-sm-3 mb-3">
                <button class="tablinks" onclick="openTab(event, 'event-tab')">Evènements</button>
              </div>

               <div class="col-sm-3 mb-3">
                <button class="tablinks" onclick="openTab(event, 'user-tab')">Utilisateurs</button>
               </div>

                <div class="col-sm-3 mb-3">
                <button class="tablinks" onclick="openTab(event, 'room-tab')">Salles</button>
               </div>

                <div class="col-sm-3 mb-3 mr-0">
                <button class="tablinks" onclick="openTab(event, 'calendar-tab')">Calendrier</button>
                </diV
            </div>
            </div>

            <div id="event-tab" class="tabcontent">
              <div class="wrapper">
                  <h3>EVENEMENTS : en attente de validation</h3>
              </div>
              <ul>
              @foreach ($events as $event)
              @if($event->confirmed == "0")
              <li>{{$event->title}}
                  <button type="button" class="btn custom-btn" onclick="modalCheckEvent({{$event}});"><i class="fas fa-eye"></i></button>
                  <button type="button" class="btn custom-btn btn-validate" onclick="validateEvent({{$event->id}})">Valider</button>
                  <button type="button" class="btn custom-btn" onclick="cancelEvent({{$event->id}})">Annuler</button></li>
              @endif
              @endforeach
              </ul>
            </div>

            <div id="user-tab" class="tabcontent">
              <div class="wrapper">
                  <h3>UTILISATEURS</h3>
              </div>
              <ul>
                  @foreach($users as $user)
                  <li>{{$user->name}}<button type="button" class="btn custom-btn" onclick="deleteUser({{$user->id}})"><i class="fas fa-trash-alt"></i></button></li>
                  @endforeach
              </ul>
            </div>
            <div id="calendar-tab" class="tabcontent ">
              <h3>VISUALISATION DE L'INTERFACE</h3>
              <div class="datepicker-wrapper">
              <input placeholder="Selectionner une date" type="text" name="datepicker" id="datepicker" value="" class="calendar"> 
              </div>
                  <div id="calendar"></div>
            </div>
            <div id="room-tab" class="tabcontent">
              <div class="wrapper">
                  <h3><button type="button" class="btn custom-btn" data-toggle="modal" data-target="#modalCRoom" class="btn"><i class="fas fa-plus"></i></button>
                  SALLES</h3>
              </div>
              <ul>
              @foreach($rooms as $room)
              <li>{{$room->title}}
                  <button type="button" class="btn custom-btn" onclick="modalCheckRoom({{$room}})"><i class="fas fa-pencil-alt"></i></button>
                  <button type="button" class="btn custom-btn" onclick="deleteRoom({{$room->id}})" type="button"><i class="fas fa-trash-alt"></i></button></li>

              @endforeach
              </ul>
              </div>
            </div>

</div>

@endsection
