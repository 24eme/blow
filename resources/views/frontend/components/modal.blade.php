 <div class="modal fade" id="reservation-modal" tabindex="-1" role="dialog" aria-labelledby="Reservation" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="header-box"><h5 class="modal-title">Réserver votre salle</h5>
            <label>Organisateur : { $nomutilisateurousociete}}</label><br>
            <label>Nom de salle : </label><label id="room_name"></label><br>
            <label>Surface : { $nomdesalle}}</label><label id="surface"></label><br>
            <label>Capacité : { $capacity}}</label><label id="capacity"></label><br>

          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{url('addEvent')}}">
            <input type="text" id="event_name" name="event_name" placeholder="Nom de l'événement" value=""><br></br>
          <input type="text" id="event_id" name="event_id" value="" style="display:none">
           <input type="text" name="room_id" id="room_id" value="" style="display:none">
            <label>Début : </label>
            <input type="date" id="start_date" name="start_date" value="2020-06-09T09:30:00Z"><input type="time" id="start_hour" name="start_hour" required><br>
            <hr>
            <label>Fin : </label><input type="date" id="end_date" name="end_date" value=""><input type="time" id="end_hour" name="end_hour" required><br>
            <hr>
            <br></br>
            <div class="btn-wrapper">

                @if ( $post->getAuthor()->getId() === Auth::user()->getId() )
                echo '<button type="submit" class="btn btn-secondary btn-modal" data-dismiss="modal">Modifier</button>
                <button type="submit" class="btn btn-secondary btn-modal" data-dismiss="modal">Supprimer</button>'

                @endif

                <button type="submit" class="btn btn-secondary btn-modal" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary btn-modal">Confirmer</button>
            </div>

            {{ csrf_field() }}
          </form>
        </div>
        <div class="modal-footer">
          <div class="note"><span><p><strong>Note :</strong> Votre réservation ne sera effective qu'après validation de votre gestionnaire d'espace, vous serez alors notifié par mail.</p></span></div>
        </div>

      </div>
    </div>
</div>
