'use strict';

require.config({
  baseUrl:          'scripts/modules',
  paths:{
  	jquery: 				"../vendor/jquery/jquery-1.11.1.min",
  	jqueryui: 			"../vendor/jqueryui/ui/jquery-ui",
    scrollParallax: "../vendor/scrollParallax/jquery.parallax",
    validate: 			"../vendor/validate/jquery.validate.min",
    fullPage:       "../vendor/fullPage/jquery.fullPage.min",
    owlCarousel:    "../vendor/owlCarousel/owl.carousel",
    wow:            "../vendor/wow/wow.min"
  }
});


$(document).ready(function(){
	require(['jquery', 'jqueryui'], function(){
    
    require(['scrollParallax'], function(){
      $('.site-header').parallax({
        speed : 0.4
      });
    });

    require(['parallax']);
    require(['validate'], function(){
      require(['validator']);
    });

    require(['wow'], function(){
      new WOW().init();
    })

    
    
  });
});