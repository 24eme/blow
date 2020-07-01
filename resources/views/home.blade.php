
@extends('layouts.layout')
@section('content')

<!-- <p>Date: <input type="text" id="datepicker"></p> -->
<i id="datepicker" class="far fa-calendar-alt"></i>
<div class="container">
  <div class="ct" id="tableau">
  <div class="ct" id="reserver">
        <div class="page" id="p1"><section><div class=""></section></div>
        <div class="page" id="p2">
          <div class="container">
              <section><div id="calendar" data-toggle="modal" data-target="#reservation-modal"></div></section>

          </div>
        </div>
  </div>
  </div>



</div>




@endsection

<!-- @exteds('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->
