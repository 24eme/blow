<div class="modal fade" id="modalCRoom" aria-hidden=true>
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
              <h4 class="modal-title">Création de Salle</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button></br>
    </div>
    <form style='padding-left:20PX;' method="POST" id="" action="{{route('createRoom')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
          <div class="modal-body">
          <div class="row content-head espace">
                        <label for="room_title" class="content-title">SALLE :</label>
                        <input class='inputR'id="inputRoomN" type="text" placeholder="Nom de la Salle" name="room_name" class="input" value="" required>
                        <input class='inputR'id="inputHiddenRoomID" type="text" name="room_id" value="" hidden>
          </div>
          <div class="row espace">
                        <label for="capacity">Capacité :</label><label id="roomCapacity"></label>
                        <input class='inputR'id="inputCapacity" type="text" placeholder="Capacité de la Salle" name="capacity" class="input" value="" required>
          </div>
          <div class="row espace">
                        <label for="equipment">Equipements : </label><label id="roomEquipment"></label>
                        <input class='inputR'id="inputEquipment" type="text" placeholder="Equipements de la Salle" name="equipment" class="input" value="" required>
          </div>
          <div class="row espace">
                        <label for="equipment">Couleur : </label><label id="roomEquipment"></label>
                        <input class='inputR' type="color" id="eventColor" name="eventColor" value="#e66465"><span class="focus-border"></span><br>
          </div>
          <div class="row espace">
                        <input id='image'type='file' accept="image/jpeg" name="image" required>

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
