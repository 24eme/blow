<div class="modal fade" id="reservation-modal" tabindex="-1" role="dialog" aria-labelledby="Reservation" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Réserver votre salle</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form method="POST" action="makeEvent.php">
            <input type="text" name="nom" placeholder="Nom de l'événement"><br></br>
            <div><input type="checkbox" name="visible" placeholder=""><label>Rendre invisible pour les "non-concernés"</label></div>
      <!-- A faire droit de réserver que 3h de suite-->
            <label>Organisateur : { $nomutilisateurousociete}}<label>
            <label>Nom de salle : { $nomdesalle}}</label><br>
            <label>Surface : { $nomdesalle}}</label><br>
            <label>Capacité : { $capacity}}</label><br>
            <label>Début : </label>
            <input type="date" id="datededebut" name="datededebut" value="2020-06-09T09:30:00Z"><input type="time" id="heurededebut" name="heurededebut" min="06:00" max="20:00" required><br>
            <label>Fin : </label><input type="date" id="datedefin" name="datedefin" value=""><input type="time" id="heuredefin" name="heuredefin" min="06:00" max="20:00" required><br>
            <span style="cursor:pointer;"><i class="fas fa-plus"></i><label> Ajouter un message</label></span>
            <div class="md-form">
              <textarea id="form7" class="md-textarea form-control" rows="2"></textarea>
            </div>
            <input type="checkbox" name="rappel"><label>Planifier un rappel une<select class="reminder-select"><option>heure</option><option>jour</option><option>mois</option></select>avant</label>
            <div class="note"><span><p><strong>Note :</strong> Votre réservation ne sera effective qu'après validation de votre gestionnaire d'espace, vous serez alors notifié par mail.</p></span></div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary">Confirmer</button>
        </div>

      </div>
    </div>
</div>
