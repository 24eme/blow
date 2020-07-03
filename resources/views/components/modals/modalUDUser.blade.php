<div class="modal fade" id="modalUDEvent" aria-hidden="true" id="modalCRoom">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
              <h4 class="modal-title">Création de Salle</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button></br>
    </div>
    <form method="POST" id="formUDEvent" action="{{route('createEvent')}}">
    {{ csrf_field() }}
          <div class="modal-body">
          <div class="row content-head ">

          </div>
          <div class="row">

          </div>
          </div class="row">
          <div class="content-head">

          </div>
          </div>
          <div class="row">

          </div>
          <div class="row">
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
          </div>
          <div class="modal-footer">
            <div class="btn-wrapper">
              <input type="submit" class="btn btn-secondary btn-modal" name="action" value="Modifier">
              <a class="btn btn-secondary btn-modal" onclick="navigate()">Supprimer</a>
            </div>
          </div>
    </form>
</div>
</div>
</div>
