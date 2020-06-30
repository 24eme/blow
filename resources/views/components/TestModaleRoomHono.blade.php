<div class="modal fade" id="reservation-modal" tabindex="-1" role="dialog" aria-labelledby="Reservation" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-body">
          <form method="POST" id="methode" action="{{url('updateRooms')}}">
              {{ csrf_field() }}
            <!-- <input id="methode" name="_method" value="PUT"> -->
            {{ method_field('PUT') }}
          <input type='text' id='room_id' name='room_id' placeholder="id de la salle à modifié" value=""><br></br>
          <input type="text" id="room_name" name="room_name" placeholder="Nom de la salle" value="" required><br></br>
          <input type="text" id="equipment" name="equipment" placeholder="Equipements"value=""><br></br>
          <input type="text" id="capacity" name="capacity" placeholder="Capcity"value=""><br></br>
          <input type="text" id="eventColor" name="eventColor" placeholder="Couleur des évenements"value="">
          <br></br>
            <div class="btn-wrapper">
              <input type="submit" class="btn btn-primary btn-modal" name="action" value="Update">
            </div>

          </form>
        </div>
