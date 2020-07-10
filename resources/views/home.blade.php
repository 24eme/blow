@extends('layouts.layout')
@guest
  @extends('index')
@else
@section('content')

<<<<<<< HEAD
<div class="calendar-container container">
  <div class="datepicker-wrapper">
  <input placeholder="Selectionner une date" type="text" name="datepicker" id="datepicker" value="" class="calendar"> 
=======
<div class="calendar-container container" style="padding-right:60px;">
  <div class="col-lg-8 datepicker-wrapper">
  <input placeholder="Selectionner une date" type="text" name="datepicker" id="datepicker" value="" class="calendar">
  <i class="fas fa-calendar-check icon"></i>
>>>>>>> 6e4520c03f78053678255bee6ebf677ef36c4a06
  </div>
        <div class="page" >
            @include('components.flash-message')
            @extends('components.modals.modalCEvent')
            @extends('components.modals.modalUDEvent')
              <div class="m-auto"  id="calendar">
              </div>

        </div>


</div>
@endsection
@endguest
