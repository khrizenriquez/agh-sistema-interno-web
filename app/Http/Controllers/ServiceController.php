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

    public function getService($servicename) {
        $parameters = SecurityController::mergeParameters();
        switch ($servicename) {
            case 'auth':
                $service = new AuthenticationService();
                return $service->execute($parameters);
                //return $service->execute(SecurityController::purifyArray($parameters,false));
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
