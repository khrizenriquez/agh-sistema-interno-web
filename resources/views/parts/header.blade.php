<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">
        AGH
      </a>
    </div>

    <?php 
      $menu = [['/catalogos', 'Catálogos'], ['/perfil', 'Perfil']];
    ?>

    <div class="navbar-collapse collapse navbar-inverse-collapse">
      <ul class="nav navbar-nav" ng-controller="MenuCtrl">
        @foreach ($menu as $m)
          <?php
            $active = (app('request')->server('REDIRECT_URL') == $m[0]) ? 'active' : '';
          ?>
        <li class="{{ $active }}">
          <a href="{{ $m[0] }}">{{ $m[1] }}</a>
        </li>
        @endforeach
      </ul>
    </div>

  </div>
</nav>