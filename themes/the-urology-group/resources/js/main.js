import 'magnific-popup';
import Swiper from 'swiper/dist/js/swiper';
import axios from 'axios';

const $win = $(window);
const $doc = $(document);
const $body = $('body');

let winW = $win.width();
let winH = $win.height();
let winT = $(window).scrollTop();
let docH = $(document).outerHeight();
let $scrollPosition = null;

var isMobile = {
	Android: function() {
		return navigator.userAgent.match(/Android/i);
	},
	BlackBerry: function() {
		return navigator.userAgent.match(/BlackBerry/i);
	},
	iOS: function() {
		return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	},
	Opera: function() {
		return navigator.userAgent.match(/Opera Mini/i);
	},
	Windows: function() {
		return navigator.userAgent.match(/IEMobile/i);
	},
	any: function() {
		return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
	}
};

// Your code goes here...
// jQuery.ready is no longer needed

accordionExpand('.accordion .accordion__head');
desktopNavigation();

// Add class for mobile devices
if (isMobile.any()) {
	$body.addClass('mobile-view');
}
mobileNavigation();

// Assitant
$('.assitant-nav a').on('click', function(e) {
	const $tabLink = $(this);
	const $targetTab = $($tabLink.attr('href'));

	if ($targetTab.length === 0) {
		return;
	}

	$tabLink
		.parent()
		.add($targetTab)
		.addClass('current')
			.siblings()
			.removeClass('current');

	e.preventDefault();
});

// Assistant Back button
$('.assistant-back').on('click', function(e) {
	e.preventDefault();

	$(this)
		.closest('.accordion__section')
		.removeClass('current');
});

// Assitant Location Filter
$('#field-location-assistant').on('change', function(){
	const targetList = $(this).val()
	$(`#${targetList}`)
		.addClass('current')
		.siblings()
		.removeClass('current');
})

// Assistant Show/Hide
$('[data-assistant-trigger]').on('click', function(e) {
	e.preventDefault();

	if (isMobile.any() && $win.width() < 768) {
		const opened = $body.is('.has-assistant-visible');

		if (opened) {
			$body.removeClass('has-assistant-visible');
			$body.removeClass('is-fixed');
			window.scrollTo(0, $scrollPosition)
			$scrollPosition = null;
			return
		} else {
			$scrollPosition = $(window).scrollTop();
			setTimeout(function() {
				$body.addClass('is-fixed');
			}, 400);
		}
	}

	$body.toggleClass('has-assistant-visible');
	$('.assistant').find('.accordion__section.current').removeClass('current')
});

// Letter filter
$('.nav-filter a').on('click', function(e){
	e.preventDefault();

	const letter = $(this).text();

	if (letter.length > 1) {
		$('.accordion .accordion__section').show();

		return;
	}

	$('.accordion .accordion__section').each(function(){
		const value = $(this).data('filter')

		if (value.charAt(0).toUpperCase() === letter.toUpperCase()) {
			$(this).show();
		} else {
			$(this).hide();
		}
	});
})

$("#field-live-search").closest('form').on('submit', function(e) {
	e.preventDefault();
})
// Form -- Filter Conditions
$("#field-live-search").keyup(function(){
	// Retrieve the input field text and reset the count to zero
	var filterWord = $(this).val();

	// Loop through the comment list
	$(".accordion-conditions .accordion__section").each(function(){
		// If the list item does not contain the text phrase hide it
		if ($(this).data('filter').search(new RegExp(filterWord, "i")) < 0 && $(this).data('excerpt').indexOf(filterWord) == -1) {
			$(this).hide();
		} else {
			$(this).show();
		}
	});
});

function doesContain(str, query){ // is query in str
	return new RegExp("\b" + query + "\b", "i").test(str)
}

// Show Search Form
$('.show-search').on('click', function(e){

	e.preventDefault();

	if ($win.width() > 767) {

		$body.toggleClass('has-search-opened');
	}
});

// Hide Search Bar
$doc.on('click', function(e){
	$body.removeClass('has-search-opened');
})

$('.header__search').on('click', function(e){
	e.stopPropagation();
});

// Mobile Nav trigger
$('.nav-trigger').on('click', function(e){
	e.preventDefault();


	if (isMobile.any() && $win.width() < 768) {
		const opened = $body.is('.has-menu-opened');

		if (opened) {
			$body.removeClass('has-menu-opened');
			$body.removeClass('is-fixed');
			window.scrollTo(0, $scrollPosition)
			$scrollPosition = null;

			$('.nav .js-show')
				.removeClass('js-show')
				.find('.nav-dd')
				.slideUp();

			return
		} else {
			$scrollPosition = $(window).scrollTop();
			setTimeout(function() {
				$body.addClass('is-fixed');
			}, 400);
		}
	}

	$body.toggleClass('has-menu-opened');
});

