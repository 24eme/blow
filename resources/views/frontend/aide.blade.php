@extends('layout')

@section('content')
<ul class="list-down help-nav" >
  <li class="nav-item" ><a class="nav-link" data-toggle="dropdown-help" data-target="#help_one" href="#"><i class="fas fa-plus"></i>Getting Started</a>
      <div class="dropdown-help" id="help_one">
        <p>cds,cndoi</p>

      </div>
  </li>
  <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-plus"></i>Creating an Event</a></li>
  <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-plus"></i>Creating an Account</a></li>
  <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-plus"></i>Annuler un évenement</a></li>
  <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-plus"></i>Supprimer son compte</a></li>
  <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-plus"></i>Conditions Générales d'Utilisations & RGPD</a></li>
</ul>
@extends('frontend.components.modal')
@endsection
