<div class="modal fade" id="modalUDRoom" aria-hidden=true>
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
              <h4 class="modal-title">Modification de Salle</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button></br>
    </div>
    <form method="POST" id="" action="{{route('UpdateRoom')}}" >
    {{ csrf_field() }}
          <div class="modal-body alinea">
          <div class="row content-head ">
            <div class="col-20">
                        <label for="room_title" class="content-title">SALLE :</label>
                        <input class='inputR'id="roomName" type="text" placeholder="Nom de la Salle" name="room_name" class="input editable" value="" required><br>
                        <input class='inputR'id="HiddenroomID" type="text" name="room_id" value="" hidden>
            </div>
            <div style='width:100%;padding:10px;'>
                    <img class="modalUDImg" id="imgRoom" src="">
            </div>

          </div>
          <div class="row espace">
                        <label for="capacity">Capacité :</label><label id="roomCapacity"></label>
                        <input class='inputR'id="Capacity" type="text" placeholder="Capacité de la Salle" name="capacity" class="input editable" value="" required>
          </div>
          <div class="row espace">
                        <label for="equipment">Equipements : </label><label id="roomEquipment"></label>
                        <input class='inputR'id="Equipment" type="text" placeholder="Equipements de la Salle" name="equipment" class="input editable" value="" required>
          </div>
          <div class="row espace">
                        <label for="equipment">Couleur : </label><label id="roomColor"></label>
                        <input class="input editable inputR" type="color" id="eventColor" name="eventColor" value="#e66465"><span class="focus-border"></span>
          </div>
          <div class="row">
                        <!-- Changer id en inputImage -->
                        <input id='image'type='file' accept="image/jpeg" name="image" >

          </div>
          </div>
          <div class="modal-footer">
               <div class="btn-wrapper">
               <input type="submit" class="btn btn-primary btn-modal" value="Modifier">
               </div>
          </div>
    </form>
</div>
</div>
</div>
