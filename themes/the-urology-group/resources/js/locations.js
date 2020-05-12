;(function($, window, document, undefined) {
	var $win = $(window);
	var $doc = $(document);

	$win.on('load', function() {
		/**
		 * Initialize Locations Map
		 */
		initLocationsMap();
	});
	/**
	 * Function that initialize Locations Map
	 */
	function initLocationsMap() {
		var crb_object_locations = {
			"locations": [
				{ "slug": "variant", "lat": "44.985776", "lng": "-93.278308", "type" : "logo" },
				{ "slug": "hewing-hotel", "lat": "44.984895508649", "lng": "-93.272895000488", "type" : "restaurant" },
				{ "slug": "filson", "lat": "44.984662", "lng": "-93.272076", "type" : "restaurant" },
				{ "slug": "spoon-and-stable", "lat": "44.985732", "lng": "-93.26953", "type" : "restaurant" },
				{ "slug": "freehouse", "lat": "44.987704", "lng": "-93.27715", "type" : "restaurant" },
				{ "slug": "fulton-brewery", "lat": "44.985113", "lng": "-93.279168", "type" : "restaurant" },
				{ "slug": "target-field", "lat": "44.981955", "lng": "-93.277728", "type" : "restaurant" },
				{ "slug": "light-rail-stop", "lat": "44.983044", "lng": "-93.277287", "type" : "restaurant" },
				{ "slug": "whole-foods", "lat": "44.982743", "lng": "-93.26947", "type" : "restaurant" },
				{ "slug": "lunds-and-byerlys", "lat": "44.974303", "lng": "-93.280626", "type" : "restaurant" },
				{ "slug": "butcher-and-the-boar", "lat": "44.974832", "lng": "-93.279801", "type" : "restaurant" },
				{ "slug": "red-cow", "lat": "44.983646", "lng": "-93.269374", "type" : "restaurant" },
				{ "slug": "be-the-match", "lat": "44.984007", "lng": "-93.278345", "type" : "restaurant" },
				{ "slug": "the-bachelor-farmer", "lat": "44.985723", "lng": "-93.268838", "type" : "restaurant" },
				{ "slug": "borough", "lat": "44.988747", "lng": "-93.27785", "type" : "restaurant" },
				{ "slug": "cuzzys", "lat": "44.986083", "lng": "-93.275387", "type" : "restaurant" },
				{ "slug": "smack-shack", "lat": "44.986801", "lng": "-93.276326", "type" : "restaurant" },
				{ "slug": "bunkers-music-bar-and-grill", "lat": "44.988581", "lng": "-93.278682", "type" : "restaurant" },
				{ "slug": "bonobos", "lat": "44.9832173", "lng": "-93.2713373", "type" : "restaurant" },
				{ "slug": "brian-graham-salon", "lat": "44.9843746", "lng": "-93.2719046", "type" : "grocery" },
				{ "slug": "north-loop-wine-and-spirits", "lat": "44.9844483", "lng": "-93.2718641", "type" : "grocery" },
				{ "slug": "dnolo", "lat": "44.9849568", "lng": "-93.2709354", "type" : "grocery" },
				{ "slug": "lappin-lighting", "lat": "44.9853889", "lng": "-93.2707875", "type" : "restaurant" },
				{ "slug": "the-foundry-home-goods", "lat": "44.9850191", "lng": "-93.2691342", "type" : "restaurant" },
				{ "slug": "askov-finlayson", "lat": "44.9857486", "lng": "-93.2691021", "type" : "restaurant" },
				{ "slug": "jeromeo-in-the-loop", "lat": "44.9840778", "lng": "-93.2736026", "type" : "restaurant" },
				{ "slug": "james-mary-laurie-bookseller", "lat": "44.9840778", "lng": "-93.2736026", "type" : "restaurant" },
				{ "slug": "kai-salon", "lat": "44.9846488", "lng": "-93.2740635", "type" : "restaurant" },
				{ "slug": "lol", "lat": "44.9847912", "lng": "-93.2741701", "type" : "restaurant" },
				{ "slug": "cest-chic-boutique", "lat": "44.9849934", "lng": "-93.2703035", "type" : "restaurant" },
				{ "slug": "martin-patrick-3", "lat": "44.9853008", "lng": "-93.2719525", "type" : "restaurant" },
				{ "slug": "514-studios", "lat": "44.9859182", "lng": "-93.2762208", "type" : "restaurant" },
				{ "slug": "atmosfere", "lat": "44.988794", "lng": "-93.2778379", "type" : "restaurant" },
				{ "slug": "haus-salon", "lat": "44.988794", "lng": "-93.2778379", "type" : "event" },
				{ "slug": "aria", "lat": "44.9845626", "lng": "-93.2685121", "type" : "event" },
				{ "slug": "muse-event-center", "lat": "44.9857031", "lng": "-93.2704611", "type" : "event" },
				{ "slug": "cooks-of-crocus-hill", "lat": "44.985852", "lng": "-93.2692746", "type" : "restaurant" },
				{ "slug": "runds-market", "lat": "44.9868643", "lng": "-93.2719863", "type" : "restaurant" },
				{ "slug": "one-on-one-bicycle-studio-and-cafe", "lat": "44.9831036", "lng": "-93.271181", "type" : "restaurant" },
				{ "slug": "the-bachelor-farmer-cafe", "lat": "44.9856838", "lng": "-93.2689193", "type" : "restaurant" },
				{ "slug": "dunn-brothers-coffee", "lat": "44.9847912", "lng": "-93.2741701", "type" : "restaurant" },
				{ "slug": "caribou-coffee", "lat": "44.9837342", "lng": "-93.278869", "type" : "restaurant" },
				{ "slug": "corner-coffee", "lat": "44.9859182", "lng": "-93.2762208", "type" : "restaurant" },
				{ "slug": "spyhouse", "lat": "44.9898259", "lng": "-93.2799138", "type" : "restaurant" },
				{ "slug": "brothers-bar-grill", "lat": "44.9807898", "lng": "-93.2738034", "type" : "restaurant" },
				{ "slug": "the-shout-house-dueling-pianos", "lat": "44.9808315", "lng": "-93.2741352", "type" : "restaurant" },
				{ "slug": "cowboy-jacks", "lat": "44.981222", "lng": "-93.2744482", "type" : "restaurant" },
				{ "slug": "rouge-at-the-lounge", "lat": "44.9815805", "lng": "-93.2738793", "type" : "restaurant" },
				{ "slug": "aqua-nightclub", "lat": "44.9812735", "lng": "-93.2732689", "type" : "restaurant" },
				{ "slug": "prive", "lat": "44.9815404", "lng": "-93.2716637", "type" : "restaurant" },
				{ "slug": "fine-line-music-cafe", "lat": "44.9817854", "lng": "-93.2723292", "type" : "restaurant" },
				{ "slug": "jacksons-hole", "lat": "44.982369", "lng": "-93.2715039", "type" : "restaurant" },
				{ "slug": "marvel-bar", "lat": "44.985706", "lng": "-93.2688741", "type" : "restaurant" },
				{ "slug": "bevs-wine-bar", "lat": "44.9840778", "lng": "-93.2736026", "type" : "restaurant" },
				{ "slug": "darbys", "lat": "44.9848278", "lng": "-93.27631", "type" : "restaurant" },
				{ "slug": "modist-brewing-co", "lat": "44.9852671", "lng": "-93.2764831", "type" : "bar" },
				{ "slug": "inbound-brewco", "lat": "44.98564", "lng": "-93.2814958", "type" : "bar" },
				{ "slug": "the-loop", "lat": "44.987399", "lng": "-93.2759302", "type" : "bar" },
				{ "slug": "acme-comedy-company", "lat": "44.989964", "lng": "-93.2750188", "type" : "bar" },
				{ "slug": "clubhouse-jager", "lat": "44.9900478", "lng": "-93.2807002", "type" : "bar" },
				{ "slug": "parlour", "lat": "44.988794", "lng": "-93.2778379", "type" : "bar" },
				{ "slug": "pizza-luce", "lat": "44.9816029", "lng": "-93.2737433", "type" : "bar" },
				{ "slug": "red-rabbit", "lat": "44.9836893", "lng": "-93.2717704", "type" : "bar" },
				{ "slug": "dong-hae", "lat": "44.9821515", "lng": "-93.2708264", "type" : "retail" },
				{ "slug": "112-eatery", "lat": "44.982555", "lng": "-93.2717606", "type" : "restaurant" },
				{ "slug": "runyon", "lat": "44.9829488", "lng": "-93.2708303", "type" : "restaurant" },
				{ "slug": "hautedish", "lat": "44.9831516", "lng": "-93.2712426", "type" : "restaurant" },
				{ "slug": "jd-hoyts", "lat": "44.9844879", "lng": "-93.2729082", "type" : "restaurant" },
				{ "slug": "the-monte-carlo", "lat": "44.9847181", "lng": "-93.2716986", "type" : "coffeeshop" },
				{ "slug": "moose-and-sadie's", "lat": "44.9853008", "lng": "-93.2719525", "type" : "coffeeshop" },
				{ "slug": "kado-no-mise", "lat": "44.9848161", "lng": "-93.2675616", "type" : "coffeeshop" },
				{ "slug": "black-sheep-pizza", "lat": "44.9873145", "lng": "-93.2757209", "type" : "coffeeshop" },
				{ "slug": "crisp-and-green", "lat": "44.9861519", "lng": "-93.2743597", "type" : "coffeeshop" },
				{ "slug": "c-mcgees-deli", "lat": "44.9886349", "lng": "-93.2811218", "type" : "coffeeshop" },
				{ "slug": "bar-lagrassa", "lat": "44.9895103", "lng": "-93.2786293", "type" : "restaurant" },
				{ "slug": "bewiched-sandwiches-and-deli", "lat": "44.9895103", "lng": "-93.2786293", "type" : "restaurant" },
				{ "slug": "jun", "lat": "44.988794", "lng": "-93.2778379", "type" : "restaurant" },
				{ "slug": "rise-bagel-co", "lat": "44.9861774", "lng": "-93.2765411", "type" : "restaurant" }],
			"styles": [{"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#e9e9e9"}, {"lightness": 17 } ] }, {"featureType": "landscape", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"}, {"lightness": 20 } ] }, {"featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{"color": "#ffffff"}, {"lightness": 17 } ] }, {"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"color": "#ffffff"}, {"lightness": 29 }, {"weight": 0.2 } ] }, {"featureType": "road.arterial", "elementType": "geometry", "stylers": [{"color": "#ffffff"}, {"lightness": 18 } ] }, {"featureType": "road.local", "elementType": "geometry", "stylers": [{"color": "#ffffff"}, {"lightness": 16 } ] }, {"featureType": "poi", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"}, {"lightness": 21 } ] }, {"featureType": "poi.park", "elementType": "geometry", "stylers": [{"color": "#dedede"}, {"lightness": 21 } ] }, {"elementType": "labels.text.stroke", "stylers": [{"visibility": "on"}, {"color": "#ffffff"}, {"lightness": 16 } ] }, {"elementType": "labels.text.fill", "stylers": [{"saturation": 36 }, {"color": "#333333"}, {"lightness": 40 } ] }, {"elementType": "labels.icon", "stylers": [{"visibility": "off"} ] }, {"featureType": "transit", "elementType": "geometry", "stylers": [{"color": "#f2f2f2"}, {"lightness": 19 } ] }, {"featureType": "administrative", "elementType": "geometry.fill", "stylers": [{"color": "#fefefe"}, {"lightness": 20 } ] }, {"featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{"color": "#fefefe"}, {"lightness": 17 }, {"weight": 1.2 } ] } ]
		};

		var map        = $('.locations .locations__map')[0];
		var styles     = crb_object_locations.styles;
		var locations  = crb_object_locations.locations;
		var center     = new google.maps.LatLng(44.984776, -93.278308);
		var glocations = [];

		function addLocation(location){
			var lat   = location.lat;
			var lng   = location.lng;
			var type  = location.type;
			var slug  = location.slug;

			var marker = new RichMarker({
				position: new google.maps.LatLng(lat, lng),
				content: '<i data-' + type + ' data-slug =' + slug + '></i>',
				type: type,
				slug: slug,
				map: map,
				shadow: false,
			});

			glocations.push(marker);

			$('.locations__list').append('<li><a data-type="' + type + '" data-slug="' + slug + '">' + slug + '</a></li>');
		}

		function clearStates() {
			$('.locations__map .active').removeClass('active');
			$('.locations__list .current').removeClass('current');
		}

		function filterLocations(type) {
			clearStates();

			// Filter Map markers
			locations.forEach(function(location, index) {
				marker = glocations[index];

				if (type === 'all' || marker.type == 'logo' || marker.type == type || type.length === 0) {
				    marker.setVisible(true);
				} else {
				    marker.setVisible(false);
				}
			});

			// Filter Locations list
			$('.locations__list a').each(function(index, location) {
				if (type == 'all' || $(location).data('type') == type) {
					$(location).parent().show();
				} else {
					$(location).parent().hide();
				}
			});
		};

		// Initialize custom scrollbar
		$(".locations__aside").mCustomScrollbar();

		// Initialize the Map
		var map = new google.maps.Map(map, {
			styles: styles,
			zoom: 16,
			center: center,
		});

		locations.forEach(function(location) {
			addLocation(location);
		});

		// Add window event listener
		$win.on({
			'resize': function(arguments) {
				map.setCenter(center);
			}
		})

		// Add markers event listeners
		$doc.on({
			'click': function() {
				var $this = $(this);
				var $parent = $this.parent().parent();
				var $listLocation = $('.locations__list').find('[data-slug=' + $this.data('slug') + ']');

				$parent
					.addClass('active')
					.siblings()
						.removeClass('active');

				$listLocation
					.parent()
						.addClass('current')
						.siblings()
							.removeClass('current');

				var listContainerHeight =  $('.locations .mCustomScrollbar').height();
				var listScrollTop       =  - $('.locations .mCSB_container').position().top;
				var locationPositionTop = $listLocation.position().top;
				var isNotVisible        = listScrollTop + listContainerHeight < locationPositionTop || listScrollTop > locationPositionTop;
				var scrollValue         = locationPositionTop - listContainerHeight / 2 > 0 ? locationPositionTop - listContainerHeight / 2 : 0;

				if (isNotVisible) {
					$('.locations__aside').mCustomScrollbar("scrollTo",scrollValue);
				}
			},
			'mouseenter': function() {
				var $parent = $(this).parent().parent();

				$parent.addClass('hover');
			},
			'mouseleave': function() {
				var $parent = $(this).parent().parent();

				$parent.removeClass('hover');
			},
		}, '.locations__map i');

		// Add locations actions(filters) listeners
		$doc.on({
			'click': function(event) {
				event.preventDefault();

				$(this).parent().addClass('current').siblings().removeClass('current');

				filterLocations($(this).data('type'));
			},
		}, '.locations__actions a');

		// Add Select(mobile filter) listener
		$doc.on({
			'change': function(arguments) {
				filterLocations($(this).val());
				$(this)
					.parent()
					.removeClass()
						.addClass('type-' + $(this).val())
			}
		}, '.locations__filter select' );

		// Add locations list items event listeners
		$doc.on({
			'click': function(event) {
				event.preventDefault();

				var locationslug = $(this).data('slug');

				$(this)
					.parent()
						.addClass('current')
						.siblings()
							.removeClass('current');

				$('.locations i[data-slug=' + locationslug + ']')
					.parent().parent()
						.addClass('active')
						.siblings()
							.removeClass('active');
			},
		}, '.locations__list a');
	}
})(jQuery, window, document);