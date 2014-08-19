if ('google' in window) {
	function initializeMap() {
		var map_canvas = document.getElementById("wpmob-google-map");
		var map_options = {
			center : new google.maps.LatLng(window.lat, window.lng),
			zoom : 16,
			mapTypeId : google.maps.MapTypeId.ROADMAP
		};
		window.map = new google.maps.Map(map_canvas, map_options);
		jQuery(document).ready(function() {
			setTimeout(function() {
				google.maps.event.trigger(map, 'resize');
			}, 1000);
		});
	}


	google.maps.event.addDomListener(window, 'load', initializeMap);
}

/**
 * This function refreshes the UI components everytime the app
 * becomes visible.
 */
function wpmobFindUsRefresh() {
	if ('google' in window) {
		google.maps.event.trigger(map, 'resize');
	}
}
