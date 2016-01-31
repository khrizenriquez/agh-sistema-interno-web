<?php namespace App\Models;

class PatientsService {

    public function execute($parameters = []) {
        $result = [];
        if (!isset($parameters['action'])) {
            $result = ['Result'     => 'ERROR',
                        'Message'   => 'Faltan parámetros'
                    ];
            return json_encode($result);
        }
        switch ($parameters['action']) {
            case 'patients_list':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR',
                                'Message'   => 'No esta loguedo'];
                }

                extract($parameters);

                $jtStartIndex   = (isset($jtStartIndex)) ? $jtStartIndex: 0;
                $jtPageSize     = (isset($jtPageSize)) ? $jtPageSize: 10;
                $jtSorting      = (isset($jtSorting)) ? $jtSorting: 'name ASC';

                $result['Result']           = 'OK';
                $result['Records']          = Patient::getPaginatePatients($jtStartIndex, $jtPageSize, $jtSorting);
                $result['TotalRecordCount'] = Patient::getTotal();

                return $result;
            break;
            case 'patient_create':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR',
                                'Message'   => 'No esta loguedo'];
                }

                $p      = new Patient();
                $result = $p->patient($parameters);

                return $result;
            break;
            case 'patient_update':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR',
                                'Message'   => 'No esta loguedo'];
                }

                $p      = new Patient();
                $result = $p->uPatient($parameters);

                return $result;
            break;
            case 'patient_delete':
                if (!User::isLogged()) {
                    $result = ['Result'     => 'ERROR',
                                'Message'   => 'No esta loguedo'];
                }
                extract($parameters);
                $result = [];

                return $result;
            break;
            default:
                $result = ['Result'     => 'ERROR',
                            'Message'   => 'Acción no definida'];
            return json_encode($result);
        }
    }

}
