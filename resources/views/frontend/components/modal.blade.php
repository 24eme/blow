<div class="modal fade" id="reservation-modal" tabindex="-1" role="dialog" aria-labelledby="Reservation" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="header-box"><h5 class="modal-title">Réserver votre salle</h5>
            <label>Organisateur : { $nomutilisateurousociete}}</label><br>
            <label>Nom de salle : </label><label id="nomdesalle"></label><br>
            <label>Surface : { $nomdesalle}}</label><label id="capacite"></label><br>
            <label>Capacité : { $capacity}}</label>

          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{url('addEvent')}}">
            {{ csrf_field() }}
            <input type="text" id="nom" name="nom" placeholder="Nom de l'événement" value=""><br></br>
      <!-- A faire droit de réserver que 3h de suite-->
            <input name="salleId" id="salleId" style="display:none">
            <label>Début : </label>
            <input type="date" id="datededebut" name="datededebut" value="2020-06-09T09:30:00Z"><input type="time" id="heurededebut" name="heurededebut" min="06:00" max="20:00" required><br>
            <hr>
            <label>Fin : </label><input type="date" id="datedefin" name="datedefin" value=""><input type="time" id="heuredefin" name="heuredefin" min="06:00" max="20:00" required><br>
            <hr>
            <input type="checkbox" name="rappel">
            <label>Planifier un rappel
              <select>
                  <option>une heure</option>
                  <option>un jour</option>
                  <option>un mois</option>
              </select>
            avant </label>
            <br></br>
            <div class="btn-wrapper">
                <button type="submit" class="btn btn-secondary btn-modal" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary btn-modal">Confirmer</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <div class="note"><span><p><strong>Note :</strong> Votre réservation ne sera effective qu'après validation de votre gestionnaire d'espace, vous serez alors notifié par mail.</p></span></div>
        </div>

      </div>
    </div>
</div>
