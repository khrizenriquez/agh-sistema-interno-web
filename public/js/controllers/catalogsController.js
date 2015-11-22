/*
*author: @duku
*/

'use strict';

var catalogs = angular.module('catalogs', ['ngRoute', 
											'AllDepartments', 
											'AllTowns', 
											'AllDiseases', 
											'AllResponsibles']);

catalogs.config(function ($routeProvider, $httpProvider) {
	//	To send data like jQuery
	$httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';

	$routeProvider
		/*	Departments routes*/
		.when('/departamentos', {
			templateUrl: '/html/parts/catalogs/departments.html'
		})

		/*	Towns routes*/
		.when('/municipios', {
			templateUrl: '/html/parts/catalogs/towns.html'
		})


		/*	responsible routes*/
		.when('/responsables', {
			templateUrl: '/html/parts/catalogs/responsible.html'
		})


		/*	disease routes*/
		.when('/enfermedades', {
			templateUrl: '/html/parts/catalogs/disease.html'
		})

		.otherwise({
			redirectTo: "/departamentos"
		});
});

catalogs.controller('HeaderCtrl', function ($scope, $location) {
	$scope.author = {
		name: 			'Khriz Enríquez',
		github: 		'khrizenriquez',
		appName: 		'',
		description: 	''
	};

	$scope.nav = {};
	$scope.nav.isActive = function (path) {
		return (path === $location.path()) ? true : false;
	};
});
