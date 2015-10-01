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
                return json_encode(User::logOut());
            break;
            case 'login':
                extract($parameters);
                $password   = $pass;
                //  Válido que el correo exista en la base de datos
                if ($this->usernameExists($user)) {
                    $login = User::loginNormal($user, $password);

                    return json_encode($this->processLoginResult($login));
                }

                $result = ['Result'     =>'ERROR', 
                            'Message'   => 'El correo electrónico no existe'];
                return $result;

            break;
            case 'password-recovery':
                $email = $parameters['email'];
            break;
            default:
                $result = [];
                $result['Result'] = 'ERROR';
                $result['Message'] = 'Acción no definida';
                return json_encode($result);
        }
    }
    public function emailExists ($email) {
        return (User::countUsersWEmail($email) > 0) ? true: false;
    }

    public function usernameExists ($username) {
        return (User::countUsers($username) > 0) ? true: false;
    }

    public function processLoginResult($loginResult) {
        $result = [];
        switch ($loginResult) {
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

}
