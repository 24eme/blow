@extends('layouts.layout')
@guest
  @extends('index')
@else
@section('content')

<div class="datepicker-wrapper">
<input placeholder="Selectionner une date" type="text" name="datepicker" id="datepicker" value="" class="calendar">
<i class="fas fa-calendar-check icon"></i>
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
