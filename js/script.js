(function(jQuery) {
	
	"use strict";
	
	//Hide Loading Box (Preloader)
	function handlePreloader() {
		if(jQuery('.preloader').length){
			jQuery('.preloader').delay(500).fadeOut(500);
		}
	}
	
	
	//Update Header Style + Scroll to Top
	function headerStyle() {
		if(jQuery('.main-header').length){
			var topHeader = jQuery('.header-top').innerHeight();
			var windowpos = jQuery(window).scrollTop();
			if (windowpos >= topHeader) {
				jQuery('.main-header').addClass('fixed-header');
				jQuery('.scroll-to-top').fadeIn(300);
			} else {
				jQuery('.main-header').removeClass('fixed-header');
				jQuery('.scroll-to-top').fadeOut(300);
			}
		}
	}
	
	//Search Box Hide / Show
	if(jQuery('.header-lower .search-btn').length){
		jQuery('.header-lower .search-btn').on('click', function() {
			jQuery('.search-box.toggle-box').slideToggle(500);
			// animate
		   	jQuery('html, body').animate({
			   scrollTop: jQuery('html, body').offset().top
			 }, 1000);
		});
	}
	
	//Submenu Dropdown Toggle
	if(jQuery('.main-header li.dropdown ul').length){
		jQuery('.main-header li.dropdown').append('<div class="dropdown-btn"></div>');
		
		//Dropdown Button
		jQuery('.main-header li.dropdown .dropdown-btn').on('click', function() {
			jQuery(this).prev('ul').slideToggle(500);
		});
	}
	
	
	//Main Slider
	if(jQuery('.main-slider .tp-banner').length){

		jQuery('.main-slider .tp-banner').show().revolution({
		  delay:10000,
		  startwidth:1200,
		  startheight:620,
		  hideThumbs:600,
	
		  thumbWidth:80,
		  thumbHeight:50,
		  thumbAmount:5,
	
		  navigationType:"bullet",
		  navigationArrows:"0",
		  navigationStyle:"preview4",
	
		  touchenabled:"on",
		  onHoverStop:"off",
	
		  swipe_velocity: 0.7,
		  swipe_min_touches: 1,
		  swipe_max_touches: 1,
		  drag_block_vertical: false,
	
		  parallax:"mouse",
		  parallaxBgFreeze:"on",
		  parallaxLevels:[7,4,3,2,5,4,3,2,1,0],
	
		  keyboardNavigation:"off",
	
		  navigationHAlign:"center",
		  navigationVAlign:"bottom",
		  navigationHOffset:0,
		  navigationVOffset:20,
	
		  soloArrowLeftHalign:"left",
		  soloArrowLeftValign:"center",
		  soloArrowLeftHOffset:20,
		  soloArrowLeftVOffset:0,
	
		  soloArrowRightHalign:"right",
		  soloArrowRightValign:"center",
		  soloArrowRightHOffset:20,
		  soloArrowRightVOffset:0,
	
		  shadow:0,
		  fullWidth:"on",
		  fullScreen:"off",
	
		  spinner:"spinner4",
	
		  stopLoop:"off",
		  stopAfterLoops:-1,
		  stopAtSlide:-1,
	
		  shuffle:"off",
	
		  autoHeight:"off",
		  forceFullWidth:"on",
	
		  hideThumbsOnMobile:"on",
		  hideNavDelayOnMobile:1500,
		  hideBulletsOnMobile:"on",
		  hideArrowsOnMobile:"on",
		  hideThumbsUnderResolution:0,
	
		  hideSliderAtLimit:0,
		  hideCaptionAtLimit:0,
		  hideAllCaptionAtLilmit:0,
		  startWithSlide:0,
		  videoJsPath:"",
		  fullScreenOffsetContainer: ".main-slider"
	  });

		
	}
	
	
	
	//Sponsors Slider
	if (jQuery('.sponsors-section .slider').length) {
		jQuery('.sponsors-section .slider').owlCarousel({
			loop:true,
			margin:20,
			nav:true,
			autoplay: 5000,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				800:{
					items:3
				},
				1024:{
					items:4
				},
				1100:{
					items:5
				}
			}
		});    		
	}
	
	//Adjust Footer Background
	function footerStyle() {
		if(jQuery('.main-footer .contact-widget').length){
			var contactWidth = jQuery('.main-footer .contact-widget').innerWidth();
			//var windowWidth = jQuery(window).width();
			var contWidth = jQuery('.main-footer .auto-container').width();
			jQuery('.main-footer .footer-bg-layer').css({'width':contWidth-contactWidth+15});
		}
	}
	
	//Date TimePicker
	if(jQuery('.date-field').length) {
		jQuery('.date-field').datepick();
	}
	
	//Tabs Box
	if(jQuery('.tabs-section').length){
		jQuery('.tabs-section .tab-btn').on('click', function(e) {
			e.preventDefault();
			var target = jQuery(jQuery(this).attr('href'));
			jQuery('.tabs-section .tab-btn').removeClass('active');
			jQuery(this).addClass('active');
			jQuery('.tabs-section .tab').fadeOut(0);
			jQuery('.tabs-section .tab').removeClass('active-tab');
			jQuery(target).fadeIn(300);
			jQuery(target).addClass('active-tab');
			var windowWidth = jQuery(window).width();
			if (windowWidth <= 700) {
				jQuery('html, body').animate({
				   scrollTop: jQuery('.tabs-section .content-column').offset().top-100
				 }, 1000);
			}
		});
		
	}
	
	
	//Three Column Slider
	if (jQuery('.column-carousel.three-column').length) {
		jQuery('.column-carousel.three-column').owlCarousel({
			loop:true,
			margin:30,
			nav:true,
			autoplayHoverPause:false,
			autoplay: 5000,
			smartSpeed: 700,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				800:{
					items:2
				},
				1024:{
					items:3
				},
				1100:{
					items:3
				}
			}
		});    		
	}
	
	
	//Three Column Slider
	if (jQuery('.column-carousel.three-one').length) {
		jQuery('.column-carousel.three-one').owlCarousel({
			loop:true,
			margin:30,
			nav:false,
			autoplayHoverPause:false,
			autoplay: 5000,
			smartSpeed: 700,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				800:{
					items:1
				},
				1024:{
					items:1
				},
				1100:{
					items:1
				}
			}
		});    		
	}
	
	//Skill Progress Bar
	if(jQuery('.skill-box .bar-fill').length){
		jQuery(".skill-box .bar-fill").each(function() {
			var progressWidth = jQuery(this).attr('data-percent');
			jQuery(this).css('width',progressWidth+'%');
			jQuery(this).parents('.bar').children('.percent').html(progressWidth+'%');
		});
	}	
	
	//Filters Section / Mixitup
	if(jQuery('.filter-list').length){
		jQuery('.filter-list').mixitup({});
	}
	
	// Fact Counter
	function factCounter() {
		if(jQuery('.fact-counter').length){
			jQuery('.fact-counter .column.animated').each(function() {
		
				var jQueryt = jQuery(this),
					n = jQueryt.find(".count-text").attr("data-stop"),
					r = parseInt(jQueryt.find(".count-text").attr("data-speed"), 10);
					
				if (!jQueryt.hasClass("counted")) {
					jQueryt.addClass("counted");
					jQuery({
						countNum: jQueryt.find(".count-text").text()
					}).animate({
						countNum: n
					}, {
						duration: r,
						easing: "linear",
						step: function() {
							jQueryt.find(".count-text").text(Math.floor(this.countNum));
						},
						complete: function() {
							jQueryt.find(".count-text").text(this.countNum);
						}
					});
				}
				
			});
		}
	}
	
	
	//Accordions
	if(jQuery('.accordion-box').length){
		jQuery('.accordion-box .acc-btn').on('click', function() {
		if(jQuery(this).hasClass('active')!==true){
				jQuery('.accordion-box .acc-btn').removeClass('active');
			}
			
		if (jQuery(this).next('.acc-content').is(':visible')){
				jQuery(this).removeClass('active');
				jQuery(this).next('.acc-content').slideUp(500);
			}
		else{
				jQuery(this).addClass('active');
				jQuery('.accordion-box .acc-content').slideUp(500);
				jQuery(this).next('.acc-content').slideDown(500);	
			}
		});
	}
	
	
	//Image Carousel Slider
	if (jQuery('.image-carousel .slider').length) {
		jQuery('.image-carousel .slider').owlCarousel({
			loop:true,
			  navigation : false,
			  slideSpeed : 500,
			  responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1024:{
					items:1
				},
				1200:{
					items:1
				},
				1400:{
					items:1
				}
			}
		});    		
	}
	//Image Carousel Slider
	if (jQuery('.client-testimonial-carousel').length) {
		jQuery('.client-testimonial-carousel').owlCarousel({
			loop:true,
			  navigation : false,
			  slideSpeed : 500,
			  nav: false,
			  dots: false,
			  responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1024:{
					items:1
				},
				1200:{
					items:1
				},
				1400:{
					items:1
				}
			}
		});    		
	}
	
	//LightBox / Fancybox
	if(jQuery('.lightbox-image').length) {
		jQuery('.lightbox-image').fancybox();
	}

	
	
	// Scroll to top
	if(jQuery('.scroll-to-top').length){
		jQuery(".scroll-to-top").on('click', function() {
		   // animate
		   jQuery('html, body').animate({
			   scrollTop: jQuery('html, body').offset().top
			 }, 1000);
	
		});
	}
	
	
	// Elements Animation
	if(jQuery('.wow').length){
		var wow = new WOW(
		  {
			boxClass:     'wow',      // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset:       0,          // distance to the element when triggering the animation (default is 0)
			mobile:       true,       // trigger animations on mobile devices (default is true)
			live:         true       // act on asynchronously loaded content (default is true)
		  }
		);
		wow.init();
	}

/* ==========================================================================
   When document is ready, do
   ========================================================================== */
   
	jQuery(document).on('ready', function() {
		headerStyle();
		footerStyle();
	});

/* ==========================================================================
   When document is Scrollig, do
   ========================================================================== */
	
	jQuery(window).on('scroll', function() {
		headerStyle();
		factCounter();
	});
	
/* ==========================================================================
   When document is loading, do
   ========================================================================== */
	
	jQuery(window).on('load', function() {
		handlePreloader();
	});
	

/* ==========================================================================
   When Window is resizing, do
   ========================================================================== */
	
	jQuery(window).on('resize', function() {
		footerStyle();
	});
	

})(window.jQuery);