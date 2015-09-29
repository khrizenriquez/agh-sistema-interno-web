<!doctype html>
<html class="no-js" lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

    <link rel="stylesheet" href="/styles/idealform/jquery.idealforms.css" />
    <!-- Twitter Bootstrap -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" />

    <!-- Material Design for Bootstrap -->
    <link rel="stylesheet" href="/styles/roboto.css" />
    <link rel="stylesheet" href="/styles/bootstrap/material/material-fullpalette.css" />
    <link rel="stylesheet" href="/styles/bootstrap/material/ripples.css" />

    <!-- Dropdown.js -->
    <link rel="stylesheet" href="//cdn.rawgit.com/FezVrasta/dropdown.js/master/jquery.dropdown.css" />

    <link rel="stylesheet" href="/styles/home.css" />
    @yield('styles')
    <script src="/js/modernizr.js"></script>
  </head>

  <body>
  <!-- HEADER DESKTOP -->
  <div>
    HEADER
  </div>

  @yield('content')
  	<!-- Footer -->
	<div>
   Footer 
  </div>

  <script src="/js/vendor/jquery.js"></script>

  <!-- Twitter Bootstrap -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <!-- Material Design for Bootstrap -->
  <script src="/js/vendor/bootstrap/material.js"></script>
  <script src="/js/vendor/bootstrap/ripples.js"></script>
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