// Tabs
$('.tabs .tabs__nav a').on('click', function(event) {
	event.preventDefault();

	var $tabLink = $(this);
	var $targetTab = $($tabLink.attr('href'));

	$tabLink
		.parent()
		.add($targetTab)
		.addClass('current')
			.siblings()
			.removeClass('current');
});

// Tab Accordions For Mobile
$('.tab .tab__head').on('click', function(event) {
	event.preventDefault();

	var $tabLink = $(this);

	$(this).toggleClass('expanded');

	$tabLink
		.next()
		.slideToggle();
});

// Magnific Video
$('.video-trigger').magnificPopup({
	type: 'iframe',
	mainClass: 'mfp-fade',
	removalDelay: 160,
	fixedContentPos: true,
	iframe : {
		patterns: {
			youtube: {
			  index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
			  src: '//www.youtube.com/embed/%id%?rel=0' // URL that will be set as a source for iframe.
			}
		},
	}
})

$win.on('load', function(){
	/**
	 * Initialize Locations Map
	 */
	$('.locations__map').each(function() {
		initLocationsMap(this);
	});

	if ($body.hasClass('physician_name') && $('#physicians-filter-container').length) {
		$('html, body').animate({
			scrollTop: $('#physicians-filter-container').offset().top
		},500)
	}
	// slider banner
	$('.section-banner:not(.section-banner--home)').each(function(){
		const sliderContainer = $(this).find('.swiper-container');
		const sliderPrev = $(this).find('.swiper-button-prev');
		const sliderNext = $(this).find('.swiper-button-next');
		const sliderPagination = $(this).find('.swiper-pagination');
		const sliderSlides = $(this).find('.swiper-slide').length;

		if (sliderSlides > 1) {
			sliderContainer.addClass('initialized');

			const picturesSwiper = new Swiper(sliderContainer, {
				slidesPerView: 1,
				// spaceBetween: 20,
				resistanceRatio: 0,
				effect: 'fade',
				loop: true,
				navigation: {
					nextEl: sliderNext,
					prevEl: sliderPrev,
				},
				pagination: {
					el: sliderPagination,
					clickable: true
				},
			});
		}
	});

	$('.section-banner--home').each(function(){
		const sliderContainer = $(this).find('.slider-banner .swiper-container');
		const sliderPrev = $(this).find('.swiper-button-prev');
		const sliderNext = $(this).find('.swiper-button-next');
		const sliderPagination = $(this).find('.swiper-pagination');
		const sliderSlides = $(this).find('.swiper-slide').length;

		if (sliderSlides > 1) {
			sliderContainer.addClass('initialized');

			const picturesSwiper = new Swiper(sliderContainer, {
				slidesPerView: 1,
				// spaceBetween: 20,
				resistanceRatio: 0,
				effect: 'fade',
				loop: true,
				autoplay: {
					delay: 5000,
				},
				navigation: {
					nextEl: sliderNext,
					prevEl: sliderPrev,
				},
				pagination: {
					el: sliderPagination,
					clickable: true
				},
			});

			const contentSwiper = new Swiper('.swiper-content-slider', {
				slidesPerView: 1,
				resistanceRatio: 0,
				effect: 'fade',
				loop: true,
			});

			picturesSwiper.controller.control = contentSwiper;
			contentSwiper.controller.control = picturesSwiper;
		}
	});
})
.on('load resize', function(){
	winW = $win.width()
	winH = $win.height();
	winT = $win.scrollTop();
	docH = $(document).outerHeight();

	addResponsiveMeta();
})
.on('scroll', () => {
	winT = $win.scrollTop();
	$body.toggleClass('has-fixed-header', winT > 0);
})


/**
* Function
*/

function mobileNavigation () {
	$('.nav .menu > li > a').on('click', function(e){
		e.preventDefault();

		if (isMobile.any() && $win.width() < 768) {
			$(this)
			.next()
			.slideToggle()
			.parent()
			.addClass('js-show')
			.siblings()
			.removeClass('js-show')
			.find('.nav-dd')
			.slideUp()
			.find('.js-show')
			.removeClass('js-show');
		}
	});
}

