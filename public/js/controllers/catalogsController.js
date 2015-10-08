/*
*author: @duku
*/

'use strict';

var catalogs = angular.module('catalogs', ['ngRoute', 'AllDepartments', 'AllTowns']);

catalogs.config(function ($routeProvider, $httpProvider) {
	$httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';

	$routeProvider
		/*	Departments routes*/
		.when('/departamentos', {
			templateUrl: '/html/parts/catalogs/departments.html',
			controller: 'DepartmentsCtrl'
		})
		.when('/departamentos/crear/', {
			templateUrl: function (urlAttr) {
				return 'parts/puchamosDetails.html';
			}, controller: 'PuchamonDetailCtrl'
		})
		.when('/departamentos/actualizar/:number', {
			templateUrl: function (urlAttr) {
				return 'parts/puchamosDetails.html';
			}, controller: 'PuchamonDetailCtrl'
		})
		.when('/departamentos/eliminar/:number', {
			templateUrl: function (urlAttr) {
				return 'parts/puchamosDetails.html';
			}, controller: 'PuchamonDetailCtrl'
		})
		/*	Towns routes*/
		.when('/municipios', {
			templateUrl: '/html/parts/catalogs/towns.html',
			controller: 'TownsCtrl'
		})


		.otherwise({
			redirectTo: "/departamentos"
		});
});

catalogs.controller('HeaderCtrl', function ($scope) {
	$scope.author = {
		name: 			'Khriz Enríquez',
		github: 		'khrizenriquez',
		appName: 		'',
		description: 	''
	};
});

catalogs.controller('DepartmentsCtrl', function ($scope, allDepartmentsData) {
	$scope.allDepartments;

	allDepartmentsData.getAllDepartments()
					.success(function (resp) {
						console.log(resp);
						if (resp.Message == 'OK') {
							$scope.allDepartments = resp.Result;
						} else {
							$scope.allDepartments = [];
						}
					})
					.error(function (error) {
						console.log(error);
					});

	$scope.listAllDepartments = function () {
		console.log('Puchamon');
	}
});


catalogs.controller('TownsCtrl', function ($scope, allTownsData) {
	$scope.allTowns;

	allTownsData.getAllTowns()
				.success(function (resp) {
					console.log(resp);
					if (resp.Message == 'OK') {
						$scope.allTowns = resp.Result;
					} else {
						$scope.allTowns = [];
					}
				})
				.error(function (error) {
					console.log(error);
				});

	$scope.listAllTowns = function () {
		console.log('Puchamon');
	}
});
