
<div class="modal fade" id="reservation-modal" tabindex="-1" role="dialog" aria-labelledby="Reservation" aria-hidden="true">
   <div class="modal-dialog " role="document">
     <div class="modal-content">
       <div class="modal-header">
         <div class="header-box">
           <h5 class="modal-title">Modifier un évenement</h5>
         </div>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>


      </div>
       <div class="modal-body">
         <form class="" method="POST" id="formUDRoom" action="{{ route('createRoom')}}">
           {{ csrf_field() }}

           <div class="content-head">
           <label class="content-title">SALLE :</label>
           <input type="text" name="room_name" class="input-head" value="{Room::find(1)}}" disabled><br>
           </div>

           <input type="text" name="room_id" id="room_id" value="" hidden>

           <label for="capacity">Capacité :</label><label id="capacity"></label>
           <input type="text" name="capacity" value="{Room::find()->equipment}}" disabled><br>

           <label for="equipment">Equipements : </label><label id="equipment"></label>
           <input type="text" name="equipment" value="{Room::find()->equipment}}" disabled><br>

           <div class="content-head">
           <label class="content-title">EVENEMENT:</label>
           <input type="text" name="room_name" class="input-head" value="{Room::find(1)}}" disabled><br>
           </div>

           <input type="text" id="event_id" name="event_id" value="" hidden>

           <label for="society">{ User::find(Event::find($eventID)->name)}}->society</label><br>

           <label for="society">{ User::find(Event::find($eventID)->society)}}->society</label><br>

           <div class="row">
               <div class="col-3">
                 <label for="StartDate">Date de début:</label>
               </div>
               <div class="col-3">
                 <label for="StartHour">Heure :</label>
               </div>

           </div>
           <div class="row">
               <div class="col-3">
                 <input type="date" name="" value="">
               </div>
               <div class="col-3">
                 <input type="date" name="" value="">
               </div>
           </div>
           <div class="row">
               <div class="col-3">
                 <label for="EndDate">Date de Fin :</label>
               </div>
               <div class="col-3">
                 <label for="EndHour">Heure :</label>
               </div>
           </div>
           <div class="row">
               <div class="col-3">
                 <input type="date" name="" value="">
               </div>
               <div class="col-3">
                 <input type="date" name="" value="">
               </div>
           </div>
                      <hr>
           <div class="btn-wrapper">
             <input type="submit" class="btn btn-secondary btn-modal" name="action" value="Modifier">
             <a class="btn btn-secondary btn-modal" href="#" onclick="navigate(title)">Supprimer</a>
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
