( function($) {
  'use strict';
$(function(e) {
	
/*------------------------------------------------------------------
	Listing Image Slider { Style 1}
	-------------------------------------------------------------------*/
	var owl = $("#listing_img_slider");
	owl.owlCarousel({
	  itemsCustom : [
		[0, 1],
		[450, 1],
		[700, 2],
		[1024, 3],
		[1200, 3],
	  ],
	  loop: true,
	  nav: true,
	  navigation : true,
	  pagination: false,
	  autoPlay  : 3000
	});



/*------------------------------------------------------------------
	Listing Image Slider { Style 2}
	-------------------------------------------------------------------*/
	$('.listing_images_slider').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.listing_images_slider_nav'
	});
	$('.listing_images_slider_nav').slick({
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  asNavFor: '.listing_images_slider',
	  dots: false,
	  centerMode: true,
	  focusOnSelect: true
	});

/*------------------------------------------------------------------
	Price-Range
	-------------------------------------------------------------------*/
	$("#price_range").slider({});


/*------------------------------------------------------------------
	Search-button
	-------------------------------------------------------------------*/
	$("#search_toggle").click(function(){
		$("#header-search-form").slideToggle();
	});
	


/*------------------------------------------------------------------
	Filter-Form
	-------------------------------------------------------------------*/
	$("#filter_toggle").click(function(){
		$("#filter_form").slideToggle();
	});
	
	
	
/*------------------------------------------------------------------
	Other-info
	-------------------------------------------------------------------*/
	$("#other_info").click(function(){
		$("#info_toggle").slideToggle();
	});
	
	
	
/*------------------------------------------------------------------
	back to top
	-------------------------------------------------------------------*/
 var top = $('#back-top');
	top .hide();
	 
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				top .fadeIn();
			} else {
				top .fadeOut();
			}
		});
		$('#back-top a').on('click', function(e) {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});


});


})(jQuery);