function desktopNavigation () {
	$('.nav').on('click', function(e){
		e.stopPropagation();
	});

	$doc.on('click', function(e){
		$('.nav .menu .hover')
			.removeClass('hover');
	});

	$('.nav .menu > li > a').on('click', function(e){
		e.preventDefault();

		if ($win.width() >= 768) {
			$(this)
			.parent()
			.addClass('hover')
			.siblings()
			.removeClass('hover');
		}
	});
}

function accordionExpand (accordionHeadSelector) {
	var activeAccordionClass = 'expanded';

	$(accordionHeadSelector).on('click', function() {
		if ($(this).parent().hasClass(activeAccordionClass)) {
			$(this).next().slideUp().parent().removeClass(activeAccordionClass);
		}else {
			$(this)
			.next()
			.slideToggle()
			.parent()
			.addClass(activeAccordionClass)
				.siblings()
				.removeClass(activeAccordionClass)
				.children('.accordion__body')
				.slideUp();
		}
	});
}

function addResponsiveMeta () {
	const metaEl = document.getElementById('viewport');

	if ( screen.width < 768 ) {
		metaEl.content = 'width=device-width, initial-scale=1.0, user-scalable=0';
		document.querySelector('html').classList.add('is-mobile');
	} else if(screen.width >= 768 && screen.width < 1200){
		metaEl.content = 'width=1200, user-scalable=1';
		document.querySelector('html').classList.remove('is-mobile');
	} else {
		metaEl.content = 'width=device-width, initial-scale=1.0, user-scalable=0';
	}
};



/**
 * Function that initialize Locations Map
 */
function initLocationsMap(map) {
	var styles = [{"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#e9e9e9"}, {"lightness": 17 } ] }, {"featureType": "landscape", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"}, {"lightness": 20 } ] }, {"featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{"color": "#ffffff"}, {"lightness": 17 } ] }, {"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"color": "#ffffff"}, {"lightness": 29 }, {"weight": 0.2 } ] }, {"featureType": "road.arterial", "elementType": "geometry", "stylers": [{"color": "#ffffff"}, {"lightness": 18 } ] }, {"featureType": "road.local", "elementType": "geometry", "stylers": [{"color": "#ffffff"}, {"lightness": 16 } ] }, {"featureType": "poi", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"}, {"lightness": 21 } ] }, {"featureType": "poi.park", "elementType": "geometry", "stylers": [{"color": "#dedede"}, {"lightness": 21 } ] }, {"elementType": "labels.text.stroke", "stylers": [{"visibility": "on"}, {"color": "#ffffff"}, {"lightness": 16 } ] }, {"elementType": "labels.text.fill", "stylers": [{"saturation": 36 }, {"color": "#333333"}, {"lightness": 40 } ] }, {"elementType": "labels.icon", "stylers": [{"visibility": "off"} ] }, {"featureType": "transit", "elementType": "geometry", "stylers": [{"color": "#f2f2f2"}, {"lightness": 19 } ] }, {"featureType": "administrative", "elementType": "geometry.fill", "stylers": [{"color": "#fefefe"}, {"lightness": 20 } ] }, {"featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{"color": "#fefefe"}, {"lightness": 17 }, {"weight": 1.2 } ] } ];

	var center = new google.maps.LatLng($(map).data('center-lat'), $(map).data('center-lng'));
	var locations = [];
	var bounds = new google.maps.LatLngBounds();
	var glocations = [];
	var zoom = $(map).data('zoom');

	var infoboxes = [];

	var locations = $(map).data('locations');

	function closeInfoBoxes(boxes) {
		for ( var i = 0; i < boxes.length; i++) {
			boxes[i].close();
		}
	}

	function addMarker(i,location){
		var marker = new RichMarker({
			position: new google.maps.LatLng(location.lat, location.lng),
			content: '<i data-' + location.type + ' data-id=' + location.id + '></i>',
			type: location.type,
			name: location.name,
			map: map,
			shadow: false,
			infoBoxIndex: i
		});

		glocations.push(marker);
		bounds.extend(marker.position);
		// Marker click listener
		google.maps.event.addListener(marker, 'click', (function () {
			$('.locations__list').find('[data-id=' + location.id + ']')
				.closest('.location__list-item')
					.addClass('current')
					.siblings()
						.removeClass('current');

			if (!$('.locations__list').length) {
				return
			}

			closeInfoBoxes(infoboxes);
			infoboxes[this.infoBoxIndex].open(map, this);
		}));
	}

	var map = new google.maps.Map(map, {
		zoom: $(map).data('zoom'),
		center: center,
		zoomControl: true,
		scaleControl: true,
		mapTypeControl: false,
	});

	let input = document.getElementById('field-location-address');

	var autocomplete = new google.maps.places.Autocomplete(input);

	autocomplete.bindTo('bounds', map);

	autocomplete.setFields(['address_components', 'geometry', 'icon', 'name']);

	var place = autocomplete.getPlace();

	locations.forEach(function(location,i) {
		addMarker(i,location);

		if (!$('.locations__list').length) {
			return
		}

		const infoBox = new InfoBox({
			content: $('.locations__list > li').eq(i).html(),
			pixelOffset           : new google.maps.Size(-20,0),
			zIndex                : null,
			boxStyle              : {
				width : '400px'
			},
			closeBoxURL           : crb_site_utils.themedir + '/resources/images/close.svg',
			isHidden              : false,
			enableEventPropagation: false

		});

		infoboxes.push(infoBox);
	});

	map.fitBounds(bounds);

	if (locations.length > 1 && $win.width() > 767) {
		map.panBy(0,-60);
	}

	map.fitBounds(bounds);
	map.setOptions({maxZoom: 14});

	// Add window event listener
	$win.on({
		'resize': function(e) {
			map.fitBounds(bounds);

			map.setOptions({maxZoom: 14});
			if (locations.length > 1 && $win.width() > 767) {
				map.panBy(0,-60);
			}
		}
	})

	$doc.on('click', '.locations i', function() {
		var $parent = $(this).parent().parent();

		$parent
			.addClass('active')
			.siblings()
				.removeClass('active');
	});

	$doc.on('click', '.location-address .location-address__link', function(e) {
		e.preventDefault();
		$(this).closest('.location__list-item').addClass('current');
		let id = $(this).data('id');

		$(".locations").find(`i[data-id='${id}']`)
			.parent()
			.parent()
			.addClass('active')
			.siblings()
			.removeClass('active');
	});

	$doc.on('mouseleave', '.locations i', function() {
		var $parent = $(this).parent().parent();

		$parent.removeClass('hover');
	});

	$doc.on('mouseenter', '.locations i', function() {
		var $parent = $(this).parent().parent();

		$parent.addClass('hover');
	});
}

