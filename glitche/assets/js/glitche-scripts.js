/**
*   Glitche (HTML)
*   Copyright © Glitche by beshleyua. All Rights Reserved.
**/

( function( $ ) {
	'use strict';

	window.onpageshow = function(event) {if (event.persisted) {window.location.reload() }};
	
	/*
		Set full height in blocks
	*/
	var width = $(window).width();
	var height = $(window).height();

	/* 
		Typed Preload
	*/
	if($('.typed-load').length && $('typed-load').text()!=''){	
		$('.typed-load').typed({
			stringsElement: $('.typing-load'),
			loop: true
		});
	}

	/*
		Preloader
	*/
	$(window).on('load', function() {
		$(".preloader .pre-inner").fadeOut(800, function(){
			
			/* Preload hide */
			$('.preloader').fadeOut();
			$('body').addClass('loaded');
			
			/* Typed subtitle */
			if($('.typed-subtitle').length){
				$('.typed-subtitle').each(function(){
					$(this).typed({
						stringsElement: $(this).prev('.typing-subtitle'),
						loop: true
					});
				});
			}
			
			/* Typed breadcrumbs */
			if($('.typed-bread').length){
				$('.typed-bread').typed({
					stringsElement: $('.typing-bread'),
					showCursor: false
				});
			}

			/* One page nav */
			var url_hash = location.hash;
			var sectionElem = $(url_hash);
			if(url_hash.indexOf('#section-') == 0 && sectionElem.length){
				$('body, html').animate({scrollTop: $(url_hash).offset().top - 138}, 400);
			}

			/* init Jarallax */
			if($('.jarallax').length){
				$('.jarallax').jarallax();
			}

			function scroll_refresh(){
				$(window).scrollTop($(window).scrollTop()+1);
			}
			setTimeout(scroll_refresh, 100);

		});
	});

	/*
		Resize
	*/
	$(window).resize(function() {

		/* Set full height in blocks */
		var width = $(window).width();
		var height = $(window).height();
		
		/* Set full height in started blocks */
		$('.section.started').css({'height': height});
		$('.logged-in .section.started').css({'height': height-32});
		if(width < 783) {
			$('.section.started').css({'height': height});
			$('.logged-in .section.started').css({'height': height-46});
		}

		/*
			Dotted Skills Line On Resize Window
		*/

		var skills_dotted = $('.skills-list.dotted .progress');
		var skills_dotted_w = skills_dotted.width();
		if(skills_dotted.length){
			skills_dotted.find('.percentage .da').css({'width':skills_dotted_w+1});
		}

	});

	/*
		Set full height in blocks
	*/
	$('.section.started').css({'height': height});
	$('.logged-in .section.started').css({'height': height-32});
	if(width < 783) {
		$('.section.started').css({'height': height});
		$('.logged-in .section.started').css({'height': height-46});
	}
	
	/*
		Fade-out animation between load pages
	
	$('header .top-menu, .typed-bread, .widget_nav_menu .menu').on('click', 'a', function(){
		var link = $(this).attr('href');
		if(link.indexOf('#section-') == 0){
			if(!$('body').hasClass('home')){
				location.href = '/'+link;
			}

			$('body, html').animate({scrollTop: $(link).offset().top - 138}, 400);
			if($('header').hasClass('active')){
				$('.menu-btn').trigger('click');
			}
		} else {
			$('body').removeClass('loaded');
			setTimeout(function() {
				location.href = "" + link;
			}, 500);
		}
		return false;
	});*/
	
	/*
		On Scroll 
	*/
	$(window).on('scroll', function(){
		if ($(this).scrollTop() >= height-200) {
			$('body').removeClass('background-enabled');
		} else {
			if((!$('header').hasClass('active')) && $('.video-bg').length) {
				$('body').addClass('background-enabled');
			}
		}

		if (($(this).scrollTop() >= 100) && ($('.section').length>1)) {
			$('footer').addClass('fixed');
			$('.mouse_btn').fadeOut();
		}
		if (($(this).scrollTop() <= 100) && ($('.section').length>1)) {
			$('.mouse_btn').fadeIn();
			$('footer').removeClass('fixed');
		}
	});

	/*
		Menu on mobile
	*/
	$('header').on('click', '.menu-btn', function(){
		if($('header').hasClass('active')){
			$('header').removeClass('active');
			$('body').addClass('loaded');
			if($('.video-bg').length) {
				$('body').addClass('background-enabled');
			}
		} else {
			$('header').addClass('active');
			$('body').removeClass('loaded');
			$('body').removeClass('background-enabled');
		}
		
		return false;
	});

	/*
		Download CV on mobile
	*/
	$('.section.about').on('click touchstart', '.btn', function(){
		location.href = $(this).attr('href');
	});
	
	/*
		Mouse button scroll
	*/
	$('.section').on('click', '.mouse_btn', function(){
		$('body, html').animate({
			scrollTop: height - 150
		}, 800);
	});
	if($('.section').length>1){
		$('.mouse_btn').show();
	}
	
	/*
		Glitch effect
	*/
	$('body').on({
		mouseenter: function () {
			$(this).addClass('glitch-effect-white');
		},
		mouseleave: function () {
			$(this).removeClass('glitch-effect-white');
			$('.top-menu ul li.active a.btn').addClass('glitch-effect-white');
		}
	}, 'a.btn, .btn');
	
	/*
		Validate contact form
	*/
	$("#cform").validate({
		rules: {
			name: {
				required: true
			},
			message: {
				required: true
			},
			email: {
				required: true,
				email: true
			}
		},
		success: "valid",
		submitHandler: function() {
			$.ajax({
				url: 'mailer/feedback.php',
				type: 'post',
				dataType: 'json',
				data: 'name='+ $("#cform").find('input[name="name"]').val() + '&email='+ $("#cform").find('input[name="email"]').val() + '&message=' + $("#cform").find('textarea[name="message"]').val(),
				beforeSend: function() {
				
				},
				complete: function() {
				
				},
				success: function(data) {
					$('#cform').fadeOut();
					$('.alert-success').delay(1000).fadeIn();
				}
			});
		}
	});
	
	/*
		Initialize portfolio items
	*/
	var $container = $('.portfolio-items');
	$container.imagesLoaded(function() {
		$container.isotope({
			itemSelector: '.box-item'
		});
	});

	/*
		Filter items on button click
	*/
	$('.filters').on( 'click', '.btn-group', function() {
		var filterValue = $(this).find('input').val();
		$container.isotope({ filter: filterValue });
		$('.filters .btn-group label').removeClass('glitch-effect');
		$(this).find('label').addClass('glitch-effect');
	});

	/*
		Portfolio items parallax
	*/
	if($('.portfolio-new').length){
		var s_parallax = document.getElementsByClassName('wp-post-image');
		new simpleParallax(s_parallax);
	}
	
	/*
		Gallery popup
	*/
	if(/\.(?:jpg|jpeg|gif|png)$/i.test($('.gallery-item:first a').attr('href'))){
		$('.gallery-item a').magnificPopup({
			gallery: {
				enabled: true
			},
			type: 'image',
			closeBtnInside: false,
			mainClass: 'mfp-fade'
		});
	}

	/*
		Media popup
	*/
	$('.has-popup-media').magnificPopup({
		type: 'inline',
		overflowY: 'auto',
		closeBtnInside: true,
		mainClass: 'mfp-fade'
	});

	/*
		Image popup
	*/
	$('.has-popup-image').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-fade',
		image: {
			verticalFit: true
		}
	});
	
	/*
		Video popup
	*/
	$('.has-popup-video').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		iframe: {
            patterns: {
                youtube_short: {
                  index: 'youtu.be/',
                  id: 'youtu.be/',
                  src: 'https://www.youtube.com/embed/%id%?autoplay=1'
                }
            }
        },
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false,
		mainClass: 'mfp-fade',
		callbacks: {
			markupParse: function(template, values, item) {
				template.find('iframe').attr('allow', 'autoplay');
			}
		}
	});
	
	/*
		Music popup
	*/
	$('.has-popup-music').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false,
		mainClass: 'mfp-fade'
	});

	/*
		Gallery popup
	*/
	$('.has-popup-gallery').on('click', function() {
        var gallery = $(this).attr('href');
    
        $(gallery).magnificPopup({
            delegate: 'a',
            type:'image',
            closeOnContentClick: false,
            mainClass: 'mfp-fade',
            removalDelay: 160,
            fixedContentPos: false,
            gallery: {
                enabled: true
            }
        }).magnificPopup('open');

        return false;
    });

	/*
		Background enabled
	*/
	var video_section_length = $('.section.background-enabled').length;
	var video_unmuted_length = $('.video-unmuted-bg').length;
	var is_safari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);

	if($('.video-bg').length) {
		$('body').addClass('background-enabled');
		if($('.jarallax-video').length){
			$('.jarallax-video').each(function(){
				var volume = $(this).data('volume');
				if(!is_safari) {
				$(this).jarallax({
					videoVolume: volume
				});
				}
				if(is_safari) {
				$(this).jarallax();
				}
			});
		}
	}
	if(video_section_length) {
		$(window).on('scroll', function(){
			var scrollPosY1 = $(window).scrollTop()+103;
			var scrollPosY2 = $(window).scrollTop()+$(window).height()-65;

			$('.section').each(function(){
				var sectionY1 = $(this).offset().top;
				var sectionY2 = $(this).offset().top+$(this).height();

				if(scrollPosY1>=sectionY1 && scrollPosY1<=sectionY2){
					if($(this).hasClass('background-enabled')){
						$('.footer').removeClass('fixed');
						if(!$('body').hasClass('background-enabled')){
							$('body').addClass('background-enabled');
						}
					}
				}

				if(scrollPosY2>=sectionY1 && scrollPosY2<=sectionY2){
					if($(this).hasClass('background-enabled')){
						$('.footer').removeClass('fixed');
						if(!$('body').hasClass('background-enabled-footer')){
							$('body').addClass('background-enabled-footer');
						}
					} else {
						$('.footer').addClass('fixed');
						$('body').removeClass('background-enabled-footer');
					}
				}
			})
		});
	}
	if($('.video-bg-mask').length){
		$('.video-bg-mask').each(function(){
			$(this).parent().addClass('disable-default-mask');
		});
	}

	/*
		Sidebar Show/Hide
	*/
	$('header').on('click', '.sidebar_btn', function(){
		$('.s_overlay').fadeIn();
		$('.content-sidebar').addClass('active');
		$('body').addClass('scroll_hidden');
		
		return false;
	});
	$('.content-sidebar, .container').on('click', '.close, .s_overlay', function(){
		$('.s_overlay').fadeOut();
		$('.content-sidebar').removeClass('active');
		$('body').removeClass('scroll_hidden');
	});

	/*
		Widget Title
	*/
	$('.widget-title').wrapInner('<span class="widget-title-span"></span>');

	/*
		One Page Menu Nav
	*/
	$('.top-menu ul li a').on('click', function () {
		if(($(this).attr('href').indexOf('#') == 0) && $('body').hasClass('home')){
			var id = $(this).attr('href');
			var h = parseFloat($(id).offset().top);
			
			$('body,html').animate({
				scrollTop: h - 180
			}, 800);
			
			return false;
		}
		if(($(this).attr('href').indexOf('#') == 0) && !$('body').hasClass('home')){
			location.href = $('.logo a').attr('href')+$(this).attr('href');
		}
	});

	/*
		One Page Widget Menu Nav
	*/
	$('.widget_nav_menu .menu li a').on('click', function () {
		if(($(this).attr('href').indexOf('#') == 0) && $('body').hasClass('home')){
			var id = $(this).attr('href');
			var h = parseFloat($(id).offset().top);
			
			$('body,html').animate({
				scrollTop: h - 180
			}, 800);
			
			return false;
		}
		if(($(this).attr('href').indexOf('#') == 0) && !$('body').hasClass('home')){
			location.href = $('.logo a').attr('href')+$(this).attr('href');
		}
	});

	/*
		Slideshow
	*/
	$('*[data-slick]').slick();

	/*
		Iframe margins
	*/
	$('.single-post-text').each(function(){
		$(this).find('iframe').wrap('<div class="embed-container"></div>');
	});

	/*
		Dotted Skills Line
	*/

	function skills(){
		var skills_dotted = $('.skills.dotted .progress');
		var skills_dotted_w = skills_dotted.width();
		if(skills_dotted.length){
			skills_dotted.append('<span class="dg"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></span>');
			skills_dotted.find('.percentage').append('<span class="da"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></span>');
			skills_dotted.find('.percentage .da').css({'width':skills_dotted_w});
		}
	}
	setTimeout(skills, 1000);

	/*
		Circle Skills Line
	*/

	var skills_circles = $('.skills.circles .progress');
	if(skills_circles.length){
		skills_circles.append('<div class="slice"><div class="bar"></div><div class="fill"></div></div>');
	}

	/*
		Testimonials Slider
	*/
	if($('.reviews-carousel').length){
		var rev_slider = $('.reviews-carousel .swiper-container');
		var is_autoplaytime = rev_slider.data('autoplaytime');
		var is_loop = rev_slider.data('loop');
		var is_slidesview = rev_slider.data('slidesview');
		var is_spacebetween = rev_slider.data('spacebetween');
		var rev_slider = new Swiper ('.reviews-carousel .swiper-container', {
			loop: is_loop,
			spaceBetween: is_spacebetween,
			slidesPerView: is_slidesview,
			autoplay: false,
			navigation: {
				nextEl: '.reviews-carousel .swiper-button-next',
				prevEl: '.reviews-carousel .swiper-button-prev',
			},
			pagination: {
				el: '.reviews-carousel .swiper-pagination',
				type: 'bullets',
			},
			breakpoints: {
				720: {
					slidesPerView: 1,
					spaceBetween: is_spacebetween,
				},
				1200: {
					slidesPerView: is_slidesview,
					spaceBetween: is_spacebetween,
				},
			}
		});
		if(is_autoplaytime == 0) {
			rev_slider.autoplay.stop();
		}
	}

	/*
		Team Slider
	*/
	if($('.team-carousel').length){
		var team_slider = $('.team-carousel .swiper-container');
		var t_is_autoplaytime = team_slider.data('autoplaytime');
		var t_is_loop = team_slider.data('loop');
		var t_is_slidesview = team_slider.data('slidesview');
		var t_is_spacebetween = team_slider.data('spacebetween');
		var team_slider = new Swiper ('.team-carousel .swiper-container', {
			loop: t_is_loop,
			spaceBetween: t_is_spacebetween,
			slidesPerView: t_is_slidesview,
			autoplay: false,
			navigation: {
				nextEl: '.team-carousel .swiper-button-next',
				prevEl: '.team-carousel .swiper-button-prev',
			},
			pagination: {
				el: '.team-carousel .swiper-pagination',
				type: 'bullets',
			},
			breakpoints: {
				720: {
					slidesPerView: 1,
					spaceBetween: t_is_spacebetween,
				},
				1200: {
					slidesPerView: t_is_slidesview,
					spaceBetween: t_is_spacebetween,
				},
			}
		});
		if(t_is_autoplaytime == 0) {
			team_slider.autoplay.stop();
		}
	}

	/**
		Cart Popup
	**/
	$('.header .cart-btn .cart-icon').on('click', function(){
		if($(this).closest('.cart-btn').hasClass('opened')){
			$(this).closest('.cart-btn').removeClass('opened');
			$(this).closest('.cart-btn').find('.cart-widget').hide();
		} else {
			$(this).closest('.cart-btn').addClass('opened');
			$(this).closest('.cart-btn').find('.cart-widget').fadeIn();
		}

		return false;
	});

	/**
		Submenu
	**/
	if(width < 840) {
		$('.header .head-top .top-menu .menu-item-has-children').on('click', '> a', function(){
			if($(this).closest('li').hasClass('opened')) {
				$(this).closest('li').removeClass('opened');
				$(this).closest('li').find('> .sub-menu').slideUp();
			} else {
				$(this).closest('li').addClass('opened');
				$(this).closest('li').find('> .sub-menu').slideDown();
			}
			return false;
		});
	}
	
} )( jQuery );