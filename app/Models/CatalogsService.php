<?php

namespace App\Models;

use App\Models\User;
use App\Models\Department;

class CatalogsService {

    public function execute($parameters = []) {
        if (!isset($parameters['action'])) {
            $result = ['Result' => 'ERROR', 'Message' => 'Faltan parámetros'];
            return json_encode($result);   
        }
        switch ($parameters['action']) {
            case 'department_list':
                $result = [];
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }

                return json_encode(Department::getAllDepartments());
            break;
            case 'department_create':
                if(isset($parameters['email'])){
                    return json_encode($this->emailExists($parameters['email']));
                }else{
                    return json_encode(SiteService::MissingParameters());
                }
            break;
            case 'department_update':
                if(isset($parameters['email'])){
                    return json_encode($this->emailExists($parameters['email']));
                }else{
                    return json_encode(SiteService::MissingParameters());
                }
            break;
            case 'department_delete':
                if(isset($parameters['email'])){
                    return json_encode($this->emailExists($parameters['email']));
                }else{
                    return json_encode(SiteService::MissingParameters());
                }
            break;
            default:
                $result = [];
                $result['Result'] = 'ERROR';
                $result['Message'] = 'Acción no definida';
            return json_encode($result);
        }
    }

}
