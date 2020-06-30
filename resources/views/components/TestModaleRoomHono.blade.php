<div class="modal fade" id="reservation-modal" tabindex="-1" role="dialog" aria-labelledby="Reservation" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close"><i class="fas fa-share-alt"></i></button>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" id="methode" action="{{url('createEvents')}}">
            <input type="text" id="event_name" name="event_name" placeholder="Nom de l'événement" value="" required><br></br>
          <input type="text" id="event_id" name="event_id" value="" style="display:none">
           <input type="text" name="room_id" id="room_id" value=""style="display:none">
            <label>Début : </label>
            <input type="date" id="start_date" name="start_date" value=""><input type="time" id="start_hour" name="start_hour" required><br>
            <hr>
            <label>Fin : </label><input type="date" id="end_date" name="end_date" value=""><input type="time" id="end_hour" name="end_hour" required><br>
            <hr>
            <br></br>
            <div class="btn-wrapper">

              <input type="submit" class="btn btn-primary btn-modal" name="action" value="Ajouter">

            </div>

            {{ csrf_field() }}
          </form>
        </div>
        <div class="modal-footer">
          <div class="note"><span><p><strong>Note :</strong> Votre réservation ne sera effective qu'après validation de votre gestionnaire d'espace, vous serez alors notifié par mail.</p></span></div>
        </div>
