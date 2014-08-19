function switch_tabs(obj) {
	jQuery('.tab-content').hide();
	jQuery('#wpmob-main-menu ul a').removeClass("selected");
	var id = obj.attr("rel");

	jQuery('#' + id).fadeIn(500);

	obj.addClass("selected");
}


jQuery(document).ready(function() {
	setWPMobTabs();
});

function setWPMobTabs() {
	// Tabs
	jQuery('#wpmob-main-menu ul a').click(function() {
		switch_tabs(jQuery(this));
	});
	jQuery('.tab-content').hide();
	// Load the default or current tab.
	jQuery(((window.location.hash) ? window.location.hash : '#' + jQuery('.defaulttab').attr('rel'))).show();

	jQuery('.default-accordion').show();
}
