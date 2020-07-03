
@extends('layouts.layout')
@section('content')

<div style='z-index:100;position:absolute'><p>Date: <input type="text" id="datepicker"><button type="button" onclick="getDate()"> Y aller</button></p> </div><!--position à changer --><br></br>
<div class="btn-wrapper">
  <button type="button" name="btn-success" data-toggle="modal" data-target="#modalCRoom" class="btn-success">AJOUTER SALLE</button>
  <button type="button" name="btn-success" data-toggle="modal" data-target="#modalUDRoom" class="btn-success">MODIFIER SALLE</button>
  <button type="button" name="btn-success" data-toggle="modal" data-target="#modalUDUser" class="btn-success">SUPPRIMER UTILISATEUR</button>
<div>
<div class="container">
  <div class="ct" id="tableau">
  <div class="ct" id="reserver">
        <div class="page" id="p1">
            @extends('components.modals.modalCRoom')
            @extends('components.modals.modalCEvent')
            @extends('components.modals.modalUDUser')
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
