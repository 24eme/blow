<div class="modal fade" id="reservation-modal" tabindex="-1" role="dialog" aria-labelledby="Reservation" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="header-box"><h5 class="modal-title">Réserver votre salle</h5>



          </div>
          <button type="button" class="close"><i class="fas fa-share-alt"></i></button>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" id="methode" action="{{url('delete')}}">
                {{ method_field('Delete') }}
            <input type="text" id="event_name" name="event_name" placeholder="Nom de l'événement" value="" required><br></br>
            <input type="text" id="event_id" name="event_id" value="" >

            <div class="btn-wrapper">

              <input type="submit" class="btn btn-primary btn-modal" name="action" value="Ajouter">

            </div>

            {{ csrf_field() }}
          </form>
        </div>
        <div class="modal-footer">
          <div class="note"><span><p><strong>Note :</strong> Votre réservation ne sera effective qu'après validation de votre gestionnaire d'espace, vous serez alors notifié par mail.</p></span></div>
        </div>
