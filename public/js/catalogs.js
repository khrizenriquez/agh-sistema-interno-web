/*
*author: @duku
*/

'use strict';

var statusOption = { 0: 'Inactivo', 1: 'Activo' };

function showDepartmentsCatalog () {
	$('#departmentCatalog').jtable({
        defaultSorting: 'name ASC', 
        pageSize:       10, 
        paging:         true, 
        sorting:        true, 
        title:          ' ', 
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
                sorting: true,
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
    $('#departmentCatalog').jtable('load');
}
function showTownsCatalog () {
	$('#townCatalog').jtable({
        defaultSorting: 'departmentName ASC', 
        pageSize:       10, 
        paging:         true, 
        sorting:        true,
        title:          ' ', 
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
            }, departmentName: {
                title: 'Departamento'
            }, status: {
                title: 'Estado', 
                sorting: false,
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
    $('#townCatalog').jtable('load');
}
function showResponsibleCatalog () {
    $('#responsibleCatalog').jtable({
        defaultSorting: 'departmentName ASC',
        pageSize:       10, 
        paging:         true, 
        sorting:        true,
        title:          ' ', 
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
                list: false,
                sorting: false,
                title: 'Creación'
            }, updated_at: {
                create: false, 
                list: false,
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
        defaultSorting: 'departmentName ASC',
        pageSize:       10, 
        paging:         true, 
        sorting:        true,
        title:          ' ', 
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
    $('#diseaseCatalog').jtable('load');
}
