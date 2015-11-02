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
      <ul class="nav navbar-nav">
        @foreach ($menu as $m)
          <?php
            $active = (app('request')->server('REDIRECT_URL') == $m[0]) ? 'active' : '';
            $links  = (app('request')->server('REDIRECT_URL') == $m[0]) ? "<a>".$m[1]."</a>" : "<a href='".$m[0]."'>".$m[1]."</a>";
          ?>
        <li class="{{ $active }}">
          <?= $links; ?>
        </li>
        @endforeach
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a data-target="#" class="dropdown-toggle" data-toggle="dropdown">{{ $firstName }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                  <a><i class="mdi-action-settings"></i> Ajustes</a>
                </li>
                <!-- <li>
                  <a href="javascript:void(0)">Ajustes</a>
                </li>
                <li class="divider"></li> -->
                <li>
                  <a id="logoutOption"><i class="mdi-navigation-cancel"></i> Cerrar sesión</a>
                </li>
            </ul>
        </li>
      </ul>
    </div>

  </div>
</nav>