
<form class="" id="form" method="get" action="{{ route('createRoom')}}">
  {{ csrf_field() }}
  <script type="text/javascript">
  $(document).ready(function(){
$('.js-edit, .js-save').on('click', function(){
  var $form = $(this).closest('form');
  $form.toggleClass('is-readonly is-editing');
  var isReadonly  = $form.hasClass('is-readonly');
  $form.find('input,textarea').prop('disabled', isReadonly);
});
});
  </script>

  <div class="modal fade" id="modalUDRoom" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Création d'évènement</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button></br>
          </div>
          <div class="modal-body">
            <form method="POST" id="" action="{{route('createEvent')}}">
            {{ csrf_field() }}

            <div class="content-head row">
            <label for="room_title" class="content-title col-md-6">SALLE :</label>
            <input id="inputRoomName" type="text" name="room_title" class="input col-md-6" value="" disabled><br>
            <input id="inputHiddenRoomID" type="text" name="room_id" value="" hidden>
            </div>

            <div class="row">
            <label for="capacity" class="col-md-6">Capacité :</label>
            <label id="roomCapacity" class="col-md-6"></label><br>
            </div>
            <!-- <label for="capacity">Capacité :</label>
            <label id="roomCapacity"></label><br> -->
            <div class="row">
            <label for="equipment" class="col-md-6">Equipements : </label>
            <label id="roomEquipment" class="col-md-6"></label><br>
            </div>
            <!-- <label for="equipment">Equipements : </label>
            <label id="roomEquipment"></label><br> -->

            <div class="content-head">
            <div class="row">
              <label for="event_title" class="content-title col-md-6">EVENEMENT:</label>
              <input id="inputEventName" type="text" placeholder="Nom de l'événement" name="event_name" class="input-head col-md-6" value="" required>
            </div>
            </div>

            <label for="society"></label><br>
            <label for="society"></label><br>

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
