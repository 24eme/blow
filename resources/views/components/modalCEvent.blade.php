@extends('layouts.layout')
@section('content')
  <div class="modal fade" id="modalCEvent">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Création d'évènement</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button></br>
        </div>
        <div class="modal-body">
          <form method="POST" id="" action="{{route('createEvent')}}">
          {{ csrf_field() }}
          <label for="room_title" class="content-title">SALLE :</label>
          <input id="inputRoomName" type="text" name="room_name" class="input-head" value="" disabled><br>
          <input id="inputHiddenRoomID" type="text" name="room_id" value="" hidden>

          <label for="capacity">Capacité :</label><label id="roomCapacity"></label><br>

          <label for="equipment">Equipements : </label><label id="roomEquipment"></label><br>

          <label for="event_title" class="content-title">EVENEMENT:</label>
          <input id="inputEventName" type="text" placeholder="Nom de l'événement" name="event_name" class="input-head" value="" required>


          <div class="form-group row">

              <div class="form-group col-md-6">
                <label for="start_date">Date de Debut :</label>
                <input id="inputStartDate" type="date" class="form-control" id="start_date" name="start_date" value="">
              </div>

              <div class="form-group col-md-6">
                <label for="start_hour">Heure :</label>
                <input id="inputStartHour" type="time" class="form-control" name="start_hour" required>
              </div>

              <div class="form-group col-md-6">
                <label for="end_date">Date de Fin :</label>
                <input id="inputEndDate" type="date" class="form-control" name="end_date" value="" required>
              </div>
              <div class="form-group col-md-6">
                <label for="end_hour">Heure :</label>
                <input id="inputEndHour" type="time" class="form-control" name="end_hour" value="" required>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="btn-wrapper">
              <input type="submit" class="btn btn-primary btn-modal" name="action" value="Valider">
          </div>
        </div>
      </form>

      </div>
    </div>
  </div>