$('.filter-stories select').on( 'change', function(e) {
	let id = $('.filter-stories select option:selected').val();

	refreshWithParams('care-area-id', id);
} );

function refreshWithParams(paramName, paramVal) {
	var url = window.location.href;
	url = `?${paramName}=${paramVal}`;
	window.location.href = url;
}

new Vue({
	el: '#symptom-checker',
	data: {
		userInput: '',
		patient: {
			age: 0,
			gender: [],
			matchedSymptoms: [],
			selectedSymptoms: [],
			conditions: [],
		},
		steps: [true, false, false],
		ajax: false,
		error: false,
	},
	methods: {
		firstStepCompleted() {
			this.error = false;
			if (!this.patient.gender.length) {
				this.error = true;
				return;
			}
			this.steps = [false, true, false];
		},
		secondStepCompleted() {
			this.error = false;

			if (!this.patient.selectedSymptoms.length) {
				this.error = true;
				return;
			}

			this.ajax = true;

			this.loadConditions();

			this.saveNewPatient();

			this.ajax = false;

			this.steps = [false, false, true];
		},
		backToSecondStep() {
			this.steps = [false, true, false,];
		},
		backToFirstStep() {
			this.steps = [true, false, false,];
		},
		loadConditions() {
			var data = new FormData();

			let symptomsIds = [];
			let genderIds = this.patient.gender.toString();

			this.patient.selectedSymptoms.forEach((symptom) => { symptomsIds.push(symptom.term_id) });
			symptomsIds = symptomsIds.toString();

			data.append('action', 'crb_ajax_get_conditions');
			data.append('symptoms_ids', symptomsIds);

			data.append('conditions_types_ids', genderIds);

			axios({
				method: 'post',
				url: crb_site_utils.ajaxurl,
				data: data
			})
			.then((response) => {
				this.patient.conditions = response.data.data.conditions;
			});
		},
		selectGender(gender) {
			let index = this.inArray(this.patient.gender, gender);

			if(index > -1) {
				this.patient.gender.splice(index, 1);
			} else {
				this.patient.gender.push(gender);
			}
		},
		inArray(array, searched_val) {
			for (let index in array) {
				if(array[index] === searched_val) {
					return index;
					break;
				}
			}
			return -1;
		},
		saveNewPatient() {
			$.ajax({
				url: crb_site_utils.ajaxurl,
				type: 'POST',
				data: {
					action: 'crb_ajax_save_new_patient',
					patient: this.patient
				},
				beforeSend: function () {

				},
				success: (response) => {

				},
				error: function () {

				},
			});

		},
		loadSymptoms: debounce(function() {
			if ( this.userInput.length < 3 ) {
				return;
			}

			this.ajax = true;

			var data = new FormData();

			data.append('action', 'crb_ajax_get_symptoms');
			data.append('symptom', this.userInput);

			axios({
				method: 'post',
				url: crb_site_utils.ajaxurl,
				data: data
			})
			.then((response) => {
				this.patient.matchedSymptoms = response.data.data.symptoms;
				this.ajax = false;
			});

		}, 500 ),
		reset() {
			this.patient = {
				age: 0,
				gender: [],
				matchedSymptoms: [],
				selectedSymptoms: [],
				conditions: [],
			};
			this.userInput = '';
			this.steps = [true, false, false];
		},
		fillUpSelectedSymptoms(symptom) {

			this.patient.selectedSymptoms.push(symptom);

			let indexOfSymptomToExclude = this.findWithAttr(this.patient.matchedSymptoms, 'term_id', symptom.term_id);

			this.patient.matchedSymptoms.splice(indexOfSymptomToExclude, 1);
		},
		removeFromSelectedSymptoms(symptom) {
			this.patient.matchedSymptoms.push(symptom);

			let indexOfSymptomToExclude = this.findWithAttr(this.patient.selectedSymptoms, 'term_id', symptom.term_id);

			this.patient.selectedSymptoms.splice(indexOfSymptomToExclude, 1);
		},
		findWithAttr(array, attr, value) {
			for(var i = 0; i < array.length; i += 1) {
				if(array[i][attr] === value) {
					return i;
				}
			}
			return -1;
		}
	},
	mounted: function () {

	},
});

