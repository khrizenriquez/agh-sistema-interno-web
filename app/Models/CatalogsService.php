<?php

namespace App\Models;

use App\Models\User;
use App\Models\Department;
use App\Models\DiseaseType;
use App\Models\ResponsibleType;

class CatalogsService {

    public function execute($parameters = []) {
        if (!isset($parameters['action'])) {
            $result = ['Result' => 'ERROR', 'Message' => 'Faltan parámetros'];
            return json_encode($result);   
        }
        switch ($parameters['action']) {
            /*      DEPARTMENTS*/
            case 'department_list':
                $result = [];
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }

                $result['Result']   = Department::getAllDepartments();
                $result['Message']  = 'OK';

                return $result;
            break;
            case 'department':
                extract($parameters);
                $result = [];
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }

                $result['Result']   = Department::getDepartmentDetail($department);
                $result['Message']  = 'OK';

                return $result;
            break;
            case 'department_create':
                if(isset($parameters['email'])){
                    return json_encode($this->emailExists($parameters['email']));
                }else{
                    return json_encode(SiteService::MissingParameters());
                }
            break;
            case 'department_update':
                extract($parameters);
                $result = [];
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }

                $result['Result']   = Department::updateDepartmentDetail($department, $name);
                $result['Message']  = 'OK';

                return $result;
            break;
            case 'department_delete':
                extract($parameters);
                $result = [];
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }

                $result['Result']   = Department::deleteDepartmentDetail($department);
                $result['Message']  = 'OK';

                return $result;
            break;


            /*      TOWNS*/
            case 'town_list':
                $result = [];
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }

                $result['Result']   = Town::getAllTowns();
                $result['Message']  = 'OK';

                return $result;
            break;


            /*      RESPONSIBLES*/
            case 'responsible_list':
                $result = [];
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }

                $result['Result']   = ResponsibleType::getAllResponsibles();
                $result['Message']  = 'OK';

                return $result;
            break;



            /*      DISEASE*/
            case 'disease_list':
                $result = [];
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }

                $result['Result']   = DiseaseType::getAllDiseases();
                $result['Message']  = 'OK';

                return $result;
            break;

            default:
                $result = [];
                $result['Result'] = 'ERROR';
                $result['Message'] = 'Acción no definida';
            return json_encode($result);
        }
    }

}
