
<div class="modal fade" id="modalUDE" tabindex="-1" role="dialog" aria-labelledby="Reservation" aria-hidden="true">
   <div class="modal-dialog " role="document">
     <div class="modal-content">
       <div class="modal-header">
           <h5 class="modal-title">Modifier un évenement</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>


      </div>
       <div class="modal-body">
         <form class="" method="POST" id="formUDRoom" action="{{route('UpdateRoom')}}">
           {{ csrf_field() }}

           <div class="content-head">
           <label for="room_title" class="content-title">SALLE :</label>
           <input id="RoomName" type="text" name="room_name" class="input-head" value="" disabled><br>
           <input id="HiddenRoomID" type="text" name="room_id" class="input-head" value="" hidden><br>
           </div>

           <label for="capacity">Capacité :</label><label id="capacity"></label>
           <label for="equipment">Equipements : </label><label id="equipment"></label>

           <div class="content-head">
           <label class="content-title">EVENEMENT:</label>
           <input id="EventName" type="text" name="room_name" class="input-head" value="" disabled><br>
           </div>

           <label for="society"></label><br>
           <label for="society"></label><br>

           <div class="form-group row">
               <div class="form-group col-md-6">
                 <label for="start_date">Date de Debut :</label>
                 <input id="StartDate" type="date" class="form-control" id="start_date" name="start_date" value="">
               </div>

               <div class="form-group col-md-6">
                 <label for="start_hour">Heure :</label>
                 <input id="StartHour" type="time" class="form-control" name="start_hour" required>
               </div>

               <div class="form-group col-md-6">
                 <label for="end_date">Date de Fin :</label>
                 <input id="EndDate" type="date" class="form-control" name="end_date" value="" required>
               </div>
               <div class="form-group col-md-6">
                 <label for="end_hour">Heure :</label>
                 <input id="EndHour" type="time" class="form-control" name="end_hour" value="" required>
               </div>
           </div>
                      <hr>
          <div class="modal-footer">
           <div class="btn-wrapper">
             <input type="submit" class="btn btn-secondary btn-modal" name="action" value="Modifier">
             <a class="btn btn-secondary btn-modal" href="#" onclick="navigate(title)">Supprimer</a>
           </div>
         </div>
         </form>
       </div>

     </div>
     </div>
</div>


<!--
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
  </script> -->
