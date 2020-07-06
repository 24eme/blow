<div class="modal fade" id="modalUDRoom" aria-hidden=true>
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
              <h4 class="modal-title">Modification de Salle</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button></br>
    </div>
    <form method="POST" id="" action="{{route('UpdateRoom')}}" >
    {{ csrf_field() }}
          <div class="modal-body">
          <div class="row content-head ">
                                    <img class="modalUDImg" id="imgRoom" src="">
                        <label for="room_title" class="content-title">SALLE :</label>
                        <input id="roomName" type="text" placeholder="Nom de la Salle" name="room_name" class="input editable" value="" required>
                        <input id="HiddenroomID" type="text" name="room_id" value="" hidden>

          </div>
          <div class="row">
                        <label for="capacity">Capacité :</label><label id="roomCapacity"></label>
                        <input id="Capacity" type="text" placeholder="Capacité de la Salle" name="capacity" class="input editable" value="" required>
          </div>
          <div class="row">
                        <label for="equipment">Equipements : </label><label id="roomEquipment"></label>
                        <input id="Equipment" type="text" placeholder="Equipements de la Salle" name="equipment" class="input editable" value="" required>
          </div>
          <div class="row">
                        <label for="equipment">Couleur : </label><label id="roomColor"></label>
                        <input class="input editable" type="color" id="eventColor" name="eventColor" value="#e66465"><span class="focus-border"></span>
          </div>
          <div class="row">
                        <!-- Changer id en inputImage -->
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
