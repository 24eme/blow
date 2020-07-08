<header>
  @guest
<nav class="navbar navbar-expand-lg navbar-light ">
<div class="container-fluid">
    <span><a class="navbar-brand nav-logo" href="/">BLOW</a></span>
        <ul class="nav navbar-nav navbar-right">
        <li class="nav-item"><a class="btn" href="{{ route('login') }}">{{ __('Se connecter') }}</a></li>
        @if (Route::has('register'))<li class="nav-item"><a class="btn" href="{{ route('register') }}">{{ __('S\'inscrire') }}</a></li>@endif
        </ul>
</div>
</nav>
@else
<nav class="navbar-primary navbar-expand-lg navbar-light">
    <div class="navbar-header"><span><a class="navbar-brand" href="/">BLOW</a></span></div>
    <div class="container-fluid">
      <ul class="nav ">
        <li class="nav-item"><a class="custom-link" href="#"><i class="fas fa-user-circle"></i>{{ Auth::user()->name }}</a></li>
        <li class="nav-item"><a class="custom-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}</a></li><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form></li>
@if(Auth::check())
        @if (Auth::user()->isAdmin())
        <li class="nav-item"><a class="custom-link" href="/admin"><i class="fas fa-chart-line"></i>Tableau de bord</a></li>
        <li class="nav-item"><a class="custom-link" href="#" onclick="openTab(event, 'user-tab')"><i class="fas fa-users"></i></i>Utilisateurs</a></li>
        <li class="nav-item"><a class="custom-link" href="#" onclick="openTab(event, 'room-tab')"><i class="fas fa-list"></i>Salles</a></li>
        <li class="nav-item"><a class="custom-link" href="#" onclick="openTab(event, 'event-tab')"><i class="far fa-calendar-check"></i>Evenements</a></li>
        <li class="nav-item"><a class="custom-link" href="#" onclick="openTab(event, 'calendar-tab')"><i class="far fa-calendar-alt"></i>Calendrier</a></li>
        @endif
@endif
      </ul>
    </div>
</nav>

@endguest

</header>
