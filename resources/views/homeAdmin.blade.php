
@extends('layouts.layout')
@section('content')
<div style='z-index:100;position:absolute'><p>Date: <input type="text" id="datepicker"><button type="button" onclick="getDate()"> Y aller</button></p> </div><!--position à changer --><br></br>
<!-- <div> <input type="submit" class="btn btn-primary btn-modal" name="action" value="AJOUTER SALLE" onclick="getDate()"></div>
<div> <input type="submit" class="btn btn-primary btn-modal" name="action" value="MODIFIER SALLE" onclick="getDate()"></div>
<div> <input type="submit" class="btn btn-primary btn-modal" name="action" value="SUPPRIMER UTILISATEUR" data-target="#modalDUser"></div> -->
<button type="button" name="btn-success" data-toggle="modal" data-target="#modalCRoom" class="btn-success">AJOUTER SALLE</button>
<button type="button" name="btn-success" data-toggle="modal" data-target="#modalURoom" class="btn-success">MODIFIER SALLE</button>
<button type="button" name="btn-success" data-toggle="modal" data-target="#modalDUser" class="btn-success">SUPPRIMER UTILISATEUR</button>
<div class="container">
  <div class="ct" id="tableau">
  <div class="ct" id="reserver">
        <div class="page" id="p1">
            @extends('components.modalCRoom')
            @extends('components.modalCEvent')
            @extends('components.modalUDEvent')
        </div>
        <div class="page" id="p1">
          <div class="container">
          </div>
          <section><div class=""></section></div>
        <div class="page" id="p2">
          <div class="container">
              <section><div id="calendar"></div></section>
          </div>
        </div>
  </div>
  </div>
</div>
@endsection
