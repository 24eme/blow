<!DOCTYPE html>
<html lang="fr">
 <head>
    @include('layouts.head')
    @include('frontend.components.calendar')
 </head>
 <body>
    @include('layouts.header')
    <div class="container">
      @yield('content')
    </div>
    @include('layouts.footer')
    @include('layouts.footer-scripts')
 </body>
</html>
