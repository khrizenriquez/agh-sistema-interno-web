<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller {

    protected $page;
    protected $parameters = [];
     function __construct() {
        date_default_timezone_set('America/Guatemala');
        session_start();
        $parameters = SecurityController::mergeParameters();
    }

    function getPage($page) {
        $params = [];

        if (User::isLogged()) {
            $u = User::getUser();
            $explodeName = explode(' ', $u->user_name);
            $first  = (strlen($explodeName[0]) > 0) ? $explodeName[0]: '';
            $last   = (isset($explodeName[1]) > 0) ? $explodeName[1]: '';
            $params['userName']     = $u->user_name;
            $params['userInfo']     = $u;
            $params['firstName']    = $first;
            $params['lastName']     = $last;
        }

        switch ($page) {
            case 'inicio':
                return (User::isLogged()) ? view('home')->with($params) : view('login');
            break;
            case 'perfil':
                return (User::isLogged()) ? view('profile')->with($params) : redirect('/inicio');
                /*$user = User::getUser($_SESSION['ina_user']['id']);
                $user_ext = User::join("state","state.id","=","user.state_id")->join("country","country.id","=","state.country_id")->where("user.id","=",$_SESSION['ina_user']['id'])->get(array("country.phone_ext"))->first();
                $params['page']['ext']=$user_ext->phone_ext;
                return view('profile', array('user' => $user))->with($params);*/
            break;
            case 'catalogos':
                return (User::isLogged()) ? view('catalogs')->with($params) : redirect('/inicio');
            break;
            case 'pacientes':
                return (User::isLogged()) ? view('patients')->with($params) : redirect('/inicio');
            break;
            default: 
            break;

        }
    }

    public function getLanding() {
        return $this->getPage('inicio');
    }

}
