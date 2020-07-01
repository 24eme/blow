
<div class="modal fade" id="reservation-modal" tabindex="-1" role="dialog" aria-labelledby="Reservation" aria-hidden="true">
   <div class="modal-dialog " role="document">
     <div class="modal-content">
       <div class="modal-header">
         <div class="header-box">
           <h5 class="modal-title">Modifier un évenement</h5>
         </div>
         <button type="button" class="close"><i class="fas fa-share-alt"></i></button>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>


      </div>
       <div class="modal-body">
         <form class="" method="POST" id="formUDRoom" action="{{ route('createRoom')}}">
           {{ csrf_field() }}

           <label for="room_title" class="">SALLE :</label>
           <input type="text" name="room_name" class="input-head" value="{Room::find(1)}}" disabled>
           <input type="text" name="room_id" id="room_id" value="" hidden>

           <label for="capacity">Capacité :</label><label id="capacity"></label><br>
           <input type="text" name="capacity" value="{Room::find()->equipment}}" disabled>

           <label for="equipment">Equipements : </label><label id="equipment"></label><br>
           <input type="text" name="equipment" value="{Room::find()->equipment}}" disabled>

           <label for="event_title" class="">EVENEMENT:</label>
           <input type="text" name="room_name" class="input-head" value="{Room::find(1)}}" disabled>
           <input type="text" id="event_id" name="event_id" value="" style="display:none">

           <label for="society">{ User::find(Event::find($eventID)->name)}}->society</label>

           <label for="society">{ User::find(Event::find($eventID)->society)}}->society</label>

           <label for="StartDate">Date de débutv:</label>
           <input type="date" name="" value="">

           <label for="StartHour">Heure :</label>
           <input type="date" name="" value="">

           <label for="EndDate">Date de Fin :</label>
           <input type="date" name="" value="">

           <label for="EndHour">Heure :</label>
           <input type="date" name="" value="">
                      <hr>
           <div class="btn-wrapper">
             <input type="submit" class="btn btn-secondary btn-modal" name="action" value="Modifier">
             <a class="btn btn-secondary btn-modal" href="#" onclick="navigate(title)"></a>
           </div>
         </div>
         </form>
       </div>
       <div class="modal-footer">
         <div class="note"><span><p><strong>Note :</strong> Votre réservation ne sera effective qu'après validation de votre gestionnaire d'espace, vous serez alors notifié par mail.</p></span></div>
       </div>

     </div>
</div>



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
