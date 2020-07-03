
@extends('layouts.layout')
@section('content')

<div style='z-index:100'>
  <input class="input-date" type="text" name="" placeholder="2020-01-01" id="datepicker">
  <button type="button" onclick="gotoDate()"> Y aller</button>
</div>
<div class="container"
  <div class="ct" id="tableau">
  <div class="ct" id="reserver">
        <div class="page" id="p1">
          <div class="container">
            @extends('components.modals.modalCEvent')
            @extends('components.modals.modalUDEvent')
            @extends('components.flash-message')
              <section><div id="calendar"></div></section>
          </div>

          <section><div class=""></section></div>
         <div class="page" id="p2">
        </div>
  </div>
  </div>

</div>
@endsection
