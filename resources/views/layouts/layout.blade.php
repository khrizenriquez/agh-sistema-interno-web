<!doctype html>
<html class="no-js" lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/styles/idealform/jquery.idealforms.css" />
    <!-- Twitter Bootstrap -->
    <link rel="stylesheet" href="/styles/bootstrap/bootstrap.min.css" />

    <!-- Material Design for Bootstrap -->
    <link rel="stylesheet" href="/styles/roboto.css" />
    <link rel="stylesheet" href="/styles/bootstrap/material/material-fullpalette.css" />
    <link rel="stylesheet" href="/styles/bootstrap/material/ripples.css" />

    <!-- Dropdown.js -->
    <!-- <link rel="stylesheet" href="//cdn.rawgit.com/FezVrasta/dropdown.js/master/jquery.dropdown.css" /> -->
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="/styles/home.css" />
    @yield('styles')
    <script src="/js/modernizr.js"></script>
  </head>

  <body>
  <!-- HEADER DESKTOP -->
  <div>
    HEADER
  </div>

  @include('layouts.generalModals')

  @yield('content')
  	<!-- Footer -->
	<div>
   Footer 
  </div>

  <script src="/js/vendor/jquery.js"></script>

  <!-- Twitter Bootstrap -->
  <script src="/js/vendor/bootstrap/bootstrap.min.js"></script>

  <!-- Material Design for Bootstrap -->
  <script src="/js/vendor/bootstrap/material/material.js"></script>
  <script src="/js/vendor/bootstrap/material/ripples.js"></script>
  <script>
    $.material.init();
  </script>

  <script src="/js/vendor/idealform/jquery.idealforms.min.js"></script>
  <script src="/js/vendor/idealform/jquery.idealforms.i18n.es.js"></script>
  <script src="/js/main.js"></script>
  <script src="/js/login.js"></script>
  @yield('scripts')
  </body>
</html>