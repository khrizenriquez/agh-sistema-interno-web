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

                extract($parameters);

                $jtStartIndex   = (isset($jtStartIndex)) ? $jtStartIndex: 0;
                $jtPageSize     = (isset($jtPageSize)) ? $jtPageSize: 10;
                $jtSorting      = (isset($jtSorting)) ? $jtSorting: 'name ASC';

                $result['Result']           = 'OK';
                $result['Records']          = Department::getPaginateDepartments($jtStartIndex, $jtPageSize, $jtSorting);
                $result['TotalRecordCount'] = Department::getAllDepartmentsCount();

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

                extract($parameters);
                $result = [];

                $userId = User::getUserId();

                $result['Record']   = Department::createDepartment($name, $status, $userId);
                $result['Result']   = 'OK';

                return $result;
            break;
            case 'department_update':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }
                $tmpArray = $parameters;
                extract($parameters);
                $result = [];

                $result['Records']  = Department::updateDepartmentDetail($id, $name, $status);
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
            case 'town_create':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }

                extract($parameters);

                $result = [];

                $userId = User::getUserId();

                $result['Record'] = Town::createTown($townName, $status, $userId, $departmentId);
                $result['Result'] = 'OK';

                return $result;
            break;
            case 'town_list':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }
                extract($parameters);
                $jtStartIndex   = (isset($jtStartIndex)) ? $jtStartIndex: 0;
                $jtPageSize     = (isset($jtPageSize)) ? $jtPageSize: 10;
                $jtSorting      = (isset($jtSorting)) ? $jtSorting: 'departmentName ASC';
                $result = [];

                $sort = (isset($jtSorting)) ? $jtSorting : ' ASC';

                $result['Records']          = Town::getPaginateTowns($jtStartIndex, $jtPageSize, $jtSorting);
                $result['Result']           = 'OK';
                $result['TotalRecordCount'] = Town::getTotal();

                return $result;
            break;
            case 'town_update':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }
                $tmpArray = $parameters;
                extract($parameters);
                $result = [];

                $result['Records']  = Town::updateTownDetail($id, $townName, $departmentId, $status);
                $result['Result']   = 'OK';

                return $result;
            break;
            case 'town_delete':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }
                extract($parameters);
                $result = [];

                $result['Record']   = Town::deleteTownDetail($id);
                $result['Result']   = 'OK';

                return $result;
            break;


            /*      RESPONSIBLES*/
            case 'responsible_list':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }
                extract($parameters);
                $jtStartIndex   = (isset($jtStartIndex)) ? $jtStartIndex: 0;
                $jtPageSize     = (isset($jtPageSize)) ? $jtPageSize: 10;
                $jtSorting      = (isset($jtSorting)) ? $jtSorting: 'name ASC';
                $result = [];

                $result['Records']          = ResponsibleType::getPaginateResponsibles($jtStartIndex, $jtPageSize, $jtSorting);
                $result['Result']           = 'OK';
                $result['TotalRecordCount'] = ResponsibleType::getTotal();

                return $result;
            break;
            case 'responsible_create':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }

                extract($parameters);
                $result = [];

                $userId = User::getUserId();

                $result['Record']   = ResponsibleType::createResponsibleType($name, $status);
                $result['Result']   = 'OK';

                return $result;
            break;
            case 'responsible_update':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }
                extract($parameters);
                $result = [];

                $result['Records']  = ResponsibleType::updateResponsibleType($id, $name, $status);
                $result['Result']   = 'OK';

                return $result;
            break;
            case 'responsible_delete':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }
                extract($parameters);
                $result = [];

                $result['Record']   = ResponsibleType::deleteResponsibleType($id);
                $result['Result']   = 'OK';

                return $result;
            break;



            /*      DISEASE*/
            case 'disease_list':
                $result = [];
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }

                extract($parameters);
                $jtStartIndex   = (isset($jtStartIndex)) ? $jtStartIndex: 0;
                $jtPageSize     = (isset($jtPageSize)) ? $jtPageSize: 10;
                $jtSorting      = (isset($jtSorting)) ? $jtSorting: 'name ASC';

                $result['Records']          = DiseaseType::getPaginateDiseaseType($jtStartIndex, $jtPageSize, $jtSorting);
                $result['Result']           = 'OK';
                $result['TotalRecordCount'] = DiseaseType::getTotal();

                return $result;
            break;
            case 'disease_create':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }

                extract($parameters);
                $result = [];

                $userId = User::getUserId();

                $result['Record']   = DiseaseType::createDiseaseType($name, $status, $userId);
                $result['Result']   = 'OK';

                return $result;
            break;
            case 'disease_update':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }
                extract($parameters);
                $result = [];

                $result['Records']  = DiseaseType::updateDisease($id, $name, $status);
                $result['Result']   = 'OK';

                return $result;
            break;
            case 'disease_delete':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR', 
                                'Message'   => 'No esta loguedo'];
                }
                extract($parameters);
                $result = [];

                $result['Record']   = DiseaseType::deleteDiseaseType($id);
                $result['Result']   = 'OK';

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
