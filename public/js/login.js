/*
*author: @duku
*/

'use strict';

$(function () {
	$('#form-login').idealforms({
	  	onSubmit: function (invalid, e) {
		    e.preventDefault();

		    if (!invalid) {
		    	var user = document.getElementById('user').value;
		    	var pass = document.getElementById('pass').value;
		      	var u 	 = new User();
		      	u.login(user, pass, login);
		      	return;
		    }
		    return;
		}, rules: {
			'user': 'required username',
		    'pass': 'required pass'
	  	}
	});

	function login (response) {
		if (response.Result == 'OK') {
			window.location.reload();
			return;
		}
		alert(response.Message);
		return;
	}

	var vague = $('.container-back').Vague({
	    intensity:      10,      // Blur Intensity
	    forceSVGUrl:    false,   // Force absolute path to the SVG filter,
	    // default animation options
	    animationOptions: {
	      duration: 1000,
	      easing: 'linear' // here you can use also custom jQuery easing functions
	    }
	});

	vague.blur();
});

function logout () {
	var u = new User();
	u.logout(function () {
		window.location.reload();
		return;
	});
}

