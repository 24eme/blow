@extends('layouts.layout')
@guest
  @extends('index')
@else
@section('content')

<div class="calendar-container container">
  <div class="datepicker-wrapper">
  <input placeholder="Selectionner une date" type="text" name="datepicker" id="datepicker" value="" class="calendar"> 
  </div>
        <div class="page" >
            @include('components.flash-message')
            @extends('components.modals.modalCEvent')
            @extends('components.modals.modalUDEvent')
              <div id="calendar"></div>

        </div>


</div>
@endsection
@endguest
