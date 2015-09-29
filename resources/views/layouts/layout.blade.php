<!doctype html>
<html class="no-js" lang="es">
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

      <link rel="stylesheet" href="/css/idealform/jquery.idealforms.css" />
      <link rel="stylesheet" href="/css/foundation.css" />
    	<link rel="stylesheet" href="/media/fonts/Roboto-Medium/RobotoMedium.css" />
    	<link rel="stylesheet" href="/media/fonts/RobotoRegular/RobotoRegular.css" />
    	<link rel="stylesheet" href="/media/fonts/RobotoBold/RobotoBold.css" />
    	<link rel="stylesheet" href="/media/fonts/RobotoBlack/RobotoBlack.css" />
    	<link rel="stylesheet" href="/media/fonts/RobotoLight/RobotoLight.css" />
    	<link rel="stylesheet" href="/media/fonts/PatuaOneRegular/PatuaOneRegular.css" />
      <link rel="stylesheet" href="/css/header.css" />
        @yield('css')
        <script src="/js/vendor/modernizr.js"></script>
        <script>
            var user_type = <?=$_SESSION['user_link_type']?>;
        </script>
    </head>
    <body>
    <!-- HEADER DESKTOP -->
    <div class="row hide-for-small ">
      <div class="small-12">
        <div class="medium-5 small-6 column">
          <a href="/inicio"><img src="/img/logo.jpg" alt="comida-chapina"></a>
        </div>
        <div class="medium-7 small-6 column">
          @if(App\Models\User::isLogged())
            <div class="small-3 column right" style="padding-top: 10px;">
            <a href="/perfil" class="large-8 left text-right">
            @if(isset($_SESSION['ina_user']['profile_photo']))
              <img class="roundImage" src="/assets/{{ $_SESSION['ina_user']['profile_photo'] }}" alt="Foto de perfil {{ $_SESSION['ina_user']['name'] }}" style="width: 45px;height: 45px;" />
            @else
              <span title="{{ $_SESSION['ina_user']['name'] }}">
                <?php
                  $user = substr($_SESSION['ina_user']['name'], 0, 6);
                  print $user;
                ?>
              </span>
            @endif
            </a>
            <div class="large-4 left" data-dropdown="dropdownUser" aria-controls="dropdownUser" aria-expanded="false" style="cursor: pointer;">
              <span class="small-12 columns">&#x25BE;</span>
              <ul id="dropdownUser" class="f-dropdown" data-dropdown-content tabindex="-1" aria-hidden="true" aria-autoclose="false" tabindex="-1">
                <li>
                  <a class="darkgray" onclick="logout();">Cerrar sesión</a>
                </li>
              </ul>
              <!-- <a class="darkgray" onclick="logout();">
                <span>Cerrar</span>
              </a> -->
            </div>
          </div>
          @else
          <div class="small-4 column right" style="padding-top: 10px;">
            <span><a class="darkgray small-12 large-5 left RobotoMedium" onclick="showLoginModal();">Ingresar</a></span>
            <span class="darkgray large-1 left RobotoMedium"> /</span>
            <span><a class="darkgray small-12 large-5 left RobotoMedium" onclick="showRegisterModal();">Registrarse</a></span>
          </div>
          @endif
