<header>
  @guest
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
<!-- <div class="container-fluid"> -->
    <!-- <span> -->
      <a class="navbar-brand " href="/">BLOW</a>
    <!-- </span> -->
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
          <ul class="navbar-nav ml-auto ">
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a></li>
          @if (Route::has('register'))<li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('S\'inscrire') }}</a></li>@endif
          </ul>
      </div>
<!-- </div> -->
</nav>
<div></div>
  <div></div>
@else
<nav class="navbar navbar-expand-lg navbar-light">
 <div class="container-fluid">
   <div class="navbar-header">
     <a href="/"><img src="{{ asset('favicon.jpg') }}" style="width:50px;height:50px;margin-left:35%;margin-top:10%;margin-bottom:10%;"alt="logo"></a>
   </div>
   <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenuAd">
       <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarMenuAd">
   <!-- <ul class="nav navbar-nav navbar-right"> -->
      <ul class="nav navbar-nav m-auto">
     <li class="nav-item"><a class="custom-link" href="#"><i class="fas fa-user-circle"></i>{{ Auth::user()->name }}</a></li>
     @if(Auth::check())
             @if (Auth::user()->isAdmin())
             <li class="nav-item dropdown"><a class="custom-link dropdown-toggle" data-toggle="dropdown" href="/admin"><i class="fas fa-chart-line"></i>Tableau de bord</a>
             <ul class="dropdown-menu">
                 <li class="dropdown-item"><a class="custom-link" href="/admin" onclick="openTab(event, 'user-tab')"><i class="fas fa-users"></i></i>Utilisateurs</a></li>
                 <li class="dropdown-item"><a class="custom-link" href="/admin" onclick="openTab(event, 'room-tab')"><i class="fas fa-list"></i>Salles</a></li>
                 <li class="dropdown-item"><a class="custom-link" href="/admin" onclick="openTab(event, 'event-tab')"><i class="far fa-calendar-check"></i>Evenements</a></li>
                 <li class="dropdown-item"><a class="custom-link" href="/admin" onclick="openTab(event, 'calendar-tab')"><i class="far fa-calendar-alt"></i>Calendrier</a></li>
             </ul>
             </li>
             <li class="nav-item"><a class="custom-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>{{ __('Déconnexion') }}</a></li><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form></li>
             @endif
     @endif
   </ul>
  </div>
 </div>
</nav>
@endguest

</header>
