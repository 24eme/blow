@extends('layouts.layout')
@guest
  @extends('index')
@else
@section('content')
<div style='position: absolute;z-index:100'>
  <input class="input-date" type="text" name="" placeholder="date" id="datepicker">
  <button type="button" onclick="gotoDate()"><i class="fas fa-search"></i>
  </button>
</div>

<div class="container">
  <div class="ct" id="accueil">
  <div class="ct" id="calendrier">
        <div class="page" id="p1">
          @include('components.flash-message')
        <div class="container">
            @extends('components.modals.modalCEvent')
            @extends('components.modals.modalUDEvent')
              <section><div id="calendar"></div></section>
        </div>
        </div>
        <div class="page" id="p2">
        <div class="container">
        </div>


        </div>
  </div>
  </div>
</div>
@endsection
@endguest
