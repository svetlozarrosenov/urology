;(function($, window, document, undefined) {
	var $win = $(window);
	var $doc = $(document);
	var $body = $(document.body);
	var $classes = {
		ShowFixedInnerNav : 'show-fixed-inner-nav',
		Active 			  : 'active',
		Current 	      : 'current',
		InnerNav 		  : 'bar-nav',
		PageLoad  		  : 'page-load'
	};
	var $variable = {
		Scroll 		   : 0,
		InnerNavOffset : 0,
		InnerNavHeight : 0
	};
	var templateUrl = object_name.templateUrl;
	var arrSectionOffsetTop = [];
	var arrSectionOffsetBottom = [];
	var _timerAccordion = null;

	/**
	 * Stop Html/Body animation on mousewheel
	 */

	// $doc.on('mousewheel', function() {
	// 	$('html,body').stop();
	// });

	$doc.ready(function() {
		$body = $('body');

		$('.gfield.gf_select_field select').on('change', function(e){
			$(this).css( 'color', '#141412' );
		});

		// Set class for touch devices
		$('html').addClass($.browser.mobile ? 'touch' : 'no-touch');

		// Contact Popup
		$('.link-popup').magnificPopup({
			type:'inline',
			midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
		});

		if ( $('body').hasClass('home') ) {
			if ( Cookies.get('shown_popup_session') != 'true' && Cookies.get('shown_popup') != 'true' ) {
				setTimeout(function() {
					$.magnificPopup.open({
						items: {
							src: '#contact-popup',
						}
					});
				}, 8000);

				Cookies.set('shown_popup', 'true', { expires: 1 });
				Cookies.set('shown_popup_session', 'true');
			}

			if ( Cookies.get('shown_popup_session') != 'true' && Cookies.get('shown_popup') == 'true' ) {
				setTimeout(function() {
					$.magnificPopup.open({
						items: {
							src: '#contact-popup-two',
						}
					});
				}, 8000);

				Cookies.set('shown_popup_session', 'true');
			}
		}

		// Gallery popups
		$('.slider_top .full_screen').on('click', function(){
			var items_array = $('.slider-gallery').find('.slide').toArray();

			crb_gallery_popup( items_array.reverse(), 'mfp-img-mobile' );
		});

		$('.slider_plans .full_screen').on('click', function(){
			var items_array = $('.current').find('.slider_plans').find('.slide').toArray();

			crb_gallery_popup( items_array.reverse(), 'mfp-img-mobile mpf-floor-plans' );
		});

		$('.slider_simple .full_screen').on('click', function(){
			var items_array = $('.slider_simple').find('.slide').toArray();

			crb_gallery_popup( items_array.reverse(), 'mfp-img-mobile' );
		});

		// Google Map API
		if ( $('#googlemap').length ) {
			var mapOptions = {
				scrollwheel: false,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				styles: crb_object_locations.styles,
				mapTypeControls: false,
				zoom: 10
			};
			var bounds = new google.maps.LatLngBounds();
			var map = new google.maps.Map(document.getElementById('googlemap'), mapOptions);
			var markers = [];
			var marker, i, j, label;

			var input = document.getElementById('pac-input');
			map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

			for (i = 0; i < crb_object_locations.locations.length; i++) {
				var location = crb_object_locations.locations[i];

				marker = new MarkerWithLabel({
					position: new google.maps.LatLng(parseFloat(location.lat), parseFloat(location.lng)),
					icon: {
						url: templateUrl + '/' + location.icon,
						scaledSize: new google.maps.Size(parseFloat(location.sizeX), parseFloat(location.sizeY))
					},
					map: map,
					labelContent: location.title,
					labelClass: 'map-marker-label map-marker-label-' + location.align,
					labelVisible: false
				});

				markers.push(marker);

				bounds.extend(marker.position);
			};

			for ( j = 0; j < markers.length; j++ ) {
				markers[j].addListener('click', function() {
					for ( var k = 0; k < markers.length; k++ ) {
						if ( k === j ) {
							continue;
						};

						markers[k].set('labelVisible', false);
					};

					this.set('labelVisible', true);
				});
			}

			map.setZoom(16);
			map.setCenter(markers[0].position);

			google.maps.event.addDomListener(window, 'resize', function() {
				map.setZoom(16);
				map.setCenter(markers[0].position);
			});

			markers[0].set('labelVisible', true);
		};

		// First Hide options for layout
		$('.form-row').find('option').hide();
		$('.form-row').find('option:disabled').show();
		$('.list-radios').on('click', function(){
			$('.form-row').find('option').show();
		} )

		// Disables 'Select a Layout' options
		$('option[value="Select a Layout"]').attr('disabled','');

		// Show first select element
		$('.form-rent').find('.types').first().addClass('visible');
		$('.section_form-bottom').find('.types').first().addClass('visible');

		//Form Select
		$('.form-rent').find('.radio').on('change', function() {
		   $(this).parents('.form-rent').find('ul').removeClass('visible');
		   $(this).parents('.form-rent').find('select').removeAttr( 'name' );
		   $(this).parents('.form-rent').find('select').removeAttr( 'id' );

		   var currentSelectedRadio = $(this).prop('innerText');

		   $(this).parents('.form-rent').find('#' + currentSelectedRadio.replace(/\ /g, '_') ).addClass('visible');
		   $(this).parents('.form-rent').find('#' + currentSelectedRadio.replace(/\ /g, '_') ).find('select').attr( 'name', 'field-layout' );
		   $(this).parents('.form-rent').find('#' + currentSelectedRadio.replace(/\ /g, '_') ).find('select').attr( 'id', 'field-layout' );
		});

		//Form Expand
		$('.subscribe .subscribe-btn').on('click', function (event){
			event.preventDefault();

			var email = $(this).closest('.form-controls').find( 'input[type="email"]' ).val();
			var emailPattern=/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;

			if ( emailPattern.test(email) ) {
				$(this).closest( '.subscribe' ).find('.form-row').addClass('fadeout');
				$(this).closest( '.subscribe' ).find('.form-alert').addClass('fadein');
				$(this).closest( '.subscribe' ).next().slideDown();
			} else {
				alert( 'Please provide a valid email address.' );
			}
		});

		// Submit Form
		$('.form-contact').on('submit', function(event) {
			event.preventDefault();
			var $form = $(this);

			$.ajax({
				url     : $form.attr('action'),
				method  : $form.attr('method'),
				data    : $form.serialize(),
				dataType: 'json',
				success : function( response ) {
					if ( response.hasOwnProperty('success') ) {
						$form.find('.form-alert').text(response.success);
						$form.find('.form-rent').slideUp( function() {
								$(this).remove();
							});
					}

					if ( response.hasOwnProperty('errors') ) {
						$form
							.find('.errors')
								.show();
					}
				},
				error: function() {
					alert( 'Something went wrong! Please try again later.');
				}
			})
		});

		//Tabs
		$('.list-links a').on('click', function (event){
			var $tabLink = $(this);
			var $target = $($tabLink.attr('href'));

			$target.slideToggle().siblings().slideUp();
			$("html, body").animate({ scrollTop: $(document).height() }, 1000);

			event.preventDefault();
		});

		//Tab Close Button
		$('.btn-close').on('click', function (event){
			$('.tab').slideUp();

			event.preventDefault();
		});

		/* Carousels */

		/* Slider Top */
		$('.slider_top .slides').slick({
			autoplay: true,
			autoplaySpeed: 5000,
			infinite: true,
			arrows: false,
			pauseOnHover: false,
			pauseOnFocus: false,
			dots: true,
			appendDots: $('.slider_top .slider__paging')
		});

		/* Slider Feature */
		$('.slider_feature .slides').slick({
			autoplay: false,
			autoplaySpeed: 5000,
			infinite: true,
			arrows: false,
			pauseOnHover: false,
			pauseOnFocus: false,
			dots: true,
			appendDots: $('.slider_feature .slider__paging .shell')
		});

		setTimeout(function() {
			$('.single-crb_floor_plan .slides').slick('slickPause');
		}, 10);

		/*Detect if slider_features is in viewport*/

		if ( $('body').hasClass('home') ) {
			var top_of_element_start = $('.slider_feature').offset().top;
			var bottom_of_element_start = $('.slider_feature').offset().top + $('.slider_feature').outerHeight();
			var bottom_of_screen_start = $(window).scrollTop() + $(window).height();
			var top_of_screen_start = $(window).scrollTop();

			if((bottom_of_screen_start > top_of_element_start) && (top_of_screen_start < bottom_of_element_start)){
				$('.slider_feature .slides').slick('play');
			}

			$(window).scroll(function() {
				var top_of_element = $('.slider_feature').offset().top;
				var bottom_of_element = $('.slider_feature').offset().top + $('.slider_feature').outerHeight();
				var bottom_of_screen = $(window).scrollTop() + $(window).height();
				var top_of_screen = $(window).scrollTop();


				if((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){
					$('.slider_feature .slides').slick('play');
				}
				else {
					$('.slider_feature .slides').slick('pause');
				}
			});
		}

		/* Slider Plans*/
		$('.tabs_plans .tabs__nav a, .tabs_plans .tab__head a').on('click', function(e){
			if ( $(this).hasClass( 'link-unit-details' ) ) {
				return;
			}
			e.preventDefault();

			var activeTabClass = 'current';
			var $tabLink = $(this);
			var $targetTab = $($tabLink.attr('href'));

			$tabLink
				.parent('li') // go up to the <li> element
				.add($targetTab)
				.addClass(activeTabClass)
					.siblings()
					.removeClass(activeTabClass);

			var $sldier = $tabLink.parents('.tabs__head').next().find('.tab.current .slider_plans .slides');
			var $sldierPrev = $tabLink.parents('.tabs__head').next().find('.tab.current .slider_plans .slider__prev');

			if($win.width() > 1025){
				$sldier.slick('setPosition');
			}
		});

		if ( $('.tabs__body').find('.tab').length ) {
			$('.tabs__body').find('.tab .slider_plans .slides').each(function(){
				var $this = $(this);

				$this.slick({
					autoplay: false,
					autoplaySpeed: 8000,
					infinite: true,
					arrows: true,
					prevArrow: $this.parents('.tab').find('.slider__prev'),
					nextArrow: $this.parents('.tab').find('.slider__next'),
					dots: true,
					appendDots: $this.parents('.tab').find('.slider__paging')
				});

				$this.on('afterChange', function(event, slick, currentSlide, nextSlide){
					var layout_name = $this.find('.slick-current').find('input').val();

					if ( layout_name == '' ) {
						$('.span-layout').hide();
						$('.span-type').show();
						$('.layout_container').html(' ')
						$('.layout_container_mobile').html(' ')
					} else {
						$('.span-type').hide();
						$('.span-layout').show();
						$('.layout_container').html(' - ' + layout_name);
						$('.tabs__body').find('.current').find('.layout_container_mobile').html(' - ' + layout_name);
					}
				});

				// Changes slider to first slide on accordion expand
				$('.tabs').find('.tabs__body').find('.tab:not(.current)').find('a').not('.slider-button').on('click', function(){
					$this.slick('slickGoTo', 0, true);
				})

				// Changes slider to first slide on tab change expand
				$('.tabs').find('.tabs__nav').find('a').not('.slider-button').on('click', function(){
					$this.slick('slickGoTo', 0, true);
				})
			});
		};

		// Removes title on tab Change
		$('.tabs').find('.tabs__nav').find('a').not('.slider-button').on('click', function(){
			$('.layout_container').html(' ');
			$('.span-layout').hide();
			$('.span-type').show();
		})

		// Tab changes only on current accordion ( home.php - mobile )
		$('.tabs').find('.tabs__body').find('.tab:not(.current)').find('a').on('click', function(){
			$('.layout_container_mobile').html(' ');
		})

		/* Slider Simple */
		$('.slider_simple .slides').slick({
			autoplay: true,
			autoplaySpeed: 8000,
			infinite: true,
			arrows: true,
			appendArrows: $('.slider_simple .slider__paging'),
			prevArrow: '<a href="#" class="slider-button slider__prev slick-arrow" style="display: inline-block; margin-right: 10px;"><i class="ico-arrow-left"></i></a>',
			nextArrow: '<a href="#" class="slider-button slider__next slick-arrow" style="display: inline-block; margin-left: 10px;"><i class="ico-arrow-right"></i></a>',
			dots: true,
			appendDots: $('.slider_simple .slider__paging')
		});

		$('.slider_simple .slides').on( 'afterChange', function( event, slick, currentSlide, nextSlide ) {
			$('.list-features').removeClass( 'active' );
			$('#features-' + currentSlide).addClass( 'active' );
		})

		/* Appends the next arrow to the end of .slider__paging ul */
		$('.slider_simple').find('.slider__paging').append($('.slider__next'));
		$('.slider_simple').find('.slider__paging').find('ul').css('display', 'inline-block');

		// Changes title accordion go current slide ( single-floor_plans.php )
		$('.span-layout').hide();
		$('.apply-layout').hide();
		$('.slider_simple .slides').on('afterChange', function(event, slick, currentSlide, nextSlide){
			var layout_name_single = $('.slider_simple').find('.slick-current').find('input').val();

			/* Populates contact button */
			var floorPlanTitle = $('.floor-plan-title').html();
			$('.btn_contact').attr('href', $('.btn_contact').data('baseurl') + '?type=' + floorPlanTitle + '&layout=' + layout_name_single);

			if ( layout_name_single == '' ) {
				$('.span-layout').hide();
				$('.span-type').show();
				$('.apply-layout').hide();
				$('.apply-type').show();
				$('.layout_container').html(' ');
			} else {
				$('.span-type').hide();
				$('.span-layout').show();
				$('.apply-type').hide();
				$('.apply-layout').show();
				$('.layout_container').html(' - ' + layout_name_single);
			}
		});

		$(document).on("gform_confirmation_loaded", function (e, form_id) {
			if ( $('body').hasClass('admin-bar') ) {
				$('body').css('overflow', 'hidden');
			}
		});

		/*Tabs accordion*/
		$('.tabs_plans .tab__head > a ').on('click', function(e){
			e.preventDefault();

			var anchorEl = $(this);
			anchorEl.parent().addClass('current');
			anchorEl.closest('.tab').siblings().find('.tab__head').removeClass('current');

			if($win.width() < 1025){
				clearTimeout(_timerAccordion);
				_timerAccordion = setTimeout(function() {
					var _offset = anchorEl.offset().top - $variable.InnerNavHeight;

					$('html,body').stop(true, true).animate({scrollTop:_offset}, 1000);
				}, 450);
			}
		});

		/*Mobile Navigation*/

		$('.nav-trigger').on('click', function(e){
			e.preventDefault();

			if($win.width() < 1024){
				$('.nav').slideToggle();
			}

			e.stopPropagation();
		});

		/* Floor plans socials button*/
		$('.btn_socials').hide();
		$('.btn_socials_trigger').on('click', function(e){
			$('.btn_socials_trigger').hide();
			$('.btn_socials').show();
			e.preventDefault;
		})


		/* Slider Plans socials button*/
		$('.slider_plans .slider-socials > a').on('click', function(e){
			e.preventDefault();
			$(this).closest('.slider-socials').toggleClass('socials-shown');
			e.stopPropagation();
		});

		$win.on('resize', function() {
			$('.nav').removeAttr('style');
		});

		if($win.width() < 1024){
			$('body').on('click', function(e){
				$('.nav').slideUp();
			});
		}

		$('body').on('click', function(e){
			$('.slider_plans .slider-socials').removeClass('socials-shown');
		});
	});

	// ----

	$doc.ready(function(){
		$body.InitClick();
		$body.GetInnerNavOffset();
		$body.GetInnerNavHeight();
	});



	$win.load(function(){
		if ( window.location.hash ) {
			window.scrollTo(0, 0);

			setTimeout(function() {
				var _custom_href = window.location.href;
				var _custom_hash = _custom_href.split('#');
				var $id = $('#' + _custom_hash[1]);

				var _custom_offset = $id.offset().top - $variable.InnerNavHeight;

				$('html,body').delay(100).stop(true, true).animate({scrollTop:_custom_offset}, 1000);
			}, 100);
		}

		$body.addClass($classes.PageLoad);

		$body.GetInnerNavOffset();
		$body.GetInnerNavHeight();
		$body.AddFixedHeader();
		$body.sectionOffsets();
		$body.currentSection();
		$body.InitCounterAnimation();

		partnersImages($('.list-logos img'));

		/**
		 * Slider Images and Gallery
		 */
		var sliderImages = $('.slider-images .slider__slides').slick({
			arrows: true,
			dots: true,
		});

		// Go to slide from gallery grid
		$('.gallery__link[data-index]').on('click', function(event) {
			event.preventDefault();

			sliderImages.slick('slickGoTo', $(this).data('index') - 1);

			$('html,body').animate({ scrollTop: sliderImages.offset().top - $('.bar-nav').outerHeight() })
		});

		// Lazy load gallery grid
		$('.gallery__image[data-src]').lazy({
			afterLoad: function(element) {
				element.addClass('loaded');
			},
		});
	});

	$win.scroll(function(){
		$variable.Scroll = $win.scrollTop();

		$body.AddFixedHeader();
		$body.currentSection();
	});

	$win.on('resize orientationchange', function(){
		$body.GetInnerNavHeight();
		$body.GetInnerNavOffset();
		$body.sectionOffsets();
	});

	$.fn.InitCounterAnimation = function(){
		var $container = $('.gform_description span');

		if($container.length){
			$container.counterUp({
				time: 2800
			});
		}
	}

	$.fn.InitClick = function(){
		$('a').click(function(event){
			var $this = $(this);
			var _href = $this.attr('href');


			if(_href.indexOf('#') >= 0 && _href.indexOf('tab') < 0){
				var _hash = _href.split('#');
				var $id = $('#' + _hash[1]);

				if($id.length){
					event.preventDefault();

					var _offset = $id.offset().top - $variable.InnerNavHeight;

					$('html,body').delay(100).stop(true, true).animate({scrollTop:_offset}, 1000);

					$('.nav').removeAttr('style');
				}
			}
		});
	}

	$.fn.AddFixedHeader = function(){
		$body.toggleClass($classes.ShowFixedInnerNav, ($variable.Scroll >= $variable.InnerNavOffset));

		if($body.hasClass($classes.ShowFixedInnerNav)){
			$('.header + *').css('margin-top', $variable.InnerNavHeight);
		}else{
			$('.header + *').removeAttr('style');
		}
	}

	$.fn.GetInnerNavOffset = function(){
		if($('.' + $classes.InnerNav).length){
			$body.removeClass($classes.ShowFixedInnerNav);
			$('.header + *').removeAttr('style');

			$variable.InnerNavOffset = $('.' + $classes.InnerNav).offset().top;
		}
	}

	$.fn.GetInnerNavHeight = function(){
		if($('.' + $classes.InnerNav).length){
			$variable.InnerNavHeight = $('.' + $classes.InnerNav).innerHeight();
		}
	}

	$.fn.sectionOffsets = function(){
		$('.' + $classes.InnerNav + ' .nav > ul > li > a').each(function(i){
			var $this = $(this);
			var _href = $this.attr('href');

			if(_href.indexOf('#') >= 0){
				var _id = _href.split('#');
				var $id = $('#' + _id[1]);

				if($id.length){
					arrSectionOffsetTop[i] = parseInt($id.offset().top - $variable.InnerNavHeight - 10, 10);
					arrSectionOffsetBottom[i] = parseInt(($id.offset().top - $variable.InnerNavHeight - 10) + $id.innerHeight(), 10);
				}
			}

		});
	}

	$.fn.currentSection = function(){
		var $container = $('.' + $classes.InnerNav + ' .nav > ul > li > a');
		var $nav = $container.closest('ul').find('> li');
		var _current = false;
		var _isSection = false;

		if($container.length){
			$container.each(function(i){
				var _from = arrSectionOffsetTop[i];
				var _to = arrSectionOffsetBottom[i];

				if($variable.Scroll >= _from && $variable.Scroll <= _to && _from != undefined && _to != undefined){
					_current = i;
					_isSection = true;
				}
			});

			if(_isSection == true){
				$nav.eq(_current).addClass($classes.Current).siblings().removeClass($classes.Current);
			}else{
				$nav.removeClass($classes.Current);
			}
		}
	}

	function partnersImages(img) {
		img.each( function() {
			var imgWidth = Math.ceil($(this).attr('width') / 2);
			var imgHeight = Math.ceil($(this).attr('height') / 2);

			$(this).css({
				width: imgWidth,
				height: imgHeight
			})
		});
	}

	function crb_gallery_popup( items_array, main_class ){
		$.magnificPopup.open({
			items: items_array,
			mainClass: main_class,
			type: 'image',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1] // Will preload 0 - before current, and 1 after the current image
			},
			image: {
				markup: '<div class="mfp-figure">'+
							'<div class="mfp-img"></div>'+
								'<div class="link-close"><button title="Close (Esc)" type="button" class="mfp-close">×</button></div><!-- /.link-close -->'+
						  '</div>',
			}
		});
	}

})(jQuery, window, document);
