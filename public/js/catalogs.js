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
        title: '',
        actions: {
            listAction: 	'/services/catalogs?action=department_list',
            createAction: 	'/services/catalogs?action=department_create',
            updateAction: 	'/services/catalogs?action=department_update',
            deleteAction: 	'/services/catalogs?action=department_delete'
        },
        fields: {
            id: {
                key: true,
                list: false
            }, name: {
                title: 'Nombre departamento'
            }, status: {
                title: 'Estado', 
                options: statusOption
            }, created_at: {
                title: 'Creación', 
                edit: false
            }, updated_at: {
                title: 'Actualización', 
                edit: false
            }
        }
    });
    $('#departmentCatalog').jtable('load');
}
function showTownsCatalog () {}
//function showDepartmentsCatalog () {}
//function showDepartmentsCatalog () {}
