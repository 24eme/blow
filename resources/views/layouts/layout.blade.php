<!DOCTYPE html>
<html lang="fr">
 <head>
    @include('head')
 </head>
 <body>
    @include('header')
    @yield('content')
    @include('footer')
    @include('footer-scripts')
 </body>
</html>
