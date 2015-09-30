'use strict';

var User = function () {};

/*
*username: (str) user name
*password: (str hash) password
*cb: (callback) function to do something
*/
User.prototype.login = function(username, password, cb) {
	let obj = {};
	var r = $.get('/services/auth', {
		user: username,
		pass: password,
		action: 'login'
	}, function () {}, 'json');
	r.done(function (response) {});
	r.fail(function (response) {});
};

User.prototype.logout = function () {
	console.log('logout');
};