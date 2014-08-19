jQuery(document).ready(function() {
	jQuery('#bottomtoolbar').show();
	jQuery('.toolbar-carousel').owlCarousel({
		items : 10, // 10 max. visible items at any width.
		itemsDesktop : [1280, 4], // 5 items max in a width of 1000px.
		itemsDesktopSmall : [1000, 4],
		itemsTablet : [800, 4],
		itemsTabletSmall : false,
		itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
	});
});

/**
 * Set the toolbar app icons behavior
 */
jQuery(document).ready(function() {
	// By default hide all app content layers
	jQuery('#wpmob-apps-content').hide();
	jQuery('#wpmob-apps-content .wpmob-app-content').hide();
	// Add behavior for each individual app icon.
	jQuery('#bottomtoolbar a.wpmob-icon').click(function() {
		/**
		 * Display the app content if it is not yet selected.
		 */
		if (!jQuery(this).hasClass('selected')) {
			// Set selected menu item
			jQuery('#bottomtoolbar a.wpmob-icon').removeClass('selected');
			jQuery(this).addClass('selected');
			// Hide all the app content layers.
			jQuery('#wpmob-apps-content .wpmob-app-content').hide();
			// If the main container is hidden, display it.
			if (!jQuery('#wpmob-apps-content').is(':visible')) {
				jQuery('#wpmob-apps-content').show();
				jQuery('#wpmob-apps-content').animate({
					top : 0
				}, 800, 'swing', (function(target) {
					return function() {
						// Display the selected app content.
						jQuery('#' + jQuery(target).attr('rel')).fadeIn(300, function() {
							// Call the content refresh fuction if present for the app.
							fnRefresh = jQuery(target).attr('rel') + '_refresh';
							if ( fnRefresh in window) {
								window[fnRefresh]();
							}
						});
					};
				})(this));
			} else {
				// Display the selected app content.
				jQuery('#' + jQuery(this).attr('rel')).fadeIn(500, (function(target) {
					return function() {
						// Call the content refresh fuction if present for the app.
						fnRefresh = jQuery(target).attr('rel') + '_refresh';
						if ( fnRefresh in window) {
							window[fnRefresh]();
						}
					};
				})(this));
			}
		} else {
			// Hide the app content and deselect the app icon.
			jQuery('#wpmob-apps-content').animate({
				top : 1000
			}, 500, function() {
				jQuery('#bottomtoolbar a.wpmob-icon').removeClass('selected');
				jQuery('#wpmob-apps-content').hide();
			});
		}
	});

	/**
	 * Set a hook to handle the app fragments (#) in the URL
	 */
	appHash = window.location.hash;
	if (jQuery('#bottomtoolbar a.wpmob-icon.selected').size() == 0) {
		jQuery('#bottomtoolbar a.wpmob-icon').each(function() {
			if (this.hash == appHash) {
				// Set the selected app
				jQuery(this).click();
			}
		});
	}
});
