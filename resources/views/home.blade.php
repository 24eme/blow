@extends('layout')
@section('content')

<div class="container">
  <div class="ct" id="tableau">
  <div class="ct" id="reserver">
        <div class="page" id="p1">
               <section>
                 <div class="">
                   <h2>Tableau de bord</h2>

                 </div>
                 <span class="title">Bolt</span>
               </section>
        </div>
        <div class="page" id="p2">
          <div class="container">
              <section><div id="calendar" data-toggle="modal" data-target="#reservation-modal"></div>
              </section>
              @extends('frontend.components.modal')
              @if(session('success'))
                   <span class="alert alert-primary" role="alert">
                       <strong>{{ session('success') }}</strong>
                   </span>
              @endif
              @if(session('failPassed'))
                   <span class="alert alert-warning" role="alert">
                       <strong>{{ session('failPassed') }}</strong>
                   </span>
              @endif
              @if(session('failUnavailable'))
                   <span class="alert alert-danger" role="alert">
                       <strong>{{ session('failUnavailable') }}</strong>
                   </span>
              @endif
          </div>
        </div>
  </div>
  </div>



</div>




@endsection
