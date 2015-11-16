'use strict';

var AllDepartments 	= angular.module('AllDepartments', []);
var AllTowns        = angular.module('AllTowns', []);
var AllResponsibles = angular.module('AllResponsibles', []);
var AllDiseases 	= angular.module('AllDiseases', []);

AllDepartments.factory('allDepartmentsData', function ($http) {
	var obj = {};

    obj.getAllDepartments = function () {
    	var objs = {
            	action: 'department_list'
            };
        return $http.post('/services/catalogs', $.param(objs));
    };

    obj.getDepartmentDetail = function (departmentId) {
        var objs  = {
                action: 'department', 
                department: departmentId
            };
        return $http.post('/services/catalogs', $.param(objs));
    };

    obj.deleteDepartmentDetail = function (departmentId) {
        var objs  = {
                action: 'department_delete', 
                department: departmentId
            };
        return $http.post('/services/catalogs', $.param(objs));
    };

    obj.activeDepartmentDetail = function (departmentId) {
        var objs  = {
                action: 'department_active', 
                department: departmentId
            };
        return $http.post('/services/catalogs', $.param(objs));
    };

    obj.updateDepartmentDetail = function (departmentId, dapartmentName) {
        var objs  = {
                action: 'department_update', 
                department: departmentId,
                name: dapartmentName
            };

        return $http.post('/services/catalogs', $.param(objs));
    };

 	return obj;
});

AllTowns.factory('allTownsData', function ($http) {
    var obj     = {};
    var objs    = {
            action: 'town_list'
        };

    obj.getAllTowns = function () {
        return $http.post('/services/catalogs', $.param(objs));
    }

    return obj;
});

AllResponsibles.factory('allResponsiblesData', function ($http) {
    var obj     = {};
    var objs    = {
            action: 'responsible_list'
        };

    obj.getAllResponsibles = function () {
        return $http.post('/services/catalogs', $.param(objs));
    }

    return obj;
});

AllDiseases.factory('allDiseaseData', function ($http) {
	var obj 	= {};
	var objs 	= {
        	action: 'disease_list'
        };

    obj.getAllDisease = function () {
        return $http.post('/services/catalogs', $.param(objs));
    }

 	return obj;
});

