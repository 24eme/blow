@extends('layouts.layout')
@section('content')





<div class="container">
  <h2>Modal Event</h2>
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter un evennement</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button></br>

        </div>
        <div class="header-box"><h5 class="modal-title">Réserver votre salle</h5>

          <label>Organisateur :@if(Auth::check()) {{ Auth::user()->name }}@endif</label><br>
          <label>Nom de salle : </label><label id="room_name"></label><br>
          <label>Equipements : </label><label id="equipment"></label><br>
          <label>Capacité :</label><label id="capacity"></label><br>

        </div>

        <!-- Modal body -->
                <hr>
        <div class="modal-body">

          <form method="POST" id="methode" action="">
            <div class="form-row">
    <div class="form-group col-md-6">
      <!-- <label for="inputEmail4">Email</label> -->

      <!-- <input type="email" class="form-control" id="inputEmail4" placeholder="Email"> -->
      <label for="start_date">Debut :</label>
      <input type="date" class="form-control" id="start_date" name="start_date" value="2020-06-09T09:30:00Z">
    </div>
    <div class="form-group col-md-6">
      <label for="start_hour">Heure de Debut :</label>
      <!-- <input type="password" class="form-control" id="inputPassword4" placeholder="Password"> -->
      <input type="time" class="form-control" id="start_hour" name="start_hour" required>
    </div>

    <div class="form-group col-md-6">
      <!-- <label for="inputEmail4">Email</label> -->

      <!-- <input type="email" class="form-control" id="inputEmail4" placeholder="Email"> -->
      <label for="start_date">Fin :</label>
      <input type="date" class="form-control" id="start_date" name="start_date" value="2020-06-09T09:30:00Z">
    </div>
    <div class="form-group col-md-6">
      <label for="start_hour">Heure de Fin :</label>
      <!-- <input type="password" class="form-control" id="inputPassword4" placeholder="Password"> -->
      <input type="time" class="form-control" id="start_hour" name="start_hour" required>
    </div>
  </div>
          <label>Nom evennement : </label>
          <input type="text" id="event_name" name="event_name" placeholder="Nom de l'événement" value="" required><br></br>
          <input type="text" id="event_id" name="event_id" value="" style="display:none">
          <input type="text" name="room_id" id="room_id" value=""style="display:none">
    
            <!-- <div class="btn-wrapper">

              <input type="submit" class="btn btn-primary btn-modal" name="action" value="Valider">
              <!-- <input type="submit" class="btn btn-secondary btn-modal" name="action" value="Modifier"><input type="date" id="start_date" name="start_date" value="2020-06-09T09:30:00Z"><input type="date" id="start_date" name="start_date" value="2020-06-09T09:30:00Z"><input type="time" id="start_hour" name="start_hour" required><br><input type="time" id="start_hour" name="start_hour" required><br>
              <input type="submit" class="btn btn-primary btn-modal" name="action" value="Supprimer"> -->

<!--
            </div> -->
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">

          <input type="submit" class="btn btn-primary btn-modal" name="action" value="Valider">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

</div>



<!-- end------------------- -->

<!-- <div class="modal fade" id="reservation-modal" tabindex="-1" role="dialog" aria-labelledby="Reservation" aria-hidden="true">
   <div class="modal-dialog " role="document">
     <div class="modal-content">
       <div class="modal-header">
         <div class="header-box"><h5 class="modal-title">Réserver votre salle</h5>

           <label>Organisateur :@if(Auth::check()) {{ Auth::user()->name }}@endif</label><br>
           <label>Nom de salle : </label><label id="room_name"></label><br>
           <label>Equipements : </label><label id="equipment"></label><br>
           <label>Capacité :</label><label id="capacity"></label><br>

         </div>
         <button type="button" class="close"><i class="fas fa-share-alt"></i></button>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form method="POST" id="methode" action="{{url('ManagedEvent')}}">
           <input type="text" id="event_name" name="event_name" placeholder="Nom de l'événement" value="" required><br></br>
         <input type="text" id="event_id" name="event_id" value="" style="display:none">
          <input type="text" name="room_id" id="room_id" value=""style="display:none">
           <label>Début : </label>
           <input type="date" id="start_date" name="start_date" value="2020-06-09T09:30:00Z"><input type="time" id="start_hour" name="start_hour" required><br>
           <hr>
           <label>Fin : </label><input type="date" id="end_date" name="end_date" value=""><input type="time" id="end_hour" name="end_hour" required><br>
           <hr>
           <br></br>
           <div class="btn-wrapper">

             <input type="submit" class="btn btn-primary btn-modal" name="action" value="Ajouter">
             <input type="submit" class="btn btn-secondary btn-modal" name="action" value="Modifier">
             <input type="submit" class="btn btn-primary btn-modal" name="action" value="Supprimer">


           </div>

           {{ csrf_field() }}
         </form>
       </div>
       <div class="modal-footer">
         <div class="note"><span><p><strong>Note :</strong> Votre réservation ne sera effective qu'après validation de votre gestionnaire d'espace, vous serez alors notifié par mail.</p></span></div>
       </div>

     </div>
   </div>


</div> -->
