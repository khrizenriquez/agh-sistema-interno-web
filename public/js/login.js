/*
*author: @duku
*/

'use strict';

$(function () {
	$('#form-login').idealforms({
	  	onSubmit: function (invalid, e) {
		    e.preventDefault();
		    e.stopPropagation();

		    if (!invalid) {
		    	var user = document.getElementById('email').value;
		    	var pass = document.getElementById('pass').value;
		      	var u 	 = new User();
		      	u.login(user, pass, login);
		      	return;
		    }
		    return;
		}, rules: {
			'email': 'required email',
		    'pass': 'required password'
	  	}
	});

	function login (response) {
		console.log('khris');
	}
});

