'use strict';

$(function () {
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