<!--           <div class="small-3 column right select-country-header-container">
          <a href="#" class="button split select-country-header">GUA<span class="min-gua"></span><span data-dropdown="countries-select-header"></span></a><br>
          <ul id="countries-select-header" class="f-dropdown" data-dropdown-content>
            <li><a href="#">SV</a></li>
            <li><a href="#">HN</a></li>
            <li><a href="#">CR</a></li>
          </ul>
          </div> -->
          <!-- <form action="/buscarBridge">
            <div class="small-3 column right search-input-header">
              <input type="text" class="aling-center search-input" placeholder="Buscar...">
            </div>
            <input type="submit" style="display:none" id="search_btn">
          </form> -->
        </div>
      </div>
    </div>
    <div class="gray-line-header hide-for-small"></div>
    <div class="row hide-for-small">
      <ul class="small-12 left no_list_style font-size-0-8 padding-top-1">
        @foreach($page['food_type'] as $foodType)
        <a class="darkgray" href="/recetas/{{$foodType['name']}}"><li class="small-1 left RobotoMedium upper-text text-center">{{$foodType['name']}}</li></a>
        @endforeach
        @foreach($page['recipe_type'] as $recipeType)
        <a class="darkgray" href="/recetas/{{$recipeType['name']}}"><li class="small-1 left RobotoMedium upper-text text-center">{{$recipeType['name']}}</li></a>
        @endforeach
      </ul>
    </div>
  <!-- HEADER MOBILE -->  
    <nav class="top-bar hide-for-medium-up margin-bottom-1" data-topbar data-options="back_text:Atrás" >
        <ul class="title-area">
            <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
            <li class="name">
                <a href="#"></a>
            </li>
        </ul>
        <section class="top-bar-section">
            <!-- Right Nav Section -->
            <ul class="left">
              <li class="divider"></li>
                @foreach($page['food_type'] as $foodType)
                <li class="RobotoMedium upper-text">
                  <a class="darkgray" href="/recetas/{{$foodType['name']}}">{{$foodType['name']}}</a>
                </li>
                <li class="divider"></li>
                @endforeach
                @foreach($page['recipe_type'] as $recipeType)
                <li class="RobotoMedium upper-text">
                  <a class="darkgray" href="/recetas/{{$recipeType['name']}}">{{$recipeType['name']}}</a>
                </li>
                <li class="divider"></li>
                @endforeach


                @if(App\Models\User::isLogged())
                  <li class="RobotoMedium upper-text">
                    <a class="darkgray" onclick="logout();"><span>Cerrar sesión</span></a>
                  </li>
                  <li class="divider"></li>
                @else
                  <li class="RobotoMedium upper-text">
                    <a class="darkgray" onclick="showLoginModal();"><span>Ingresar</span></a>
                  </li>
                  <li class="divider"></li>
                  <li class="RobotoMedium upper-text">
                    <a class="darkgray" onclick="showRegisterModal();"><span>Registrarse</span></a>
                  </li>
                  <li class="divider"></li>
                @endif


            </ul>
        </section> 
    </nav>
    <!-- HEADER MOBILE END -->  


    @yield('content')
    	<!-- Footer -->
	<!-- Navigation - Favorites - Recents -->
  <div class="row">
    <div class="padding-top-2 left small-12">
      <div class="small-12 medium-4 column left">
        <h3 class="PatuaOneRegular">Navegación</h3>
        <p>
          <ul class="menu-navigation">
            <li class="spacer-menu-footer"><a href="/inicio">Ver Receta</a></li>
            <li class="spacer-menu-footer"><a @if(App\Models\User::isLogged()) href="/perfil" @else onclick="showLoginModal();" @endif>Subir Receta</a></li>
            <li class="spacer-menu-footer"><a href="/recetas/Desayuno">Desayuno</a></li>
            <li class="spacer-menu-footer"><a href="/recetas/Almuerzo">Almuerzo</a></li>
            <li class="spacer-menu-footer"><a href="/recetas/Cena">Cena</a></li>
            <li class="spacer-menu-footer"><a href="/recetas/Postre">Postre</a></li>
            <li><a href="#" data-reveal-id="terminosModal">Términos y Condiciones</a></li>
          </ul>
        </p>
      </div>
      <div class="small-12 medium-4 column left">
        <h4 class="PatuaOneRegular padding-bottom-1-5">Chefs Favoritas</h4>
        <div class="container-favorite-users">
          <!-- Favorite User -->
          @foreach($page['favorite_user'] as $favorite)
          <div class="left small-12 divider-favorite-chef">
            <div class="small-4 column">
              <div class="favoriteChef imgLiquid">
                <img src="/assets/{{ $favorite['profile_photo'] }}">
              </div>
            </div>
            <div class="small-8 left">
              <div class="PatuaOneRegular small-9">{{$favorite['recipe_name']}}</div>
              <div class="RobotoMedium lightgray font-size-0-9">{{$favorite['name']}}</div>
            </div>
          </div>
          @endforeach
        </div>  
      </div>
      <div class="small-12 medium-4 column left">
        <h4 class="PatuaOneRegular padding-bottom-1-5">Recetas Recientes</h4>
        <div class="container-recent-recipes">
          <!-- Recent Recipes -->
          @foreach($page['recent_recipes'] as $recent_recipe)
          <a href="/receta/{{$recent_recipe['id']}}">
          <div class="left small-12 divider-favorite-chef">
            <div class="small-4 column">
              <div class="recentRecipe imgLiquid">
                <img src="/assets/{{$recent_recipe['recipe_photo']}}">
              </div>
              <div class="text-center fav-recent-recipe">
                <img src="/media/images/fav-recent-recipe.png">
              </div>
            </div>
            <div class="small-8 left">
              <div class="PatuaOneRegular small-9 black">{{$recent_recipe['name']}}</div>
              <?php $use_recipe_date = date_create($recent_recipe['updated_at']); ?>
              <div class="RobotoMedium font-size-0-8 redina column padding-top-0-4">{{date_format($use_recipe_date ,'d')." de ".$page['meses'][intval(date_format($use_recipe_date ,'m'))].", ".date_format($use_recipe_date ,'Y')}}</div>
            </div>
          </div>
          </a>
          @endforeach
        </div>  
      </div>
      <!-- Footer -->
      <div class="left small-12 padding-top-1 footer">
          <div class="row">
            <div class="RobotoRegular">
              Derechos Reservados © 2015 <span class="redina">www.combinaConIna.com</span>
            </div>
          </div>
        </div>
        <div class="left small-12 spacer-footer"></div>
    </div>
  </div>
    @include('layouts.modals')
    <script src="/js/vendor/jquery.js"></script>
    <script src="/js/foundation.min.js"></script>
    <script src="/js/imgLiquid.js"></script>
    <script src="/js/vendor/idealform/jquery.idealforms.min.js"></script>
    <script src="/js/vendor/idealform/jquery.idealforms.i18n.es.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/login.js"></script>
    @yield('scripts')
    <script>
      $(document).foundation();
      $(function(){
      	$(".imgLiquid").not(".imgLiquid_ready").imgLiquid({fill: true});
      });
    </script>
    </body>
</html>