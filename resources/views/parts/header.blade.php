<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">
        <figure class="brand-figure">
          <img src="/images/logoAgh.jpg" alt="Asociación Guatemalteca de Hemofilia ONG" />
        </figure>
      </a>
    </div>

    <?php 
      $menu = [
                ['/catalogos', 'Catálogos'], 
                ['/perfil', 'Perfil'], 
                ['/pacientes', 'Pacientes']
              ];
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

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a data-target="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="javascript:void(0)">Action</a></li>
                <li><a href="javascript:void(0)">Another action</a></li>
                <li><a href="javascript:void(0)">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="javascript:void(0)">Separated link</a></li>
            </ul>
        </li>
      </ul>
    </div>

  </div>
</nav>