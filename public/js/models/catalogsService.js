'use strict';

var AllDepartments 	= angular.module('AllDepartments', []);
var AllTowns        = angular.module('AllTowns', []);
var AllResponsibles = angular.module('AllResponsibles', []);
var AllDiseases 	= angular.module('AllDiseases', []);

AllDepartments.factory('allDepartmentsData', function ($http) {
	var obj 	= {};
	var objs 	= {
        	action: 'department_list'
        };

    obj.getAllDepartments = function () {
        return $http.post('/services/catalogs', $.param(objs));
    }

    //obj.seePuchamon = function(puchamons) {};

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

