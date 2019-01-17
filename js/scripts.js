jQuery(function(jQuery) {
	var $ = jQuery;

	function faqTransition() {
		$(document).ready(function () {

			$('#q-1, #q-2, #q-3, #q-4, #q-5, #q-6, #q-7, #q-8, #q-9').addClass('activate');

			$('.content-wrapper').hide();

			$( '.inner').toggle(function() {

				$(this).parents('.col-md-4').find('.content-wrapper').slideToggle(200, function () {

				});
				// Adding css to service box below so it gets covered by content we're sliding down
				$(this).parents('.col-md-4').next().next().next().css('z-index', '-1');
				// Adding active to .inner so that aqua background remains while opened
				$(this).addClass('active');

			}, function() {

				$(this).parents('.col-md-4').find('.content-wrapper').slideToggle(400, function () {

					// Adding css back to service box below so that it becoms clickable
					$(this).parents('.col-md-4').next().next().next().css('z-index', '1');

				});
				// Removing .active from .inner so that aqua background only appears on hover while it's closed
				$(this).removeClass('active');

			});

		});

		jQuery(window).scroll(function() {
			var scroll = jQuery(window).scrollTop();
			if (scroll >= 50) {
				jQuery('#q-7, #q-8, #q-9, #q-10, #q-11, #q-12').addClass('activate');
			}
			if (scroll >= 70) {
				jQuery('#q-13, #q-14, #q-15, #q-16, #q-17, #q-18').addClass('activate');
			}
		});

		jQuery(window).scroll(function() {
			var scroll = jQuery(window).scrollTop();
			if (scroll >= 100) {
				jQuery('.bio').addClass('activate');
			}
		});

		jQuery(window).scroll(function() {
			var scroll = jQuery(window).scrollTop();
			if (scroll >= 200) {
				jQuery('.service-box').addClass('activate');
			}
		});

		jQuery(window).scroll(function() {
			var scroll = jQuery(window).scrollTop();
			if (scroll >= 1100) {
				jQuery('#why-dmk').addClass('activate');
			}
		});

	}

	function productSlider() {
		$(document).ready(function () {

			var winWidth = jQuery(window).width();
			var slides;

			if (winWidth >= 2540) {
				slides = 5;
			} else if (winWidth >= 2030) {
				slides = 4;
			} else if (winWidth >= 1520) {
				slides = 3;
			} else if (winWidth >= 1010) {
				slides = 2;
			} else {
				slides = 1;
			}
			jQuery('.product-slides').bxSlider({
				pager: true,
				auto: false,
				infiniteLoop: true,
				slideWidth: 3000,
				slideMargin: 0,
				minSlides: slides,
				maxSlides: slides,
				hideControlOnEnd: true,
				nextText: '<i class="fa fa-angle-right"></i>',
				prevText: '<i class="fa fa-angle-left"></i>',
			});

		});
	}

	function testimonialSlider() {
		$(document).ready(function () {

			var winWidth = jQuery(window).width();
			var slides;

			if (winWidth >= 2540) {
				slides = 5;
			} else if (winWidth >= 2030) {
				slides = 4;
			} else if (winWidth >= 1520) {
				slides = 3;
			} else if (winWidth >= 1010) {
				slides = 2;
			} else {
				slides = 1;
			}
			jQuery('.slides').bxSlider({
				pager: false,
				auto: false,
				infiniteLoop: true,
				slideWidth: 3000,
				minSlides: slides,
				maxSlides: slides,
				hideControlOnEnd: true,
				nextText: '<i class="fa fa-angle-right"></i>',
				prevText: '<i class="fa fa-angle-left"></i>',
			});

		});
	}

	function homeTransitions() {
		if ( jQuery('body').hasClass('home') ) {

			jQuery(window).scroll(function() {
				var scroll = jQuery(window).scrollTop();
				if (scroll >= 200) {
					jQuery('#feat-treatment .inner').addClass('activate');
				}
			});

		}
	}

	function menuDropdown() {
		jQuery('#mobilenav_wrapper a#mobilebutton .fa').click(function(e) {
			e.preventDefault();
			jQuery('#mainnav').slideToggle( 'fast' );
			jQuery(this).toggleClass('fa-bars fa-times');
		});
	}

	$(function() {
		productSlider();
		testimonialSlider();
		faqTransition();
		homeTransitions();
		menuDropdown();
	});

});

$( document ).ready(function() {

	TweenMax.to('.box-1', 0.5, {
		left: -407,
		top: -407,
		repeat: 6, 
		repeatDelay: 0,
	});

	TweenMax.to('.box-2', 0.5, {
		top: 150,
		left: 525,
		delay: 3.2,
		opacity: 1,
		ease: Back.easeOut.config(0.4),
	});

	TweenMax.to('.w1', 0.5, {
		opacity: 1,
		onComplete: complete
	});

	TweenMax.to('.w2', 0.5, {
		opacity: 1,
		delay: 1,
		onComplete: complete
	});

	TweenMax.to('.w3', 0.5, {
		opacity: 1,
		delay: 2,
		onComplete: complete
	});

	TweenMax.to('.w4', 0.5, {
		opacity: 1,
		delay: 3,
		onComplete: complete
	});

	function complete(){
		TweenMax.to('.w1, .w2, .w3, .w4', 0.4, {
			opacity: 0,
		});
		TweenMax.to('h1', 0.1, {
			opacity: 1,
			delay: 3,
		});
		TweenMax.to('.cta', 1, {
			opacity: 1,
			delay: 3.5,
			ease: Back.easeOut.config(1),
			scale: 1,
			y: 0,
		});
		TweenMax.to('.down-arrow', 2, {
			opacity: 1,
			delay: 3.5,
			ease: Elastic.easeOut.config(1),
			scale: 1,
			y: 0,
		});
	}

	document.getElementById('cta').addEventListener('click', function() {

		TweenMax.to('.panel-1', 1, {
			opacity: 0,
			onComplete: displayNone(),
		});

		TweenMax.to('.cta', 1, {
			opacity: 0,
			ease: Back.easeOut.config(1),
			scale: 1,
			y: -200,
		});

		TweenMax.to('.down-arrow', 1, {
			opacity: 0,
			ease: Back.easeOut.config(1),
			scale: 1,
			y: -200,
		});
		
	});

	function displayNone()  {
		$('.panel-1').show(0).delay(100).hide(0);
		TweenMax.to('.panel-2', 1, {
			opacity: 1,
			y: 0,
			ease: Back.easeOut.config(0.4),
		});
	}

});