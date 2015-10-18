'use strict';

var User = function () {};

/*
*username: (str) user name
*password: (str hash) password
*cb: (callback) function to do something
*/
User.prototype.login = function(username, password, cb) {
	var r = $.post('services/auth', {
		user: username,
		pass: password,
		action: 'login'
	}, function () {}, 'json');
	r.done(function (response) {
		return cb(response);
	});
	r.fail(function (error) {
		console.error(error);
	});
};

User.prototype.logout = function (cb) {
	var r = $.post('services/auth', {
		action: 'logout'
	}, function () {}, 'json');
	r.done(function (response) {
		return cb(response);
	});
	r.fail(function (error) {
		console.error(error);
	});
};