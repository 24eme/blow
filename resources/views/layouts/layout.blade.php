<!DOCTYPE html>
<html lang="fr">
 <head>
    @include('layouts.head')
    @include('components.datepicker')
    @include('components.calendar')
 </head>
 <body>
    @include('layouts.header')
    @include('components.loading')
      @yield('content')
    @include('layouts.footer')
    @include('layouts.footer-scripts')
 </body>
</html>
