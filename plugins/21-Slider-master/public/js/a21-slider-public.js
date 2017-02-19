(function( $ ) {
	'use strict';

$(function(){

  $('.slider').flickity({
    prevNextButtons: true,
    pageDots: true,
    autoPlay: $('.slider').data( 'autoplay' ),
		imagesLoaded: true
  });

  $('.slide-nav').flickity({
    asNavFor: '.slider',
    contain: true,
    pageDots: false
  });

});


})( jQuery );
