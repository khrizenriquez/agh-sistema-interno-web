'use strict';

var AllDepartments 	= angular.module('AllDepartments', []);
var AllTowns 		= angular.module('AllTowns', []);

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
	var obj 	= {};
	var objs 	= {
        	action: 'town_list'
        };

    obj.getAllTowns = function () {
        return $http.post('/services/catalogs', $.param(objs));
    }

 	return obj;
});

/*PuchamonService.factory("PuchamonDetail", function ($http) {
	var obj = {};

    obj.puchamonDetail = function (puchamonNumber) {
    	var pokeUrl = 'http://pokeapi.co/api/v1/pokemon/';

    	return $http.get(pokeUrl + parseInt(puchamonNumber));
    }

    obj.returnToListView = function () {};

 	return obj;
});*/
