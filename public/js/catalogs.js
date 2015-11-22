/*
*author: @duku
*/

'use strict';

var statusOption = {
	0: 'Inactivo', 
	1: 'Activo'
}

function showDepartmentsCatalog () {
	$('#departmentCatalog').jtable({
        title: ' ', 
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
        defaultSorting: 'departmentName ASC', //Set default sorting
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
//function showDepartmentsCatalog () {}
//function showDepartmentsCatalog () {}
