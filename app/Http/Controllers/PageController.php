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

        switch ($page) {
            case 'inicio':
                return (User::isLogged()) ? view('home'): view('login');

                /*if (User::isLogged()) {
                    $user = User::getUser($_SESSION['ina_user']['id']);
                    return view('home', array('user' => $user))->with($params);
                } else {
                    return view('home')->with($params);
                }*/
            break;/*
            case 'perfil':
                if (User::isLogged()) {
                    $user = User::getUser($_SESSION['ina_user']['id']);
                    $user_ext = User::join("state","state.id","=","user.state_id")->join("country","country.id","=","state.country_id")->where("user.id","=",$_SESSION['ina_user']['id'])->get(array("country.phone_ext"))->first();
                    $params['page']['ext']=$user_ext->phone_ext;
                    return view('profile', array('user' => $user))->with($params);
                } else {
                    return redirect('/inicio');
                }
            break;
            case 'recetas':
                if (User::isLogged()) {
                    $user = User::getUser($_SESSION['ina_user']['id']);
                    return view('listofrecipes', array('user' => $user))->with($params);
                } else {
                    return view('listofrecipes')->with($params);
                }
            break;
            case 'receta':
                if (User::isLogged()) {
                    $user = User::getUser($_SESSION['ina_user']['id']);
                    return view('recipe', array('user' => $user))->with($params);
                } else {
                    return view('recipe')->with($params);
                }
            break;*/
            default: break;

        }
    }

    public function getLanding() {
        return $this->getPage('inicio');
    }

}
