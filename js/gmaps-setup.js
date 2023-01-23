
"use strict"; // Start of use strict

// 7. google map
function gMap () {
	if (jQuery('.google-map-home').length) {
        jQuery('.google-map-home').each(function () {
        	// getting options from html 
        	var mapName = jQuery(this).attr('id');
        	var mapLat = jQuery(this).data('map-lat');
        	var mapLng = jQuery(this).data('map-lng');
        	var iconPath = jQuery(this).data('icon-path');
        	var mapZoom = jQuery(this).data('map-zoom');
        	var mapTitle = jQuery(this).data('map-title');

        	// defined default style
        	var styles = [
				    {
				        "featureType": "administrative",
				        "elementType": "labels.text.fill",
				        "stylers": [
				            {
				                "color": "#444444"
				            }
				        ]
				    },
				    {
				        "featureType": "landscape",
				        "elementType": "all",
				        "stylers": [
				            {
				                "color": "#f2f2f2"
				            }
				        ]
				    },
				    {
				        "featureType": "poi",
				        "elementType": "all",
				        "stylers": [
				            {
				                "visibility": "off"
				            }
				        ]
				    },
				    {
				        "featureType": "road",
				        "elementType": "all",
				        "stylers": [
				            {
				                "saturation": -100
				            },
				            {
				                "lightness": 45
				            }
				        ]
				    },
				    {
				        "featureType": "road.highway",
				        "elementType": "all",
				        "stylers": [
				            {
				                "visibility": "simplified"
				            }
				        ]
				    },
				    {
				        "featureType": "road.arterial",
				        "elementType": "labels.icon",
				        "stylers": [
				            {
				                "visibility": "off"
				            }
				        ]
				    },
				    {
				        "featureType": "transit",
				        "elementType": "all",
				        "stylers": [
				            {
				                "visibility": "off"
				            }
				        ]
				    },
				    {
				        "featureType": "water",
				        "elementType": "all",
				        "stylers": [
				            {
				                "color": "#999999"
				            },
				            {
				                "visibility": "on"
				            }
				        ]
				    }
				];

			// defined skin-1 style
        	if (jQuery(this).hasClass('skin-1')) {
        		var iconPath = 'img/theme/map-marker.png';
				var styles = [
				    {
				        "featureType": "administrative",
				        "elementType": "labels.text.fill",
				        "stylers": [
				            {
				                "color": "#444444"
				            }
				        ]
				    },
				    {
				        "featureType": "landscape",
				        "elementType": "all",
				        "stylers": [
				            {
				                "color": "#f2f2f2"
				            }
				        ]
				    },
				    {
				        "featureType": "poi",
				        "elementType": "all",
				        "stylers": [
				            {
				                "visibility": "off"
				            }
				        ]
				    },
				    {
				        "featureType": "road",
				        "elementType": "all",
				        "stylers": [
				            {
				                "saturation": -100
				            },
				            {
				                "lightness": 45
				            }
				        ]
				    },
				    {
				        "featureType": "road.highway",
				        "elementType": "all",
				        "stylers": [
				            {
				                "visibility": "simplified"
				            }
				        ]
				    },
				    {
				        "featureType": "road.arterial",
				        "elementType": "labels.icon",
				        "stylers": [
				            {
				                "visibility": "off"
				            }
				        ]
				    },
				    {
				        "featureType": "transit",
				        "elementType": "all",
				        "stylers": [
				            {
				                "visibility": "off"
				            }
				        ]
				    },
				    {
				        "featureType": "water",
				        "elementType": "all",
				        "stylers": [
				            {
				                "color": "#9999991"
				            },
				            {
				                "visibility": "on"
				            }
				        ]
				    }
				];
        	};

        	
        	// if zoom not defined the zoom value will be 15;
        	if (!mapZoom) {
        		var mapZoom = 15;
        	};
        	// init map
        	var map;
            map = new GMaps({
                div: '#'+mapName,
                scrollwheel: false,
                lat: mapLat,
                lng: mapLng,
                styles: styles,
                zoom: mapZoom
            });
            // if icon path setted then show marker
            if(iconPath) {
        		map.addMarker({
	            	icon: iconPath,
	                lat: mapLat,
	                lng: mapLng,
	                title: mapTitle
	            });
        	}
        });  
	};
}



// instance of fuction while Document ready event	
jQuery(document).on('ready', function () {
	(function ($) {
		gMap();
	})(jQuery);
});








