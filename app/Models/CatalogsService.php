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

                $result['Result']   = 'OK';
                $result['Records']  = Department::getAllDepartments();

                return $result;
            break;
            case 'department':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }
                extract($parameters);
                $result = [];

                $result['Result']   = Department::getDepartmentDetail($department);
                $result['Message']  = 'OK';

                return $result;
            break;
            case 'department_create':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }
            break;
            case 'department_update':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }
                $tmpArray = $parameters;
                extract($parameters);
                $result = [];

                $result['Records']  = Department::updateDepartmentDetail($id, $name);;
                $result['Result']   = 'OK';

                return $result;
            break;
            case 'department_delete':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }
                extract($parameters);
                $result = [];

                $result['Records']  = Department::deleteDepartmentDetail($id);
                $result['Result']   = 'OK';

                return $result;
            break;


            /*      TOWNS*/
            case 'town_list':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }
                $result = [];

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
