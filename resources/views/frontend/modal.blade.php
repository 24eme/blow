<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Réservation" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Réserver votre salle</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form method="POST" action="makeEvent.php">
            <input type="text" name="nom" placeholder="Nom de l'événement">
            <input type="checkbox" name="visible" placeholder=""><label>Rendre invisible pour les non concernés</label>
<!-- A faire droit de réserver que 3h de suite-->
            <label>Organisateur : { $nomutilisateurousociete}}<label>
            <label>Nom de salle : { $nomdesalle}}</label>
            <label>Surface : { $surface}}</label>
            <label>Capacité : { $capacity}}</label>
            <label>Début : </label><input type="date"><input type="time" name="heurededebut" min="06:00" max="20:00" required>
            <label>Fin : </label><input type="date"><input type="time" name="heuredefin"min="06:00" max="20:00" required>
            <span><img src=""></i></span><label>Ajouter un message</label>
            <textarea></textarea>
            <input type="checkbox" name="rappel"><label>Planifier un rappel une<select><option>heure</option><option>jour</option><option>mois</option></select>avant</label>
            <span><p>Note : Votre réservation ne sera effective qu'après validation de votre gestionnaire d'espace, vous serez alors notifié par mail.</p>
            </span>
          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary">Confirmer</button>
        </div>

      </div>
    </div>
</div>
