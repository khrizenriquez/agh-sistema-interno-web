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
			templateUrl: '/html/parts/catalogs/departments.html',
			controller: 'DepartmentsCtrl'
		})
		.when('/departamentos/crear/', {
			templateUrl: function (urlAttr) {
				return 'parts/puchamosDetails.html';
			}, controller: 'DepartmentsCtrl'
		})
		.when('/departamentos/:url/:number', {
			templateUrl: function (urlAttr) {
				return '/html/parts/catalogs/departmentDetail.html';
			}, controller: 'DepartmentsDetailCtrl'
		})


		/*	Towns routes*/
		.when('/municipios', {
			templateUrl: '/html/parts/catalogs/towns.html',
			controller: 'TownsCtrl'
		})


		/*	responsible routes*/
		.when('/responsables', {
			templateUrl: '/html/parts/catalogs/responsible.html',
			controller: 'ResponsibleCtrl'
		})



		/*	disease routes*/
		.when('/enfermedades', {
			templateUrl: '/html/parts/catalogs/disease.html',
			controller: 'DiseaseCtrl'
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

	$scope.departmentAction = function (id) {
		$('#catalogsModal').attr('data-tb-id', id);
		$('#catalogsModal').modal('hide');
		$('#catalogsModal').modal('show');
	}

	$scope.updateDepartment = function (id) {
		var departmentId = id || $('#catalogsModal').attr('data-tb-id');
		window.location = '#/departamentos/actualizar/' + departmentId;
		$('#catalogsModal').modal('hide');
	};
	$scope.deleteDepartment = function (id) {
		var departmentId = id || $('#catalogsModal').attr('data-tb-id');
		window.location = '#/departamentos/eliminar/' + departmentId;
		$('#catalogsModal').modal('hide');
	};
	$scope.seeDepartment = function (id) {
		var departmentId = id || $('#catalogsModal').attr('data-tb-id');
		window.location = '#/departamentos/informacion/' + departmentId;
		$('#catalogsModal').modal('hide');
	};
});

catalogs.controller('DepartmentsDetailCtrl', function ($scope, $routeParams, allDepartmentsData) {
	$scope.department;
	$scope.editable;

	var route = $routeParams.url;
	if (route != 'informacion' && route != 'actualizar' && route != 'eliminar') {
		return;
	}

	var editable = (route == 'actualizar') ? true : false;
	var id = $routeParams.number;

	if (route == 'eliminar') {
		console.log('Eliminando ' + id);

		return;
	}

	allDepartmentsData.getDepartmentDetail(id)
						.success(function (resp) {
							console.log(resp);
							$scope.department 	= resp.Result;
							$scope.editable 	= editable;
						}).error(function (err) {
							console.log(err);
							$scope.department = [];
						});

	$scope.updateDepartment = function (id) {
		console.log(id);
	};

	return;
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

catalogs.controller('ResponsibleCtrl', function ($scope, allResponsiblesData) {
	$scope.allResponsibleTypes;

	allResponsiblesData.getAllResponsibles()
						.success(function (resp) {
							console.log(resp);
							if (resp.Message == 'OK') {
								$scope.allResponsibleTypes = resp.Result;
							} else {
								$scope.allResponsibleTypes = [];
							}
						})
						.error(function (error) {
							console.log(error);
						});

	$scope.listAllTypes = function () {
		console.log('Puchamon');
	}
});

catalogs.controller('DiseaseCtrl', function ($scope, allDiseaseData) {
	$scope.allDiseaseTypes;

	allDiseaseData.getAllDisease()
					.success(function (resp) {
						console.log(resp);
						if (resp.Message == 'OK') {
							$scope.allDiseaseTypes = resp.Result;
						} else {
							$scope.allDiseaseTypes = [];
						}
					})
					.error(function (error) {
						console.log(error);
					});

	$scope.listAllTypes = function () {
		console.log('Puchamon');
	}
});
