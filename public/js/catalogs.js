/*
*author: @duku
*/

'use strict';

var statusOption = { 0: 'Inactivo', 1: 'Activo' };

function showDepartmentsCatalog () {
	$('#departmentCatalog').jtable({
        title: ' ', 
        defaultSorting: 'name ASC', 
        actions: {
            listAction: 	'/services/catalogs?action=department_list',
            createAction: 	'/services/catalogs?action=department_create',
            updateAction: 	'/services/catalogs?action=department_update',
            deleteAction: 	'/services/catalogs?action=department_delete'
        }, fields: {
            id: {
                key: true,
                list: false
            }, name: {
                title: 'Nombre departamento'
            }, status: {
                title: 'Estado', 
                sorting: false,
                options: statusOption
            }, created_at: {
                create: false, 
                edit: false, 
                sorting: false,
                title: 'Creación'
            }, updated_at: {
                create: false, 
                edit: false, 
                sorting: false,
                title: 'Actualización' 
            }
        }
    });
    $('#departmentCatalog').jtable('load');
}
function showTownsCatalog () {
	$('#townCatalog').jtable({
        title: ' ', 
        sorting: true,
        defaultSorting: 'departmentName ASC', 
        actions: {
            listAction: 	'/services/catalogs?action=town_list',
            createAction: 	'/services/catalogs?action=town_create',
            updateAction: 	'/services/catalogs?action=town_update',
            deleteAction: 	'/services/catalogs?action=town_delete'
        }, fields: {
            id: {
                key: true,
                list: false
            }, townName: {
                title: 'Nombre Municipio'
            }, departmentId: {
                title: 'Departamento', 
                options: departmentsOption
            }, status: {
                title: 'Estado', 
                sorting: false,
                options: statusOption
            }, created_at: {
                create: false, 
                edit: false, 
                sorting: false,
                title: 'Creación'
            }, updated_at: {
                create: false, 
                edit: false, 
                sorting: false,
                title: 'Actualización' 
            }
        }
    });
    $('#townCatalog').jtable('load');
}
function showResponsibleCatalog () {
    $('#responsibleCatalog').jtable({
        title: ' ', 
        sorting: true,
        defaultSorting: 'departmentName ASC', //Set default sorting
        actions: {
            listAction:     '/services/catalogs?action=responsible_list',
            createAction:   '/services/catalogs?action=responsible_create',
            updateAction:   '/services/catalogs?action=responsible_update',
            deleteAction:   '/services/catalogs?action=responsible_delete'
        }, fields: {
            id: {
                key: true,
                list: false
            }, name: {
                title: 'Tipo de responsable', 
                sorting: false,
            }, status: {
                title: 'Estado', 
                sorting: false,
                options: statusOption
            }, created_at: {
                create: false, 
                edit: false, 
                sorting: false,
                title: 'Creación'
            }, updated_at: {
                create: false, 
                edit: false, 
                sorting: false,
                title: 'Actualización' 
            }
        }
    });
    $('#responsibleCatalog').jtable('load');
}
function showDiseaseCatalog () {
    $('#diseaseCatalog').jtable({
        title: ' ', 
        sorting: true,
        defaultSorting: 'departmentName ASC', //Set default sorting
        actions: {
            listAction:     '/services/catalogs?action=disease_list',
            createAction:   '/services/catalogs?action=disease_create',
            updateAction:   '/services/catalogs?action=disease_update'
        }, fields: {
            id: {
                key: true,
                list: false
            }, name: {
                title: 'Nombre enfermedad', 
                sorting: false,
            }, status: {
                title: 'Estado', 
                options: statusOption, 
                sorting: false,
            }, created_at: {
                create: false, 
                edit: false, 
                sorting: false,
                title: 'Creación'
            }, updated_at: {
                create: false, 
                edit: false, 
                sorting: false,
                title: 'Actualización' 
            }
        }
    });
    $('#diseaseCatalog').jtable('load');
}