function debounce(func, wait, immediate) {
	let timeout;
	return function () {
		let context = this,
			args = arguments;
		let later = function later() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		let callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
}

$('.show-events-filter').on('click', function(e) {
	e.preventDefault();
	$(this).hide();
	$('.events-form-filter').show();
	$('.events-form-filter').trigger('change');
});

$('.events-form-filter').on('change', function() {
	let year = getCurrentDate();

	let compare = '<';
	let filterValue = $(this).find('option:selected').val();

	if (filterValue != 0 && filterValue != 'BETWEEN') {
		compare = 'LIKE';
		year = filterValue
	}

	if(filterValue == new Date().getFullYear().toString()) {
		compare = 'BETWEEN';
		year = new Date().getFullYear().toString() + '-01-01';
	}

	$('.spinner').show();

	$.ajax({
		url: crb_site_utils.ajaxurl,
		type: 'GET',
		data: {
			action: 'crb_ajax_show_past_events',
			compare: compare,
			year: year,
			posts_per_page: $('.section-events').data('past_events_per_page')
		},
		beforeSend: function () {

		},
		success: (response) => {
			if(!$('.section__actions .events').length) {
				$('.section-events .section__actions').append(response.data.events);
			} else {
				$('.section__actions .events').replaceWith(response.data.events);
			}
			$('.spinner').hide();
		},
		error: function () {
			$('.spinner').hide();
		},

	});
});

function getCurrentDate() {
	let today = new Date();
	let dd = String(today.getDate()).padStart(2, '0');
	let mm = String(today.getMonth() + 1).padStart(2, '0');
	let yyyy = today.getFullYear();
	let year = yyyy + '-' + mm + '-' + dd;
	return year;
}

$('.positions-form-filter select').on('change', filterPositions);

function filterPositions() {
	let position = $('.positions-form-filter select.field-position option:selected').val();

	let location = $('.positions-form-filter select.field-location option:selected').val();

	if(position == 0){
		position = null;
	}

	if(location == 0){
		location = null;
	}

	$.ajax({
		url: crb_site_utils.ajaxurl,
		type: 'GET',
		data: {
			action: 'crb_ajax_filter_positions',
			position_id: position,
			location_id: location,
		},
		beforeSend: function () {

		},
		success: (response) => {
			if($('.section-base.section-careers .careers').length){
				$('.section-base.section-careers .careers').replaceWith(response.data.positions);
			} else {
				$('.section-base.section-careers .shell').append(response.data.positions);
			}

		},
		error: function () {
			$('.spinner').hide();
		},

	});
}

$('#field-filter-area-of-care').on('change', function() {
	let id = $(this).val();

	if(id == 0) {
		window.location.href = crb_site_utils.current_page_url;
		return;
	}
	refreshWithParams('care-area-id', id);
});

// Appointment request gform
$('#input_2_9').children().eq(1).val(0);
$('#input_2_8').children().eq(1).val(0);

$('#input_2_8, #input_2_9').on('change', function() {
	let location = 'input_2_8';

	let $locationSelect = $('#input_2_8');
	let $physicianSelect = $('#input_2_9');

	let postType = ['crb_location'];
	let firstOption = $locationSelect.find('option').first().text();
	let secondOption = $locationSelect.children().eq(1).text();
	let id = $(this).val();
	let selectedOption = $locationSelect.find('option:selected').val();;


	if ($(this).attr('id') === location) {
		postType = ['crb_physician', 'crb_staff'];
		firstOption = $physicianSelect.find('option').first().text();
		secondOption = $locationSelect.children().eq(1).text();
		selectedOption = $physicianSelect.find('option:selected').val();
	}

	if(! id) {
		id = null;
	}

	if ( ! selectedOption ) {
		selectedOption = 0;
	}

	$.ajax({
		url: crb_site_utils.ajaxurl,
		type: 'GET',
		data: {
			action: 'crb_ajax_filter_gform_apointment_request',
			id: id,
			post_type: postType,
			first_option: firstOption,
			second_option: secondOption,
			selected_option: selectedOption
		},
		beforeSend: function () {

		},
		success: (response) => {
			let select = '#input_2_8';
			if(response.data.post_type.indexOf('crb_physician') != -1 ) {
				select = '#input_2_9';
			}

			$(select).html(response.data.options);
		},
		error: function () {

		},
	});
});

// Physicians filter
$($doc).on('change', '.physicians-filter', function() {
	let id = $(this).val();
	let postType = $(this).data('post_type');
	let firstOption = $(this).closest('select').find('option').first().text();

	if(! id) {
		id = null;
	}

	$.ajax({
		url: crb_site_utils.ajaxurl,
		type: 'GET',
		data: {
			action: 'crb_ajax_physicians_filter',
			id: id,
			post_type: postType,
		},
		beforeSend: function () {

		},
		success: (response) => {
			let firstOptionSpecialities = $('#field-physician-specialty option').first();
			if(response.data.specialities) {
				$('#field-physician-specialty').html(response.data.specialities);
				$('#field-physician-specialty').prepend(firstOptionSpecialities);
			}

			if(response.data.postType === 'crb_physician') {
				let firstOptionPhysicians = $('.physicians-options option').first();

				$('.physicians-options').html(response.data.physicians);
				$('.physicians-options').prepend(firstOptionPhysicians);
			}
			if(response.data.postType === 'crb_location') {
				let firstOptionLocations = $('.locations-options option').first();

				$('.locations-options').html(response.data.locations);
				$('.locations-options').prepend(firstOptionLocations);
			}
			if(response.data.postType === 'crb_physician_speciality') {
				let firstOptionLocations = $('.locations-options option').first();
				let firstOptionPhysicians = $('.physicians-options option').first();

				$('.physicians-options').html(response.data.physicians);
				$('.physicians-options').prepend(firstOptionPhysicians);

				$('.locations-options').html(response.data.locations);
				$('.locations-options').prepend(firstOptionLocations);
			}
		},
		error: function () {

		},
	});
});

$($doc).on('click', '.page-template-all-physicians .form__reset', function(e){
	e.preventDefault();

	$.ajax({
		url: crb_site_utils.ajaxurl,
		type: 'GET',
		data: {
			action: 'crb_ajax_reset_physicians_filter',
			reset: true,
		},
		beforeSend: function () {

		},
		success: (response) => {
			$('#physicians-select-filter').replaceWith(response.data.filters.physicians_filter);
			$('#locations-select-filter').replaceWith(response.data.filters.locations_filter);
			$('.physicians_form_filter').trigger('submit');
		},
		error: function () {

		},
	});
});

$($doc).on('click', '.page-template-staff .form__reset', function(e){
	e.preventDefault();

	$.ajax({
		url: crb_site_utils.ajaxurl,
		type: 'GET',
		data: {
			action: 'crb_ajax_reset_staff_filter',
			reset: true,
		},
		beforeSend: function () {

		},
		success: (response) => {
			$('#staff-select-filter').replaceWith(response.data.filters.staff_filter);
			$('#locations-select-filter').replaceWith(response.data.filters.locations_filter);
			$('.staff_form_filter').trigger('submit');
		},
		error: function () {

		},
	});
});

$($doc).on('submit', '.physicians_form_filter', function(e){
	e.preventDefault();

	let locationId = 0;
	let physicianName = 0;
	let specialityId = 0;

	locationId = $('.locations-options option:selected').val();
	physicianName = $('.physicians-options option:selected').text();
	specialityId = $('#field-physician-specialty option:selected').val();

	$.ajax({
		url: crb_site_utils.current_page_url,
		type: 'GET',
		data: {
			location_id: locationId,
			physician_name: physicianName,
			speciality_id: specialityId,
		},
		beforeSend: function () {

		},
		success: (response) => {
			$('.employees__not-found').hide();
			if($(response).find('.employees ul li.single-employee').length) {
				$('.employees ul').html($(response).find('.employees ul li.single-employee'));
			} else {
				$('.employees ul').html($(response).find('.employees ul li.single-employee'));
				$('.employees__not-found').show();
			}
		},
		error: function () {

		},
	});
});

// Staff filter
$(document).on('change', '.staff-filter', function() {

	let id = $(this).val();
	let postType = $(this).data('post_type');
	let firstOption = $(this).closest('select').find('option').first().text();

	if(! id) {
		id = null;
	}

	$.ajax({
		url: crb_site_utils.ajaxurl,
		type: 'GET',
		data: {
			action: 'crb_ajax_staff_filter',
			id: id,
			post_type: postType,
		},
		beforeSend: function () {

		},
		success: (response) => {
			let firstOptionSpecialities = $('#field-staff-specialty option').first();
			if(response.data.specialities) {
				$('#field-staff-specialty').html(response.data.specialities);
				$('#field-staff-specialty').prepend(firstOptionSpecialities);
			}

			if(response.data.postType === 'crb_staff') {
				let firstOptionStaff = $('.staff-options option').first();

				$('.staff-options').html(response.data.staff);
				$('.staff-options').prepend(firstOptionStaff);
			}
			if(response.data.postType === 'crb_location') {
				let firstOptionLocations = $('.locations-options option').first();

				$('.locations-options').html(response.data.locations);
				$('.locations-options').prepend(firstOptionLocations);
			}
			if(response.data.postType === 'crb_physician_speciality') {
				let firstOptionLocations = $('.locations-options option').first();
				let firstOptionStaff = $('.staff-options option').first();

				$('.staff-options').html(response.data.staff);
				$('.staff-options').prepend(firstOptionStaff);

				$('.locations-options').html(response.data.locations);
				$('.locations-options').prepend(firstOptionLocations);
			}
		},
		error: function () {

		},
	});
});

$('.staff_form_filter').submit(function(e){
	e.preventDefault();

	let locationId = 0;
	let staffName = 0;
	let specialityId = 0;

	locationId = $('.locations-options option:selected').val();
	staffName = $('.staff-options option:selected').text();
	specialityId = $('#field-staff-specialty option:selected').val();

	$.ajax({
		url: crb_site_utils.current_page_url,
		type: 'GET',
		data: {
			location_id: locationId,
			staff_name: staffName,
			speciality_id: specialityId,
		},
		beforeSend: function () {

		},
		success: (response) => {
			$('.employees ul').html($(response).find('.employees ul li.single-employee'));
		},
		error: function () {

		},
	});
});

$('.physician-autocompleted-names').hide();

$('.physician-search-form .field').on('keyup', debounce(function() {
	let s = $(this).val();

	if (s == '') {
		$(this).closest('.form-search').find('.physician-autocompleted-names').hide().html('');
		return;
	}

	$.ajax({
		url: crb_site_utils.ajaxurl,
		type: 'GET',
		data: {
			action: 'crb_ajax_predict_physician_name',
			s: s,
		},
		beforeSend: function () {

		},
		success: (response) => {
			let names = [];
			for(const key in response.data.names) {
				names.push('<li>' + response.data.names[key] + '</li>');
			}

			$(this).closest('.form-search').find('.physician-autocompleted-names').show().html(names);
		},
		error: function () {

		},
	});
}, 500) );

$('.physician-autocompleted-names').on('click', 'li', function() {
	$(this).closest('.form-search').find('.physician-search-form .field').val( $(this).text() );
	$('.physician-autocompleted-names').hide();
});

$(document).click(function(e) {
   if(!$(e.target).hasClass('field') ){
	   $('.physician-autocompleted-names').hide();
   }
});

$('.location__list-item').on('click', function() {
	let id = $(this).find('.single-location-item > a').data('id');

	$('.location__list-item').removeClass('current');
	$(this).addClass('current');

	$(".locations").find(`i[data-id='${id}']`)
	.parent()
	.parent()
	.addClass('active')
	.siblings()
	.removeClass('active');
});

function autocompleteOnBoxes($field) {
	let input = document.getElementById($field);

	if(google.maps.places === undefined) {
		console.warn('Google Places Library is not included.');
		return;
	}

	var autocomplete = new google.maps.places.Autocomplete(input);

	autocomplete.setFields(['address_components', 'geometry', 'icon', 'name']);

	var place = autocomplete.getPlace();
}

autocompleteOnBoxes('field-location');

$('.list-radios--gender input').on('click', function() {
	let currentOpacity = $(this).closest('.radio').find('span').css('opacity');
	let newOpacity = 1;
	if(currentOpacity == newOpacity) {
		newOpacity = 0;
	}
	$(this).closest('.radio').find('span').css('opacity', newOpacity);
});

$('.btn-start-over').on('click', function() {
	$('.list-radios--gender input').each(function(){
		if($(this).closest('.radio').find('span').css('opacity')) {
			$(this).closest('.radio').find('span').css('opacity', 0)
		}
	});
});

$win.on('load', function(){
	$('.js-invoice-images').magnificPopup({
		type: 'inline'
	});
})

$($doc).magnificPopup({
	delegate: '.invoice-image',
	type: 'image'
});

new Vue({
	el: '#section-pay-bill',
	data: {
		invoiceNumber: '',
		steps: {
			radio: false,
			states: false,
			payBillSection: false
		},
		states: [],
		format: '',
		matchedStatement: true,
		accountNumberMatched: true,
		showState: false
	},
	methods: {
		checkNumber() {
			this.reset();

			let data = new FormData();
			data.append('action', 'crb_ajax_pay_bill');
			data.append('invoiceNumber', this.invoiceNumber);
			data.append('method', 'getInvoiceNumberFormat');

			axios({
				method: 'post',
				url: crb_site_utils.ajaxurl,
				data: data
			})
			.then((response) => {
				this.format = response.data.data[0].format;
				if ( this.format ) {
					this.accountNumberMatched = true;
					this.steps.radio = true;
				} else {
					this.accountNumberMatched = false;
				}

			});
		},
		decodeHTML: function (html) {
            var txt = document.createElement("textarea");
            txt.innerHTML = html;
            return txt.value;
        },
		loadStates(target) {
			this.ShowPayBillSection();
			this.matchedStatement = true;

			if ( this.states.length == undefined ) {
				this.steps.states = true;
				return;
			}

			let id = event.target.getAttribute('data-page_id');
			let data = new FormData();
			let method = 'noStates';
			let locations = 'tuc_locations';

			if ( this.format === 'TUG' ) {
				locations = 'tug_locations';
				method = 'loadStates';
			}

			if ( this.format === 'TUC' ) {
				locations = 'tuc_locations';
				method = 'loadStates';
			}

			data.append('action', 'crb_ajax_pay_bill');
			data.append('pageID', id);
			data.append('method', method);
			data.append('locations', locations);

			axios({
				method: 'post',
				url: crb_site_utils.ajaxurl,
				data: data
			})
			.then((response) => {
				this.states = response.data.data[0].States;
				this.steps.states = true;

				this.showState = false;
				if ( Object.keys(this.states).length > 1 ) {
					this.showState = true;
				}
			});
		},
		ShowPayBillSection(event) {
			var checked = false;
			$('.states__location input').each(function(){
				if($(this).is(":checked")){
					checked = true;
				}
			});
			if ( checked ) {
				this.steps.payBillSection = true;
			} else {
				this.steps.payBillSection = false;
			}
		},
		notMatchedBillingStatement() {
			this.steps.states = false;
			this.steps.payBillSection = false;
			this.matchedStatement = false;
		},
		reset() {
			this.matchedStatement = true;
			this.steps.radio = false;
			this.steps.states = false;
			this.steps.payBillSection = false;
			this.states = [];
			this.format = '';
			document.getElementById("billing-statement-form").reset();
		}
	},
	mounted: function () {

	},
});