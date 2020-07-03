<header>
  @guest
  <nav class="navbar navbar-expand-lg navbar-light ">
       <ul class="navbar-nav mr-auto">
            <span><a class="navbar-brand nav-logo" href="/">BL<u>O</u>W</a></span>
            <li class="nav-item"><a class="nav-link" href="#accueil">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="#apropos">A propos</a></li>
            <li class="nav-item"><a class="nav-link" href="#objectif">Notre objectif</a></li>
       </ul>
       <ul>
        <li class="nav-item"><a class="btn btn-dark" href="{{ route('login') }}">{{ __('Se connecter') }}</a></li>
        @if (Route::has('register'))
        <li class="nav-item"><a class="btn btn-dark" href="{{ route('register') }}">{{ __('S\'inscrire') }}</a></li>
        @endif
       <ul>
  </nav>
@else
  <nav class="navbar navbar-expand-lg navbar-light home-navbar">
   <div class="container-fluid">
     <div class="navbar-header">
       <span><a class="navbar-brand nav-link" href="#!">BLOW</a></span>
     </div>
     <ul class="nav navbar-nav navbar-right">
       <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user-circle"></i>{{ Auth::user()->name }}</a></li>
       <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}<i class="fas fa-sign-out-alt"></i></a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form></li>
     </ul>
   </div>
  </nav>

  <!-- <nav>
    <ul id="menu">
      <a href="#tableau"><i class="fas fa-user-circle"></i><li id="un">Tableau de bord</li></a>
      <a href="#reserver"><i class="far fa-calendar-alt"></i><li id="deux">Réserver</li></a>
    </ul>
  </nav> -->

@endguest

</header>
