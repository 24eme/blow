@extends('layouts.layout')
@guest
  @extends('index')
@else
@section('content')

<div class="calendar-container container">
  <div class="col-lg-8 datepicker-wrapper">
  <input placeholder="Selectionner une date" type="text" name="datepicker" id="datepicker" value="" class="calendar">
  <i class="fas fa-calendar-check icon"></i>
  </div>
        <div class="page" >
            @include('components.flash-message')
            @extends('components.modals.modalCEvent')
            @extends('components.modals.modalUDEvent')
              <div class="m-auto col-xs-12 col-sm-10 col-md-10 col-lg-10" id="calendar">
              </div>

        </div>


</div>
@endsection
@endguest
