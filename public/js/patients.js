/*
*author: @duku
*/

'use strict';

var statusOption = { 0: 'No', 1: 'Si' };

function showPatientsCatalog () {
	$('#patientsCatalog').jtable({
        defaultSorting: 'name ASC',
        pageSize:       10,
        paging:         true,
        sorting:        true,
        title:          ' ',
        actions: {
            listAction: 	'/services/patients?action=patients_list',
            createAction: 	'/services/patients?action=patient_create',
            updateAction: 	'/services/patients?action=patient_update',
            deleteAction: 	'/services/patients?action=patient_delete'
        }, fields: {
            id: {
                key: true,
                list: false
            }, patient_code: {
                title: 'Código'
            }, name: {
                title: 'Nombres'
            }, lastname: {
                title: 'Apellidos'
            }, gender: {
                title: 'Género',
                options: {
                    0: 'Femenino',
                    1: 'Masculino'
                }
            }, birth_date: {
                title: 'Nacimiento',
                type: 'date'
            }, admission_date: {
                title: 'Admisión',
                type: 'date'
            }, inhibitors: {
                title: 'Inhibidores',
                options: statusOption
            }, joint_disease: {
                title: 'Enf. articulatoría',
                options: statusOption
            }, physiotherapy: {
                title: 'Fisioterapía',
                options: statusOption
            }, sick_relatives: {
                title: 'Parientes enf.',
                options: statusOption
            }, created_at: {
                create: false,
                edit: false,
                list: false,
                sorting: false,
                title: 'Creación'
            }, updated_at: {
                create: false,
                edit: false,
                list: false,
                sorting: false,
                title: 'Actualización'
            }
        }
    });
    $('#patientsCatalog').jtable('load');
}

showPatientsCatalog();
