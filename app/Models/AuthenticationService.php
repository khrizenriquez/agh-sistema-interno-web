<?php

namespace App\Models;

class AuthenticationService {

    public function execute($parameters = []) {
        if (!isset($parameters['action'])) {
            $result = ['Result' => 'ERROR', 'Message' => 'Faltan parámetros'];
            return json_encode($result);   
        }
        switch ($parameters['action']) {
            case 'emailExists':
                if(isset($parameters['email'])){
                    return json_encode($this->emailExists($parameters['email']));
                }else{
                    return json_encode(SiteService::MissingParameters());
                }
            case 'logout':
                return User::logOut();
            break;
            case 'login':
                extract($parameters);
                $email      = $user;
                $password   = $pass;
                $login      = User::loginNormal($email, $password);

                return json_encode($login);

                return json_encode($this->processLoginResult($login));
            case 'register':
                $email = $parameters['email'];
                $password = $parameters['password'];
                $fid = (isset($parameters['fbid'])) ? $parameters['fbid'] : -1;
                $name = $parameters['name'];
                $phone = $parameters['phone'];
                $state = $parameters['state'];
                if (User::getSessionUserType() == User::getINAUser()) {
                    return json_encode($this->registerINAUser($email, $password, $fid, $name, $phone, $state));
                } else if (User::getSessionUserType() == User::getStoreUser()) {
                    $store = $parameters['store'];
                    return json_encode($this->registerStoreUser($email, $password, $fid, $name, $phone, $state, $store));
                } else {
                    return json_encode($this->registerNormalUser($email, $password, $fid, $name, $phone, $state));
                }
            case 'password-recovery':
                $email = $parameters['email'];
                
            default:
                $result = array();
                $result['Result'] = 'ERROR';
                $result['Message'] = 'Acción no definida';
                return json_encode($result);
        }
    }
    public function emailExists($email){
        $result = array();
        if(User::countUsersWEmail($email)>0){
            $result['Result'] = 'ERROR';
            $result['Message'] = 'Ya existe un usuario con ese correo electrónico';
        }else{
            $result['Result'] = 'OK';
            $result['Message'] = 'Puede registrarse con ese correo electrónico';
        }
        return $result;
    }

    public function processLoginResult($loginResult) {
        $result = array();
        switch ($loginResult){
            case 1:
                $result['Result'] = 'OK';
                $result['Message'] = 'Se ha logeado exitosamente';
                break;
            case 2:
                $result['Result'] = 'ERROR';
                $result['Message'] = 'La combinación de usuario y contraseña es inválida';
                break;
            case 3:
                $result['Result'] = 'ERROR';
                $result['Message'] = 'El correo electrónico ya existe';
                break;
            case 4:
                $result['Result'] = 'ERROR';
                $result['Message'] = 'El correo electrónico no existe';
                break;
        }
        return $result;
    }

    public function registerNormalUser($email, $password, $fbid, $name, $phone, $state) {
        $result = $this->processLoginResult(User::register($name, $email, $password, $phone, $state, User::getNormalUser(), $fbid));
        return $result;
    }

    public function registerStoreUser($email, $password, $fbid, $name, $phone, $state, $store) {
        $result = $this->processLoginResult(User::register($name, $email, $password, $phone, $state, User::getStoreUser(), $fbid, $store));
        return $result;
    }

    public function registerINAUser($email, $password, $fbid, $name, $phone, $state) {
        $result = $this->processLoginResult(User::register($name, $email, $password, $phone, $state, User::getINAUser(), $fbid));
        return $result;
    }

}
