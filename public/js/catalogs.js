/*
*author: @duku
*/

'use strict';

var catalogs = angular.module('catalogs', ['ngRoute']);

catalogs.config(function ($routeProvider) {
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


		.otherwise({
			redirectTo: "/departamentos"
		});
});

catalogs.controller('DepartmentsCtrl', function ($scope) {
	console.log($scope);
});
