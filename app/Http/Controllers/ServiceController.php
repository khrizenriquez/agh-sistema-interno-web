<?php

namespace App\Http\Controllers;
use App\Models\AuthenticationService;

use App\Models\User;

class ServiceController extends Controller {

    protected $parameters = [];

    function __construct() {
        session_start();
        date_default_timezone_set('America/Guatemala');
        $parameters = SecurityController::mergeParameters();
    }

    function getService($servicename) {
        $parameters = SecurityController::mergeParameters();
        switch ($servicename) {
            case 'country':
                $service = new SiteService();
                break;
            case 'state':
                $service = new SiteService();
                break;
            case 'auth':
                $service = new AuthenticationService();
                break;
            case 'recipe':
                $service = new RecipeService();
                break;
            case 'favorites':
                $service = new FavoriteRecipesService();
                break;
            default:
                $result = ['Result' => 'ERROR', 'Message' => 'Servicio no definido'];
                break;

            if (isset($result) && !empty($result) && is_array($result)) {
                return json_encode($result);
            }

            return $service->execute(SecurityController::purifyArray($parameters,false));
        }
    }

}
